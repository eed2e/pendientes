<?php
require_once("../conexion.php");
date_default_timezone_set('America/Mexico_City');
$area = $_POST['area'];
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$hoy = date("Y-m-d H:i:s");

$sql_insert =  mysqli_query($con,"INSERT INTO `pendientes`(`titulo`, `descripcion`, `area`, `fecha`, `status`) VALUES ('$titulo','$descripcion','$area','$hoy',0)");
echo "Completado";
//header("location:../nuevo_pendiente.php")
?>