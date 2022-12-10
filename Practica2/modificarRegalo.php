<?php
require_once('conexion.php');
$conexion=new conexion();

if(isset($_GET['id'])){
    if(!empty($_GET['id']))
    {
        //Recogemos los datos del formulario
        $datosRegalo = $conexion->juguete($_GET['id']);

        if($datosRegalo == null)
        {
            header('Location:regalos.php');
        }
        else
        {
?>           

<!DOCTYPE html>
<html>
    <head>
        <title>Editar regalo</title>
        <meta charset="utf-8">
    </head>
    <body>
        <h1>Editar regalo</h1>
        <form action="modificarRegalo.php" method="post">
            <input type="hidden" id="id" name="id" value="<?php echo $_GET['id']; ?>">
            <label>Juguete:</label><input type="text" id="juguete" name="juguete" value="<?php echo $datosRegalo['nombreJuguete']; ?>" required>
            <br>
            <label>Precio:</label><input type="text" id="precio" name="precio" value="<?php echo $datosRegalo['precioJuguete']; ?>" required>
            <br>
            <label>Rey Mago:</label><input type="text" id="reymago" name="reymago" value="<?php echo $datosRegalo['idReyFK']; ?>" required>
            <br>
            <input type="submit" value="Modificar">
        </form>
        <a type="button" href="ninos.php">Volver al listado</a>
    </body>
</html>

<?php
        }
    }
    else
    {
        header('Location:regalos.php');
    }
}
else
{
    if(isset($_POST['juguete']))
    {
        //creamos las variables niños
        $modificacion=[];
        $modificacion['idJuguete']=$_POST['id'];
        $modificacion['nombreJuguete']=$_POST['juguete'];
        $modificacion['precioJuguete']=$_POST['precio'];
        $modificacion['idReyFK']=$_POST['reymago'];
   //Actalizamos llamando a conexion 
        $resultado=$conexion->updateReg($modificacion);

        if($resultado==0)
        {
            //no ha editado
            echo "No se ha editado el regalo.<br>";
        }
        else{
            header('Location:regalos.php');
        }
    }
    else
    {
        header('Location:regalos.php');
    }
}
?>

