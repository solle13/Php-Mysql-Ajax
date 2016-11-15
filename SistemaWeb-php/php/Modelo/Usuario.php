<?php 
	Class Usuario{
		
		protected $IdUsuario;
		protected $Usuario;
		protected $Pass;

		public function __construct($IdUsuario, $Usuario, $Pass){
			$this->IdUsuario = $IdUsuario;
			$this->Usuario = $Usuario;
			$this->Pass = $Pass;
		}

		public function getIdUsuario() {
    		return $this->IdUsuario;
		}

		public function setIdUsuario($IdUsuario) {
 	    	$this->IdUsuario = $IdUsuario;
		}

		public function getUsuario() {
    		return $this->Usuario;
		}

		public function setUsuario($Usuario) {
 	    	$this->Usuario = $Usuario;
		}

		public function getPass() {
    		return $this->Pass;
		}

		public function setPass($Pass) {
 	    	$this->Pass = $Pass;
		}
	}

 ?>