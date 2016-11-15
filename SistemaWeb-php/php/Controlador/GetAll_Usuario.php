<?php 
	require_once '../Modelo/DaoUsuario.php';
	require_once '../Modelo/Usuario.php';

	$DaoUsuario = new DaoUsuario();
	$result = $DaoUsuario->getAll();

	$rawdata = array();
    $i=0;

    while($row = $result->fetch_assoc()){
    	$rawdata[$i] = $row;
    	$i++;
    	}
	echo json_encode($rawdata);

 ?>