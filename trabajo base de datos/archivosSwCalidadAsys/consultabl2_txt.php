<?php
	session_start();
	include_once('db.php');
	if(!empty($_GET["bl"])){
		$id_bl=$_GET["bl"];
	}
	else {
		$id_bl=$_POST["bl"];
	}

 ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Consultar BL</title>
		<link  rel="icon"   href="images/favicon.png" type="image/png" />

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="js/bootstrap.min.js"></script>
		
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!--Para los íconos desde fontawesome.com-->
        <script src="https://kit.fontawesome.com/2c36e9b7b1.js"></script>

        <!--Scripts para hacer los select con búsqueda-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">

		<!--fin scripts select-->
		<!--Estilo para que el select del modal salga completo-->
		<style type="text/css">
			.chosen-container{
			  width: 100% !important;
			}
		</style>


    </head>

	<body>
		<?php include 'header.php'; ?>

	
			<!-- consulta sql datos básicos BL -->
			<?php
			$conectar=conn(); //ejecuta las conexiones a la b.d.
			$id_estado=0;
			$sql="SELECT puertos.nombre_puerto,puertos.id_puerto,paises.nombre_pais,paises.iso2 FROM bl LEFT JOIN puertos ON bl.id_puerto_origen_bl = puertos.id_puerto LEFT JOIN paises ON puertos.id_pais_puerto=paises.id_pais where bl.id_bl='$id_bl'";
			$resul = mysqli_query($conectar , $sql);
			$total = mysqli_num_rows($resul);

			if($total==0){	
				echo"<div class='container theme-showcase' role='main'><div class='page-header'>";		
				echo "<div class='alert alert-danger' role='alert'>";
				echo "<span class='glyphicon glyphicon-warning-sign fa-2x text-danger' aria-hidden='true'></span>";
				echo " &nbsp;&nbsp;<b>EL BL DIGITADO: $id_bl NO EXISTE </b></div></div></div>";
			}
			else { //Hace todo lo demás

				while($row_total=mysqli_fetch_assoc($resul)){
					$pol=$row_total['nombre_puerto'];
					$paiso=$row_total['nombre_pais'];
					$iso1=$row_total['iso2'];
					$id_pol=$row_total['id_puerto'];
				}

				$sql="SELECT bl.id_bl,bl.id_mbl,bl.id_estadobl_bl,bl.eta_bl,bl.id_agente_carga_bl,agentes_carga.nombre_agente_carga,clientes.nombre_cliente,clientes.id_cliente,clientes.apellidos_cliente,clientes.correo_cliente,bl.size,puertos.nombre_puerto,puertos.id_puerto,tipo_contenedor.nombre_tipo_contenedor,tipo_contenedor.id_tipo_contenedor,paises.nombre_pais,paises.iso2,agentes_carga.tracking_agente_carga,estados_bl.nombre_estado_bl FROM bl LEFT JOIN puertos ON bl.id_puerto_destino_bl=puertos.id_puerto LEFT JOIN tipo_contenedor on bl.tipo_contenedor_bl=tipo_contenedor.id_tipo_contenedor LEFT JOIN paises on puertos.id_pais_puerto=paises.id_pais LEFT JOIN clientes ON bl.id_cliente_bl=clientes.id_cliente LEFT JOIN estados_bl ON bl.id_estadobl_bl=estados_bl.id_estado_bl LEFT JOIN agentes_carga ON bl.id_agente_carga_bl=agentes_carga.id_agente_carga where bl.id_bl='$id_bl'";

				$resul = mysqli_query($conectar , $sql);
				$total = mysqli_num_rows($resul);

				while($row_total=mysqli_fetch_assoc($resul)){
					$id_agente=$row_total['id_agente_carga_bl'];
					$agente=$row_total['nombre_agente_carga'];
					$mbl=$row_total['id_mbl'];
					$correo_cliente=$row_total['correo_cliente'];

					$pod=$row_total['nombre_puerto'];
					$id_pod=$row_total['id_puerto'];
					$tipo=$row_total['nombre_tipo_contenedor'];
					$paisd=$row_total['nombre_pais'];
					$size=$row_total['size'];
					$tp=$row_total['id_tipo_contenedor'];
					$iso2=$row_total['iso2'];
					$nombre=$row_total['nombre_cliente'];
					$apellidos=$row_total['apellidos_cliente'];
					$id_cliente=$row_total['id_cliente'];
					$eta=$row_total['eta_bl'];
					$tracking_agente=$row_total['tracking_agente_carga'];
					$nombre_estado_bl=$row_total['nombre_estado_bl'];
					$id_estadobl=$row_total['id_estadobl_bl'];
				}


				?> 

				<!--Ventana emergente MODAL-->
				<div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title" id="myModalLabel">Estados del Contenedor</h4>
							</div>
							<div class="modal-body">
								<!--Cuerpo del modal-->
								<form class="form-horizontal" name="form" method="POST" action="<?php echo "addtrackbl.php?cod=$cod&u=$u";?>">
								<?php
									$sql="select puertos.nombre_puerto,puertos.id_puerto,paises.nombre_pais from puertos LEFT JOIN paises ON puertos.id_pais_puerto = paises.id_pais order by nombre_pais ASC, nombre_puerto ASC";
									$resul = mysqli_query($conectar , $sql);
									$total = mysqli_num_rows($resul);
								?>

						<table class="table" border="0" width="60%" align="center">
							<tr>
								<td>	
									<label for="inputEmail3" class="col-sm-2 control-label"> 
										Puerto:
									</label>
								</td>
								<td>
								 <select class="form-control chosen" aria-label="puerto" name="puerto" placeholder="puerto" required>
			                        <option selected>Seleccione el Puerto donde se encuentra</option>
			                            <?php
			                                while($row_total=mysqli_fetch_assoc($resul)){

												$id_puerto=$row_total['id_puerto'];
												$nombre_pais=$row_total["nombre_pais"];
												$nombre_puerto=$row_total["nombre_puerto"];

									 			echo "<option value=".$id_puerto.">".$nombre_pais." - ".$nombre_puerto."</option>"; 
									 		}
									 	?>
						    	 </select>
					    		</td>
							</tr>
					    	<tr>
					    		<td>
					    			<label for="inputEmail3" class="col-sm-2 control-label">
					    				Fecha:
					    			</label>
					    		</td>
					    		<td><input class="form-control input-sm" type="date" id="fecha" name="fecha"></td>
					    	</tr>
					    	<tr>
								<td>	
									<label for="inputEmail3" class="col-sm-2 control-label"> 
										Estado:
									</label>
								</td>

								<?php
									$sql="SELECT * FROM movimientos_contenedor";
									$resul = mysqli_query($conectar , $sql);
									$total = mysqli_num_rows($resul);
								?>

								<td>
								 <select class="form-control chosen" aria-label="estado" name="estado" placeholder="estado" required>
			                        <option selected>Seleccione el nuevo estado</option>
			                            <?php
			                                while($row_total=mysqli_fetch_assoc($resul)){
												$id_mov=$row_total['id_movimiento'];
												$nombre_mov=$row_total["nombre_movimiento"];
									 			echo "<option value=".$id_mov.">".$nombre_mov."</option>"; 
									 		}
									 	?>
						    	 </select>
					    		</td>
							</tr>
							<tr>
								<td colspan="2"><input class="btn btn-success" type="submit" value="Agregar"></td>
							</tr>



						</table>						

								<input type="hidden" name="bl" value="<?php echo $id_bl; ?>" />

								</form>
							</div>
						</div>
					</div>
				</div>
				<!--Fin Modal-->

				<!--Ventana emergente modal #2-->



				

				<!--Inicio elementos contenedor-->

				<div class="container theme-showcase" role="main">
					<div class="page-header">
						<h1><img src="images/logot.png" width="8%"><?php echo $id_bl; ?> &nbsp;&nbsp;
						<p>

						<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#miModal">
							Agregar nuevo estado del Contenedor
						</button>
						&nbsp;
						<a href="<?php echo "editarbl.php?bl=$id_bl&cod=$cod&u=$u&pol=$pol&paiso=$paiso&iso1=$iso1&id_pol=$id_pol&pod=$pod&paisd=$paisd&iso2=$iso2&id_pod=$id_pod&tipo=$tipo&tp=$tp&size=$size&agente=$agente&id_agente=$id_agente&id_cliente=$id_cliente&nombre=$nombre&apellidos=$apellidos"; ?>" class="btn btn-primary btn-lg" role="button" aria-pressed="true">Editar BL <?php echo $id_bl; ?></a>

						&nbsp;
						<?php 

						if ($tracking_agente==''){
							//No hace nada porque no hay dirección de tracking disponible en la b.d.
						}
						else{
							echo"<a href='$tracking_agente' target='_blank' class='btn btn-primary btn-lg' role='button' aria-pressed='true'>Consultar Naviera $agente</a>";	
						}

						?>


						</h1>
						<hr>
						<?php
						echo "<table border='0'><tr>";
						echo "<td><i class='fas fa-ship'></i>&nbsp;<b><font color='darkblue'>Puerto Origen:</td>";
						echo "<td></font></b>"; 
						echo "<img src='https://flagcdn.com/24x18/".$iso1.".png'>&nbsp;&nbsp;$pol - $paiso</td></tr>";
						echo "<tr><td><i class='fas fa-ship'></i>&nbsp;<b><font color='darkblue'>Puerto Destino:</td>";
						echo "<td></font></b>";
						echo "<img src='https://flagcdn.com/24x18/".$iso2.".png'>&nbsp;&nbsp;$pod - $paisd</td></tr>";
						echo "<tr><td><span class='glyphicon glyphicon-th-large' aria-hidden='true'></span>&nbsp;<b><font color='darkblue'>Tipo de Contenedor:</font>&nbsp;</b></td>";
						echo "<td>$tipo&nbsp;<img src='images/cont/".$tp.".png'></td></tr>";
						echo "<tr><td><span class='glyphicon glyphicon-fullscreen' aria-hidden='true'></span>&nbsp;<b><font color='darkblue'>Tama&ntilde;o de Contenedor:</font>&nbsp;</b></td><td>$size PIES</td></tr>";
						echo "<tr><td><span class='glyphicon glyphicon-user' aria-hidden='true'></span>&nbsp;<b><font color='darkblue'>Cliente:</td></font>&nbsp;</b>";
						echo "<td>$nombre $apellidos</td></tr>";
						echo "<tr><td><span class='glyphicon glyphicon-time' aria-hidden='true'></span>&nbsp;<b><font color='darkblue'>Fecha estimada Llegada:</font>&nbsp;</b></td>";

							if ($eta=='0000-00-00'){
								echo "<td><font color='red'>Pendiente</font></td></tr>";
							}
							else {
								$eta = date("D, M j - Y", strtotime($eta));
								echo "<td><b>$eta</b></td></tr>";
							}
						echo "<tr><td><span class='glyphicon glyphicon-file' aria-hidden='true'></span>&nbsp;<b><font color='darkblue'>Master BL:</td></font>&nbsp;</b>";
						echo "<td>$mbl</td></tr>";

						//agente de carga
						echo "<tr><td><span class='glyphicon glyphicon-flag' aria-hidden='true'></span>&nbsp;<b><font color='darkblue'>Naviera:</td></font>&nbsp;</b>";
						echo "<td>$agente</td></tr>";
						//Estado del bl
						echo "<tr><td><span class='glyphicon glyphicon-file' aria-hidden='true'></span>&nbsp;<b><font color='darkblue'>Estado BL:</td></font>&nbsp;</b>";
						echo "<td>$nombre_estado_bl ";
						
						if ($id_estadobl=='2'){ //Si el estado es cerrado entonces se puede mostrar el link para archivar
							echo "<a href='archivarbl.php?bl=$id_bl&cod=$cod&u=$u'>[ Archivar ]</a></td></tr>";	
						}else{ //Sino, simplemente no se muestra nada
							echo "</tr>";
						}

						//Envío del correo

						

						echo "<tr><td><span class='glyphicon glyphicon-envelope' aria-hidden='true'></span>&nbsp;<b><font color='darkblue'>Correo:</td></font>&nbsp;</b>";
						//echo "<td><a href='mail.php?bl=$id_bl' target='_blank'>Enviar informe al cliente</a>";
						echo "<td><a href='javascript:msgx(\"mail.php?bl=$id_bl\",\"¿Seguro desea enviar el correo al cliente?\");' >Enviar informe al cliente</a>";
						echo " $correo_cliente </td></tr>";

					    echo "</table>";

						//Texto para mensaje de alerta
						echo "<script>";
						echo "function msg(url,txt) {";
						echo "var resultado = window.confirm(txt);";
						echo "if (resultado === true) {";
						echo "window.location.replace(url);";	
						echo "} else { ";
						echo " } }</script>";

						echo "<script>";
						echo "function msgx(url,txt) {";
						echo "var resultado = window.confirm(txt);";
						echo "if (resultado === true) {";
						echo "window.open(url, '_blank');";	
						echo "} else { ";
						echo " } }</script>";

						?>


					</div>
					<!--Información de los movimientos del contenedor-->

				<table class="table">
  					<thead class="thead-dark">
						<tr class="active">
							<th scope="col"></th><th scope="col">Fecha</th><th scope="col">Estado</th><th scope="col">Puerto</th>
							<th scope="col"></th>
						</tr>
					</thead>
					<tbody>

							<!--Se consulta la b.d. con los estados y se carga -->


							<?php

$sql="SELECT estados_contenedor.fecha,estados_contenedor.id_estado_contenedor,paises.iso2,movimientos_contenedor.id_movimiento,movimientos_contenedor.nombre_movimiento,puertos.nombre_puerto,puertos.enlace_puerto,puertos.id_puerto,paises.nombre_pais FROM estados_contenedor LEFT JOIN movimientos_contenedor on estados_contenedor.id_movimiento_estado_contenedor=movimientos_contenedor.id_movimiento LEFT JOIN puertos on estados_contenedor.id_puerto_estado_contenedor=puertos.id_puerto LEFT JOIN paises on puertos.id_pais_puerto=paises.id_pais WHERE id_bl__estado_contenedor='$id_bl' ORDER BY fecha ASC";
								$resul = mysqli_query($conectar , $sql);
								$total = mysqli_num_rows($resul);
								$i=0;

								while($row_total=mysqli_fetch_assoc($resul)){
									$i=$i+1;
									$id_estado=$row_total['id_estado_contenedor'];
									$fecha=$row_total['fecha'];
									$fecha1 = date("D, M j - Y", strtotime($fecha));
									$enlace_puerto=$row_total['enlace_puerto'];
									//Necesarios para pasar al select de editar bl y aparezcan los datos que estaban en la b.d.
									$id_puerto=$row_total['id_puerto'];
									$nombre_pais=$row_total['nombre_pais'];
									$nombre_puerto=$row_total['nombre_puerto'];
									$id_movimiento=$row_total['id_movimiento'];
									$nombre_movimiento=$row_total['nombre_movimiento'];
									$iso2=$row_total['iso2'];


echo "<form action='editartrackbl.php?bl=$id_bl&id_estado=$id_estado&cod=$cod&u=$u' class='submit' method='post' name='form$i'>";
echo "<tr>";
echo "<th scope='row'><span class='glyphicon glyphicon-tag text-success' aria-hidden='true'></span></th>";
echo "<td>$fecha1</td>";
echo "<td><img src='images/".$id_movimiento.".png'>&nbsp;&nbsp;".$nombre_movimiento."</td>";
echo "<td><img src='https://flagcdn.com/24x18/$iso2.png'>&nbsp;&nbsp;".$nombre_puerto." - ".$nombre_pais."</td>";

echo "<td>";
echo "<a href='editartrackbl.php?bl=$id_bl&id_estado=$id_estado&id_puerto=$id_puerto&nombre_pais=$nombre_pais&nombre_puerto=$nombre_puerto&fecha=$fecha&im=$id_movimiento&nm=$nombre_movimiento&iso2=$iso2&cod=$cod&u=$u'>";
echo "<span class='glyphicon glyphicon-pencil' aria-hidden='true' title='Editar'></span></a>&nbsp;&nbsp;";
echo "<a href='javascript:msg(\"eliminartrackbl.php?bl=$id_bl&id_estado=$id_estado&id_mov=$id_movimiento&cod=$cod&u=$u\",\"¿Estas seguro que deseas eliminar este estado?\");'>";
echo "<span class='glyphicon glyphicon-remove text-danger' aria-hidden='true'  title='Borrar'></span></a>&nbsp;&nbsp;";
echo "<a href='https://www.vesselfinder.com/es/ports/$enlace_puerto' target='_blank'>";
echo "<span class='glyphicon glyphicon-map-marker' aria-hidden='true' title='Ver Puerto'></span></a>&nbsp;&nbsp;";
echo "</form>";
echo "</td>";
				

				echo "</tr>";		
					}
				?>

							<!--Fin sql-->
						</tbody>
					</table>

					<?php 
					} // Cierre del else
					?>		
			</div>


			<!--Ventana emergente MODAL-->
				<div class="modal fade" id="miModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title" id="myModalLabel">Estados del Contenedor</h4>
							</div>
							<div class="modal-body">
								<!--Cuerpo del modal-->
								<form class="form-horizontal" name="form" method="POST" action="<?php echo "edittrackbl.php?cod=$cod&u=$u";?>">
								<?php
									$sql="select puertos.nombre_puerto,puertos.id_puerto,paises.nombre_pais from puertos LEFT JOIN paises ON puertos.id_pais_puerto = paises.id_pais order by nombre_pais";
									$resul = mysqli_query($conectar , $sql);
									$total = mysqli_num_rows($resul);
									echo $_GET['id_estado'];									
								?>
								<input type="hidden" name="id_estado" value="<?php echo $id_estado; ?>" />


						<table class="table" border="0" width="60%" align="center">
							<tr>
								<td>	
									<label for="inputEmail3" class="col-sm-2 control-label"> 
										Puerto:
									</label>
								</td>
								<td>
								 <select class="form-control chosen" aria-label="puerto" name="puerto" placeholder="puerto" required>
			                        <option selected>Seleccione el Puerto donde se encuentra</option>
			                            <?php
			                            	$i=0;
			                                while($row_total=mysqli_fetch_assoc($resul)){

												$id_puerto[$i]=$row_total['id_puerto'];
												$nombre_pais[$i]=$row_total["nombre_pais"];
												$nombre_puerto[$i]=$row_total["nombre_puerto"];

									 			echo "<option value=".$id_puerto[$i].">".$nombre_pais[$i]." - ".$nombre_puerto[$i]."</option>"; 
									 			$i=$i+1;
									 		}
									 	?>
						    	 </select>
					    		</td>
							</tr>
					    	<tr>
					    		<td>
					    			<label for="inputEmail3" class="col-sm-2 control-label">
					    				Fecha:
					    			</label>
					    		</td>
					    		<td><input class="form-control input-sm" type="date" id="fecha" name="fecha"></td>
					    	</tr>
					    	<tr>
								<td>	
									<label for="inputEmail3" class="col-sm-2 control-label"> 
										Estado:
									</label>
								</td>

								<?php
									$sql="SELECT * FROM movimientos_contenedor";
									$resul = mysqli_query($conectar , $sql);
									$total = mysqli_num_rows($resul);
								?>

								<td>
								 <select class="form-control chosen" aria-label="estado" name="estado" placeholder="estado" required>
			                        <option selected>Seleccione el nuevo estado</option>
			                            <?php
			                                while($row_total=mysqli_fetch_assoc($resul)){
												$id_mov=$row_total['id_movimiento'];
												$nombre_mov=$row_total["nombre_movimiento"];
									 			echo "<option value=".$id_mov.">".$nombre_mov."</option>"; 
									 		}
									 	?>
						    	 </select>
					    		</td>
							</tr>
							<tr>
								<td colspan="2"><input class="btn btn-success" type="submit" value="Ingresar"></td>
							</tr>



						</table>						

								<input type="hidden" name="bl" value="<?php echo $id_bl; ?>" />

								</form>
							</div>
						</div>
					</div>
				</div>
				<!--Fin Modal-->

				<!--Fin ventana modal #2-->







		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>


<!--Fin elementos contenedor-->
<?php include 'footer.php'; ?>

</body>
	<script>
        jQuery(document).ready(function(){
        	jQuery.getScript( "//harvesthq.github.io/chosen/chosen.jquery.js" )
        	.done(function( script, textStatus ) {
        		jQuery(".chosen").chosen();
		    });
		});

    </script>

</html>