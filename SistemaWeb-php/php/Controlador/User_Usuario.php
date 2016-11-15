<?php 
	require_once '../Modelo/DaoUsuario.php';
	require_once '../Modelo/Usuario.php';

	$Usuario = new Usuario(0,$_GET["usuario"],"");
	//echo ";".$Fabrica->getIdFabrica().":";
	$DaoUsuario= new DaoUsuario();
		
	$result = $DaoUsuario->getbyUsuario($Usuario);

	echo json_encode($result);
 ?>