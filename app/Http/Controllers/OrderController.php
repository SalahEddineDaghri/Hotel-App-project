<?php

namespace App\Http\Controllers;

use App\Events\NewReservationEvent;
use App\Events\RefreshDashboardEvent;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\Room;
use App\Models\Transaction;
use App\Models\User;
use App\Notifications\NewRoomReservationDownPayment;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{

    public function index(Request $request)
    {
        if (auth()->guest()) {
            Alert::error('Please Login First!');
            return redirect('/login');
        }

        $stayfrom = Carbon::parse($request->from);
        $stayuntil = Carbon::parse($request->to);
        $room = Room::findOrFail($request->room);

        $cektransaksi = Transaction::where('room_id', $room->id)
            ->where(function ($query) use ($stayfrom, $stayuntil) {
                $query->whereBetween('check_in', [$stayfrom, $stayuntil])
                    ->orWhereBetween('check_out', [$stayfrom, $stayuntil])
                    ->orWhere(function ($q) use ($stayfrom, $stayuntil) {
                        $q->where('check_in', '<=', $stayfrom)
                            ->where('check_out', '>=', $stayuntil);
                    });
            })->exists(); // plus optimisé

        if ($cektransaksi) {
            Alert::error('Room Not Available');
            return back();
        }

        $customer = $request->customer
            ? Customer::findOrFail($request->customer)
            : auth()->user()->Customer;

        $price = $room->price;
        $dayDifference = $stayfrom->diffInDays($stayuntil);
        $total = $price * $dayDifference;

        $paymentmet = PaymentMethod::whereNotIn('id', [1])->get();

        return view('frontend.order', compact('customer', 'room', 'stayfrom', 'dayDifference', 'stayuntil', 'total', 'paymentmet'));
    }


    // public function order2(Request $request)
    // {
    //     $rooms = Room::where('id', $request->room)->first();
    //     $customers = Customer::where('id', $request->customer)->first();

    //     //cek transaksi apakah kamar sudah ada booking
    //     $stayfrom = Carbon::parse($request->check_in);
    //     $stayuntil = Carbon::parse($request->check_out);
    //     $cektransaksi = Transaction::where('room_id', $request->room)->where([['check_in', '<=', $stayfrom], ['check_out', '>=', $stayuntil]])
    //         ->orWhere([['check_in', '>=', $stayfrom], ['check_in', '<=', $stayuntil]])
    //         ->orWhere([['check_out', '>=', $stayfrom], ['check_out', '<=', $stayuntil]])->get();
    //     if ($cektransaksi->count() > 0) {
    //         Alert::error('Room Not Available');
    //         return back();
    //     }
    //     // ===========


    //     if ($customers->nik == null) {
    //         Alert::error('Kesalahan Data', 'Please fill in your NIK data');
    //         return redirect('myaccount');
    //     }

    //     $transaction = $this->storetransaction($request, $rooms);
    //     $status = 'Pending';
    //     $payment = $this->storepayment($request, $transaction, $status);

    //     $superAdmins = User::where('is_admin', 1)->get();

    //     foreach ($superAdmins as $superAdmin) {
    //         $message = 'Reservation added by ' . $customers->name;
    //         event(new NewReservationEvent($message, $superAdmin));
    //         $superAdmin->notify(new NewRoomReservationDownPayment($transaction, $payment));
    //     }
    //     event(new RefreshDashboardEvent("Someone reserved a room"));
    //     $inv = Payment::where('c_id', $request->customer)->orderby('id', 'desc')->first();
    //     Alert::success('Thanks!', 'Room ' . $rooms->no . ' Has been reservated' . ' Please Pay now!');
    //     return redirect('/bayar/' . $inv->Transaction->id);
    // }

    public function invoice($id)
    {
        $p = Payment::where('id', $id)->with('Customer', 'Transaction', 'Methode')->first();
        if ($p->status == 'Pending') {
            return abort(404);
        }
        // dd($p);
        return view('frontend.invoice', compact('p'));
    }


    public function order(Request $request)
    {
        $room = Room::findOrFail($request->room);
        $customer = Customer::findOrFail($request->customer);
        $checkIn = Carbon::parse($request->check_in);
        $checkOut = Carbon::parse($request->check_out);

        if (!$customer->nik) {
            Alert::error('Erreur', 'Merci de compléter votre profil.');
            return redirect('/myaccount');
        }

        // Check availability
        $conflict = Transaction::where('room_id', $room->id)
            ->where(function ($query) use ($checkIn, $checkOut) {
                $query->whereBetween('check_in', [$checkIn, $checkOut])
                    ->orWhereBetween('check_out', [$checkIn, $checkOut])
                    ->orWhere(function ($q) use ($checkIn, $checkOut) {
                        $q->where('check_in', '<=', $checkIn)->where('check_out', '>=', $checkOut);
                    });
            })->exists();

        if ($conflict) {
            Alert::error('Chambre indisponible', 'Veuillez choisir une autre chambre.');
            return back();
        }

        $days = $checkIn->diffInDays($checkOut);
        $totalPrice = $room->price * $days;

        // Stocker les données dans la session
        $request->session()->put('reservation_data', [
            'room_id' => $room->id,
            'customer_id' => $customer->id,
            'check_in' => $checkIn->toDateString(),
            'check_out' => $checkOut->toDateString(),
            'total_price' => $totalPrice,
        ]);

        $data = session('reservation_data');

        if (!$data) {
            return redirect('/')->with('error', 'Les données de réservation sont manquantes.');
        }

        $room = Room::find($data['room_id']);
        $customer = Customer::find($data['customer_id']);

        return view('payment.confirmation', compact('data', 'room', 'customer'));


        // return view('payment.confirmation', [
        //     'room' => $room,
        //     'customer' => $customer,
        //     'days' => $days,
        //     'total' => $totalPrice,
        // ]);
        // dd( [
        //     'room' => $room,
        //     'customer' => $customer,
        //     'days' => $days,
        //     'total' => $totalPrice,
        // ]);
    }



    public function pembayaran($id)
    {

        $t = Transaction::findOrFail($id);
        // dd($t->Payments[0]->Methode->nama);
        $pmi = [1];
        $pay = $t->Payments->wherenotin('payment_method_id', $pmi)->first();
        if ($pay->status == 'Pending' and $pay->image != null) {
            return back();
        }
        // dd($pay->id);
        $price = Room::where('id', $t->Room->id)->first()->price;
        return view('frontend.bayar', compact('t', 'price', 'pay'));
    }

    public function bayar(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|file',
        ]);
        if ($request->file('image')) {
            $image = $validatedData['image'] = $request->file('image')->store('bukti-images', 'public');
        }
        $payment = Payment::findOrFail($request->id);
        // dd($request->all());
        $payment->update([
            'image' => $image,
        ]);
        Alert::success('Pembayaran Berhasil', 'Wait for Confirmation!');
        return redirect('/history');
    }

    private function storetransaction($request, $rooms)
    {
        // dd($request->customer);
        $storetransaction = Transaction::create([
            // 'user_id' => auth()->user()->id,
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
        $price = $request->price;
        $count = Payment::count() + 1;
        $payment = Payment::create([
            'c_id' => $request->customer,
            'transaction_id' => $transaction->id,
            'price' => $price,
            'status' => $status,
            'payment_method_id' => $request->payment_method_id,
            'invoice' =>  '0' . $request->customer . 'INV' . $count . Str::random(4)
        ]);

        return $payment;
    }
}
