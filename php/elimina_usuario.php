<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL USUARIO

mysql_query("DELETE FROM usuarios WHERE id_usarios = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysql_query("SELECT * FROM usuarios ORDER BY id_usarios DESC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX
echo '<table  bordercolor="white" border="2"  class="table   "  >
        	<tr>
                      <th bgcolor= "#00AF50"   width="300" ><font color="white">DNI</font></th>
                      <th bgcolor= "#00AF50"  width="200"><font color="white">Nombres</font></th>
                      <th bgcolor= "#00AF50"  width="150"><font color="white">Apellidos</font></th>
                      <th bgcolor= "#00AF50"  width="150"><font color="white">Fecha Resgistro</font></th>

                       <th bgcolor= "#00AF50"  width="40"><font color="white">Categoria</font></th>
                      
                      <th bgcolor= "#00AF50"  width="40"><font color="white">Estado</font></th>
                     
                      <th bgcolor= "#00AF50"  width="80"><font color="white">Opciones</font></th>
                  </tr>';
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
              <td bgcolor= "#62B8D9"><font color="black"><b>'.$registro2['dni'].'</b></font></td>
              <td bgcolor= "#62B8D9"><font color="black"><b>'.$registro2['nombres'].'</b></font></td>
              <td bgcolor= "#62B8D9"><font color="black"><b>'.$registro2['apellidos'].'</b></font></td>
              <td bgcolor= "#62B8D9"><font color="black"><b>'.fechaNormal($registro2['fecha_tramite']).'</b></font></td>
               <td bgcolor= "#62B8D9"><font color="black"><b>'.$registro2['nivel'].'</b></font></td>
              <td bgcolor= "#62B8D9"><font color="black"><b>'.($registro2['estado']).'</b></font></td>
            
             
              
              <td align="center" bgcolor= "#90EE90" ><a href="javascript:editarUsuario('.$registro2['id_usarios'].');" class="glyphicon glyphicon-refresh"></a>&nbsp <a href="javascript:eliminarUsuario('.$registro2['id_usarios'].');" class="glyphicon glyphicon-remove-circle"></a></td>
              </tr>';
	}
echo '</table>';
?>