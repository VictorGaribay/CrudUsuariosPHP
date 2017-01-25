<?php
  include('conexion.php');
  $paginaActual = $_POST['partida'];

    $nroUsuarios = mysql_num_rows(mysql_query("SELECT * FROM usuarios"));
    $nroLotes = 50;
    $nroPaginas = ceil($nroUsuarios/$nroLotes);
    $lista = '';
    $tabla = '';

    if($paginaActual > 1){
        $lista = $lista.'<li><a href="javascript:pagination('.($paginaActual-1).');">Anterior</a></li>';
    }
    for($i=1; $i<=$nroPaginas; $i++){
        if($i == $paginaActual){
            $lista = $lista.'<li class="active"><a href="javascript:pagination('.$i.');">'.$i.'</a></li>';
        }else{
            $lista = $lista.'<li><a href="javascript:pagination('.$i.');">'.$i.'</a></li>';
        }
    }
    if($paginaActual < $nroPaginas){
        $lista = $lista.'<li><a href="javascript:pagination('.($paginaActual+1).');">Siguiente</a></li>';
    }
  
    if($paginaActual <= 1){
      $limit = 0;
    }else{
      $limit = $nroLotes*($paginaActual-1);
    }

    $registro = mysql_query("SELECT * FROM usuarios ORDER BY id_usarios DESC LIMIT $limit, $nroLotes ");



if($registro === FALSE) { 
    die(mysql_error()); // TODO: better error handling
}


    $tabla = $tabla.'<table  bordercolor="white" border="2"  class="table   " >
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
    $tabla = $tabla.'<tr>
              <td bgcolor= "#62B8D9"><font color="black"><b>'.$registro2['dni'].'</b></font></td>
              <td bgcolor= "#62B8D9"><font color="black"><b>'.$registro2['nombres'].'</b></font></td>
              <td bgcolor= "#62B8D9"><font color="black"><b>'.$registro2['apellidos'].'</b></font></td>
              <td bgcolor= "#62B8D9"><font color="black"><b>'.fechaNormal($registro2['fecha_tramite']).'</b></font></td>
               <td bgcolor= "#62B8D9"><font color="black"><b>'.$registro2['nivel'].'</b></font></td>
              <td bgcolor= "#62B8D9"><font color="black"><b>'.($registro2['estado']).'</b></font></td>
            
             



              
              <td align="center" bgcolor= "#90EE90" ><a href="javascript:editarUsuario('.$registro2['id_usarios'].');" class="glyphicon glyphicon-refresh"></a>&nbsp <a href="javascript:eliminarUsuario('.$registro2['id_usarios'].');" class="glyphicon glyphicon-remove-circle"></a></td>
              </tr>';   
  }
        

    $tabla = $tabla.'</table>';




    $array = array(0 => $tabla,
             1 => $lista);

    echo json_encode($array);


if($registro2 === FALSE) { 
    die(mysql_error()); // TODO: better error handling
}

?>