

<?php
session_start();

if(isset($_SESSION["datosUsuario"])){
 include 'partials/header.php' ?>

<nav class="navbar navbar-light" he  style="background-color: #EEEB2B">
        <a href="home.php"><img id=logo1 src="../img/logo.png"></a>
        <li class="nav-item dropdown">
         <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <h5> <?php echo $_SESSION["nombre"];?></h5>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Mis Datos</a>
          <a class="dropdown-item" href="carrito.php">Carrito</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../controllers/close.php">Cerrar Sesión</a>
        </div>
      </li>
</nav>


<div class="modal-dialog text-center">
  <div class="col-sm-16">
    <div class="modal-content">
      <br>  
      <br>
      <button  onclick="location.href='./product.php'" class="btn btn-outline-light text-dark" ><img id="imgTamaño" src="../img/img01.png" class="img-responsive" alt="Responsive image">Productos</button>
      <br>  <br>
      <button onclick="location.href='carrito.php'" class="btn btn-outline-light text-dark" ><img id="imgTamaño" src="../img/img02.png" class="img-responsive" alt="Responsive image">Carrito</button>
      <br>  <br>
       <button onclick="location.href='./informacion.php'" class="btn btn-outline-light text-dark" ><img id="imgTamaño" src="../img/img03.png" class="img-responsive" alt="Responsive image">Acerca de Nosotros</button>
      <br>  <br>
     
    </div>
  
  </div>

</div>

<?php include 'partials/footer.php'; 
}else{
   header('Location:../index.php');
}
?>