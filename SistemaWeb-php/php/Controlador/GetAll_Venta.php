<?php 
	require_once '../Modelo/DaoVenta.php';
	require_once '../Modelo/Venta.php';

	$DaoVenta = new DaoVenta();
	$result = $DaoVenta->getAll();

	$rawdata = array();
    $i=0;

    while($row = $result->fetch_assoc()){
    	$rawdata[$i] = $row;
    	$i++;
    	}
	echo json_encode($rawdata);
 ?>