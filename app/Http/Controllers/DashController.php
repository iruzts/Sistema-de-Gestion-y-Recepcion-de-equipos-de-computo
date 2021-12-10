<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ordene;
use Carbon\Carbon;


class DashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   date_default_timezone_set("America/Lima");
        $fecha = Carbon::now();

        $terminados = Ordene::where('estado', 'Reparado')->count();
        $pendientes = Ordene::where('estado', 'Por Reparar')->count();
        $pendientes = Ordene::where('estado', 'Por Reparar')->count();
        $ordenes = Ordene::all();

        return view('dash.index',compact('terminados','pendientes','ordenes',$terminados,$pendientes,$ordenes));
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
        $salida = Reparacion::find($id);
        $recepcion = Recepcion::find($id);
        return view('dash.salida',compact('salida','recepcion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipo = Recepcion::find($id);
        $reparacion = Reparacion::find($id);
        return view('dash.updatediagnostico',compact('equipo',$equipo,'reparacion',$reparacion));
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
        if (isset($_POST["entregar"])) {
            $salida = Reparacion::find($id);
            $recepcion = Recepcion::find($id);
            $salida->estadoReparacion='pagado';
            $salida->save();
            $salida = Recepcion::latest('id')->first();
            return view('dash.salida',compact('salida','recepcion'))->with('success', 'Cliente creado correctamente.');
        }else{
            $reparacion =Reparacion::find($id);
            $reparacion->dignosticoyReparacion=$request->get('detalles');
            $reparacion->costo_repuesto=$request->get('costoRepuesto');
            $reparacion->costo_reparacion=$request->get('costoReparacion');
            $reparacion->garantia=$request->get('garantia');
            $reparacion->detallesrepuesto=$request->get('detallesrepuesto');
            $reparacion->estadoReparacion='Pendiente';
            $reparacion->save();
            return redirect('/dash')->with('success', 'Datos Actualizados Correctamente');
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
        //
    }
}
