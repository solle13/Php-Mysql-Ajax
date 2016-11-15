<?php 
	require_once '../Modelo/DaoSucursal.php';
	require_once '../Modelo/Sucursal.php';

	$Sucursal = new Sucursal("","","",$_GET["id"]);
	$DaoSucursal = new DaoSucursal();
	$result = $DaoSucursal->getbyIdFabrica($Sucursal);

	$rawdata = array();
    $i=0;

    while($row = $result->fetch_assoc()){
    	$rawdata[$i] = $row;
    	$i++;
    	}
	echo json_encode($rawdata);
 ?>