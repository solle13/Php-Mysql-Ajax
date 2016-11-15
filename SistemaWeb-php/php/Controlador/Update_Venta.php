<?php 
	require_once '../Modelo/DaoVenta.php';
	require_once '../Modelo/Venta.php';

	$payload = file_get_contents('php://input');
	$data = json_decode($payload,true);
	$Venta = new Venta($data['idVenta'],$data['cantidad'],$data['fecha'],$data['idPunto'], $data['idFabrica']);
	$DaoVenta= new DaoVenta();
		
	$DaoVenta->update($Venta);
	$mensaje = "hecho";
	echo json_encode($mensaje);
 ?>