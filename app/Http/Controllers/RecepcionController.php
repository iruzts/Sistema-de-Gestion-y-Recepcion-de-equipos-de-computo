<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Recepcion;
use App\Models\Equipo;
use App\Models\Color;
use App\Models\Marca;
use App\Models\EstadoEquipo;
use App\Models\Detalle_Reparacion;
use Carbon\Carbon;
use PDF;

class RecepcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recepcions=Recepcion::all();
        return view('recepcion.index')->with('recepcions',$recepcions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        $equipos = Equipo::all();
        $colores = Color::all();
        $marcas = Marca::all();
        return view('recepcion.create',compact('clientes','equipos','colores','marcas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (isset($_POST["submit1"])) {
            $clientes = new Cliente();
            $clientes->dni =$request->get('dni');
            $clientes->nombre =$request->get('nombre');
            $clientes->direccion =$request->get('direccion');
            $clientes->telefono =$request->get('telefono');
            $clientes->save();
            return redirect('/recepcion/create');
        }else{
            date_default_timezone_set("America/Lima");
            $fechaI = Carbon::now();
            $recepcion = new Recepcion();
            $recepcion->cliente_id=$request->get('Ncliente');
            $recepcion->equipos_id=$request->get('TipoEquipo');
            $recepcion->marca_id=$request->get('Marca');
            $recepcion->color_id=$request->get('Color');
            $recepcion->fechaI=$fechaI;
            $recepcion->fechaPE=$request->get('fecha');
            $recepcion->estado='Revision';
            if (empty($_POST['abono'])) {$recepcion->abono='00';}
            else{$recepcion->abono=$request->get('abono');}

            if (empty($_POST['Modelo'])) {$recepcion->modelo='Sin Modelo';}
            else{$recepcion->modelo=$request->get('Modelo');}
        
            if (empty($_POST['Serie'])) {$recepcion->serie='Sin Serie';}
            else{ $recepcion->serie=$request->get('Serie');}
        
            if (empty($_POST['password'])) {$recepcion->claveequipo='Sin Contraseña'; }
            else{ $recepcion->claveequipo=$request->get('password');}
        
            if (empty($_POST['observacion'])) { $Equrecepcionipo->observacion='Sin observacion'; }
            else{$recepcion->observacion=$request->get('observacion');}

            $recepcion->problema=$request->get('problema');

            $recepcion->save();

            $recepcion = Recepcion::latest('id')->first();
            return view('recepcion.show',compact('recepcion'))->with('success', 'Cliente creado correctamente.');
    
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
        $recepcion = Recepcion::find($id);
        return view('recepcion.show',compact('recepcion'));
    }
    public function pdf($id){
        $recepcion = Recepcion::find($id);
        return view('recepcion.pdf',compact('recepcion'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recepcion = Recepcion::find($id);
        $clientes = Cliente::all();
        $equipos = Equipo::all();
        $colores = Color::all();
        $marcas = Marca::all();
        return view('recepcion.edit',compact('recepcion','clientes','equipos','colores','marcas'));
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
        $recepcion = Recepcion::find($id);
        $recepcion->fechaPE=$request->get('fecha');
        $recepcion->abono=$request->get('abono');
        $recepcion->modelo=$request->get('Modelo');
        $recepcion->serie=$request->get('Serie');
        $recepcion->claveequipo=$request->get('clave');
        $recepcion->observacion=$request->get('observacion');
        $recepcion->problema=$request->get('problema');
        $recepcion->cliente_id=$request->get('Ncliente');
        $recepcion->equipos_id=$request->get('TipoEquipo');
        $recepcion->marca_id=$request->get('Marca');
        $recepcion->color_id=$request->get('Color');
        $recepcion->save();
        return redirect('/recepcion')->with('success', 'Datos Actualizados Correctamente');
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
