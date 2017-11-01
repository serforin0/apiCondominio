<?php
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: access");
	header("Access-Control-Allow-Methods: GET");
	header("Access-Control-Allow-Credentials: true");
	header('Content-Type: application/json');
	
	//incluyendo la base de datos y el objeto que usaremos
	include_once '../config/db.php';
	include_once '../objects/usuarios.php';
	
	$database = new Database();
	$db = $database->getConnection();
	
	$usuario = new Usuario($db);
	
	// consiguiendo el id del usuario a editar
	$usuario->id = isset($_GET['id']) ? $_GET['id'] : die();
	
	$usuario->leerUno();
	
	//creando array
	$usuario_arr = array(
		"id" => $usuario->id,
		"nombre" => $usuario->nombre,
		"apellido" => $usuario->apellido,
		"cedula" =>$usuario->cedula,
		"foto" =>$usuario->foto,
		"edificio" =>$usuario->edificio,
		"numero_apartamento" =>$usuario->numero_apartamento,
		"arendamiento" =>$usuario->arendamiento	
	);
	
	print_r(json_encode($usuario_arr));
?>
	