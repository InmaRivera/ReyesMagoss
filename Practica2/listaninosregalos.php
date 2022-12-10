<?php
require_once('conexion.php');
require_once('busqueda.php');
$conexion = new conexion();
if(isset($_POST['id'])){
    $ninios = $_POST['id'];
}else if(isset($_POST['id'])){
    $ninios = $_POST['idNInio'];
}else if(isset($_GET['idNInio'])){
    $ninios = (int) filter_input(INPUT_GET, 'idNInio');
}else{
        header('Location: busqueda.php');
}
$ninio = $conexion->buscarNino1($ninios);
$rows = $conexion->selectPedidosDe($ninios);
$regalos = $conexion->buscarReg();

// if(isset($_POST['idJuguete'])){
//     // Hacer el insert en Pedidos...
//     $datosPedido = [];
//     $datosPedido['idNInio'] = $ninios;
//     $datosPedido['idJuguete'] = $_POST['idJuguete'];
//     try {
//         $id = $conexion->insertarReg($datosPedido);
//     } catch (Exception $ex) {
//         $mensajeKO = $ex->getMessage();
//     }
//     header('Location: listaninosregalos.php?idNInio='.$ninios);
// }
if (isset($_POST["anadir"])) {
    $ninios = $_POST["id"];
    $idJuguete = $_POST["idJuguete"];
    $listaRegalos = [];
    echo "id juguete ".$_POST["idJuguete"];

  
    $rows = $conexion->selectPedidosDe($ninios);
    try {
        $id = $conexion->insertReg1($ninios, $idJuguete);
        if ((int) $id) {
            $mensajeOK = 'El regalo se ha añadido correctamente.';
        }
    } catch (Exception $ex) {
        $mensajeKO = $ex->getMessage();
    }
    $ninio = $conexion->buscarNino($ninios);
    $rows = $conexion->selectPedidosDe($ninios);
    $regalos = $conexion->buscarReg();


    if ($regalos->num_rows == 0) {
        $mensajeKO = 'No existen regalos.';
    }
}


// $ninio = $conexion->buscarNino1($ninios);
// // //  echo "resultado de ninios: " .$ninios;
// $rows = $conexion->selectPedidosDe($ninios);
// $regalos = $conexion->buscarReg();
// echo "<br>este es regalos " .$ninios;



// Si no hay regalos se lo informo al usuario:
if($rows->num_rows == 0){
    $mensajeKO = '<h2 style="color:white; background-color:red;">Este niño no tiene ningún regalo en su lista.</h2>';
}
?>    
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
th, td {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;
}
td{
    background-color:#FFF8F6;
}
h1{
    color:#fff;
}
h1,h2{
    text-align: center;
}
th{
    background-color:#FFECE8;
}
</style>
<!DOCTYPE html>
<html>
    <head>
   
        <meta charset="utf-8">
        <title>Busqueda</title>
        <link href="./estilosCSS.css" rel="stylesheet" type="text/css">
</head> 
</head>
<body>

    <?php if (isset($_POST["idNInio"])) { ?>
            <h1 >Lista de Regalos de: <?php echo $ninio['nombreNinio']; ?> <?php echo $ninio['apellidosNinio']; ?></h1>
            <!-- Alertas -->
            <?php if(isset($mensajeOK)){ ?>
         
                    <?php echo $mensajeOK; ?>
         
            <?php } else if(isset($mensajeKO)){ ?>
     
                    <?php echo $mensajeKO; ?>
             
            <?php } ?>
        <?php } ?>
            <!-- Fin Alertas -->


        <!-- Inicio Tabla Regalos de Niño -->
                    <table>
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php while($row = $rows->fetch_assoc()){ ?>               
                                <!--Mostramos la lista de juguete de cada niño -->
                                <tr>
                                    <td><?php echo $row['nombreJuguete']; ?></td>
                                    <td><?php echo number_format($row['precioJuguete'],2,',','.'); ?>€</td>
                                </tr>
                            <?php}?>
                        </tbody>
                        <?php } ?> 
                    </table>    
  
           <hr> 
           <!-- Inicio de tabla para elegir otros regalos  -->
           <table>
         <thead>
            <tr>
          
            <th><form action="listaninosregalos.php" method="POST">
        <!-- mostrar listado de niños con select-->
                <label>lista de JUGUETES</label>
                <br>
                <br>
               
                 <!-- Creamos el select para que nos muestre la información dentro del desplegable       -->
                    <select name="idJuguete" id="idJuguete" require>   
                    <!-- Agregamos item a array -->
                    <?php $listaRegalos[] = $row['idJuguete']?>
                    <?php while($regalo = $regalos->fetch_assoc()){ ?>
                    <option value="">Seleccione un juguete:</option>
                   
                    
                    <?php if(!in_array($regalo['idJuguete'], $listaRegalos)){ ?>
                <!-- //mostramos desplegable -->
                    <option value="<?php echo $idJuguete=$regalo['idJuguete']; ?>"><?php echo $regalo['nombreJuguete']; ?></option>
                    </form>
                    <?php}?>
                <?php } ?>
            <?php } ?>
    

                </select>
                </form>
                <input type="text" name="idNInio" value="<?php echo $id=$ninios; ?>" style="opacity: 0">
           
        <button type="submit" class="btn btn-info" name="anadir">Añadir</button>    
    </tbody>
</table>
    <br>
    <br>
    <br>
    <a href="index.php"><button type="button">Volver al Inicio</button>
</body>
</html>