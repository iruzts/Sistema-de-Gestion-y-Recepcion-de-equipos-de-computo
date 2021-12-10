@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="register-box">
    <div class="card card-outline card-primary">
      <div class="card-body">
        <p class="login-box-msg">Registrar Nuevo Usuario</p>
  
        <form action="../../index.html" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Nombre">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Correo Electronico">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Contraseña">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
              <select name="" id="" class="form-control" placeholder="Seleccionar Perifil">
                  @foreach ($roles as $role)
                  <option value="{{$role->id}}">{{$role->name}}</option>
                  @endforeach
              </select>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Registrar</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop