
<?php 
session_start();
if(isset($_SESSION["datosUsuario"])){

include 'partials/header.php' ?>
<nav class="navbar navbar-light" he  style="background-color: #EEEB2B">
        <a href="home.php"><img id=logo1 src="../img/logo.png"></a>
        <div class="navbar">
        <h3><a class="navbar-brand" href="home.php">Inicio</a></h3>
        <h3><a class="navbar-brand" href="product.php">Productos</a></h3>
        <h3><a class="navbar-brand" href="informacion.php">Sobre Nosotros</a></h3>
        </div>

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

        <div class="row">
            <div class="col-sm-12" >
                    <div class="container">
                    <h2>UBICACIÓN DE LA PANADERIA</h2><br>
                           <div style="border:3px solid #0000FF; border-radius: 5%;" >
                           <br>
                                <div class="col-md-7 col-center">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3809.9590746852355!2d-97.68696378560227!3d17.269214788149455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85c62ec5b49d0c3b%3A0xc81c0416fc48acf1!2sEliseo+Gonz%C3%A1lez%2C+San+Sebastian%2C+69800+Tlaxiaco%2C+Oax.!5e0!3m2!1ses-419!2smx!4v1558254075816!5m2!1ses-419!2smx" width="1075" height="300" frameborder="2" style="border:5" allowfullscreen></iframe>

                                </div>
                           
                            <br>  <br>  <br>
                           </div> 
                    </div>
 
            </div>
 
        </div>

<?php include 'partials/footer.php'; 

}else{
   header('Location:../index.php');
}
?>