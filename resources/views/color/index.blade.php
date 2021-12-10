@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Colores</h1>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="dash">Principal</a></li>
                    <li class="breadcrumb-item active">Configuracion</li>
                    <li class="breadcrumb-item active">Equipos</li>
                    <li class="breadcrumb-item active">Colores</li>
                </ol>
            </div>
            <div class="col-sm-6">
                <button type="button" class="btn btn-primary float-right btn-sm mr-1" data-toggle="modal"
                    data-target="#modalcrearcolor">
                    Nuevo Equipo
                </button>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
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
    <!-- /.card-header -->
    <div class="card-body">
        <table id="color" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($colores as $color)
                <tr>
                    <th>{{ $color->id }}</th>
                    <th>{{ $color->nombre}}</th>
                    <th>
                        <button class="btn btn-default text-primary mx-1" href="" data-toggle="modal"
                            data-target="#modaleditarcolor{{ $color->id }}"> <i class="fa fa-lg fa-fw fa-pen"></i>
                        </button>
                        @include('color.modal.update')
                        <form action="{{ route('color.destroy', $color->id) }}" method="post"
                            style="display: inline-block" class="formEliminar">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-default text-danger mx-1 shadow" title="Delete"> <i
                                    class="fa fa-lg fa-fw fa-trash"></i>
                            </button>
                        </form>
                    </th>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>

<div class="modal fade" id="modalcrearcolor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="/color" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrar Color</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Color</label>
                                <input type="text" class="form-control" name="nombrecolor"
                                    placeholder="Introducir Nombre" tabindex="1">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right btn-sm mr-1" tabindex="5">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
<script>
    $(document).ready(function() {
        $('#color').DataTable({
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