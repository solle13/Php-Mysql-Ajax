<?php
	require_once '../Config/Conexion.php';
	require_once '../Modelo/Fabrica.php';
	Class DaoFabrica extends Conexion{

		public function __construct(){
			parent::__construct();
		}
		public function __destruct(){
			parent::__destruct();
		}

		public function create(&$fabrica){
			$nombrefabrica = $fabrica->getNombreFabrica();
			$ubicacion = $fabrica->getUbicacion();
			$lider = $fabrica->getLider();
			$query = "INSERT INTO fabrica (NombreFabrica, Ubicacion, Lider)VALUES ('$nombrefabrica','$ubicacion','$lider')";
			$this->db->query($query);
		}

		public function delete(&$fabrica){
			$id = $fabrica->getIdFabrica();
			$query = "DELETE FROM fabrica WHERE IdFabrica = $id";
			$this->db->query($query);
		}

		public function getbyId(&$fabrica){
			$id = $fabrica->getIdFabrica();
			$query = "SELECT IdFabrica, NombreFabrica, Ubicacion, Lider FROM fabrica WHERE IdFabrica = '$id'";
			$result = $this->db->query($query); 
        	$var = $result->fetch_assoc();
        	return $var;
		}

		public function update(&$fabrica){
			$id = $fabrica->getIdFabrica();
			$nombrefabrica = $fabrica->getNombreFabrica();
			$ubicacion = $fabrica->getUbicacion();
			$lider = $fabrica->getLider();
			$query = "UPDATE fabrica SET IdFabrica = '$id', NombreFabrica = '$nombrefabrica', Ubicacion = '$ubicacion', Lider = '$lider' WHERE IdFabrica = '$id'";
			$this->db->query($query);
		}
		
		public function getbyLider(&$fabrica){
			$lider = $fabrica->getLider();
			$query = "SELECT IdFabrica, NombreFabrica, Ubicacion, Lider FROM fabrica WHERE Lider = '$lider'";
			$result = $this->db->query($query); 
			$var = $result->fetch_assoc();
        	return $var;
		}

		public function getAll(){
			$query = "SELECT IdFabrica, NombreFabrica, Ubicacion, Lider FROM fabrica";
			$result = $this->db->query($query);
         	
        	return $result;
		}
	}
?>