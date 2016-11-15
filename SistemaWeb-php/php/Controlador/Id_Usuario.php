<?php 
	require_once '../Modelo/DaoUsuario.php';
	require_once '../Modelo/Usuario.php';

	$Usuario= new Usuario($_GET["id"],"","","");
	//echo ";".$Fabrica->getIdFabrica().":";
	$DaoUsuario= new DaoUsuario();
		
	$result = $DaoUsuario->getbyId($Usuario);

	echo json_encode($result);
 ?>