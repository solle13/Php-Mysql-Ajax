<?php 
	require_once '../Modelo/DaoUsuario.php';
	require_once '../Modelo/Usuario.php';

	
	$Usuario = new Usuario(0,$_POST['usuarios'],$_POST['pass']);
	$DaoUsuario= new DaoUsuario();
		
	$result = $DaoUsuario->login($Usuario);
	if ($result==null){
		header('Location: /SistemaWeb-php/index.html');
	}
	else{
		$user = $result["Usuario"];
		if($result["Usuario"]=="Admin123"){
			header("Location: /SistemaWeb-php/Admin.php?user=$user");
		}
		else{
			header("Location: /SistemaWeb-php/User.php?user=$user");
		}
		
	}
 ?>