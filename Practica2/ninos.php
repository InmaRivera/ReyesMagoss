<?php
require_once('conexion.php');
$conexion = new conexion();
?>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #000;
  text-align: left;
  padding: 8px;
}
h1{
    text-align: center;
}
td{
    background-color:#dddddd;
}
th{
    background-color:#FFECE8;
}
</style>
<!DOCTYPE html>
<html>
    <head>
    <link href="./estilosCSS.css" rel="stylesheet" type="text/css">    
        <meta charset="utf-8">
        <title>Niños</title>
</head> 
<body>
    <h1>Listado de Niños<h1>
        <!-- <a href="crear.php">Crear juguetes</a>
        <br>
        <a href="editar.php">Editar juguetes</a>
        <br>
        <a href="borrar.php">Borrar juguetes</a>
        <br> -->
        <table border="1">
           <caption>Listado de juguetes</caption>
         <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>  
                <th>Apellidos</th>
                <th>fechaNacimiento</th>
                <th>Bueno</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            //llamamos a la base de datos para mostrar
            $filas = $conexion->selectAll();
            while ($fila=$filas->fetch_assoc())
            {
        ?>
            <tr>
                <td><?php echo $fila['idNInio'];?></td>
                <td><?php echo $fila['nombreNinio'];?></td>
                <td><?php echo $fila['apellidosNinio'];?></td>
                <td><?php echo $fila['fechaNacimiento'];?></td>
                <td><?php echo $fila['bueno'];?></td>
                <!-- <td><a type= "button" href="anadir.php?id=<?php echo $fila['idNInio'];?>">Añadir Niño</a></td> -->
                <td><a href="modificar.php?id=<?php echo $fila['idNInio'];?>">Modificar</a></td>
                <td><a href="borrar.php?id=<?php echo $fila['idNInio'];?>">Borrar</a></td>
        <?php
            }
            ?>
</tbody>
    </table>
    <br>
    <a href="anadir.php"><button type= "button">Añadir Niño</button>
    <br>
    <br>
    <a href="index.php"><button type="button">Volver al Inicio</button>
</body>
</html>