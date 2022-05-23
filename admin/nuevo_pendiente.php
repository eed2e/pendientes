<!DOCTYPE html>
<?php
require_once("conexion.php");
require("nav.php");
$sql =  mysqli_query($con,"SELECT * FROM `area` ORDER BY nombre_area");
?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Agregar Pediente </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Nuevo Pendiente</h4>
                    <form class="forms-sample"  method="POST" action="classes/add_pendiente.php">
                      <div class="form-group">
                        <label for="exampleSelectGender">Seleccione Area</label>
                        <select  class="js-example-basic-single" style="width:100%" id="area" name="area">
                          <?php while ($date = mysqli_fetch_assoc($sql)){ ?>
                            <option value = "<?php echo $date['nombre_area']; ?>"><?php echo $date['nombre_area']; ?> </option>
                          <?php }?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Titulo del Pendiente</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo">
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="10"></textarea>
                      </div>
                      <button type="button" onclick="agregar()" class="btn btn-primary mr-2">Submit</button>
                      <button type="button" onclick="borrar()" class="btn btn-dark">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
<script type="text/javascript">

function borrar() {
  $("#titulo").val('');   
  $("#descripcion").val('');   
}

function agregar(){    
        $.ajax({
        url: "classes/add_pendiente.php",
        type: 'POST',
        data: {
            'area' : $("#area").val(),
            'titulo' : $("#titulo").val(),
            'descripcion' : $("#descripcion").val()
            
        }
    }).done(function(data) {
          console.log(data);
            $("#titulo").val('');   
            $("#descripcion").val('');  
          
    });
}
</script>         
<?php
require("footer.php");
?>
          