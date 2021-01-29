<?php
 session_start();
 echo "Cerrar sesion";
unset($_SESSION["nombre"]);
unset($_SESSION["datosUsuario"]);
 header('Location: ../index.php');
?>