<?php 
session_start();
require_once "../models/conexion.php";
if(isset($_POST['submit'])){
    $email = $_POST['email'];


    $datos3=array($email);

    if(empty($email))
    {
        echo "<script>alert('Campo vacio, introduce una cuenta de correo.');</script>";
        //echo '<div class="alert alert-danger">Intro</div>';
    }else
    {
    require '../models/usuarioCrud.php';
          $obj = new metodos;
    if($obj->existeEmail($datos3))
       {
           $token = $obj->generarCodigo(6);
           require_once "../models/usuarioCrud.php";
           $produt=new metodos;
           $result=$produt->saberIde($email);
           while ($ide=mysqli_fetch_array($result)) {
             $identy=$ide['id'];
           }
           if ($obj->inserToken($token, $identy)) 
           {
            require_once "../models/mail.php";
            $produto=new mail;
            $resulta=$produto->datos($email,$token);
            if ($resulta) {
               $_SESSION["identyf"]=$identy;
               header('Location:../view/veryPass01.php'); 
            }

       }else{
          echo "<script>alert('Correo electronico es incorrecto');</script>";

       }

    }

}
}