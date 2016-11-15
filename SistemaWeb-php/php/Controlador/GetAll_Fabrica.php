<?php  

	require_once '../Modelo/DaoFabrica.php';
	require_once '../Modelo/Fabrica.php';

	$DaoFabrica = new DaoFabrica();
	$result = $DaoFabrica->getAll();

	$rawdata = array();
    $i=0;

    while($row = $result->fetch_assoc()){
    	$rawdata[$i] = $row;
    	$i++;
    	}
	echo json_encode($rawdata);
?>