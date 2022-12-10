<?php
require_once('conexion.php');
$conexion=new conexion();

if(isset($_GET['id'])){
    if(!empty($_GET['id']))
    {
        //Recogemos los datos del formulario
        $datosNinio = $conexion->select($_GET['id']);

        if($datosNinio == null)
        {
            header('Location:ninos.php');
        }
        else
        {
?>           

<!DOCTYPE html>
<html>
    <head>
        <title>Editar Niño</title>
        <meta charset="utf-8">
    </head>
    <body>
        <h1>Editar Niño</h1>
        <form action="modificar.php" method="post">
            <input type="hidden" id="id" name="id" value="<?php echo $_GET['id']; ?>">
            <label>Nombre:</label><input type="text" id="nombre" name="nombre" value="<?php echo $datosNinio['nombreNinio']; ?>" required>
            <br>
            <label>Apellidos:</label><input type="text" id="apellidos" name="apellidos" value="<?php echo $datosNinio['apellidosNinio']; ?>" required>
            <br>
            <label>Fecha de Nacimiento:</label><input type="text" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $datosNinio['fechaNacimiento']; ?>" required>
            <br>
            <label>¿Es Bueno?:</label><input type="text" id="bueno" name="bueno" value="<?php echo $datosNinio['bueno']; ?>" required>
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
        header('Location:ninos.php');
    }
}
else
{
    if(isset($_POST['nombre']))
    {
        //creamos las variables niños
        $modificacion=[];
        $modificacion['idNInio']=$_POST['id'];
        $modificacion['nombreNinio']=$_POST['nombre'];
        $modificacion['apellidosNinio']=$_POST['apellidos'];
        $modificacion['fechaNacimiento']=$_POST['fechaNacimiento'];
        $modificacion['bueno']=$_POST['bueno'];
        $resultado=$conexion->update($modificacion);

        if($resultado==0)
        {
            //no ha editado
            echo "No se ha editado el niño.<br>";
        }
        else{
            header('Location:ninos.php');
        }
    }
    else
    {
        header('Location:ninos.php');
    }
}
?>

