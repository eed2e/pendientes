<!--Modal eliminar-->
<div id="modal-eliminar_listo_<?php echo $data['id_pendientes']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-delete-label" aria-hidden="true" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 id="modal-login-label" class="modal-title">DESEA ELIMINAR ESTA TAREA</h3>
                    </div>
                    <form class="forms-sample" action= "classes/delete.php" method = "POST">
                    <div class="form-group">
                        <label  class="control-label col-md-3"></label>
                        <div class="col-md-9">
                            <label ><?php echo $data['titulo']; ?></label>
                            <input  hidden id="id_eliminar" name="id_eliminar" type="text" class="form-control" value = "<?php echo $data['id_pendientes']; ?>"/>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form">
                            <div class="form-group">
                                <div class="col-md-9 col-md-offset-3">
                                    <button id = "eliminar" name = "eliminar" type = "submit" class="btn btn-inverse-primary btn-fw">Eliminar </button>
                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="btn btn-inverse-danger btn-fw">cancelar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
<!--cerro eliminar-->