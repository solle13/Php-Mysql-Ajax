<?php 

	require_once '../Modelo/DaoFabrica.php';
	require_once '../Modelo/Fabrica.php';

	$payload = file_get_contents('php://input');
	$data = json_decode($payload,true);
	$Fabrica = new Fabrica($data['idFabrica'],$data['nombreFabrica'],$data['ubicacion'],$data['lider'] );
	$DaoFabrica= new DaoFabrica();
		
	$DaoFabrica->update($Fabrica);
	$mensaje = "hecho";
	echo json_encode($mensaje);
 ?>