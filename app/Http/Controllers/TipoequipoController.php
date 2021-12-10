<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;

class TipoequipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoequipos = Equipo::all();
        return view('tipoequipo.index')->with('tipoequipos',$tipoequipos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipoequipo.modal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipoequipo = new Equipo();
        $tipoequipo->nombre=$request->get('nombreequipo');
        $tipoequipo->save();
        return redirect('/tipoequipo')->with('success','Equipo Creado Correctamente'); 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoequipo = Equipo::find($id);
        return view('tipoequipo.modal.update')->with('tipoequipo',$tipoequipo);
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
        $tipoequipo = Equipo::find($id);
        $tipoequipo->nombre=$request->get('nombreequipo');
        $tipoequipo->save();
        return redirect('/tipoequipo')->with('success','Equipo Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try { 
            $tipoequipo = Equipo::findOrFail($id);
            $tipoequipo->delete();
            return redirect()->route('tipoequipo.index')->with('success', 'Registro Eliminado Correctamente');
          } catch(\Illuminate\Database\QueryException $ex){ 
            return redirect()->route('tipoequipo.index')->with('danger', 'No se pueden eliminar datos con registros activos');
          };
    }
}
