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
		
		function crear(){
			$query = "INSERT INTO
						" . $this->table_name ."
					SET
					nombre=:nombre, apellido=:apellido, cedula=:cedula, foto=:foto, edificio=:edificio, numero_apartamento=:numero_apartamento, arendamiento=:arendamiento";
					
			$stmt = $this->conn->prepare($query);
			
			$this->nombre=htmlspecialchars(strip_tags($this->nombre));
			$this->apellido=htmlspecialchars(strip_tags($this->apellido));
			$this->cedula=htmlspecialchars(strip_tags($this->cedula));
			$this->foto=htmlspecialchars(strip_tags($this->foto));
			$this->edificio=htmlspecialchars(strip_tags($this->edificio));
			$this->numero_apartamento=htmlspecialchars(strip_tags($this->numero_apartamento));
			$this->arendamiento=htmlspecialchars(strip_tags($this->arendamiento));
			
			$stmt->bindParam(":nombre", $this->nombre);
			$stmt->bindParam(":apellido", $this->apellido);
			$stmt->bindParam(":cedula", $this->cedula);
			$stmt->bindParam(":foto", $this->foto);
			$stmt->bindParam(":edificio", $this->edificio);
			$stmt->bindParam(":numero_apartamento", $this->numero_apartamento);
			$stmt->bindParam(":arendamiento", $this->arendamiento);
			
			if($stmt->execute()){
				return true;
			}else{
				return false;
			}
			
			
		}
		
		
		function leerUno(){
			
			$query = "SELECT
						 id, nombre, apellido, cedula, foto, edificio, numero_apartamento, arendamiento  
					FROM ".  $this->table_name. " 
					WHERE 
						id = ? 
					LIMIT 
						0,1";
			
			$stmt = $this->conn->prepare( $query );
			
			$stmt->bindParam(1, $this->id);
			
			$stmt->execute();
			
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			
			$this->nombre = $row['nombre'];
			$this->apellido = $row['apellido'];
			$this->cedula = $row['cedula'];
			$this->foto = $row['foto'];
			$this->edificio = $row['edificio'];
			$this->numero_apartamento = $row['numero_apartamento'];
			$this->arentamiento = $row['arentamiento'];
			
			
		}
		
		
		function update(){
			$query = "UPDATE ". $this->table_name. "SET 
						nombre = :nombre,
						apellido= :apellido,
						cedula= :cedula,
						foto= :foto,
						edificio= :edificio,
						numero_apartamento= :numero_apartamento,
						arentamiento= :arentamiento
					WHERE id = :id";
			$stmt = $this->conn->prepare($query);
			
			$this->nombre=htmlspecialchars(strip_tags($this->nombre));
			$this->apellido=htmlspecialchars(strip_tags($this->apellido));
			$this->cedula=htmlspecialchars(strip_tags($this->cedula)); 
			$this->foto=htmlspecialchars(strip_tags($this->foto));
			$this->edificio=htmlspecialchars(strip_tags($this->edificio));
			$this->numero_apartamento=htmlspecialchars(strip_tags($this->numero_apartamento));
			$this->arendamiento=htmlspecialchars(strip_tags($this->arendamiento));
			
			$stmt->bindParam(':nombre', $this->nombre);
			$stmt->bindParam(':apellido', $this->apellido);
			$stmt->bindParam(':cedula', $this->cedula);
			$stmt->bindParam(':foto', $this->foto);
			$stmt->bindParam(':edificio', $this->edificio);
			$stmt->bindParam(':numero_apartamento', $this->numero_apartamento);
			$stmt->bindParam(':arendamiento', $this->arendamiento);
			
			if($stmt->execute()){
				return true;
			}else{
				return false;
			}
		}
		
		function delete(){
			$query = "DELETE FROM ".$this->table_name. "WHERE id = ?";
			
			$stmt = $this->conn->prepare($query);
			
			$this->id=htmlspecialchars(strip_tags($this->id));
			
			$stmt->bindParam(1, $this->id);
			
			if($stmt-execute()){
				return true;
			}
			return false;
		}
		
		function search($keywords){
			$query = "SELECT id, nombre, apellido, cedula, foto, edificio FROM ".$this->table_name. " WHERE nombre LIKE ? 						OR apellido LIKE ? OR cedula LIKE ? ORDER BY nombre DESC";
			 		  
			$stmt = $this->conn->prepare($query);
			
			$keywords=htmlspecialchars(strip_tags($keywords));
			$keywords = "%{$keywords}%";
			
			$stmt->bindParam(1, $keywords);
			$stmt->bindParam(2, $keywords);
			$stmt->bindParam(3, $keywords);
			
			$stmt->execute();
			
			return $stmt;
			
		}
		
		public function readPaging($from_record_num, $records_per_page){
				$query = "SELECT
						 id, nombre, apellido, cedula, foto, edificio, numero_apartamento, arendamiento  
					FROM ".  $this->table_name. " ORDER BY nombre DESC LIMIT ?, ?";
					
					$stmt = $this->conn->prepare($query);
					
					$stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
					$stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);
					
					$stmt->execute();
					
					return $stmt;
		}
		
		public function count(){
			$query = "SELECT COUNT(*) as total_rows FROM ". $this->table_name. "";
			
			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			
			return $row['total_rows'];
		}
	}