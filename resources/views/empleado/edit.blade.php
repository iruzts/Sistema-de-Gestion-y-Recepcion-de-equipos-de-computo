@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Asignar Rol</h1>
@stop

@section('content')
@if (session('info'))
<div class="alert alert-success">
    <strong>{{session('info')}}</strong>

</div>

@endif
<div class="card">
    <div class="card-body">
        <p class="h5">Nombre: </p>
        <p class="form-control">{{$user->name}}</p>

        <p class="h5">Listado de Roles</p>
        {!! Form::model($user, ['route'=> ['empleado.update',$user],'method'=>'put']) !!}
        @foreach ($roles as $role)
        <div>
            <label>
                {!! Form::checkbox('roles[]', $role->id, null, ['class'=>'mr-1']) !!}
                {{$role->name}}
            </label>
        </div>
        @endforeach
        
        <p class="h5">Estado Cuenta</p>
        <div class="col-sm-3">
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radio1" value="Activo"  {{$user->status == 'Activo' ? 'checked' : ''}}>
                    <label class="form-check-label">Activo</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radio1" value="Inactivo" {{$user->status == 'Inactivo' ? 'checked' : ''}}>
                    <label class="form-check-label">Inactivo</label>
                </div>
            </div>
        </div>
<div class="row">
    <div class="col-ms-6">
        {!! Form::submit('Asignar Rol', ['class'=>'btn btn-primary mt-2']) !!}
        {!! Form::close() !!}
    </div>
    <div class="col-ms-6">
        <a href="/empleado" type="button" class="btn btn-secondary mt-2 ml-3" style="margin-right: 5px;">Regresar</a>
    </div>
</div>
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