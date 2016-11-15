<?php 
	require_once '../Modelo/DaoSucursal.php';
	require_once '../Modelo/Sucursal.php';

	$Sucursal = new Sucursal("","","",$_GET["id"]);
	$DaoSucursal= new DaoSucursal();
		
	$DaoSucursal->deletebyFabrica($Sucursal);
	$mensaje = "hecho";
	echo json_encode($mensaje);
 ?>