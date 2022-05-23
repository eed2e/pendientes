<?php
require_once("../conexion.php");

$id = $_POST['id_editar'];
$titulo = $_POST['titulo_editar'];
$descripcion = $_POST['descripcion_editar'];

$sql_select =  mysqli_query($con,"UPDATE `pendientes` SET `titulo`= '$titulo', `descripcion`= '$descripcion' WHERE `id_pendientes` = $id");

header("location: ../ver_pendientes.php")
?>