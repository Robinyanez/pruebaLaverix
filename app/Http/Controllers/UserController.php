<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Hash;
use Str;
use App\Http\Requests\Admin\StoreRequest;
use App\Http\Requests\Admin\UpdateRequest;
use App\Http\Requests\Admin\UpdatePasswordRequest;

class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {

        try{

            $user = new User;
            $user->name = $request->get('name');
            $user->last_name = $request->get('last_name');
            $user->slug = Str::slug($request->get('name'),'-');
            $user->phone = $request->get('phone');
            $user->address = $request->get('address');
            $user->date_of_birth = $request->get('date_of_birth');
            $user->email = $request->get('email');
            $user->role_id = $request->get('role_id');
            $user->password = Hash::make($request->get('password'));
            /* dd($user); */
            $user->save();

            session()->flash('success', 'Su registro se ingreso correctamente');
            return redirect()->route('admin.index');

        }catch(\Exception $e){

            session()->flash('error', 'Hubo un error al completar el formulario');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::all();
        $user = User::findOrFail($id);
        return view('admin.show',compact('user','role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::all();
        $user = User::findOrFail($id);
        return view('admin.edit',compact('user','role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        try{

            $user = User::findOrFail($id);
            $user->name = $request->get('name');
            $user->last_name = $request->get('last_name');
            $user->slug = Str::slug($request->get('name'),'-');
            $user->phone = $request->get('phone');
            $user->address = $request->get('address');
            $user->date_of_birth = $request->get('date_of_birth');
            $user->email = $request->get('email');
            $user->role_id = $request->get('role_id');
            /* dd($user); */
            $user->save();

            session()->flash('success', 'Su registro se actualizo correctamente');
            return redirect()->route('admin.index');

        }catch(\Exception $e){

            session()->flash('error', 'Hubo un error al completar el formulario');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{

            $user = User::findOrFail($id);
            $user->delete();

            session()->flash('success', 'Su registro se elimino correctamente');
            return redirect()->back();

        }catch(\Exception $e){

            session()->flash('error', 'Hubo un error al completar la acción');
            return redirect()->back()->withInput();
        }
    }

    public function updatePasswordView($id)
    {
        $user = User::findOrFail($id);
        return view('admin.updatePassword',compact('user'));
    }

    public function updatePassword(UpdatePasswordRequest $request, $id)
    {
        try{

            $user = User::findOrFail($id);
            $user->password = Hash::make($request->get('password'));
            /* dd($user); */
            $user->save();

            session()->flash('success', 'Su contraseña se actualizo correctamente');
            return redirect()->route('admin.index');

        }catch(\Exception $e){

            session()->flash('error', 'Hubo un error al completar el formulario');
            return redirect()->back()->withInput();
        }
    }
}
