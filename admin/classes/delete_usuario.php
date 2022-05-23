<?php
require_once("../conexion.php");

$id = $_POST['id_eliminar'];
$sql_select =  mysqli_query($con,"DELETE FROM `usuario` WHERE `id_usuario` = $id");

header("location: ../nuevo_usuario.php")
?>