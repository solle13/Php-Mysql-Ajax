<?php 
	require_once '../Modelo/DaoVenta.php';
	require_once '../Modelo/Venta.php';

	$Venta = new Venta("","","","",$_GET["id"]);
	$DaoVenta = new DaoVenta();
	$result = $DaoVenta->getbyIdFabrica($Venta);

	$rawdata = array();
    $i=0;

    while($row = $result->fetch_assoc()){
    	$rawdata[$i] = $row;
    	$i++;
    	}
	echo json_encode($rawdata);
 ?>