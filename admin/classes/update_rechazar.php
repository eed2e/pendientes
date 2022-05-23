<?php
require_once("../conexion.php");

$id = $_POST['id_rechazado'];
$razon = $_POST['razon'];

$sql_select =  mysqli_query($con,"UPDATE `pendientes` SET `razon`= '$razon', `status`= 0 WHERE `id_pendientes` = $id");
var_dump($sql_select);
header("location: ../comprobar_pendientes.php")
?>