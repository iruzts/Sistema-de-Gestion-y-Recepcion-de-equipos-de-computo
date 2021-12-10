@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3><i class="fas fa-users"></i>
                    Listas de Clientes</h3>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="dash">Principal</a></li>
                    <li class="breadcrumb-item active">Clientes</li>
                </ol>
            </div>
            <div class="col-sm-6">
                <button type="button" class="btn btn-primary float-right btn-sm mr-1" data-toggle="modal"
                    data-target="#modalcrearclientes">
                    Nuevo Cliente
                </button>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@stop

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @elseif($message = Session::get('danger'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
    <div class="card">
        <div class="card-body">
            <table id="clientes" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Identidad</th>
                        <th>Nombre</th>
                        <th>Direccion</th>
                        <th>Tel/Cel</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                        <tr>
                            <th>{{ $cliente->id }}</th>
                            <td>{{ $cliente->dni }}</td>
                            <td>{{ $cliente->nombre }}</td>
                            <td>{{ $cliente->direccion }}</td>
                            <td>{{ $cliente->telefono }}</td>
                            <td>
                                <button class="btn btn-default text-primary mx-1" href="" data-toggle="modal"
                                    data-target="#modaleditarclientes{{ $cliente->id }}"> <i
                                        class="fa fa-lg fa-fw fa-pen"></i>
                                </button>
                                @include('cliente.update')
                                <form action="{{ route('cliente.destroy', $cliente->id) }}" method="post"
                                    style="display: inline-block" class="formEliminar">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-default text-danger mx-1"> <i
                                            class="fa fa-lg fa-fw fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
<!-- Modal Crear -->
<div class="modal fade" id="modalcrearclientes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="/cliente" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrar Clientes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Identidad</label>
                        <input type="text" class="form-control" id="dni" name="dni" placeholder="Introducir Identidad"
                            tabindex="1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre"
                            placeholder="Introducir Nombre" tabindex="1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Direccion</label>
                        <input type="text" class="form-control" id="direccion" name="direccion"
                            placeholder="Introducir Direccion" tabindex="2">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tel/Cel</label>
                        <input type="number" class="form-control" id="telefono" name="telefono"
                            placeholder="Introducir Celular/Telefono" tabindex="3">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>


@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#clientes').DataTable({
                "language":{
                    "info":"_TOTAL_ registros",
                    "search":"Buscar",
                    "paginate":{
                        "next":"Siguiente",
                        "previous":"Anterior",
                    },
                    "lengthMenu":'Mostrar <select>'+
                        '<option value="5">5</option>'+
                        '<option value="10">10</option>'+
                        '<option value="-1">Todos</option>'+
                        '</select> registros',
                    "loadingRecords": "Cargando...",
                    "processing": "Precesando...",
                    "emptyTable":"No hay datos",
                    "zeroRecords":"No hay coincidencias",
                    "infoEmpty":"",
                    "infoFiltered":""
                },
            });

        });
    </script>
    <script>
        (function() {
            'use strict'
            //debemos crear la clase formEliminar dentro del form del boton borrar
            //recordar que cada registro a eliminar esta contenido en un form  
            var forms = document.querySelectorAll('.formEliminar')
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        event.preventDefault()
                        event.stopPropagation()
                        Swal.fire({
                            title: '¿Confirma la eliminación del registro?',
                            icon: 'info',
                            showCancelButton: true,
                            confirmButtonColor: '#20c997',
                            cancelButtonColor: '#6c757d',
                            confirmButtonText: 'Confirmar'
                        }).then((result) => {
                            if (result.value) {
                                this.submit();
                            }
                        })
                    }, false)
                })
        })()
    </script>
@stop
