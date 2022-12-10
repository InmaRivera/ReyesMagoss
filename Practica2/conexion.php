<?php
//clase conexión
class conexion
{
    //conexión segura
    protected $conexion;

    public function __construct()
    {
        $servidor= 'localhost';
        $usuario= 'studium';
        $clave= 'studium__';
        //nombre base de datos
        $bd='studium_dws_p2';

        //usamos el atributo creado arriba de conexion
        $this->conexion= new mysqli($servidor,$usuario,$clave,$bd);
        if(mysqli_connect_error())
        {
            die("Error al conectar");
        }
        else
        {
            return $this->conexion;
        }
    }

    // ============================ NIÑOS ============================//
     //MOSTRAR listado de niños con SELECT
     public function selectAll()
     {  
        //Indicamos con ORDER BY para mostrar alfabéticamente por nombre
         $sql = "SELECT idNInio, nombreNinio, apellidosNinio, fechaNacimiento, bueno 
         FROM ninios ORDER BY nombreNinio";
        return $this->conexion->query($sql);
    
    }
    //función para mostrar datos en el formiulario
    public function select($id)
    { 
        
        if(!empty($id))
        {
           
            //mostramos los niños dependiendo de lo que se seleccione
            $sql= "SELECT * FROM ninios WHERE idNInio=" .$id;
            // echo $sql;
            $resultado=$this->conexion->query($sql);
            if($resultado->num_rows)
            {
                return $resultado->fetch_assoc();
            }
        
            else
            {
               return 0;
            }
               
        }
    }
         //AÑADIMOS NIÑOS con la function para insertar datos en la tabla ninios
         public function insert($data)
         {
             $sql="INSERT INTO ninios(nombreNinio,apellidosNinio,fechaNacimiento,bueno)VALUES ('".$data['nombreNinio']."','".$data['apellidosNinio']."','".$data['fechaNacimiento']."','".$data['bueno']."')";
         
             if($this->conexion->query($sql))
             {
                 //esta id hace referencia a la base de datos 
                 return $this->conexion->insert_id;
             }
             else
             {
                 return 0;
             }

         }
              //Creamos la función de editar niño
              public function update($data)
              {
                // $sql="UPDATE juguetes SET nombre='".$data['nombre']."',precio=".$data['precio']." WHERE idJuguete=".$data['idJuguete'];
                  $sql="UPDATE ninios SET nombreNinio='".$data['nombreNinio']."',apellidosNinio ='".
                  $data['apellidosNinio']."', fechaNacimiento='".$data['fechaNacimiento']."', bueno='".
                  $data['bueno']."' WHERE idNInio=".$data['idNInio'];
                  echo $sql;
                  if($this->conexion->query($sql))
                  {
                      //esta id hace referencia a la base de datos 
                      return $data['idNInio'];
                  }
                  else
                  {
                      return 0;
                  }
              }
            //Creamos función borrar niños
            public function delete($idNinio)
            {
                $sql= "DELETE FROM ninios WHERE idNInio=".$idNinio;
                if($this->conexion->query($sql))
                {
                    //si se borra correctamente usamos 1 true
                    echo "se ha borrado correctamente";
                    return 1;
                }
                else
                {
                    //si hay problemas usamos 0 false 
                    echo "no se ha podido eliminar";
                    return 0;
                }
            }

//======================================        JUGUETES          =================================//

            public function juguetes(){
                //Indicamos el select para mostrar juguetes
                $sql = "SELECT * FROM juguetes";
                // echo $sql;
            
                return $this->conexion->query($sql);
             }
             public function juguete($id){
                //buscar juguetes
                 if(!empty($id))
                    {
     
                        //mostramos los juguetes dependiendo de lo que se seleccione
                        $sql= "SELECT * FROM juguetes WHERE idJuguete=" .$id;
                        // echo $sql;
                        $resultado=$this->conexion->query($sql);
                        if($resultado->num_rows)
                            {
                                return $resultado->fetch_assoc();
                            }
     
                            else
                            {
                                return 0;
                            }
                    }
             }
        //AÑADIMOS JUGUETE
         public function insertReg($data)
         {
             $sql="INSERT INTO juguetes(nombreJuguete, precioJuguete, idReyFK)VALUES ('".$data['nombreJuguete']."',".$data['precioJuguete'].",'".$data['idReyFK']."')";
         echo $sql;
             if($this->conexion->query($sql))
             {
                 //esta id hace referencia a la base de datos 
                 return $this->conexion->insert_id;
             }
             else
             {
                 return 0;
             }

         }
              //Creamos la función de editar JUGUETE
              public function updateReg($data)
              {
                // $sql= "UPDATE juguetes SET nombreJuguete ='[value-1]',nombreJuguete ='[value-2]',precioJuguete ='[value-3]',idReyFK='[value-4]' WHERE 1";
                $sql="UPDATE juguetes SET nombreJuguete='".$data['nombreJuguete']."', precioJuguete='".$data['precioJuguete']."', idReyFK='".$data['idReyFK']."' WHERE idJuguete=".$data['idJuguete'];
                echo $sql;
                  if($this->conexion->query($sql))
                  {
                      //esta id hace referencia a la base de datos 
                      return $data['idJuguete'];
                  }
                  else
                  {
                      return 0;
                  }
              }
            //Creamos función para borrar Regalo
            public function deleteReg($idJuguete)
            {
                $sql= "DELETE FROM juguetes WHERE idJuguete=".$idJuguete;
                if($this->conexion->query($sql))
                {
                    //si se borra correctamente usamos 1 true
                    echo "se ha borrado correctamente";
                    return 1;
                }
                else
                {
                    //si hay problemas usamos 0 false 
                    echo "no se ha podido eliminar";
                    return 0;
                }
            }

//============================== busqueda =========================================//
// Creamos la funcion para mostrar niños en desplegable 
            public function buscarNino()
            {
                $ninios ="SELECT * FROM ninios";
                return $this->conexion->query($ninios);
            }
            public function buscarNino1($id)
            {          
                //buscamos al niño
                $sql = "SELECT * FROM ninios WHERE idNInio = ".(int)$id;
                echo $sql ."<br> el id es: ".(int)$id ;
                $rows = $this->conexion->query($sql);
                if((int)$rows->num_rows)
                {
                    $row = $rows->fetch_assoc();
                }
                else
                {
                    $row = null;
                }
        
                    return $row;
                }
                
            
            public function buscarReg()
            {  
               //Buscamos el juguete
                $juguete="SELECT * FROM juguetes";
                return $this->conexion->query($juguete);
                
            }
         
            //función para mostrar datos en el formulario
            public function mostrarReg()
            { 
                        //mostramos los niños dependiendo de lo que se seleccione
                        $sql = "SELECT nombreNinio, apellidosNinio, nombreJuguete 
                        FROM ninios INNER JOIN regalos ON idNInio = idNinioFK
                        INNER JOIN juguetes ON idJugueteFK = idJuguete
                        ORDER BY nombreNinio";
                
                        $resultado=$this->conexion->query($sql);
                      
                        return $resultado->fetch_assoc();                
            }
            // Select Todos los pedidos de un Niño
            public function selectPedidosDe($id)
            {
                //SELECT regalos.idJugueteFK, juguetes.nombreJuguete, juguetes.precioJuguete FROM regalos JOIN juguetes ON regalos.idJugueteFK  = juguetes.idJuguete  WHERE idNinioFK = 19;
                
            $sql = "SELECT regalos.idJugueteFK, juguetes.nombreJuguete, juguetes.precioJuguete 
            FROM regalos JOIN juguetes ON regalos.idJugueteFK  = juguetes.idJuguete 
             WHERE idNinioFK = ".(int)$id;
            // "SELECT nombreNinio, bueno, idJuguete, nombreJuguete, precioJuguete
            // FROM ninios INNER JOIN regalos on idNinio = idNinioFK 
            // INNER JOIN juguetes on idJugueteFK = idJuguete where idNINioFK = ".(int)$id; 
            // $resultado = $this->conexion->query($sql);
            return $this->conexion->query($sql);
            }



// función para insertar regalo a niño

            public function insertReg1($ninios, $idJuguete)
            {
                $validador = $this->comprobarRegalo($ninios, $idJuguete);
                if ($validador->num_rows != 0) {
                    throw new Exception('El regalo ya existe en la lista.');
                }
                else{
                    $sql = 'INSERT INTO regalos (idJuguete, idNInio) VALUES ("' . $idJuguete . '", "' . $ninios . '")';
                    $this->conexion->query($sql);
                    return $this->conexion->insert_id;
                }
            }  
            
            
    //============================== REYES MAGOS =========================================//

 
    public function rey1()
    { 
        //mostramos los niños dependiendo de lo que se seleccione
        $sql = "SELECT nombreNinio, bueno, nombreJuguete, precioJuguete
        FROM ninios INNER JOIN regalos on idNinio = idNinioFK 
        INNER JOIN juguetes on idJugueteFK = idJuguete where idReyFK = 1";

        return $this->conexion->query($sql);
          
               
    }
    public function rey2()
    { 
        //mostramos los niños dependiendo de lo que se seleccione
        $sql = "SELECT nombreNinio, bueno, nombreJuguete, precioJuguete
        FROM ninios INNER JOIN regalos on idNinio = idNinioFK 
        INNER JOIN juguetes on idJugueteFK = idJuguete where idReyFK = 2";
  
        return $this->conexion->query($sql);  
               
    }
    public function rey3()
    { 
        //mostramos los niños dependiendo de lo que se seleccione
        $sql = "SELECT nombreNinio, bueno, nombreJuguete, precioJuguete
        FROM ninios INNER JOIN regalos on idNinio = idNinioFK 
        INNER JOIN juguetes on idJugueteFK = idJuguete where idReyFK = 3";
   
        return $this->conexion->query($sql);       
    }
    //Creamos la función suma de regalos
    public function suma()
    {
        $sql="SELECT SUM(precioJuguete) 
            FROM ninios INNER JOIN regalos ON idNInio = idNinioFK
            INNER JOIN juguetes ON idJugueteFK = idJuguete 
            where idReyFK = 1";
        $resultado= $this->conexion->query($sql);
        return $resultado->mysqli_query($sql);   
    }
        // Select Niños Buenos
        public function selectAllGood(){
            $sql = "SELECT * FROM ninios WHERE bueno = 'Sí'";
            return $this->conexion->query($sql);
        }
}  
?>
