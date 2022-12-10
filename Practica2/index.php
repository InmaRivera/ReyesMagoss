<?php
//conectamos con la clase de la base 
require_once('conexion.php');
//Creamos el objeto de conexion
$conexion = new conexion();
?>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
caption{
        
    text-align: center;
}
td, th {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;
}
td{
    background-color:#ace4ed;
}
th{
    background-color:#ace4ed;
}
</style>
<!DOCTYPE html>
<html>
    <head>
     
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title>Consultas</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <link href="./estilosCSS.css" rel="stylesheet" type="text/css" >
</head> 
<body>

<div class="container estilos">

           <h1><b>Listado Consultas<b></h1>
          <br>
            <div class="row sombras mx-0 my-0 px-3 py-0 pt-3">
            <form action="ninos.php"  method="post">
                        <button  class="btn btn-outline-dark boton" id="ninos" name="ninos" href="ninos.php">Listado de niños</button>
            </form>
            <tr>
                <form action="regalos.php"  method="post">
                         <button  class="btn btn-outline-dark boton" id="regalos" name="regalos" href="regalos.php">Listado Regalos</button>
            </form>
                        <tr>
            <form action="reyes.php" method="post"> 
                        <button  class="btn btn-outline-dark boton" id="reyes" name="reyes" href="reyes.php">Reyes Magos</button>
           </form>
       
                 <tr>
            <form action="busqueda.php" method="post">
                        <button  class="btn btn-outline-dark boton" id="busqueda" name="busqueda" href="busqueda.php">Formulario de búsqueda</button>
           </form>
        <br>
</div>    
</div>

</body>
</html>