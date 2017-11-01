<?php
	
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
	
	include_once'../config/db.php';
	include_once'../objects/usuarios.php';
	
	$database = new Database();
	$db = $database->getConnection();
	
	
	$usuario = new Usuario($db);
	
	// para obtener datos publicados en los inputs
	$data = json_decode(file_get_contents("php://input"));
	
	$usuario->nombre = $data->nombre;
	$usuario->apellido = $data->apellido;
	$usuario->cedula = $data->cedula;
	$usuario->foto = $data->foto;
	$usuario->edificio = $data->edificio;
	$usuario->numero_apartamento = $data->numero_apartamento;
	$usuario->arendamiento = $data->arendamiento;
	
	if($usuario->crear()){
		echo '{';
			 echo '"message": "el usuario fue creado."';
	    echo '}';
	}
	else{
		
		echo '{';
			 echo '"message": "no puedo crearce el usuario."';
	    echo '}';
		
	}
	
	
	
	