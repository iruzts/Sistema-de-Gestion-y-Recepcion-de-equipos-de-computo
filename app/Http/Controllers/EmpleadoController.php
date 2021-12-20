<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use Spatie\Permission\Models\Role;


class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        $empleados=User::all();
        return view('empleado.index',compact('empleados','roles',$empleados,$roles));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try { 
                $name = $request->get('nombre');
                $email = $request->get('email');
                $password = $request->get('password');
                $role = $request->get('role');
                $estado= 'Activo';
                    User::create([
                        'name' =>  $name,
                        'email' => $email,
                        'password' => bcrypt($password),
                        'status' => $estado,
                    ])->assignRole($role);
            return redirect('/empleado')->with('success','Empleado Creado Correctamente'); 
          } catch(\Illuminate\Database\QueryException $ex){ 
            return redirect('/empleado')->with('danger','El correo Electronico Ya existe'); 
          };
        
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  
        $user = User::find($id);
        $roles = Role::all();
        return view('empleado.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->roles()->sync($request->roles);
        $user->status=$request->get('radio1');
        $user->save();

        return redirect()->route('empleado.edit',$user)->with('info', 'se asigno los roles correctamente');
    }
}