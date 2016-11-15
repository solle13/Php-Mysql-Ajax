<?php 
	require_once '../Modelo/DaoFabrica.php';
	require_once '../Modelo/Fabrica.php';

	$Fabrica = new Fabrica(0,"","",$_GET["lider"]);
	//echo ";".$Fabrica->getIdFabrica().":";
	$DaoFabrica= new DaoFabrica();
		
	$result = $DaoFabrica->getbyLider($Fabrica);

	echo json_encode($result, JSON_FORCE_OBJECT);

 ?>