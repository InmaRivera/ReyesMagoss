<?php
require_once('conexion.php');
$conexion = new conexion();

// buscamos los niños buenos llamando a la función creada 
$filas = $conexion->selectAllGood();
$ninosBuenos = [];
while($fila = $filas->fetch_assoc()){
    $ninosBuenos[$fila['nombreNinio']] = $fila['nombreNinio']; 
};

$totalMelchor=0;
$totalGaspar=0;
$totalBaltasar=0;

?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <link href="./estilosCSS.css" rel="stylesheet" type="text/css" >
        <title>Reyes Magos</title>
   
</head> 
<style>
    h1,p{
        text-align: center;
    }
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
td{
    color:#000;
    background-color:#FFF8F6;
}
th{
    color:#000;
    background-color:#FFECE8;
}
</style>
<body>
    <!-- lista de Melchor  -->
    <h1><strong>Información Reyes Magos</strong><h1>
        <p>Solamente se muestra la información de los niños buenos</p>
        <hr>
        <table>
           <caption>Melchor</caption>
         <thead>
                <th>Melchor</th>
                <tr>
                <th>Niño</th> 
                <th>Regalo</th>
                <th>Bueno</th> 
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
        <?php
            // llamamos a la función melchor
            $rey = $conexion->rey1();
            while ($fila=$rey->fetch_assoc())
            {
                
        ?>
        <!-- Agregamos solo los regalos de los niños buenos  -->
         <?php if(array_key_exists($fila['nombreNinio'], $ninosBuenos)){ ?>
        <!-- Mostramos listado  -->
                <tr>
                <td><?php echo $ninosBuenos[$fila['nombreNinio']]; ?></td>       
                <td><?php echo $fila['nombreJuguete'];?></td>
                <td><?php echo $fila['bueno'];?></td>
                <td><?php echo $fila['precioJuguete'];?> €</td>
                <tr>
                    <!-- Hacemos la suma del precio de los juguetes  -->
                <?php $totalMelchor += (float) $fila['precioJuguete']; ?>
        <?php
            }
        }
        ?>
        <td><b>Total</b></td>
        <td></td>
        <td></td>
        <!-- mostramos total  -->
        <td class="text-center"><strong><?php echo $totalMelchor; ?> €</strong></td>

       

            <!-- LIsta gaspar  -->
            <table>
           <caption>Gaspar</caption>
         <thead>
                <th>Gaspar
                </tr>
                <th>Niño</th> 
                <th>Regalo</th>
                <th>Bueno</th> 
                <th>Precio</th>
                </tr>
        </thead>
        <tbody>
        <?php
            $rey = $conexion->rey2();
            while ($fila=$rey->fetch_assoc())
            {
        ?>
               <!-- Agregamos solo los regalos de los niños buenos  -->
         <?php if(array_key_exists($fila['nombreNinio'], $ninosBuenos)){ ?>
        <!-- Mostramos listado  -->
                <tr>
                <td><?php echo $ninosBuenos[$fila['nombreNinio']]; ?></td>    
                <td><?php echo $fila['nombreJuguete'];?></td>
                <td><?php echo $fila['bueno'];?></td>
                <td><?php echo $fila['precioJuguete'];?> €</td>
                <!-- Hacemos la suma del precio de los juguetes  -->
                <?php $totalGaspar += (float) $fila['precioJuguete']; ?>
            <tr>
        <?php
            }
        }
        ?>
              <td><b>Total</b></td>
        <td></td>
        <td></td>
        <!-- mostramos total  -->
        <td class="text-center"><strong><?php echo $totalGaspar; ?> €</strong></td>
</tbody>
<tr>
<tr>
    <hr>
            <!-- Otro baltasar  -->
            <table>
           <caption>Baltasar</caption>     
         <thead>
            <th>Baltasar
                <tr>
                <th>Niño</th> 
                <th>Regalo</th>
                <th>Bueno</th> 
                <th>Precio</th>
        
            </tr>
        </thead>
        <tbody>

        <?php
            $rey = $conexion->rey3();
            while ($fila=$rey->fetch_assoc())
            {
        ?>
              <!-- Agregamos solo los regalos de los niños buenos  -->
         <?php if(array_key_exists($fila['nombreNinio'], $ninosBuenos)){ ?>
        <!-- Mostramos listado  -->
                <tr>
                <td><?php echo $ninosBuenos[$fila['nombreNinio']]; ?></td>    
                <td><?php echo $fila['nombreJuguete'];?></td>
                <td><?php echo $fila['bueno'];?></td>
                <td><?php echo $fila['precioJuguete'];?> €</td>        
            <tr>
                    <!-- Hacemos la suma del precio de los juguetes  -->
                    <?php $totalBaltasar += (float) $fila['precioJuguete']; ?>
        <?php
            }
        }
            ?>
              <td><b>Total</b></td>
        <td></td>
        <td></td>
        <!-- mostramos total  -->
        <td class="text-center"><strong><?php echo $totalBaltasar; ?> €</strong></td>
        <hr>     
  
</tbody>
    </table>
    <br>
    <hr>
    <br>
    <br>
    <a href="index.php"><button type="button">Volver al Inicio</button>
</body>
</html>