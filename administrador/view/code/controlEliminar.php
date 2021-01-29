<?php 
require_once 'dist/conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	header("Content-Type: application/json");
	$array_devolver=[];
	$eliminar=$connect->real_escape_string($_POST['eliminar']);

$stmt = "SELECT * FROM productos WHERE id='$eliminar';";
$stmt=$connect->query($stmt);
if($stmt->num_rows > 0) { 
	 $sql = "DELETE  FROM productos WHERE id =$eliminar";
     $del = $connect->query($sql);
	 if($del){
			 $array_devolver['full']=true;
			 $array_devolver['mensaje']= 'Eliminado Exitosamente';

	 }else{
	 	   	 $array_devolver['full']=false;
			 $array_devolver['mensaje']='Error al Eliminar...';
	 }
}else{
	$array_devolver['full']=false;
	$array_devolver['mensaje']='El Producto no existe.';
}


           
	
echo json_encode($array_devolver);
}else{
	exit(header('location:../../')); 
}

 ?>