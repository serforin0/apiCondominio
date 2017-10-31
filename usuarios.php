<?php
	
	class Usuario{
		private $conn;
		private $table_name = "Usuario";
		
		public $id;
		public $nombre;
		public $apellido;
		public $cedula;
		public $foto;
		public $edificio;
		public $numero_apartamento;
		public $arendamiento;
		
		public function __construct($db){
			$this->conn = $db;
		}
		
		function leer(){
			$query = "SELECT id, nombre, apellido, edificio, numero_apartamento FROM Usuario";
			
			//preparacion del query
			$stmt =$this->conn->prepare($query);
			
			//ejecutando query
			$stmt-> execute();
			
			return $stmt;
		}
	}