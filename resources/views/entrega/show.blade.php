@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Ficha Salida de Taller</h1>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="dash">Principal</a></li>
                <li class="breadcrumb-item active"><a>Taller</a></li>
                <li class="breadcrumb-item active"><a>Ordenes</a></li>
            </ol>
        </div>
        <div class="col-sm-6">
            <div class="row no-print">
                <div class="col-12">
                    <a href="/dash/{{$recepcion->id}}/edit" class="btn btn-primary float-right" style="margin-right: 5px;"
                        tabindex="4">Editar</a>
                    <a href="/recepcion/pdf/{{$recepcion->id}}" rel="noopener" target="_blank" class="btn btn-default float-right" style="margin-right: 5px;"><i
                        class="fas fa-print"></i> Imprimir</a>
                        <a href="/recepcion" type="button" class="btn btn-secondary float-right" style="margin-right: 5px;">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div><!-- /.container-fluid -->
@stop

@section('content')
<!-- Main content -->
<div class="invoice p-3 mb-3">
    <!-- title row -->
    <div class="row">
        <div class="col-12">
            <h4>
            </h4>
        </div>
        <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="invoice p-3 mb-3">
        <!-- title row -->
        <p>Estado:
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                Datos del Cliente
                <hr>
                <address>
                    <b>Nombre:</b> {{ $recepcion->clientes->nombre }}</br>
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <br>
                <hr>
                <address>
                    <b>Telefono:</b> {{ $recepcion->clientes->telefono }}</br>
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <br>
                <hr>
                <b>Direccion:</b> {{ $recepcion->clientes->direccion }}
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- Table row -->
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Equipo</th>
                            <th>Descripcion</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> {{ $recepcion->equipos->nombre }}/{{ $recepcion->marcas->nombre }}/{{ $recepcion->colors->nombre}}/{{ $recepcion->modelo }}/{{ $recepcion->serie }} </td>
                            <td>{{$salida->dignosticoyReparacion}}</td>
                            <td>L. {{$salida->costo_repuesto+$salida->costo_reparacion}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- /.row -->
        <!-- this row will not appear when printing -->
    </div>
    <!-- /.row -->

    <div class="row">
        <!-- accepted payments column -->
        <div class="col-6">
        </div>
        <!-- /.col -->
        <div class="col-6">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th style="width:50%">Coto reparacion:</th>
                        <td>L. {{$salida->costo_repuesto}}</td>
                    </tr>
                    <tr>
                        <th style="width:50%">Coto Respuesto:</th>
                        <td>L. {{$salida->costo_reparacion}} </td>
                    </tr>
                    <tr>
                        <th style="width:50%">Abono:</th>
                        <td>L. {{$recepcion->abono}}</td>
                    </tr>
                    <tr>
                        <th>Total:</th>
                        <td>L.{{$salida->costo_repuesto+$salida->costo_reparacion-$recepcion->abono}}</td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- this row will not appear when printing -->
</div>
<!-- /.invoice -->
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!'); 
</script>
@stop