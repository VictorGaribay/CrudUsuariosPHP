<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysql_query("DELETE FROM usuarios WHERE id_usarios = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysql_query("SELECT * FROM usuarios ORDER BY id_usarios DESC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX
echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
        	 			<th width="300">DNI</th>
		                <th width="200">Nombres</th>
		                <th width="150">Apellidos</th>
                 		
		               
                 		 <th width="80">Estado</th>
                 		  <th width="80">Categoria</th>

		                <th width="50">Opciones</th>
            </tr>';
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
		<td>'.$registro2['dni'].'</td>
		<td>'.$registro2['nombres'].'</td>
		<td>'.$registro2['apellidos'].'</td>
		<td>'.$registro2['estado'].'</td>
		<td>'.$registro2['nivel'].'</td>
		


				<td><a href="javascript:editarProducto('.$registro2['id_usarios'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarProducto('.$registro2['id_usarios'].');" class="glyphicon glyphicon-remove-circle"></a></td>
				</tr>';
	}
echo '</table>';
?>