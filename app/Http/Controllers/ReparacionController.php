<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recepcion;
use App\Models\Reparacion;
use App\Models\Tecnico;
use Carbon\Carbon;


class ReparacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       // $reparacion = Recepcion::find($id);
        //return view('recepcion.diagnostico',compact('reparacion',$reparacion));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reparacion = Recepcion::find($id);
        $tecnicos = Tecnico::all();
        return view('recepcion.diagnostico',compact('reparacion','tecnicos',$reparacion,$tecnicos));
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
        $Equipo=Recepcion::find($id);
        $Equipo->estado=$request->get('estado');
        $Equipo->save();

        $fechaE = Carbon::now();
        $reparacion = new reparacion();
        $reparacion->fecha_entrada=$fechaE;
        $reparacion->diagnostico=$request->get('detalles');
        $reparacion->detalles=$request->get('cancelado');
        $reparacion->garantia=$request->get('garantia');
        $reparacion->tecnico_id=$request->get('tecnico');
        $reparacion->repuesto=$request->get('detallesrepuesto');
        $reparacion->costo_repuesto=$request->get('costoRepuesto');
        $reparacion->costo=$request->get('costoReparacion');
        $reparacion->estado_pago='Pendiente';
        $reparacion->recepcion_id=$id;
        $reparacion->save();
        return redirect('/dash')->with('success', 'Reparacion Finalizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
