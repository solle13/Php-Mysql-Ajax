<?php 
	require_once '../Modelo/DaoVenta.php';
	require_once '../Modelo/Venta.php';

	$Venta = new Venta($_GET["id"],"","","","");
	$DaoVenta= new DaoVenta();
		
	$DaoVenta->delete($Venta);
	$mensaje = "hecho";
	echo json_encode($mensaje);
 ?>