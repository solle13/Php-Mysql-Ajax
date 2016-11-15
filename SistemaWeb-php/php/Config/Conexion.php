<?php  
require_once "../Config/PropiedadesDB.php"; 

class Conexion{ 
    protected $db; 

    public function __construct(){ 
        $this ->db = new mysqli(host, user, pass, db); 
        if ( $this ->db->connect_errno ){ 
            echo "Fallo al conectar a MySQL: ". $this ->db ->connect_error; 
            return;     
        } 
        $this ->db ->set_charset('DB_CHARSET'); 
    } 
    public function __destruct() {
        $this ->CloseDB();
        }
    public function CloseDB() {
        $this->db->close();
        }
} 
?> 