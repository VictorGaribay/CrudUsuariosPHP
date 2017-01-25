<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tienda</title>
<link href="../css/estilo.css" rel="stylesheet">
<script src="../js/jquery.js"></script>
<script src="../js/myjava.js"></script>
<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap-theme.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>

<?php 
session_start();
if (!isset($_SESSION['id'])) {

  header('location: ../php/perfil.php') ; 
}
?>





</head>
<body   style="background-repeat:no-repeat; padding-top: 20px;
            padding-bottom: 20px;
            background: url(../recursos/fondos.jpg) no-repeat center center fixed; 
            -webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;">

<div  >
 </div>

<div  align="right" style="margin-right: 20px"> <button   type="button" class="btn btn-danger" onclick = "location='../php/logout.php'">Cerrar</button></div>

    <header><IMG SRC="../recursos/drtc.png"></header>
    <section>
    <table border="0" align="center">
        <tr>
            <td width="335"><input type="text" placeholder="Busca un usuario por: Nombre o DNI" id="bs-prod"/></td>
            <td><input type="date" id="bd-desde"/></td>
            <td>Hasta&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td><input type="date" id="bd-hasta"/></td>
            <td width="100"><button id="nuevo-usuario" class="btn btn-primary">Nuevo</button></td>
            <td width="200"><a target="_blank" href="javascript:reportePDF();" class="btn btn-danger">Exportar Busqueda a PDF</a></td>
        </tr>
    </table>
    </section>

    <div class="registros" id="agrega-registros"></div>
    <center>
        <ul class="pagination" id="pagination"></ul>
    </center>
    <!-- MODAL PARA EL REGISTRO DE usuarios-->
    <div class="modal fade" id="registra-usuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>Registra o Edita un Usuario</b></h4>
            </div>
            <form id="formulario" class="formulario" onsubmit="return agregaRegistro();" >
            <div class="modal-body">
                <table border="0" width="100%">
                     <tr>
                        <td colspan="2"><input type="text" required="required" readonly="readonly" id="id-usarios" name="id_usarios" readonly="readonly" style="visibility:hidden; height:5px;"/></td>
                    </tr>
                     <tr>
                        <td width="150">Proceso: </td>
                        <td><input type="text" required="required" readonly="readonly" id="pro" name="pro"/></td>
                    </tr>
                    <tr>
                        <td>DNI: </td>
                        <td><input type="text" required="required" name="dni" id="DNI" maxlength="100"/></td>
                    </tr>

                    <tr>
                        <td>Nombres: </td>
                        <td><input type="text" required="required" name="nombres" id="nombre" maxlength="100"/></td>
                    </tr>
                    <tr>
                        <td>Apellidos: </td>
                        <td><input type="text" required="required" name="apellidos" id="apellido" maxlength="100"/></td>
                    </tr>
                     <tr>
                        <td>Estado: </td>
                        <td><select required="required" name="estado" id="est" >
                        <option value="">Estado</option> 
                               
                                <option value="Pendiente">Pendiente</option>
                                <option value="Entregado">Entregado</option>
                                 <option value="est"></option>
                               
                            </select></td>
                    </tr>
                    
                    <tr>
                        <td>Categoria: </td>
                        <td><select required="required" name="nivel" id="niv">
                                  
                                <option value="">Categoria</option> 
                                <option value="AI">AI</option>
                                <option value="AIIa">AIIa</option>
                                <option value="AIIb">AIIb</option>
                                <option value="AIIIa">AIIIa</option>
                                <option value="AIIIb">AIIIb</option>
                                <option value="AIIIc">AIIIc</option>
                                <option value="niv"></option>
                              
                                            </select>
                        </td>
                    </tr>
                   
                        <td colspan="2">
                            <div id="mensaje"></div>
                        </td>
                    </tr>
                </table>
            </div>
            
            <div class="modal-footer">
                <input type="submit" value="Registrar" class="btn btn-success" id="reg" />
                <input type="submit" value="Editar" class="btn btn-warning"  id="edi"/>
            </div>
            </form>








          </div>
        </div>
      </div>
      

</body>
</html>
