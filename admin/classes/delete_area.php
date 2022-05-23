<?php
require_once("../conexion.php");

$id = $_POST['id_eliminar'];
$sql_select =  mysqli_query($con,"DELETE FROM `area` WHERE `id_area` = $id");

header("location: ../nueva_area.php")
?>