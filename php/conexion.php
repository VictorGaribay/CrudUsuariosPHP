<?php
mysql_connect('localhost','administrador','skapunker1424');



mysql_select_db('brevetes');



function fechaNormal($fecha){
		$nfecha = date('d/m/y',strtotime($fecha));
		return $nfecha;
}




$mysqli = new MySQLi("localhost", "administrador","skapunker1424", "brevetes");
		if ($mysqli -> connect_errno) {
			die( "Fallo la conexión a MySQL: (" . $mysqli -> mysqli_connect_errno() 
				. ") " . $mysqli -> mysqli_connect_error());
		}
?>