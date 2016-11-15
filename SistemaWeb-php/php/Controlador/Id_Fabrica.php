<?php 

	require_once '../Modelo/DaoFabrica.php';
	require_once '../Modelo/Fabrica.php';

	$Fabrica = new Fabrica($_GET["id"],"","","");
	$DaoFabrica= new DaoFabrica();
		
	$result = $DaoFabrica->getbyId($Fabrica);

	echo json_encode($result);

 ?>