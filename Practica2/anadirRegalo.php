<?php
require_once('conexion.php');


if(isset($_POST['juguete']))
{
    //declaramos las variables
    $datosRegalo=[];
    $datosRegalo['nombreJuguete']=$_POST['juguete'];
    $datosRegalo['precioJuguete']=$_POST['precio'];
    $datosRegalo['idReyFK']=$_POST['reymago'];
   
    //llamamos a la clase
    $conexion = new conexion();

    //insertamos el juguete indicado
    $id= $conexion->insertReg($datosRegalo);
    if($id==0)
    {
        //Indicamos que algo no ha funcionado
        echo "No se ha registrado el regalo <br>";
    }
    else
    {
        //volvemos al inicio
        header('Location:regalos.php');
    }
}


?>
<!DOCTYPE html>
<html>
    <head>
        <title> Regalos </title>
        <meta charset="utf-8">
</head> 
<body>
    <h1>Añadir Regalos<h1>
            <form action="anadirRegalo.php" method="post">
            <label for="juguete">Juguete</label>
            <input type="text" class="form-control" name="juguete" id="juguete" required> 
            <br>
            <label for="precio">Precio</label>
            <input type="text" class="form-control" name="precio" placeholder="0.00" id="precio" required>
            <br>
            <label for="reymago">Rey Mago</label>
            <input type="text" class="form-control" name="reymago" id="reymago" required>
            <br>
          
            <input type="submit" value="Añadir">
    </form>
</body>
</html>