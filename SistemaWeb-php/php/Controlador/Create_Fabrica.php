<?php  
	
	require_once '../Modelo/DaoFabrica.php';
	require_once '../Modelo/Fabrica.php';

	$payload = file_get_contents('php://input');
	$data = json_decode($payload,true);
	$Fabrica = new Fabrica(0,$data['nombreFabrica'],$data['ubicacion'],$data['lider'] );
	$DaoFabrica= new DaoFabrica();
		
	$DaoFabrica->create($Fabrica);
	$mensaje = "hecho";
	echo json_encode($mensaje);
?>