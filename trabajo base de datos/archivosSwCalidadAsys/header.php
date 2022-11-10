<?php
include_once('db.php');
?>


<nav class="navbar navbar-default">
     <div class="collapse navbar-collapse" id="collapse1">
      <table border="0" align="center" width="100%">
        <tr bgcolor="black">
<td align="center"><font color="white">SISTEMA DE RASTREO DE CONTENEDORES</font></td>
<td><font color="white">&nbsp;<span class='glyphicon glyphicon-earphone' aria-hidden='true'></span>&nbsp;&nbsp;+57(4) 322 9074 – 557 9871</td>
<td><font color="white">&nbsp;<span class='glyphicon glyphicon-envelope' aria-hidden='true'></span>&nbsp;&nbsp;admin@alx.com.co</td>
<td><font color="white">&nbsp;<span class='glyphicon glyphicon-time' aria-hidden='true'></span>&nbsp;&nbsp;Lun — Vie: 8AM — 5PM</td>
<td align="center"><img src="images/logot.png" width="60%"></td>
        </tr>
      </table>
    </div>
</nav>

<nav class="navbar navbar-default">
  <div class="container"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
       </div>

    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
    <li ><a href="<?php echo "listarbl.php?cod=$cod&u=$u"; ?>"><span class='glyphicon glyphicon-home' aria-hidden='true'></span>
    <span class="sr-only">(current)</span></a></li>
    <li ><a href="<?php echo "cliente.php?cod=$cod&u=$u";?>"><span class='glyphicon glyphicon-user text-dark' aria-hidden='true'></span>
    Ingresar Cliente</a></li>
    <li ><a href="<?php echo "bl.php?cod=$cod&u=$u";?>"><span class='glyphicon glyphicon-save-file' aria-hidden='true'></span>
    	Ingresar BL</a></li>
    <li ><a href="<?php echo "consultabl.php?cod=$cod&u=$u";?>"><span class='glyphicon glyphicon-search text-dark' aria-hidden='true'></span>
    	Consultar BL</a></li>
    <li ><a href="<?php echo "listarbl.php?cod=$cod&u=$u";?>"><span class='glyphicon glyphicon-th-list text-dark' aria-hidden='true'></span>
      Listar todos los BL</a></li>
    
      <li ><a href="<?php echo "pricing.php?cod=$cod&u=$u";?>"><span class='glyphicon glyphicon-save-file' aria-hidden='true'></span>
      Ingresar Tarifa</a></li>

      <li ><a href="<?php echo "listarpricing.php?cod=$cod&u=$u";?>"><span class='glyphicon glyphicon-th-list text-dark' aria-hidden='true'></span>
      Listar Tarifas</a></li>

       <li ><a href="<?php echo "salir.php?cod=$cod&u=$u";?> "><span class='glyphicon glyphicon-off text-dark' aria-hidden='true'></span>Salir del Sistema - <span class='glyphicon glyphicon-user' aria-hidden='true'></span>&nbsp;<?php echo"$u";?></a></li>


       
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>

