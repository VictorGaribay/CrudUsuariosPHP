<?php
include('conexion.php');
$id = $_POST['id_usarios'];
$proceso = $_POST['pro'];
$dni = $_POST['dni'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];

$fecha = date('Y-m-d');
$estado = $_POST['estado'];
$nivel = $_POST['nivel'];



/*
if (!isset($_SESSION)) {
session_start();
}*/
//VERIFICAMOS EL PROCESO

switch($proceso){
	case 'Registro':
		mysql_query("INSERT INTO usuarios (dni, nombres, apellidos, fecha_tramite, estado, nivel)VALUES('$dni','$nombres','$apellidos','$fecha', '$estado','$nivel')");
	break;
	
	case 'Edicion':
		mysql_query("UPDATE usuarios SET dni='$dni', nombres = '$nombres', apellidos = '$apellidos', fecha_tramite = '$fecha', estado='$estado', nivel = '$nivel' WHERE id_usarios = '$id' ");
	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS




//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

 $consulta = mysql_query("SELECT * FROM usuarios ORDER BY id_usarios DESC");


if($consulta === FALSE) { 
    die(mysql_error()); // TODO: better error handling
}
?>

<table  bordercolor="white" border="2"  class="table   ">
			<thead>
				<tr>
					
					<th bgcolor= "#00AF50" width="300"><font color="white">DNI</font></th>
                <th width="200" bgcolor= "#00AF50"><font color="white">Nombres</font></th>
                <th width="150" bgcolor= "#00AF50"><font color="white">Apellidos</font></th>
                <th  width="150" bgcolor= "#00AF50"><font color="white">Fecha tramite</font></th>
                <th width="50" bgcolor= "#00AF50"><font color="white">Estado</font></th>
                <th width="100" bgcolor= "#00AF50"><font color="white">Categoria</font></th>
                
				<th width="50"  bgcolor= "#00AF50"><font color="white">Opciones</font></th>
				</tr>
			</thead>
			<tbody >
			<?php while ($registro2 = mysql_fetch_array($consulta)) { ?>
				<tr>
					
					<td bgcolor= "#62B8D9"><font color="black"><b><?php echo $registro2['dni']; ?></b></font></td>
					<td bgcolor= "#62B8D9"><font color="black"><b><?php echo $registro2['nombres']; ?></b></font></td>
					<td bgcolor= "#62B8D9"><font color="black"><b><?php echo $registro2['apellidos']; ?></b></font></td>
					<td bgcolor= "#62B8D9"><font color="black"><b><?php echo fechaNormal($registro2['fecha_tramite']); ?></b></font></td>
					<td bgcolor= "#62B8D9"><font color="black"><b><?php echo $registro2['nivel']; ?></b></font></td>
					<td bgcolor= "#62B8D9"><font color="black"><b><?php echo $registro2['estado']; ?></b></font></td>
					<td bgcolor= "#90EE90" align="center"><font color="black"><b></b></font><?php echo '
					<a href="javascript:editarUsuario('.$registro2['id_usarios'].');" class="glyphicon glyphicon-refresh"></a>&nbsp <a href="javascript:eliminarUsuario('.$registro2['id_usarios'].');" class="glyphicon glyphicon-remove-circle"></a>
					' ?> </td> 	
				</tr>
			<?php  } ?>
			</tbody>
		</table>
