<?php 
require '../models/conexion.php';
if(isset($_POST['submit'])){
    $nombre = $_POST['name'];
    $aPaterno = $_POST['aPaterno'];
    $aMaterno = $_POST['aMaterno'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $passR = $_POST['passwordR'];
    $minimo=8;

    if(empty($nombre) || 
        empty($aPaterno) || 
        empty($aMaterno) ||  
        empty($email) || 
        empty($pass) || 
        empty($passR))
        {
        echo '<div class="alert alert-danger"> Rellene todos los campos  </div>';
   }else { 
       if($pass==$passR){
        if(strlen($pass)>=$minimo){
      $password =password_hash($pass, PASSWORD_DEFAULT, ['cost' => 10]);
      $datos=array($nombre,
                   $aPaterno,
                   $aMaterno,
                   $email,
                   $password,
                   $password
                );
      $datos1=array($email);
          require '../models/usuarioCrud.php';
          $obj = new metodos;
       if($obj->existeEmail($datos1))
       {
           echo '<div class="alert alert-danger"> El correo electronico ya Existe </div>';
       }
       else
       {
         // $datos2=array($user);
         // if($obj->existeUser($datos2)){
             // echo '<div class="alert alert-danger"> El usuario ya existe </div>';
         //   }else{
                if($obj->insertarDatosUsuario($datos)){
                header('Location: ../index.php');
                echo '<div class="alert alert-success"> Se Guardo Exitosamente </div>';
            }else{
                echo '<div class="alert alert-danger"> Ha fallado </div>';
            }
         //   }
          
       }
        }else{
          echo "<script>alert('La contraseña debe tener minimo 8 caracteres');</script>";
        } 
        } else{
            echo '<div class="alert alert-danger"> Las contraseñas no son iguales </div>';
         }   
    }

}