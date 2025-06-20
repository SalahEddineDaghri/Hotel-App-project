<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index(){
        if(auth()->guest()){
            return redirect('/login');
        }
        if(auth()->user()->is_admin == 0){
            abort(404);
        }
        $user = User::where('is_admin', 0)->get();
        // dd($user);
        $p = $user->count();
        return view('dashboard.user.index', compact('p','user'));
    }

    public function create(){
        if(auth()->guest()){
            return redirect('/login');
        }
        if(auth()->user()->is_admin == 0){
            abort(404);
        }
        return view('dashboard.user.create');
    }

    public function post(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users|min:3',
            'email' => 'required|unique:users|email',
            'password' => 'required',
            'telp' => 'nullable|numeric',
            'birthdate' => 'nullable',
            'jk' => 'required',
            'job' => 'nullable',
            'address' => 'nullable',
            'image' => 'nullable',
            'is_admin' => 'nullable'
        ]);
        // dd($request);
        if($request->file('image')){
            $image = $validatedData['image'] = $request->file('image')->store('user-images');
        } else{
            $image = null;
        }
        // dd($request->all());
      $cus =  Customer::create([
            'name' => $request->name,
            'address' => $request->address,
            'jk' => $request->jk,
            'job' => $request->job,
            'birthdate' => $request->birthdate,

        ]);
        // dd($cus->id);
        User::create([
            'c_id' => $cus->id,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'telp' => $request->telp,
            'image' => $image,
            'is_admin' => $request->is_admin
        ]);

        Alert::success('Success', 'Data berhasil di buat');
        return redirect('/dashboard/user');
    }
    public function edit(User $user){
        if(auth()->guest()){
            return redirect('/login');
        }
        if(auth()->user()->is_admin == 0){
            abort(404);
        }
        return view('dashboard.user.edit', compact('user'));
    }
    public function update(Request $request){
        // dd($request->all());
        $p = User::findOrFail($request->id);
        $c = Customer::findOrFail($p->Customer->id);
        // dd($c);
        $request->validate([
            'name' => 'nullable',
            'username' => 'nullable',
            'email' => 'nullable',
            'telp' => 'nullable',
            'address' => 'nullable',
            'jk' => 'nullable',
            'job' => 'nullable',
            'birthdate' => 'nullable',
            'card_number' => 'nullable',

        ]);
        $c->update([
            'name' => $request->name,
            'address' => $request->address,
            'jk' => $request->jk,
            'job' => $request->job,
            'birthdate'=>$request->birthdate
        ]);

        $p->update([
            'username' => $request->username,
            'email' => $request->email,
            'telp' => $request->telp,
            'card_number' => $request->card_number,

        ]);

        Alert::success('Success', 'Data successfully edited');
        return redirect('/dashboard/user');
    }
    public function updatefront(Request $request, $id){
        // dd($request->all())
        $p = User::findOrFail($id);
        $c = Customer::findOrFail($p->Customer->id);
        // dd($c);\
        if($request->newpassword){
            // dd($request->all());
            $request->validate(['newpassword' => 'min:3']);
            if($request->confirmation != $request->newpassword){
                Alert::error('Gagal', 'Password Tidak Sama!');
                // dd($request->all());
                return redirect('/myaccount');
                }
                $p->update(['password' => bcrypt($request->newpassword)]);
                // dd($p);
        } else{
        $request->validate([
            'name' => 'nullable',
            'username' => 'nullable',
            'email' => 'nullable',
            'telp' => 'nullable',
            'address' => 'nullable',
            'jk' => 'nullable',
            'job' => 'nullable',
            'birthdate' => 'nullable',
            'card_number' => 'nullable',
            'nik' => 'nullable'
        ]);
        $c->update([
            'name' => $request->name,
            'address' => $request->address,
            'jk' => $request->jk,
            'job' => $request->job,
            'birthdate'=>$request->birthdate,
            'nik' => $request->nik,
        ]);

        $p->update([
            'username' => $request->username,
            'email' => $request->email,
            'telp' => $request->telp,
            'card_number' => $request->card_number,

        ]);
    }
    if($p){

        Alert::success('Success', 'Data successfully edited');
    }
        return redirect('/myaccount');
    }

    public function delete($id){
        $p = User::findORFail($id);
        // dd($p);
        $p->delete();
        Alert::success('Success', 'Data successfully deleted');
        return back();
    }

    public function profile(){
        if(auth()->guest()){
            return redirect('/login');
        }
        $user = Auth()->user();
        // dd($user);
        // dd($user);
        return view('user.profile', compact('user'));
    }

    public function cusedit(){
        if(auth()->guest()){
            return redirect('/login');
        }
        $user = Auth()->user();
        return view('user.edit',compact('user'));
    }
    public function cusfoto(Request $request){
        $validatedData = $request->validate([
            'image' => 'required|image|file',
        ]);
        if($request->file('image')){
            $image = $validatedData['image'] = $request->file('image')->store('user-images', 'public');
        }
        $user = User::findOrFail($request->id);
        $user->update([
            'image' => $image
        ]);
        // dd($image);
        Alert::success('Success', 'Image Successfully Update!');
        return back();
    }
    public function delfoto($id){
        $user = User::findOrFail($id);
        $image = $user->image;
        $path  = storage_path(). "/app/public/" . $image;
        //    dd($path);
           if (File::exists($path)) {
              //File::delete($image_path);
            unlink($path);
        }
        $user->update([
            'image' => null
        ]);
        Alert::success('Success', 'Image Successfully Deleted!');
        return back();
    }
    public function history(){
        if(auth()->guest()){
            return redirect('/login');
        }
        $id = Auth()->user()->Customer->id;
        $user = Auth()->user();
        $not = [1];
        $his = Payment::where('c_id', $id)->orderby('id', 'desc')->wherenotin('payment_method_id', $not)->paginate(10);
        return view('user.history', compact('his', 'user'));
    }
}
