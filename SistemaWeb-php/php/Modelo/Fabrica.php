<?php  

	Class Fabrica{
		
		protected $IdFabrica;
		protected $NombreFabrica;
		protected $Ubicacion;
		protected $Lider;

		public function __construct($IdFabrica, $NombreFabrica, $Ubicacion, $Lider){
			$this->IdFabrica = $IdFabrica;
			$this->NombreFabrica = $NombreFabrica;
			$this->Ubicacion = $Ubicacion;
			$this->Lider = $Lider;
		}

		public function getIdFabrica() {
    		return $this->IdFabrica;
		}

		public function setIdFabrica($IdFabrica) {
 	    	$this->IdFabrica = $IdFabrica;
		}

		public function getNombreFabrica() {
    		return $this->NombreFabrica;
		}

		public function setNombreFabrica($NombreFabrica) {
 	    	$this->NombreFabrica = $NombreFabrica;
		}

		public function getUbicacion() {
    		return $this->Ubicacion;
		}

		public function setUbicacion($Ubicacion) {
 	    	$this->Ubicacion = $Ubicacion;
		}

		public function getLider() {
    		return $this->Lider;
		}

		public function setLider($Lider) {
 	    	$this->Lider = $Lider;
		}
	}
?>