<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO


 


$valores = mysql_query("SELECT * FROM usuarios WHERE id_usarios = '$id'");
$valores2 = mysql_fetch_array($valores);

$datos = array(
				0 => $valores2['dni'], 
				1 => $valores2['nombres'], 
				2 => $valores2['apellidos'], 
				3 => $valores2['estado'],
				4 => $valores2['nivel'],

				);
echo json_encode($datos);
?>