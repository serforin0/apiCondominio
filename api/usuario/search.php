<?php
	header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../config/db.php';
    include_once'../objects/usuarios.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $usuario =  new Usuario($db);
    
    $keywords=isset($_GET["s"]) ? $_GET["s"] : "";
    
    $stmt = $usuario->search($keywords);
    $num = $stmt->rowCount();
    
    if($num>0){
	    
	    $usuario_arr=array();
	    $usuario_arr["records"]=array();
	    
	    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		    extract($row);
		    
		    $usuario_item=array(
			    "id"=> $id,
				"nombre"=> $nombre,
				"apellido"=>$apellido,
				"edificio"=>$edificio,
				"numero_apartamento"=>$numero_apartamento
		    );
		    array_push($usuario_arr["records"], $usuario_item);
	    }
	    
	    echo json_encode($usuario_arr);
	    
    }
    else { 
	    echo json_encode(
	    	array("mensaje" => "Usuario no enocnrado.")
	    	);
    }
    
?>