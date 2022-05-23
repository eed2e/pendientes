<?php
require_once("conexion.php");
require("nav.php");
 $area = $_SESSION['aa'];
    $sql_select =  mysqli_query($con,"SELECT `id_pendientes`, `status`, `razon`, `titulo`, `descripcion`, `area`, `fecha` FROM `pendientes` WHERE `status` = 0 && `area` = '$area' ORDER BY  `razon` DESC");

?>

        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">    
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

                                <?php if($data['razon'] != NULL){?>
                                <h1 class="page-title"><font color="red">RECHAZADO</p></font> </h1>
                                
                                <h4 class="card-title"><font color="red">AREA:  &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['area']; ?></font></h4>
                                <h4 class="card-title"><font color="red">FECHA:  &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['fecha']; ?></font> </h4>
                                <h3 class="page-title"><font color="red">TITULO:  &nbsp;&nbsp;&nbsp;<?php echo $data['titulo']; ?> </font></h3>
                                <br>
                                <h1 class="page-title"><font color="red">DESCRIPCION: <br><br><p> <?php echo $data['descripcion']; ?></p> </font></h1>
                                
                                <h1 class="page-title"><font color="red"> RAZON:  <br><p> <?php echo $data['razon']; ?></p></font> </h1>
                                <?php }else{ ?>
                                    <h4 class="card-title">AREA:  &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['area']; ?> </h4>
                                <h4 class="card-title">FECHA:  &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['fecha']; ?> </h4>
                                <h3 class="page-title">TITULO:  &nbsp;&nbsp;&nbsp;<?php echo $data['titulo']; ?> </h3>
                                <br>
                                <h1 class="page-title">DESCRIPCION: <br><br><p> <?php echo $data['descripcion']; ?></p> </h1>
                                <?php } ?>
                                <button type="button" data-target="#modal-completado_<?php echo $data['id_pendientes']; ?>" data-toggle="modal" class="btn btn-outline-primary btn-icon-text"><i class="mdi mdi-file-check btn-icon-prepend"></i> Completado </button>
                                <canvas id="lineChart" style="height:50px"></canvas>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
                    require("modales/completado.php");
                }?>               
            </div>
        </div>
<script type="text/javascript">

function imprimir() {
    var aa = "<?php echo $area;?>"
    window.location.href = "pdf/index.php?id="+aa; 
}

</script>  
<?php
require("footer.php");
?>