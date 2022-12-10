<?php
require_once('conexion.php');
$conexion = new conexion();

if(isset($_POST['id'])){
    echo "***".$_POST['id'];
    $ninios = $_POST['id'];}

    if (isset($_POST["anadir"])) {
        $ninios = $_POST["idNInio"];
        $idJuguete = $_POST["idJuguete"];
    
      
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
    
?>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
h1{
    text-align: center;
}
td, th {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;
}
td{
    background-color:#FFF8F6;
}
th{
    background-color:#FFECE8;
}
</style>
<!DOCTYPE html>
<html>
    <head>
    <link href="./estilosCSS.css" rel="stylesheet" type="text/css" >
        <title>Busqueda</title>
        <meta charset="utf-8">
</head> 
<body>
    <h1>Busqueda informacón de Niños<h1>
    <?php if(isset($mensajeInfo)){ ?>
                    <div class="alert alert-danger">
                        <?php echo $mensajeInfo; ?>
                    </div>
                <?php } else if(isset($mensaje)){ ?>
                    <div class="alert alert-success">
                        <?php echo $mensaje; ?>
                    </div>
                <?php } ?>
        <table border="1">
           <h2 style="color:white">Elige un niño</h2>
         <thead>
            <tr>
            <th><form action="listaninosregalos.php"  method="POST">
        <!-- mostrar listado de niños con select-->
                <label>Nombre del niño</label>
                <br>
                <br>
                 <!-- Creamos el select para que nos muestre la información dentro del desplegable       -->
                    <select name="id" require>
                    <option value="">Seleccione niño:</option>
                    <?php $ninios = $conexion->buscarNino();?> 
                    <?php while($valores = $ninios->fetch_assoc()){ ?>
                <!-- //mostramos desplegable -->
                    <option value="<?php echo $id=$valores['idNInio']; ?>"><?php echo $nombre=$valores['nombreNinio']; ?> <?php echo $valores['apellidosNinio']; ?></option>
                    </form>
               
                <?php
                   }
                ?>
                    </select>
        <button type="submit" name="idNInio">Buscar</button>  
</tbody>
    </table>
    <br>
    <br>
    <br>
    <!-- <a href="index.php"><button type="button" class="btn btn-outline-light boton">Volver al Inicio</button> -->
</body>
</html>