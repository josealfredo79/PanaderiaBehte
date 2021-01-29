<?php 
	class metodos{

		public function existeEmail($datos){
			$sql="SELECT * FROM cliente WHERE correo='$datos[0]'";
			$db=new Database;
            $conn=$db->connect();
            $result=mysqli_query($conn,$sql);
            $row_cnt = mysqli_num_rows($result);
            if($row_cnt>0){
                 return true;
            }else{
                 return false;        
            }
		}

		public function existeUser($datos){
			$sql="SELECT * FROM cliente WHERE usuario='$datos[0]'";
			$db=new Database;
            $conn=$db->connect();
            $result=mysqli_query($conn,$sql);
            $row_cnt = mysqli_num_rows($result);
            if($row_cnt>0){
                 return true;
            }else{
                 return false;        
            }
		}

		public function insertarDatosUsuario($datos){
			$db=new Database;
            $conn=$db->connect();
			$sql="INSERT into cliente (nombre,ape_pater,ape_mater,telefono,correo,usuario,clave) 
								values ('$datos[0]','$datos[1]','$datos[2]',null,'$datos[3]',null,'$datos[4]')";
			return $result=mysqli_query($conn,$sql);
		}
        
        public function mostrarDatos($sql){
            $db=new Database;
            $conn=$db->connect();
            $result=mysqli_query($conn,$sql);
           return mysqli_num_rows($result);
           
        }

    public function verProductos(){
         $db=new Database;
         $conn=$db->connect();
         $sql="SELECT * from productos";
         $result=mysqli_query($conn,$sql);
         return $result;

    }
    function generarCodigo($longitud) {
    $key = '';
    $pattern = '123456789';
    $max = strlen($pattern)-1;
    for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
    return $key;
    }  

  function inserToken($token, $ide){
         $db=new Database;
         $conn=$db->connect();
         $sqlv="UPDATE cliente SET token = $token WHERE id= $ide"; 
         $result=mysqli_query($conn,$sqlv);
         return $result;

    }


    //SI EXISTE LA DIRECCION;

    function direccionExiste(){
    $sql="SELECT * FROM cliente WHERE correo='$datos[0]'";
            $db=new Database;
            $conn=$db->connect();
            $result=mysqli_query($conn,$sql);
            $row_cnt = mysqli_num_rows($result);
            if($row_cnt>0){
                 return true;
            }else{
                 return false;        
            }
    }

    function saberIde($correo){
        $sql="SELECT id FROM cliente WHERE correo='$correo'";
        $db=new Database;
        $conn=$db->connect();
        $result=mysqli_query($conn,$sql);
         return $result;

    }


    function existeToken($token){
    $sql="SELECT * FROM cliente WHERE token=$token";
            $db=new Database;
            $conn=$db->connect();
            $result=mysqli_query($conn,$sql);
            $row_cnt = mysqli_num_rows($result);
            if($row_cnt>0){
                 return true;
            }else{
                 return false;        
            }
    }


    function actualizarPass($ide,$pass){
         $db=new Database;
         $conn=$db->connect();
         $sql = "UPDATE cliente SET clave = '$pass' WHERE id= $ide"; 
         $result=mysqli_query($conn,$sql);
         return $result;
    }


}
 ?>