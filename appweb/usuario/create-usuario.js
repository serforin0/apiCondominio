$(document).ready(function(){
	
	$(document).on('click', '.create-usuario-button', function(){
		
		$.getJSON("", function(data){
			
			var create_usuario_html="";
			
			 	create_usuario_html+="<div id='read-produts' class='btn btn-primary pull-right m-b-15px read-products-button'>";
					 create_usuario_html+="<span class='glyphicon glyphicon-list'></span> Read Usuarios";
				create_usuario_html+="</div>";
				
				create_usuario_html+="<form id='create-usuario-form' action='#' method='post' border='0'>";
					create_usuario_html+="<table class='table table-hover table-responsive table-bordered'>";
					
						create_usuario_html+="<tr>";
							create_usuario_html+="<td>Nombre</td>";
							create_usuario_html+="<td><input type='text' name='nombre' class='form-control' required /></td>";
						create_usuario_html+="</tr>";
						
						create_usuario_html+="<tr>";
							create_usuario_html+="<td>Apellido</td>";
							create_usuario_html+="<td><input type='text' name='apellido' class='form-control' required /></td>";
						create_usuario_html+="</tr>";
						
						create_usuario_html+="<tr>";
							create_usuario_html+="<td>Cedula</td>";
							create_usuario_html+="<td><input type='text' name='cedula' class='form-control' required /></td>";
						create_usuario_html+="</tr>";
						
						create_usuario_html+="<tr>";
							create_usuario_html+="<td>Foto</td>";
							create_usuario_html+="<td><input type='text' name='foto' class='form-control' /></td>";
						create_usuario_html+="</tr>";
						
						create_usuario_html+="<tr>";
							create_usuario_html+="<td>Edificio</td>";
							create_usuario_html+="<td><input type='text' name='edificio' class='form-control'/></td>";
						create_usuario_html+="</tr>";
						
						create_usuario_html+="<tr>";
							create_usuario_html+="<td>Numero de apartamento</td>";
							create_usuario_html+="<td><input type='text' name='numero_apartamento' class='form-control' /></td>";
						create_usuario_html+="</tr>";
						
						create_usuario_html+="<tr>";
							create_usuario_html+="<td>Arendamiento</td>";
							create_usuario_html+="<td><input type='text' name='arendamiento' class='form-control' /></td>";
						create_usuario_html+="</tr>";
						
						
						create_usuario_html+="<tr>";
							create_usuario_html+="<td></td>";
							create_usuario_html+="<td>";
								create_usuario_html+="<button type='submit' class='btn btn-primary'>";
									create_usuario_html+="<span class='glyphicon glyphicon-plus'></span> Create Usuario";
								create_usuario_html+="</button>";
							create_usuario_html+="</td>";
						create_usuario_html+="</tr>";
					
					create_usuario_html+="</table>";
				create_usuario_html+="</form>";
			
			$("#page-content").html(create_usuario_html);
			changePageTitle("Crear Usuario");	
		});
		
	});
	
		$(document).on('submit', '#create-usuario-form', function(){
		var form_data=JSON.stringify($(this).serializeObject());
		
		$.ajax({
			url: "",
			type: "POST",
			contentType: 'application/json',
			data: form_data,
			success: function(result){
				showUsuarios();
			},
			error: function(xhr, resp, text) {
				console.log(xhr, resp, text);
			}
		});
		return false;
	});
		
});

