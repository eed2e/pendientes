<?php
require_once("../conexion.php");

$nombre = $_POST['nombre'];

$sql =  mysqli_query($con,"INSERT INTO `area`(`nombre_area`) VALUES ('$nombre')");

header("location:../nueva_area.php")
?>