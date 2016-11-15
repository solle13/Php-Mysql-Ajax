<?php 

	Class Sucursal{
		
		protected $IdSucursal;
		protected $NombreSucursal;
		protected $Ubicacion;
		protected $IdFabrica;

		public function __construct($IdSucursal, $NombreSucursal, $Ubicacion, $IdFabrica){
			$this->IdSucursal = $IdSucursal;
			$this->NombreSucursal = $NombreSucursal;
			$this->Ubicacion = $Ubicacion;
			$this->IdFabrica = $IdFabrica;
		}

		public function getIdSucursal() {
    		return $this->IdSucursal;
		}

		public function setIdSucursal($IdSucursal) {
 	    	$this->IdSucursal = $IdSucursal;
		}

		public function getNombreSucursal() {
    		return $this->NombreSucursal;
		}

		public function setNombreSucursal($NombreSucursal) {
 	    	$this->NombreSucursal = $NombreSucursal;
		}

		public function getUbicacion() {
    		return $this->Ubicacion;
		}

		public function setUbicacion($Ubicacion) {
 	    	$this->Ubicacion = $Ubicacion;
		}

		public function getIdFabrica() {
    		return $this->IdFabrica;
		}

		public function setIdFabrica($IdFabrica) {
 	    	$this->IdFabrica = $IdFabrica;
		}
	}
 ?>