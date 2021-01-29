<?php 
require_once "../models/conexion.php"; 
if(isset($_POST['submit'])){
    $eval = $_POST['identify'];

   if (empty($eval) ) {
   	echo '<div class="alert alert-danger">Ingrese datos</div>';
   }else{
   
    require '../models/usuarioCrud.php';
    $obj = new metodos;
       if($obj->existeToken($eval)){
       	header('Location:veryPass.php'); 
       }else{

       		echo '<div class="alert alert-danger">Escriba bien el codigo</div>';
       }

   }
}
?>