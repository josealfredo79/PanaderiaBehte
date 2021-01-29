<?php 

    class User{
         
        public function datosLogin($datos){
            $sql="SELECT * FROM cliente WHERE correo='$datos[0]'";
            $db=new Database;
            $conn=$db->connect();
            $result=mysqli_query($conn,$sql);
            $row_cnt = mysqli_num_rows($result);
            if($row_cnt>0){
                $satos=$result->fetch_assoc();
                $_SESSION["datosUsuario"]=$satos;
                 return true;
            }else{
                 return false;        
            }
         }

         public function nameUser($correo){
            $email=$correo;
            $sql="SELECT nombre FROM 'cliente' WHERE correo='$email'";
            $db=new Database;
            $conn=$db->connect();
            $result=mysqli_query($conn,$sql);
            
            return $result;
         }

         
}

    


    