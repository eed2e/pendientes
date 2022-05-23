<?php
require_once("conexion.php");
require("nav.php");
$sql =  mysqli_query($con,"SELECT * FROM `area`");

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
                    <h4 class="card-title">Nueva Area</h4>
                    <form class="forms-sample" method="POST" action="classes/add_area.php">
                      <div class="form-group">
                        <label for="exampleInputName1">Nombre </label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre">
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
                            <th>id</th>
                            <th> area </th>
                            <th> pendientes </th>
                            <th> acciones </th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php while ($data = mysqli_fetch_assoc($sql)){
                            $are = $data['nombre_area'];
                            $sql_num = mysqli_query($con,"SELECT * FROM `pendientes` WHERE `area` = '$are'");
                            $cant = mysqli_num_rows($sql_num);
                             ?>
                          <tr>
                            <td> <?php echo $data['id_area']; ?> </td>
                            <td> <?php echo $data['nombre_area']; ?> </td> 
                            <td> <?php echo $cant; ?> </td> 
                            <td> <button type="button" data-target="#modal-eliminar_<?php echo $data['id_area']; ?>" data-toggle="modal" class="btn btn-outline-danger btn-icon-text"><i class="mdi mdi-delete-forever btn-icon-prepend"></i> Eliminar </button> </td>


                          </tr>
                          <?php require("modales/eliminar_area.php"); }?>
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