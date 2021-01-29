
	<?php
	session_start();
	if(isset($_SESSION["datosUsuario"])){
	include 'partials/header.php';
	$PagoTotal=0;
	?>

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
	          <div class="dropdown-divider"></div>
	          <a class="dropdown-item" href="../controllers/close.php">Cerrar Sesión</a>
	        </div>
	      </li>
	</nav>
	<br>
	<h3 align="center">Carrito de compras</h3>
	<hr>

	<div class='container'>
	<div class="row">
	<div class="col-lg-12">
      <?php 
      	if($PagoTotal>0){?>
      		 <button class="btn btn-outline-primary"  onclick="location.href='product.php'">Más Productos<span class="glyphicon glyphicon-search"></span></button>
      	 <?php
      	}

       ?>
	
	<hr>
	<table class="table table-sm" border=0px>

	<?php

	if(isset($_SESSION["carrito"])){
		
	foreach ($_SESSION["carrito"] as $indice => $arreglo) {
	?>
		<tr>
		<?php
		foreach ($arreglo as $key => $value) {
			if($key=="img"){
				?>
				<td align="center"><?php echo "<img src='../img/imagen/".$value."' width='100' height='100'>";?></td>
				<td align="center"><?php echo $indice;?></td>

			<?php
			}else if($key=="precio"){
			$PagoTotal += $value * $arreglo["cantidad"];
			?>

			     <td align="center"><?php echo "$ ".$value * $arreglo["cantidad"];?></td>
			<?php
			}else{
			?>
				<td align="center">
					<div class="">
						<form action="carrito.php" method="POST">
							<input type="hidden" name="arregloQ" value="<?php echo $indice?>">
							<input type="number" name="contador01" value="<?php echo $value;?>"  min="1" max="500">
							<hr>
							<input type="submit" value="+" name="btnMas" class="btn btn-success">
				   		 </form>
					</div>
				
				</td>

			<?php
			}


			
		}
			?>
			<td align="center">

				<form action="" method="POST" >
					<input type="hidden" name="arreglo" value="<?php echo $indice?>">
					<input type="submit" value="Eliminar" name="btnEliminar" class="btn btn-danger">
				</form>
			</td>
			<?php

		?>
	   </tr>

		<?php
	}
	?>

	</table>
	<hr>
	<h3>Pago Total: <?php echo " $ ".$PagoTotal; ?> <h3>
	<br>
		<form action="../controllers/compra.php" method="POST" >
					<input type="hidden" name="arreglo" value="<?php echo $indice?>">
					<!--<button class="btn btn-success" name="submit" type="submit">Continuar con la compra </button>-->
		</form>


	<?php
	if($PagoTotal==0){
		unset($_SESSION["carrito"]);
		header('Location: carrito.php');
	}

	}else{
		echo "<script>alert('El carrito esta vacio');</script>";
		?>
		<h5 align="center">Carrito de compra vacio</h5>
		<a href="product.php">Regresar</a>

		<?php
	}

	?>
	</div>
	</div>
	</div>


   <?php 
     if (isset($_REQUEST["btnMas"])) {
     	$delii=$_REQUEST["arregloQ"];
     	$inpCantidad= $_REQUEST["contador01"];
     	$_SESSION["carrito"][$delii]["cantidad"]=$inpCantidad;
     	header('Location: carrito.php');
     }

   	 
	     if (isset($_REQUEST["btnEliminar"])) {
	     	$deli=$_REQUEST["arreglo"];
	 		unset($_SESSION["carrito"][$deli]);
	     	echo "<script>alert('$Producto Eliminado.');</script>";
	     	header('Location: carrito.php');

	     }
	   ?>	

	<?php include 'partials/footer.php';
	}else{
	   header('Location:../index.php');
	}
	?>