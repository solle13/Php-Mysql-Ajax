<?php 
	Class Venta{
		
		protected $IdVenta;
		protected $Cantidad;
		protected $Fecha;
		protected $IdPunto;
		protected $IdFabrica;

		public function __construct($IdVenta, $Cantidad, $Fecha, $IdPunto, $IdFabrica){
			$this->IdVenta = $IdVenta;
			$this->Cantidad = $Cantidad;
			$this->Fecha = $Fecha;
			$this->IdPunto = $IdPunto;
			$this->IdFabrica = $IdFabrica;
		}

		public function getIdVenta() {
    		return $this->IdVenta;
		}

		public function setIdVenta($IdVenta) {
 	    	$this->IdVenta = $IdVenta;
		}

		public function getCantidad() {
    		return $this->Cantidad;
		}

		public function setCantidad($Cantidad) {
 	    	$this->Cantidad = $Cantidad;
		}

		public function getFecha() {
    		return $this->Fecha;
		}

		public function setFecha($Fecha) {
 	    	$this->Fecha = $Fecha;
		}

		public function getIdPunto() {
    		return $this->IdPunto;
		}

		public function setIdPunto($IdPunto) {
 	    	$this->IdPunto = $IdPunto;
		}

		public function getIdFabrica() {
    		return $this->IdFabrica;
		}

		public function setIdFabrica($IdFabrica) {
 	    	$this->IdFabrica = $IdFabrica;
		}
	}
 ?>