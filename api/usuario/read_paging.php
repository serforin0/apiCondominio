<?php
	
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	
	include_once '../config/core.php';
	include_once '../shared/utilities.php';
	include_once '../config/db.php';
	include_once '../objects/usuarios.php';
	
	
	$utilities = new Utilities();
	
	$database = new Database();
	$db = $database->getConnection();
	
	$usuario = new Usuario($db);
	
	$stmt = $usuario->readPaging($from_record_num, $records_per_page);
	$num = $stmt->rowCount();
	
	if($num>0){
		
		$usuario_arr=array();
		$usuario_arr["records"]=array();
		$usuario_arr["paging"]=array();
		
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			
			extract($row);
			
				$usuario_item = array(
					"id" => $id,
					"nombre" => $nombre,
					"apellido" => $apellido,
					"cedula" =>$cedula,
					"foto" =>$foto,
					"edificio" =>$edificio,
					"numero_apartamento" =>$numero_apartamento,
					"arendamiento" =>$arendamiento	
				);
				array_push($usuario_arr["records"], $usuario_item);
		}
		
		$total_rows=$usuario->count();
		$page_url="{$home_url}usuario/read_paging.php?";
		$paging=$utilities->getPaging($page, $total_rows, $records_per_page, $page_url);
		$usuario_arr["paging"]=$paging;
		
		echo json_encode($usuario_arr);
	}else {
		echo json_encode(
			array("message" => " no se encontraron usuarios.")
		);
	}
	
?>
	
	
	
	
