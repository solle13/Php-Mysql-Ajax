<?php 
	require_once '../Modelo/DaoSucursal.php';
	require_once '../Modelo/Sucursal.php';

	$payload = file_get_contents('php://input');
	$data = json_decode($payload,true);
	$Sucursal = new Sucursal(0,$data['nombrePunto'],$data['ubicacion'],$data['idFabrica'] );
	$DaoSucursal= new DaoSucursal();
		
	$DaoSucursal->create($Sucursal);
	$mensaje = "hecho";
	echo json_encode($mensaje);
 ?>