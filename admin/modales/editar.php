<!--Modal editar-->
<div id="modal-edit_<?php echo $data['id_pendientes']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-delete-label" aria-hidden="true" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 id="modal-login-label" class="modal-title">EDITAR</h1>
                    </div>
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <form class="forms-sample" action= "classes/update.php" method = "POST">
                                    <div class="form-group">
                                        <input hidden type="text" id="id_editar" name="id_editar" value = "<?php echo $data['id_pendientes']; ?>" />
                                        <label for="titulo_editar">TITULO</label>
                                        <input type="text" class="form-control" id="titulo_editar" name="titulo_editar" value = "<?php echo $data['titulo']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion_editar">DESCRIPCION</label>
                                        <textarea class="form-control" id="descripcion_editar" name="descripcion_editar" rows="10"><?php echo $data['descripcion']; ?></textarea>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-inverse-primary btn-fw" >Editar</button>
                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="btn btn-inverse-danger btn-fw">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--cerro editar-->

