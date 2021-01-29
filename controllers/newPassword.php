<?php 
require_once "../models/conexion.php";
session_start();
if(isset($_POST['submit'])){
    $nueva = $_POST['Password'];
    $rep = $_POST['Password01'];
    $minimo=8;

    if(empty($nueva) || empty($rep))
    {
        echo '<div class="alert alert-danger">Campos Vacios</div>';
    }else
    {
    if($nueva==$rep){
        if(strlen($nueva)>=$minimo){
            $passw =password_hash($nueva, PASSWORD_DEFAULT, ['cost' => 10]);
            $ide=$_SESSION['identyf'];
            require '../models/usuarioCrud.php';
            $obj = new metodos;
            $result=$obj->actualizarPass($ide,$passw);
            if ($result) {
                header('Location:../index.php'); 
            }else{
                echo "<script>alert('Error en la consulta');</script>";
            }
        }else{
            echo "<script>alert('La contraseña debe tener minimo 8 caracteres');</script>";
        }
    }else{
       echo "<script>alert('Contraseñas Incorrectas');</script>";
    }

    }
    

}