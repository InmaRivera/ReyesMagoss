<?php
require_once('conexion.php');

if(!empty($_GET['id']))
{
    //conectamos a la base de datos
    $conexion = new conexion();
    $conexion->delete($_GET['id']);
    header('Location:ninos.php?msg=borrado');
}
else
{
    header('Location:ninos.php');
}
?>