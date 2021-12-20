<!-- Modal editar-->
<div class="modal fade" id="modalestado{{ $orden->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h5 class="modal-title" id="exampleModalLongTitle">Nueva Orden</h5>
                </center>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/ordenes/{{ $orden->id }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><strong>Estado</strong></span>
                                </div>
                                <select id="inputmarca" name="estado" class="form-control">
                                    <option value="Por Reparar">Por Reparar</option>
                                    <option value="Reparado">Reparado</option>
                                    <option value="Cancelado">Cancelado</option>
                                    <option value="Entregado">Entregado</option>
                                </select>
                                <div class="invalid-tooltip">
                                    Por favor selecciona Marca.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for=""> Estado del Pago</label>             
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="radio1" value="Pendiente" {{$orden->estado_pago == 'Pendiente' ? 'checked' : ''}}>
                                    <label class="form-check-label" >Pendiente</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="radio1" value="Pagado" {{$orden->estado_pago == 'Pagado' ? 'checked' : ''}}>
                                    <label class="form-check-label" >Pagado</label>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit1" class="btn btn-primary">Guardar Orden</button>
            </div>
        </form>

        </div>
    </div>
</div>