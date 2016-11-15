<?php 
	require_once '../Modelo/DaoVenta.php';
	require_once '../Modelo/Venta.php';

	$payload = file_get_contents('php://input');
	$data = json_decode($payload,true);
	$Venta = new Venta(0,$data['cantidad'],$data['fecha'],$data['idPunto'],$data['idFabrica']  );
	$DaoVenta= new DaoVenta();
		
	$DaoVenta->create($Venta);
	$mensaje = "hecho";
	echo json_encode($mensaje);
 ?>