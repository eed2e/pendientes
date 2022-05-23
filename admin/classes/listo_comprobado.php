<?php
require_once("../conexion.php");

$id = $_POST['id_completado'];
$sql_select =  mysqli_query($con,"UPDATE `pendientes` SET `status`='1' WHERE `id_pendientes` = $id ");

header("location: ../comprobar_pendientes.php")


?>