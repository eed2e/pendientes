<?php
require_once("../conexion.php");

$nombre = $_POST['nombre'];
$pass = $_POST['pass'];
$area = $_POST['area'];


$sql =  mysqli_query($con,"INSERT INTO `usuario`( `usuario`, `pass`, `area`) VALUES ('$nombre','$pass','$area')");

header("location:../nuevo_usuario.php")
?>