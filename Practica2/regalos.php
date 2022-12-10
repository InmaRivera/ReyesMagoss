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
    background-color:#E0FBFA;
}
</style>
 
<!DOCTYPE html>
<html>
    <head>´
    <meta charset="utf-8">
    <link href="./estilosCSS.css" rel="stylesheet" type="text/css">

        <title>Regalos</title>
</head> 
<body>
    <h1>Listado de regalos<h1>
        <table border="1">
         
         <thead>
            <tr>
                <th>Id</th>
                <th>Nombre juguetes</th>  
                <th>precio</th>
                <th>Rey Mago</th>
                <!-- <th>Bueno</th> -->
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            //llamamos a la base de datos para mostrar
            $filas = $conexion->juguetes();
            while ($fila=$filas->fetch_assoc())
            {
        ?>
            <tr>
                <td><?php echo $fila['idJuguete'];?></td>
                <td><?php echo $fila['nombreJuguete'];?></td>
                <td><?php echo $fila['precioJuguete'];?></td>
                <td><?php echo $fila['idReyFK'];?></td>
   <!-- Añadimos los botones de modificación y borrar al lado de cada elemento -->
                <td><a href="modificarRegalo.php?id=<?php echo $fila['idJuguete'];?>">Modificar</a></td>
                <td><a href="borrarRegalo.php?id=<?php echo $fila['idJuguete'];?>">Borrar</a></td>
        <?php
            }
            ?>
</tbody>
    </table>
    <br>
    <!-- Botón para añadir juguete -->
    <a href="anadirRegalo.php"><button type= "button">Añadir juguete</button>
    <br>
    <br>
    <a href="index.php"><button type="button">Volver al Inicio</button>
</body>
</html>
