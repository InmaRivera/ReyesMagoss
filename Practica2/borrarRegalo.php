<?php
require_once('conexion.php');

if(!empty($_GET['id']))
{
    //conectamos a la base de datos
    $conexion = new conexion();
    $conexion->deleteReg($_GET['id']);
    header('Location:regalos.php?msg=borrado');
}
else
{
    header('Location:regalos.php');
}
?>