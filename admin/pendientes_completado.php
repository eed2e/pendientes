<?php
require_once("conexion.php");
require("nav.php");
if(isset ($_GET['id'])){
    $area = $_GET['id'];
    if($area == "todos"){
    $sql_select =  mysqli_query($con,"SELECT `id_pendientes`, `status`, `titulo`, `descripcion`, `area`, `fecha` FROM `pendientes` WHERE `status` = 1");
    }else{
    $sql_select =  mysqli_query($con,"SELECT `id_pendientes`, `status`, `titulo`, `descripcion`, `area`, `fecha` FROM `pendientes` WHERE `status` = 1 && `area` = '$area'");
    }
}else{
    $area = "nada";
    $sql_select =  mysqli_query($con,"SELECT `id_pendientes`, `status`, `titulo`, `descripcion`, `area`, `fecha` FROM `pendientes` WHERE `status` = 1");
}
$sql =  mysqli_query($con,"SELECT * FROM `area` ORDER BY nombre_area");

?>

        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Seleccione el Area </h3>
                <select class="js-example-basic-single" style="width:50%" id="area" name="area" onchange="actualizar(this)">
                    <option >Seleccione una Area....</option>
                    <?php while ($date = mysqli_fetch_assoc($sql)){ ?>
                    <option value = "<?php echo $date['nombre_area']; ?>"><?php echo $date['nombre_area']; ?> </option>
                    <?php }?>
                    <option value = "todos">TODOS!!!</option>
                </select>
              <nav aria-label="breadcrumb">
              </nav>
            </div>
            <div class="row">
                <?php while ($data = mysqli_fetch_assoc($sql_select)){ ?>
                <div class="col-lg-4 grid-margin stretch-card">
                    <div class="card">
                        <form method="POST" action="">
                            <div class="card-body">
                                <input hidden id = "id_p" name = "id_p" type="text" value = "<?php echo $data['id_pendientes']; ?>"> </input>
                                <h4 class="card-title">FECHA:  &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['area']; ?> </h4>
                                <h4 class="card-title">AREA:  &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['fecha']; ?> </h4>

                                <h3 class="page-title">TITULO:  &nbsp;&nbsp;&nbsp;<?php echo $data['titulo']; ?> </h3>
                                <br>
                                <h1 class="page-title">DESCRIPCION: <br><br><p> <?php echo $data['descripcion']; ?></p> </h1>
                                
                                <button type="button" data-target="#modal-reactivar_<?php echo $data['id_pendientes']; ?>" data-toggle="modal" class="btn btn-outline-primary btn-icon-text"><i class="mdi mdi-file-check btn-icon-prepend"></i> Reactivar </button>
                                <button type="button" data-target="#modal-eliminar_listo_<?php echo $data['id_pendientes']; ?>" data-toggle="modal" class="btn btn-outline-danger btn-icon-text"><i class="mdi mdi-delete-forever btn-icon-prepend"></i> Eliminar </button>
                                <canvas id="lineChart" style="height:50px"></canvas>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
                    require("modales/eliminar_listo.php");
                    require("modales/reactivar.php");
                    
                }?>               
            </div>
        </div>
<script type="text/javascript">

function actualizar(area) {
    var id = area.value
    window.location.href = "?id="+id;
    
}

</script>  
<?php
require("footer.php");
?>