$(document).ready(function(){
	showUsuarios();
	
	$(document).on('click', 'read-usuarios-button', function(){
		
	});
});

function showUsuarios(){
	$.getJSON("", function(data){
		
		read_usuarios_html = "";
		
		read_usuarios_html+="<div id='create-usuario' class='btn btn-primary pull-right m-b-15px create-usuario-button'>";
			read_usuarios_html+="<span class='glyphicon glyphicon-plus'></span> Create Usuario";
		read_usuarios_html+="</div>";
		

		//creando una tabla
		read_usuarios_html+="<table class='table table-bordered table-hover'>";
		
			read_usuarios_html+="<tr>";
			read_usuarios_html+="<th class='w-10-pct'>Nombre</th>";
			read_usuarios_html+="<th class='w-10-pct'>Apellido</th>";
			read_usuarios_html+="<th class='w-20-pct'>Edificio</th>";
			read_usuarios_html+="<th class='w-10-pct'>Numero de Apartamento</th>";
			read_usuarios_html+="<th class='w-35-pct text-align-center'>Action</th>";
			read_usuarios_html+="</tr>";
			
			$.each(data.records, function(key, val){
				read_usuarios_html+="<tr>";
					
					read_usuarios_html+="<td>" + val.nombre + "</td>";
					read_usuarios_html+="<td>" + val.apellido + "</td>";
					read_usuarios_html+="<td>" + val.edificio + "</td>";
					read_usuarios_html+="<td>" + val.numero_apartamento + "</td>";
				
					read_usuarios_html+="<td>";
						read_usuarios_html+="<button class='btn btn-primary m-r-10px read-one-usuario-button' data-id='" + val.id + "'>";
							read_usuarios_html+="<span class='glyphicon glyphicon-eye-open'></span> Read";
						read_usuarios_html+="</button>";
					
				
						read_usuarios_html+="<button class='btn btn-info m-r-10px update-usuario-button' data-id='" + val.id + "'>";
							read_usuarios_html+="<span class='glyphicon glyphicon-edit'></span> Edit";
						read_usuarios_html+="</button>";
 
           

            			read_usuarios_html+="<button class='btn btn-danger delete-usuario-button' data-id='" + val.id + "'>";
							read_usuarios_html+="<span class='glyphicon glyphicon-remove'></span> Delete";
						read_usuarios_html+="</button>";

				    read_usuarios_html+="</td>";
				
				read_usuarios_html+="</tr>";
				
			});
			
		read_usuarios_html+="</table>";

		
		$("#page-content").html(read_usuarios_html);
		changePageTitle("Leer Usuarios");
		
			
		
	});
}