<?php
require_once('conexion.php');


if(isset($_POST['nombre']))
{
    //declaramos las variables
    $datosNinio=[];
    $datosNinio['nombreNinio']=$_POST['nombre'];
    $datosNinio['apellidosNinio']=$_POST['apellidos'];
    $datosNinio['fechaNacimiento']=$_POST['fechaNacimiento'];
    $datosNinio['bueno']=$_POST['bueno'];
    //llamamos a la clase
    $conexion = new conexion();

    //insertamos el juguete indicado
    $id= $conexion->insert($datosNinio);
    if($id==0)
    {
        //no se ha insertado
        echo "No se ha insertado el niño <br>";
    }
    else
    {
        //volvemos al inicio
        header('Location:ninos.php');
    }
}


?>
<!DOCTYPE html>
<html>
    <head>
        <title> Niños </title>
        <meta charset="utf-8">
</head> 
<body>
    <h1>Añadir Niño<h1>
            <form action="anadir.php" method="post">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" required> 
            <br>
            <label for="apellidos">Apellidos</label>
            <input type="text" class="form-control" name="apellidos" id="apellidos" required>
            <br>
            <label for="fechaNacimiento">Fecha de Nacimiento</label>
            <!-- <i>año/mes/día</i> -->
            <input type="text" class="form-control" name="fechaNacimiento" id="fechaNacimiento" placeholder="año/mes/día" required>
            <br>
            <label for="bueno">¿Es bueno?</label>
            <input type="text" class="form-control" name="bueno" id="bueno" placeholder="Sí/No" required>
            <br>
            <input type="submit" value="Añadir">
    </form>
</body>
</html>