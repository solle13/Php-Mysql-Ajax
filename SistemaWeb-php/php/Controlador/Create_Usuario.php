<?php 
	require_once '../Modelo/DaoUsuario.php';
	require_once '../Modelo/Usuario.php';

	$payload = file_get_contents('php://input');
	$data = json_decode($payload,true);
	$Usuario = new Usuario(0,$data['usuario'],$data['pass']);
	$DaoUsuario= new DaoUsuario();
		
	$DaoUsuario->create($Usuario);
	$mensaje = "hecho";
	echo json_encode($mensaje);
 ?>