@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<center>
    <h1>Reporte de Ordenes</h1>
</center>
@stop

@section('content')
<div class="cotainer">
    <div class="card-header">
    </div>

    <div class="card">
        <div class="card-header">
            <center>
                <h6>
                    <b> Seleccione Rango de Fecha de Registros a Cunsultar</b>
                </h6>
            </center>
        </div>
        <form action="{{ route('reporte') }}" method="GET" target="_blank">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Fecha Inicio:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" name="fechaInicio" class="form-control" data-inputmask-alias="datetime"
                            data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                    </div>
                    <!-- /.input group -->
                </div>
                <div class="form-group">
                    <label>Fehca Final</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input name="fechaFinal" type="date" class="form-control" data-inputmask-alias="datetime"
                            data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                    </div>
                    <!-- /.input group -->
                </div>
            </div>
            <div class="card-footer">
               <center><button type="submit" class="btn btn-primary">Imprimir</button></center> 
            </div>
        </form>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!'); 
</script>
@stop