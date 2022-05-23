<!--Modal editar-->
<?php
$sql_aa =  mysqli_query($con,"SELECT * FROM `area` ORDER BY nombre_area");
?>
<div id="modal-edit_<?php echo $data['id_usuario']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-delete-label" aria-hidden="true" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 id="modal-login-label" class="modal-title">EDITAR</h1>
                    </div>
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <form class="forms-sample" action= "classes/update_usuario.php" method = "POST">
                                    <div class="form-group">
                                        <input hidden type="text" id="id_editar" name="id_editar" value = "<?php echo $data['id_usuario']; ?>" />
                                        <label for="titulo_editar">NOMBRE</label>
                                        <input type="text" class="form-control" id="pass_editar" name="usuario_editar" value = "<?php echo $data['usuario']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion_editar">PASSWORD</label>
                                        <input type="text" class="form-control" id="pass_editar" name="pass_editar" value = "<?php echo $data['pass']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion_editar">AREA</label>
                                        <select  class="js-example-basic-single" style="width:100%" id="area_editar" name="area_editar">
                                            <option value = "<?php echo $data['area']; ?>"><?php echo $data['area']; ?> </option>
                                            <?php while ($data1 = mysqli_fetch_assoc($sql_aa)){ ?>
                                                <option value = "<?php echo $data1['nombre_area']; ?>"><?php echo $data1['nombre_area']; ?> </option>
                                            <?php }?>
                                        </select>
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

