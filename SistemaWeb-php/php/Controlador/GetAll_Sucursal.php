<?php 
	require_once '../Modelo/DaoSucursal.php';
	require_once '../Modelo/Sucursal.php';

	$DaoSucursal = new DaoSucursal();
	$result = $DaoSucursal->getAll();

	$rawdata = array();
    $i=0;

    while($row = $result->fetch_assoc()){
    	$rawdata[$i] = $row;
    	$i++;
    	}
	echo json_encode($rawdata);
 ?>