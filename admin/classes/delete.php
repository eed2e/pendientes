<?php
require_once("../conexion.php");

$id = $_POST['id_eliminar'];
$sql_select =  mysqli_query($con,"DELETE FROM `pendientes` WHERE `id_pendientes` = $id ");

header("location: ../ver_pendientes.php")
?>