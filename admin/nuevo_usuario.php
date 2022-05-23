<?php
require_once("conexion.php");
require("nav.php");
$sql =  mysqli_query($con,"SELECT * FROM `usuario`");
$sql_area =  mysqli_query($con,"SELECT * FROM `area` ORDER BY nombre_area");


?>
<!-- partial -->
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Agregar Area </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Nuevo Ususario</h4>
                    <form class="forms-sample" method="POST" action="classes/add_usuario.php">
                        <div class="form-group">
                            <label for="exampleInputName1">Nombre </label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Password </label>
                            <input type="password" class="form-control" id="pass" name="pass" placeholder="nombre">
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectGender"> Area por Asignar</label>
                            <select  class="js-example-basic-single" style="width:100%" id="area" name="area">
                              <option value = "jefe">admin </option>
                                <?php while ($date = mysqli_fetch_assoc($sql_area)){ ?>
                                <option value = "<?php echo $date['nombre_area']; ?>"><?php echo $date['nombre_area']; ?> </option>
                                <?php }?>
                            </select>
                        </div>
                      <button type="submit" class="btn btn-primary mr-2">Agregar</button>
                      <button type="button" class="btn btn-dark" onclick="borrar()">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="page-header">
              <h3 class="page-title"> Areas Existentes</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                </ol>
              </nav>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <br>
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>  
                            <th>NOMBRE</th>
                            <th> CONTRASEÑA </th>
                            <th> AREA </th>
                            <th> ACCIONES </th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php while ($data = mysqli_fetch_assoc($sql)){?>
                          <tr>
                            <td> <?php echo $data['usuario']; ?> </td>
                            <td> <?php echo $data['pass']; ?> </td> 
                            <td> <?php echo $data['area']; ?> </td> 
                            <td> 
                            <button type="button" data-target="#modal-edit_<?php echo $data['id_usuario']; ?>" data-toggle="modal" class="btn btn-outline-secondary btn-icon-text"> Editar <i class="mdi mdi-file-check btn-icon-append"></i></button> 
                            <button type="button" data-target="#modal-eliminar_<?php echo $data['id_usuario']; ?>" data-toggle="modal" class="btn btn-outline-danger btn-icon-text"><i class="mdi mdi-delete-forever btn-icon-prepend"></i> Eliminar </button>
                            </td>

                          </tr>
                          <?php 
                          require("modales/editar_usuario.php");
                          require("modales/eliminar_usuario.php"); 
                          }?>
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

          </div>
<script type="text/javascript">

function borrar() {
  $("#nombre").val('');   
}

</script>
<?php
require("footer.php");
?>