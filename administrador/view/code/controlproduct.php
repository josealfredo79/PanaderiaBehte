<?php 
require_once 'dist/conexion.php';require_once 'function/function.php';
$informacion = [];
if (!empty($_POST)) {
if(empty($_POST['nombre'])|| empty($_POST['precio']) || empty($_POST['tamano']) || empty($_POST['descripcion']) || $_POST['precio']<=0){$informacion['result']=false;
	$informacion['msg']= 'No se permiten campos vacios.';}else{
	$nombre=$connect->real_escape_string($_POST['nombre']);
	$precio=$connect->real_escape_string($_POST['precio']);
	$tamano=$connect->real_escape_string($_POST['tamano']);
	$desc=$connect->real_escape_string($_POST['descripcion']);
	$codigo=$connect->real_escape_string(generarCodigo(8));

	$photo=$_FILES['foto'];
	$name=$photo['name'];
	$type=$photo['type'];
	$temp=$photo['tmp_name'];
	$image='img_producto.png';
		if($name !=''){
			$destino='img/uploads/';
			$nameimg='img_'.md5(date('d-m-Y H:m:s'));
			$image=$nameimg.'.jpg';
			$src= $destino.$image;
		}

$stmt = "SELECT * FROM productos WHERE codigo='$codigo' and nombre='$nombre 'and precio='$precio' and tamano='$tamano';";
$stmt=$connect->query($stmt);
if($stmt->num_rows > 0) {
	$informacion['result']=false;
	$informacion['msg']= 'Error el producto ya existe.';
}else{
$insert="INSERT INTO productos(codigo,nombre,precio,descripcion,tamano,imagen)VALUES('$codigo','$nombre','$precio','$desc','$tamano','$image')";	
		$rs=$connect->query($insert);
		if($rs){

		if($name!=''){
			move_uploaded_file($temp,$src);
		}
		$informacion['result']=true;
		$informacion['msg']= 'Registro Exitoso.';		
		}else{
		$informacion['result']=false;
		$informacion['msg']= 'Error al registrar Intente mas tarde.';
		}

}

}
echo json_encode($informacion);
}else{
	exit(header('location:../../'));  
}













?>
