<?php 

	require_once '../Config/Conexion.php';
	require_once '../Modelo/Usuario.php';
	Class DaoUsuario extends Conexion{

		public function __construct(){
			parent::__construct();
		}
		public function __destruct(){
			parent::__destruct();
		}

		public function create(&$usuario){
			$user = $usuario->getUsuario();
			$pass = $usuario->getPass();
			$query = "INSERT INTO usuarios (Usuario, Pass)VALUES ('$user','$pass')";
			$this->db->query($query);
		}

		public function delete(&$usuario){
			$id = $usuario->getIdUsuario();
			$query = "DELETE FROM usuarios WHERE IdUsuario = $id";
			$this->db->query($query);
		}

		public function getbyId(&$usuario){
			$id = $usuario->getIdUsuario();
			$query = "SELECT IdUsuario, Usuario, Pass FROM usuarios WHERE IdUsuario = '$id'";
			$result = $this->db->query($query); 
        	$var = $result->fetch_assoc();
        	return $var;
		}

		public function update(&$usuario){
			$id = $usuario->getIdUsuario();
			$user = $usuario->getUsuario();
			$pass = $usuario->getPass();
			$query = "UPDATE usuarios SET IdUsuario = '$id', Usuario = '$user', Pass = '$pass' WHERE IdUsuario = '$id'";
			$this->db->query($query);
		}
		
		public function getbyUsuario(&$usuario){
			$user = $usuario->getUsuario();
			$query = "SELECT IdUsuario, Usuario, Pass FROM usuarios WHERE Usuario = '$user'";
			$result = $this->db->query($query); 
			$var = $result->fetch_assoc();
        	return $var;
		}

		public function login(&$usuario){
			$user = $usuario->getUsuario();
			$pass = $usuario->getPass();
			$query = "SELECT IdUsuario, Usuario, Pass FROM usuarios WHERE Usuario = '$user' AND Pass = '$pass'";
			$result = $this->db->query($query); 
			$var = $result->fetch_assoc();
        	return $var;
		}

		public function getAll(){
			$query = "SELECT IdUsuario, Usuario, Pass FROM usuarios";
			$result = $this->db->query($query);
         	
        	return $result;
		}
		
	}
 ?>