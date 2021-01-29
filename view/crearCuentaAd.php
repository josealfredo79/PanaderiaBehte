<?php
include 'controllers/control.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title>crearCuenta</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <link rel="stylesheet" type="text/css" href="../css/style1.css">
  </head>
  <body>
  <nav class="navbar navbar-light" he  style="background-color: #EEEB2B">
        
        <a href="view/principal.php" title="Haz click en la imagen"><img id=logo1 src="../img/logo.png"></a>
        
        <form class="form-inline my-2 my-lg-0">

        </form>
     
        <button class="btn btn-outline-primary"  onclick="location.href='view/registroCliente.php'">Iniciar sesion </button>
    
  </nav>
<div class="modal-dialog text-center">
  <div class="col-sm-10">
    <div class="modal-content" id="der">
        <br>
        <br>
      <div class="col-12">
        <img id="logo" src="../img/ini.png">
        <h1> Crear cuenta </h1>
        <h5> ADMINISTRADOR</h5>
      </div> 
      <form class="col-12" action="modelo/insertarAdmin.php" method="POST"> 
          <div class="form-group">
            <input type="text" name="txtnombre" class="form-control" placeholder="Nombre" require>
          </div>
          <div class="form-group">
            <input type="text" name="txtapp" class="form-control" placeholder="Apellido paterno">
          </div>
          <div class="form-group">
            <input type="text" name="txtapm" class="form-control" placeholder="Apellido materno">
          </div>
          <div class="form-group">
            <input type="text" name="txtcorreo" class="form-control" placeholder="Correo electronico">
          </div>
          <div class="form-group">
            <input type="password" name="txtcontraseña" class="form-control" placeholder="Contraseña">
          </div>
          <div class="form-group">
            <input type="password" name="txtvercontra" class="form-control" placeholder="Verificar contraseña">
          </div>
          <button class="btn btn-primary" name="submit" type="submit">Crear cuenta </button>
          <br><br>
      </form>
    </div>
  
  </div>

</div>
  </body>
  
</html>