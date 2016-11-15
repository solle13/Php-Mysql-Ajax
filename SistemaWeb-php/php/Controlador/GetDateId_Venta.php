<?php 
	require_once '../Modelo/DaoVenta.php';
	require_once '../Modelo/Venta.php';

	$DaoVenta = new DaoVenta();
	$result = $DaoVenta->getbyDate_Id($_GET["fecha1"],$_GET["fecha2"],$_GET["id"]);

	$rawdata = array();
    $i=0;

    while($row = $result->fetch_assoc()){
    	$rawdata[$i] = $row;
    	$i++;
    	}
	echo json_encode($rawdata);
 ?>