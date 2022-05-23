<?php
require_once("../conexion.php");

$id = $_POST['id_editar'];
$usuario = $_POST['usuario_editar'];
$pass = $_POST['pass_editar'];
$area = $_POST['area_editar'];

$sql_select =  mysqli_query($con,"UPDATE `usuario` SET`usuario`='$usuario',`pass`= '$pass',`area`='$area' WHERE `id_usuario` = $id");

header("location: ../nuevo_usuario.php")
?>