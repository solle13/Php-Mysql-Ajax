<?php 
	require_once '../Modelo/DaoSucursal.php';
	require_once '../Modelo/Sucursal.php';

	$Sucursal = new Sucursal($_GET["id"],"","","");
	$DaoSucursal= new DaoSucursal();	
	$result = $DaoSucursal->getbyId($Sucursal);

	echo json_encode($result);
 ?>