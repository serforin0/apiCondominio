<?php
	
	  error_reporting(E_ALL);

	header("Access-Control-Allow-Origin: *");
	header("Conten-Type: application/json; charset=UTF-8");
	
	
	include_once'../config/db.php';
	include_once'../objects/usuarios.php';
	
	$database = new Database();
	$db = $database->getConnection();
	
	
	$usuario = new Usuario($db);
	
	$stmt = $usuario->leer();
	$num = $stmt->rowCount();
	
		
	
	if($num>0){
		
		$usuarios_arr = array();
		$usuarios_arr["records"]=array();
		
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			extract($row);
			
			$usuario_item=array(
				"id"=>$id,
				"nombre"=>$nombre,
				"apellido"=>$apellido,
				"edificio"=>$edificio,
				"numero_apartamento"=>$numero_apartamento,
			);
			array_push($usuarios_arr["records"], $usuario_item);
		}
		echo json_encode($usuarios_arr);
	}else{
		echo("no funciona");
	}

	
?>