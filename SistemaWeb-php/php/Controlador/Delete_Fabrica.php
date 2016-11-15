<?php 

	require_once '../Modelo/DaoFabrica.php';
	require_once '../Modelo/Fabrica.php';

	$Fabrica = new Fabrica($_GET["id"],"","","");
	$DaoFabrica= new DaoFabrica();
		
	$DaoFabrica->delete($Fabrica);
	$mensaje = "hecho";
	echo json_encode($mensaje);

 ?>