<?php 
	require_once '../Config/Conexion.php';
	require_once '../Modelo/Venta.php';
	Class DaoVenta extends Conexion{

		public function __construct(){
			parent::__construct();
		}
		public function __destruct(){
			parent::__destruct();
		}

		public function create(&$venta){
			$cantidad = $venta->getCantidad();
			$fecha = $venta->getFecha();
			$idpunto = $venta->getIdPunto();
			$idfabrica = $venta->getIdFabrica();
			$query = "INSERT INTO ventas (Cantidad, Fecha, IdPunto, IdFabrica)VALUES ('$cantidad','$fecha','$idpunto','$idfabrica')";
			$this->db->query($query);
		}

		public function delete(&$venta){
			$id = $venta->getIdVenta();
			$query = "DELETE FROM ventas WHERE IdVenta = $id";
			$this->db->query($query);
		}

		public function getbyIdFabrica(&$venta){
			$id = $venta->getIdFabrica();
			$query = "SELECT IdVenta, Cantidad, Fecha, IdPunto, IdFabrica FROM ventas WHERE IdFabrica = '$id'";
			$result = $this->db->query($query); 
        	return $result;
		}

		public function getbyDate($fecha1, $fecha2){
			$query = "SELECT IdVenta, Cantidad, Fecha, IdPunto, IdFabrica FROM ventas WHERE Fecha >= '$fecha1' AND Fecha <= '$fecha2'";
			$result = $this->db->query($query); 
        	return $result;
		}

		public function getbyDate_Id($fecha1, $fecha2, $id){
			$query = "SELECT IdVenta, Cantidad, Fecha, IdPunto, IdFabrica FROM ventas WHERE Fecha >= '$fecha1' AND Fecha <= '$fecha2' AND IdFabrica = '$id'";
			$result = $this->db->query($query); 
        	return $result;
		}

		public function getbyId(&$venta){
			$id = $venta->getIdVenta();
			$query = "SELECT IdVenta, Cantidad, Fecha, IdPunto, IdFabrica FROM ventas WHERE IdVenta = '$id'";
			$result = $this->db->query($query); 
        	return $result;
		}

		public function update(&$venta){
			$id = $venta->getIdVenta();
			$cantidad = $venta->getCantidad();
			$fecha = $venta->getFecha();
			$idpunto = $venta->getIdPunto();
			$idfabrica = $venta->getIdFabrica();
			$query = "UPDATE ventas SET IdVenta = '$id', Cantidad = '$cantidad', Fecha = '$fecha', IdPunto = '$idpunto', IdFabrica = '$idfabrica' WHERE IdVenta = '$id'";
			$this->db->query($query);
		}

		public function deletebyFabrica(&$venta){
			$id = $venta->getIdFabrica();
			$query = "DELETE FROM ventas WHERE IdFabrica = $id";
			$this->db->query($query);
		}
	
		public function deletebySucursal(&$venta){
			$id = $venta->getIdPunto();
			$query = "DELETE FROM ventas WHERE IdPunto = $id";
			$this->db->query($query);
		}

		public function getAll(){
			$query = "SELECT IdVenta, Cantidad, Fecha, IdPunto, IdFabrica FROM ventas";
			$result = $this->db->query($query);
         	
        	return $result;
		}
		
	}
 ?>