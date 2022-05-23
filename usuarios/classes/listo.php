<?php
require_once("../conexion.php");

$id = $_POST['id_completado'];
$sql_select =  mysqli_query($con,"UPDATE `pendientes` SET `status`='2' WHERE `id_pendientes` = $id ");

header("location: ../index.php")


?>