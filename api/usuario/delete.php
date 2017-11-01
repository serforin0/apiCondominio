<?php
	
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../objects/Usuarios.php';

$database = new Database();
$db = $database->getConnection();

$usuario = new Usuario();

$data = json_decode(file_get_contents("php://input"));

$usuario->id = $data->id;

if($usuario->delete()){
	echo '{';
        echo '"message": "Este Usuario fue eliminido."';
    echo '}';
}else {
	echo '{';
        echo '"message": "No se pudo eliminar este usuario."';
    echo '}';
}

?>
 