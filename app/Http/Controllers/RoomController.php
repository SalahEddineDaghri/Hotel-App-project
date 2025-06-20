<?php

namespace App\Http\Controllers;

use App\Models\ImageRoom;
use App\Models\Notifications;
use App\Models\Room;
use App\Models\RoomStatus;
use App\Models\Type;
use Carbon\Carbon;
// use Illuminate\Console\View\Components\Alert as ComponentsAlert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class RoomController extends Controller
{
    public function index()
    {
        if (auth()->guest()) {
            return redirect('/login');
        }
        if (auth()->user()->is_admin == 0) {
            abort(404);
        }
        $room = Room::with('images')->orderBy('id', 'desc')->get();
        // dd($room->images->image);
        $p = Room::get()->count();
        return view('dashboard.room.index', compact('room', 'p'));
    }

    public function create()
    {
        if (auth()->guest()) {
            return redirect('/login');
        }
        if (auth()->user()->is_admin == 0) {
            abort(404);
        }
        $status = RoomStatus::get();
        $type = Type::get();
        // dd($type);
        return view('dashboard.room.create', compact('type', 'status'));
    }
    public function post(Request $request)
    {
        // dd($request);
        $request->validate([
            'no' => 'required',
            'type_id' => 'required',
            'capacity' => 'required',
            'price' => 'required',
            'status_id' => 'required',
            'info' => 'required'
            // 'image' => 'nullable|image|file|max:3072'
        ]);

        // if($request->file('image')){
        //     $image = $validatedData['image'] = $request->file('image')->store('product-images');
        // }

        Room::create([
            'no' => $request->no,
            'type_id' => $request->type_id,
            'capacity' => $request->capacity,
            'price' => $request->price,
            'status_id' => $request->status_id,
            'info' => $request->info
            // 'image' => $image
        ]);

        Alert::success('Success', 'Data successfully added');
        return redirect('/dashboard/data/room');
    }

    public function delete($id)
    {
        // dd($id);
        $p = Room::FindOrFail($id);
        $p->delete($p);
        Alert::success('Success', 'Data deleted successfully');
        return back();
    }

    public function edit($id)
    {
        if (auth()->guest()) {
            return redirect('/login');
        }
        if (auth()->user()->is_admin == 0) {
            abort(404);
        }
        $status = RoomStatus::get();
        $type = Type::get();
        $p = Room::findOrFail($id);
        // dd($p);
        return view('dashboard.room.edit', compact('status', 'type', 'p'));
    }

    public function update(Request $request, $id)
    {
        $p = Room::findOrFail($id);
        $p->update($request->all());
        Alert::success('Success', 'Data berhasil diedit');
        return redirect('/dashboard/data/room');
    }

    public function show(Room $room)
    {
        if (auth()->guest()) {
            return redirect('/login');
        }
        if (auth()->user()->is_admin == 0) {
            abort(404);
        }
        $cts = ImageRoom::where('room_id', $room->id)->orderby('id', 'desc')->first();
        return view('dashboard.room.show', compact('room', 'cts'));
    }

    public function addimage(Room $room)
    {
        // $p = $room->images
        if (auth()->guest()) {
            return redirect('/login');
        }
        if (auth()->user()->is_admin == 0) {
            abort(404);
        }
        $cts = ImageRoom::where('room_id', $room->id)->orderby('id', 'desc')->get();
        return view('dashboard.room.image', compact('room', 'cts'));
    }

    public function storeimage(Request $request)
    {
        $validatedData = $request->validate([
            'room_id' => 'required',
            'image' => 'required|image|file',
        ]);
        if ($request->file('image')) {
            $image = $validatedData['image'] = $request->file('image')->store('room-images', 'public');
        }
        // dd($validatedData);
        ImageRoom::create([
            'room_id' => $request->room_id,
            'image' => $image
        ]);
        Alert::success('Success', 'Photo Added');
        return back();
    }

    public function deleteimage($id)
    {
        $image = ImageRoom::findOrFail($id);
        $path  = storage_path() . "/app/public/" . $image->image;
        //    dd($path);
        if (File::exists($path)) {
            //File::delete($image_path);
            unlink($path);
        }
        $image->delete();
        Alert::success('Success', 'Success image successfully deleted');
        return back();
    }



    public function roomshow(Request $request, $no)
    {
        $room = Room::where('no', $no)->first();
        if (Auth()->user()) {
            $customer = Auth()->user()->customer->id;
        } else {
            $customer = null;
        }
        if ($no == null) {
            return back();
        }

        return view('frontend.room', compact('room', 'customer', 'request'));
    }
    public function roomshowpost(Request $request)
    {
        // dd($request->all());
        $checkin = Carbon::parse($request->from);
        $checkout = Carbon::parse($request->to);
        if ($request->customer) {
            $customer = Auth()->user()->customer->id;
        } else {
            $customer = null;
        }
        if ($request->no == null) {
            return back();
        }
        $room = Room::where('no', $request->no)->first();
        return view('frontend.room', compact('room', 'customer', 'request'));
    }
}
