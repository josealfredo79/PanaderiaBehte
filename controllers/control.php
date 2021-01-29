<?php 
session_start();
require_once "models/conexion.php";
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username) || empty($password))
    {
        echo '<div class="alert alert-danger">Nombre de usuario o contraseña vacio</div>';
    }else
    {
        require_once "./models/login.php";
        $user = new User;
         $datos=array($username,$password);
        if($user->datosLogin($datos))
        {
//Agrear los datos a la sesion 
        foreach ($_SESSION["datosUsuario"] as $key => $value) {
            if($key=="nombre"){
                $nom=$value;
            }elseif ($key=="ape_pater") {
                $ap=$value;
            }elseif ($key=="ape_mater") {
                $am=$value;
            }elseif ($key=="clave") {
                $password1=$value;
            }elseif ($key=="id") {
                $id=$value;
            }
        }
        if(password_verify($password, $password1)){
            $_SESSION["nombre"]=$nom." ".$ap." ".$am;
            $_SESSION["id"]=$id;
          header('Location:view/home.php'); 
        }else{
            session_destroy();
             echo '<div class="alert alert-danger">Contraseña Incorrecta. </div>';
        }
        
        }else
        {
         echo '<script type="text/javascript"> alertify.success("Mensaje de exito");</script>';
        }
    }

}