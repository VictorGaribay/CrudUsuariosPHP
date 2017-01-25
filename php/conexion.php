<?php
mysql_connect('localhost','root','@llujered4');



mysql_select_db('brevetes');



function fechaNormal($fecha){
		$nfecha = date('d/m/y',strtotime($fecha));
		return $nfecha;
}




$mysqli = new MySQLi("localhost", "root","@llujered4", "brevetes");
		if ($mysqli -> connect_errno) {
			die( "Fallo la conexión a MySQL: (" . $mysqli -> mysqli_connect_errno() 
				. ") " . $mysqli -> mysqli_connect_error());
		}
?>