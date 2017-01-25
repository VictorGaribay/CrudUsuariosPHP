<?php
include('conexion.php');

$desde = $_POST['desde'];
$hasta = $_POST['hasta'];

//COMPROBAMOS QUE LAS FECHAS EXISTAN
if(isset($desde)==false){
	$desde = $hasta;
}

if(isset($hasta)==false){
	$hasta = $desde;
}

//EJECUTAMOS LA CONSULTA DE BUSQUEDA
$registro = mysql_query("SELECT * FROM usuarios WHERE fecha_tramite BETWEEN '$desde' AND '$hasta' ORDER BY id_usarios ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table  bordercolor="white" border="2"  class="table   "  >
        	<tr>
                      <th bgcolor= "#00AF50"   width="300" ><font color="white">DNI</font></th>
                      <th bgcolor= "#00AF50"  width="200"><font color="white">Nombres</font></th>
                      <th bgcolor= "#00AF50"  width="150"><font color="white">Apellidos</font></th>
                      <th bgcolor= "#00AF50"  width="150"><font color="white">Fecha Resgistro</font></th>

                       <th bgcolor= "#00AF50"  width="40"><font color="white">Categoria</font></th>
                      
                      <th bgcolor= "#00AF50"  width="40"><font color="white">Estado</font></th>
                     
                      
                  </tr>';
if(mysql_num_rows($registro)>0){
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
              <td bgcolor= "#62B8D9"><font color="black"><b>'.$registro2['dni'].'</b></font></td>
              <td bgcolor= "#62B8D9"><font color="black"><b>'.$registro2['nombres'].'</b></font></td>
              <td bgcolor= "#62B8D9"><font color="black"><b>'.$registro2['apellidos'].'</b></font></td>
              <td bgcolor= "#62B8D9"><font color="black"><b>'.fechaNormal($registro2['fecha_tramite']).'</b></font></td>
               <td bgcolor= "#62B8D9"><font color="black"><b>'.$registro2['nivel'].'</b></font></td>
              <td bgcolor= "#62B8D9"><font color="black"><b>'.($registro2['estado']).'</b></font></td>
            
             
              
              
              </tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>