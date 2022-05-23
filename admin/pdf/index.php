<?php
include "../Conexion.php";
if(isset ($_GET['id'])){
  $aa = $_GET['id'];
  if($aa == "todos" || $aa == "nada"  ){
    $sql_select =  mysqli_query($con,"SELECT `id_pendientes`, `status`, `titulo`, `descripcion`, `area`, `fecha` FROM `pendientes` AND `razon` IS NULL ");
    $aa = "TODOS!!!!!!";
  }else{
  $sql_select =  mysqli_query($con,"SELECT `id_pendientes`, `status`, `titulo`, `descripcion`, `area`, `fecha` FROM `pendientes` WHERE `area` = '$aa' AND `razon` IS NULL");
  }
}else{
  $sql_select =  mysqli_query($con,"SELECT `id_pendientes`, `status`, `titulo`, `descripcion`, `area`, `fecha` FROM `pendientes` AND `razon` IS NULL");
  $aa = "TODOS!!!!!!";
}
date_default_timezone_set('America/Mexico_City');
$hoy = date("Y-m-d H:i:s");
?>
<!DOCTYPE html>
<html>
<head>

<title>Pendientes de <?php echo $aa; ?></title>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="jspdf/dist/jspdf.min.js"></script>
<script src="js/jspdf.plugin.autotable.min.js"></script>
<meta charset="utf-8">
</head>
<body onload="pdf()"> 
</body>
<script>

function pdf(){
  var pdf = new jsPDF();
  pdf.text(20,20,"PENDIENTES DE <?php echo $aa; ?> con fecha de <?php echo $hoy; ?>");

  var columns = ["area", "titulo", "descripcion", "fecha"];
  var data = [
    <?php while ($data = mysqli_fetch_assoc($sql_select)){  ?>
  ["<?php echo $data['area']; ?>", "<?php echo $data['titulo']; ?>", "<?php echo $data['descripcion']; ?>", "<?php echo date("d-m-Y", strtotime($data['fecha']));  ?>"],
  <?php }?> 
  ];

  pdf.autoTable(columns,data,
    { margin:{ top: 25  }}
  );

  pdf.save('MiTabla.pdf');

}
</script>

</body>
</html>