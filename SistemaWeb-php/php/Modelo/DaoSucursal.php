<?php 
	
	require_once '../Config/Conexion.php';
	require_once '../Modelo/Sucursal.php';
	Class DaoSucursal extends Conexion{

		public function __construct(){
			parent::__construct();
		}
		public function __destruct(){
			parent::__destruct();
		}

		public function create(&$sucursal){
			$nombre = $sucursal->getNombreSucursal();
			$ubicacion = $sucursal->getUbicacion();
			$idfabrica = $sucursal->getIdFabrica();
			$query = "INSERT INTO sucursales (NombrePunto, Ubicacion, IdFabrica)VALUES ('$nombre','$ubicacion','$idfabrica')";
			$this->db->query($query);
		}

		public function delete(&$sucursal){
			$id = $sucursal->getIdSucursal();
			$query = "DELETE FROM sucursales WHERE IdPunto = $id";
			$this->db->query($query);
		}

		public function getbyId(&$sucursal){
			$id = $sucursal->getIdSucursal();
			$query = "SELECT IdPunto, NombrePunto, Ubicacion, IdFabrica FROM sucursales WHERE IdPunto = '$id'";
			$result = $this->db->query($query); 
        	$var = $result->fetch_assoc();
        	return $var;
		}

		public function getbyIdFabrica(&$sucursal){
			$id = $sucursal->getIdFabrica();
			$query = "SELECT IdPunto, NombrePunto, Ubicacion, IdFabrica FROM sucursales WHERE IdFabrica = '$id'";
			$result = $this->db->query($query); 
        	return $result;
		}

		public function update(&$sucursal){
			$id = $sucursal->getIdSucursal();
			$nombre = $sucursal->getNombreSucursal();
			$ubicacion = $sucursal->getUbicacion();
			$idfabrica = $sucursal->getIdFabrica();
			$query = "UPDATE sucursales SET IdPunto = '$id', NombrePunto = '$nombre', Ubicacion = '$ubicacion', IdFabrica = '$idfabrica' WHERE IdPunto = '$id'";
			$this->db->query($query);
		}

		public function deletebyFabrica(&$sucursal){
			$id = $sucursal->getIdFabrica();
			$query = "DELETE FROM sucursales WHERE IdFabrica = $id";
			$this->db->query($query);
		}

		public function getAll(){
			$query = "SELECT IdPunto, NombrePunto, Ubicacion, IdFabrica FROM sucursales";
			$result = $this->db->query($query);
         	
        	return $result;
		}
		
	}
 ?>