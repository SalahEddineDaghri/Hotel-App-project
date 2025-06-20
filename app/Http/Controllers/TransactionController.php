<?php

namespace App\Http\Controllers;

use App\Events\NewReservationEvent;
use App\Events\RefreshDashboardEvent;
use App\Http\Requests\ChooseRoomRequest;
use App\Models\Customer;
use Illuminate\Support\Str;
use App\Models\Notifications;
use App\Models\Room;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Payment;
use App\Notifications\NewRoomReservationDownPayment;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TransactionController extends Controller
{
    public function errorget()
    {
        return $this->index();
    }

    public function index()
    {
        if (auth()->guest()) {
            return redirect('/login');
        }
        if (auth()->user()->is_admin == 0) {
            abort(404);
        }
        $today = Carbon::now()->isoFormat('Y-M-D');
        $transaction = Transaction::with('Customer', 'Payments')->where('check_out', '>=', $today)->orderby('id', 'desc')->get();
        return view('dashboard.order.index', compact('transaction'));
    }


    public function history()
    {
        if (auth()->guest()) {
            return redirect('/login');
        }
        if (auth()->user()->is_admin == 0) {
            abort(404);
        }
        $p = Carbon::now();
        $transaction = Transaction::where('check_out', '>=', $p)->get();
        $transactionexpired = Transaction::where('check_out', '<', $p)->get();
        return view('dashboard.order.historyorder', compact('transaction', 'transactionexpired', 'p'));
    }

    public function create_identity()
    {
        $uri = Route::currentroutename();
        if (auth()->guest()) {
            return redirect('/login');
        }
        if (auth()->user()->is_admin == 0) {
            abort(404);
        }
        return view('dashboard.order.createidentity', compact('uri'));
    }

    public function pick(Request $request)
    {
        if (auth()->guest()) {
            return redirect('/login');
        }
        if (auth()->user()->is_admin == 0) {
            abort(404);
        }
        $uri = Route::currentroutename();
        $customers = $this->get($request);
        $customersCount = $this->count($request);
        return view('dashboard.order.pickfromcustomer', compact('uri', 'customers', 'customersCount'));
    }

    public function viewperson(Request $request)
    {
        //  dd($request->all());
        if ($request['name']) {
            $request->validate([
                'name' => 'required',
                'username' => 'required',
                'password' => 'required',
                'email' => 'required',
                'telp' => 'required',
                'birthdate' => 'nullable',
                'jk' => 'nullable',
                'job' => 'nullable',
                'nik' => 'nullable',
                'address' => 'nullable'
            ]);
            $cus = Customer::create([
                'name' => $request->name,
                'address' => $request->address,
                'jk' => $request->jk,
                'job' => $request->job,
                'birthdate' => $request->birthdate,
                'nik' => $request->nik
            ]);
            User::create([
                'c_id' => $cus->id,
                'username' => $request->username,
                'telp' => $request->telp,
                'email' => $request->email,
                'password' => $request->password,
                'is_admin' => 0,
            ]);
            $c_id = $cus->id;
        } else {
            $c_id = $request->customer;
        }
        // Alert::success('Success', 'success');
        $uri = Route::currentroutename();
        $customer = Customer::where('id', $c_id)->first();
        // dd($customer);
        return view('dashboard.order.viewcountperson', compact('uri', 'c_id', 'customer'));
    }

    public function chooseroom(ChooseRoomRequest $request)
    {
        $uri = Route::currentroutename();
        $stayfrom = Carbon::parse($request->from)->isoFormat('D MMM YYYY');
        $stayto = Carbon::parse($request->to)->isoFormat('D MMM YYYY');
        $occupiedRoomId = $this->getOccupiedRoomID_2($request->from, $request->to);
        $rooms = $this->getUnocuppiedroom($request, $occupiedRoomId);
        $roomsCount = $this->countUnocuppiedroom($request, $occupiedRoomId);
        $customer = Customer::where('id', $request->c_id)->first();
        return view('dashboard.order.chooseroom', compact('uri', 'customer', 'roomsCount', 'rooms', 'stayfrom', 'stayto'));
    }


    public function confirmation(Request $request)
    {
        $uri = Route::currentroutename();
        $room = Room::where('id', $request->room)->with('Type')->first();
        $customer = Customer::where('id', $request->customer)->first();
        $stayfrom = Carbon::parse($request->from);
        $stayuntil = Carbon::parse($request->to);
        $price = $room->price;
        $dayDifference = $stayfrom->diffindays($stayuntil);
        $total = $price * $dayDifference;
        $downPayment = ($price * $dayDifference) * 0.5;
        return view('dashboard.order.confirmation', compact('uri', 'dayDifference', 'customer', 'room', 'stayfrom', 'stayuntil', 'total', 'downPayment'));
    }


    public function payDownPayment(Request $request)
    {
        $checkin = Carbon::parse($request->check_in);
        $checkout = Carbon::parse($request->check_out);
        $dayDifference = $checkin->diffindays($checkout);
        $rooms = Room::where('id', $request->room)->first();
        $customers = Customer::where('id', $request->customer)->first();
        $minimumDownPayment = ($rooms->price * $dayDifference) * 0.5;
        // $request->validate([
        //     'downPayment' => 'required|numeric|gte:' . $minimumDownPayment
        // ]);

        $occupiedRoomId = $this->getOccupiedRoomID($request->check_in, $request->check_out);
        $occupiedRoomIdInArray = $occupiedRoomId->toArray();

        if (in_array($rooms->id, $occupiedRoomIdInArray)) {
            Alert::error('Invalid', 'Sorry, Room Already Serve!');
            return back();
        }

        $transaction = $this->storetransaction($request, $rooms);
        $status = 'Down Payment';
        $payment = $this->storepayment($request, $transaction, $status);

        $superAdmins = User::where('is_admin', 1)->get();

        // foreach ($superAdmins as $superAdmin) {
        //     $message = 'Reservation added by ' . $customers->name;
        //     event(new NewReservationEvent($message, $superAdmin));
        //     $superAdmin->notify(new NewRoomReservationDownPayment($transaction, $payment));
        // }

        // event(new RefreshDashboardEvent("Someone reserved a room"));
        Alert::success('Success', 'Room ' . $rooms->no . ' Has been reservated by ' . $customers->name);
        return redirect()->route('transaction.index');
    }





    private function storetransaction($request, $rooms)
    {
        $storetransaction = Transaction::create([
            'room_id' => $rooms->id,
            'c_id' => $request->customer,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'status' => 'Reservation'
        ]);
        return $storetransaction;
    }

    private function storepayment($request, $transaction, string $status)
    {
        if (!empty($request->downPayment)) {
            $price = $request->downPayment;
        } else {
            $price = $request->payment;
        }
        $count = Payment::count() + 1;
        $payment = Payment::create([
            'c_id' => $request->customer,
            'transaction_id' => $transaction->id,
            'price' => $price,
            'status' => $status,
            'payment_method_id' => 1,
            'invoice' =>  '0' . $request->customer . 'INV' . $count . Str::random(4)
        ]);
        return $payment;
    }

    private function getUnocuppiedroom($request, $occupiedRoomId)
    {
        $count = (int) $request->count;
        $occupiedRoomId = is_array($occupiedRoomId) ? $occupiedRoomId : [];

        $rooms = Room::with('type', 'status')
            ->where('capacity', '>=', $count)
            ->whereNotIn('id', $occupiedRoomId)
            ->paginate(5);

        if (!empty($request->sort_name)) {
            $rooms = $rooms->orderBy($request->sort_name, $request->sort_type);
        }
        return $rooms;
    }

    private function countUnocuppiedroom($request, $occupiedRoomId)
    {
        return Room::with('type', 'status')
            ->where('capacity', '>=', $request->count)
            ->whereNotIn('id', $occupiedRoomId)
            ->orderBy('price')
            ->orderBy('capacity')
            ->count();
    }

    private function getOccupiedRoomID($stayfrom, $stayto)
    {
        $occupiedRoomId = Transaction::where([['check_in', '<=', $stayfrom], ['check_out', '>=', $stayto]])
            ->orWhere([['check_in', '>=', $stayfrom], ['check_in', '<=', $stayto]])
            ->orWhere([['check_out', '>=', $stayfrom], ['check_out', '<=', $stayto]])
            ->pluck('room_id');
        return $occupiedRoomId;
    }

    private function getOccupiedRoomID_2($stayfrom, $stayto)
    {
        return Transaction::where(function ($query) use ($stayfrom, $stayto) {
            $query->where(function ($q) use ($stayfrom, $stayto) {
                $q->where('check_in', '<', $stayto)
                    ->where('check_out', '>', $stayfrom);
            });
        })->pluck('room_id')->toArray();
    }

    private function get($request)
    {

        $customers = Customer::with('user')->orderBy('id', 'DESC');
        if (!empty($request->q)) {
            $customers = $customers->where('name', 'Like', '%' . $request->q . '%')
                ->orWhere('id', 'Like', '%' . $request->q . '%');
        }

        $customers = $customers->paginate(8);
        $customers->appends($request->all());
        return $customers;
    }

    private function count($request)
    {
        $customersCount = Customer::with('user')->orderBy('id', 'DESC');

        if (!empty($request->q)) {
            $customersCount = $customersCount->where('name', 'Like', '%' . $request->q . '%')
                ->orWhere('id', 'Like', '%' . $request->q . '%');
        }

        $customersCount = $customersCount->count();
        return $customersCount;
    }
}
