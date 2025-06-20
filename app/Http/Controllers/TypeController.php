<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class TypeController extends Controller
{

    public function index(){
        // dd($p);
        if(auth()->guest()){
            return redirect('/login');
        }
        if(auth()->user()->is_admin == 0){
            abort(404);
        }
        $type = Type::orderBy('id', 'desc')->get();
        $p = $type->count();
        // dd($type);
        return view('dashboard.type.index', compact('p','type'));
    }

    public function create(){
                if(auth()->guest()){
            return redirect('/login');
        }
        if(auth()->user()->is_admin == 0){
            abort(404);
        }
        $p = Type::count();
        return view('dashboard.type.create', compact('p'));
    }

    public function post(Request $request){
        $request->validate([
            'name' => 'required',
            // 'code' => 'required',
            'info' => 'required'
        ]);

        Type::create([
            'name' => $request->name,
            // 'code' => $request->code,
            'info' => $request->info
        ]);

        Alert::success('Success', 'Data successfully added');
        return redirect('/dashboard/data/type');
    }

    public function edit($id){
                if(auth()->guest()){
            return redirect('/login');
        }
        if(auth()->user()->is_admin == 0){
            abort(404);
        }
        $type = Type::findOrFail($id);
        return view('dashboard.type.edit', compact('type'));
    }

    public function update(Request $request, $id){
        $p = Type::findOrFail($id);
        $p->update($request->all());
        Alert::success('Success', 'Data successfully edited');
        return redirect('/dashboard/data/type');
    }

    public function delete(Request $request){
        // $p = Type::findOrFail($request->id);
        $p = Type::where('id', $request->id)->first();
        // dd($request->id);
        $p->delete();
        Alert::success('Success', 'Data deleted successfully');
        return back();
    }
}
