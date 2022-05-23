<!--Modal eliminar-->
<div id="modal-rechazar_<?php echo $data['id_pendientes']; ?>"  tabindex="-1" role="dialog" aria-labelledby="modal-delete-label" aria-hidden="true" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 id="modal-login-label" class="modal-title">RECHAZAR ESTA TAREA</h3>
                    </div>
                    <form class="forms-sample" action= "classes/update_rechazar.php" method = "POST">
                    <div class="form-group">
                        <label  class="control-label col-md-3"></label>
                        <div class="col-md-9">
                            <label for="exampleTextarea1">RAZON</label>
                            <textarea class="form-control" id="razon" name="razon" rows="5"></textarea>
                            <input  hidden id="id_completado" name="id_rechazado" type="text" class="form-control" value = "<?php echo $data['id_pendientes']; ?>"/>

                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form">
                            <div class="form-group">
                                <div class="col-md-9 col-md-offset-3">
                                    <button id = "aceptar" name = "aceptar" type = "submit" class="btn btn-inverse-primary btn-fw">Aceptar </button>
                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="btn btn-inverse-danger btn-fw">cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
<!--cerro eliminar-->