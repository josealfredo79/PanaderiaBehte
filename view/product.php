  <?php 
 session_start();
if(isset($_SESSION["datosUsuario"])){
	require_once "../models/conexion.php";
	require_once "../models/usuarioCrud.php";
 ?>
 <?php include 'partials/header.php' ?>
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


<!-- Ventana modal -->
<div class="modal fade" id="ventanaModal" tabindex="-1" role="dialog" aris-labelledby="tituloVentana" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
	<div class="modal-header">
		<h5 id="tituloVentana">Imagen...</h5>
		<button class="close" data-dismiss="modal" aria-label="Cerrar">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<div class="modal-body">
		<div >
			<img src="../img/verImagen.jpg" width='300' height='300'>
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
		<button type="button" class="btn btn-success">Success</button>
	</div>
</div>
</div>
</div>
<!-- Fin de la Ventana modal -->
<h3 align="center">Productos</h3>
<hr>
  	<div class='container'>
		<div class="row">
			<div class="col-lg-12">

 <button class="btn btn-outline-primary"  onclick="location.href='carrito.php'">Carrito</button>
<hr>
<table  class="table table-sm" border=2px>

	<tr class="bg-warning">
		<td align="center">Ide</td>
		<td  align="center">Codigo</td>
		<td align="center">Nombre</td>
		<td  align="center">Caracteristicas</td>
		<td  align="center">Imagen</td>
		<td  align="center">Carrito</td>
	</tr>

	<?php 
		require_once "../models/usuarioCrud.php";
		$produt=new metodos;
		$result=$produt->verProductos();
		while($mostrar=mysqli_fetch_array($result)){
	 ?>

	<tr>
		<td align="center"><?php echo $mostrar['id'] ?></td>
		<td align="center"><?php echo $mostrar['codigo'] ?></td>
		<td align="center"><?php echo $mostrar['nombre_producto'] ?></td>
		<td><?php echo '<h5>Precio: $ '.$mostrar['precio']."</h5> Descripcion: ".$mostrar['descripcion']."<br>Tamaño: ".$mostrar['tamano'] ?></td>
		<td align="center"><?php echo "<img src='../img/imagen/".$mostrar['imagen']."' width='200' height='200'>" ?></td>

		<td align="center">
			<form action="" method="POST">
				<input type="hidden" name="txtimg" value="<?php echo $mostrar['imagen'] ?>">
				<input type="hidden" name="txtproducto" value="<?php echo $mostrar['nombre_producto'] ?>">
				<input type="number" name="contador" value="1"  min="1" max="500">
				<input type="hidden" name="txtprecio" value="<?php echo $mostrar['precio'] ?>">
				<br>
				<br>
				<input type="submit" value="Agregar" name="btnAgregar" class="btn btn-warning">
			</form>
		</td>
		<!--<td><button  class="btn btn-success" data-toggle="modal" data-target="#ventanaModal"><i class="material-icons" style="font-size:36px;color:black">camera_alt</i></button></td>
		<td><button onclick="location.href='./error.php'" type="button" class="btn btn-warning"><i class="material-icons" style="font-size:36px;color:black">local_grocery_store</i></button></td>
		-->
	</tr>
<?php 
}
 ?>

</table>

</div>
</div>
</div>		

   <?php 
     if (isset($_REQUEST["btnAgregar"])) {
     	$img= $_REQUEST["txtimg"];
     	$producto= $_REQUEST["txtproducto"];
     	$cantidad= $_REQUEST["contador"];
     	$precio=   $_REQUEST["txtprecio"];

     	if(isset($_SESSION["carrito"][$producto])){
        $_SESSION["carrito"][$producto]["img"]=$img;
     	$_SESSION["carrito"][$producto]["cantidad"]+=$cantidad;
     	$_SESSION["carrito"][$producto]["precio"]=$precio;

     	}else{
        $_SESSION["carrito"][$producto]["img"]=$img;
     	$_SESSION["carrito"][$producto]["cantidad"]=$cantidad;
     	$_SESSION["carrito"][$producto]["precio"]=$precio;
     	}

     	echo "<script>alert('$producto fue agregado con exito al carrito.');</script>";
 

     }
   ?>	
<br>
<br>
<br>
<br>
<br>
<?php include 'partials/footer.php';
}else{
   header('Location:../index.php');
}
?>