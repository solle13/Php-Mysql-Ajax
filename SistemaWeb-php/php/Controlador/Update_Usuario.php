<?php 
	require_once '../Modelo/DaoUsuario.php';
	require_once '../Modelo/Usuario.php';

	$payload = file_get_contents('php://input');
	$data = json_decode($payload,true);
	$Usuario = new Usuario($data['idUsuario'],$data['usuario'],$data['pass']);
	$DaoUsuario= new DaoUsuario();
		
	$DaoUsuario->update($Usuario);
	$mensaje = "hecho";
	echo json_encode($mensaje);
 ?>