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

    </head>

	<body>
		<?php include 'header_cliente.php'; ?>

	
			<!-- consulta sql datos básicos BL -->
			<?php
			$id_estado=0;
			$sql="SELECT puertos.nombre_puerto,paises.nombre_pais,paises.iso2 FROM bl LEFT JOIN puertos ON bl.id_puerto_origen_bl = puertos.id_puerto LEFT JOIN paises ON puertos.id_pais_puerto=paises.id_pais where bl.id_bl='$id_bl'";
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
				}

				$sql="SELECT bl.id_bl,bl.size,bl.eta_bl,puertos.nombre_puerto,tipo_contenedor.nombre_tipo_contenedor,tipo_contenedor.id_tipo_contenedor,paises.nombre_pais,paises.iso2 FROM bl LEFT JOIN puertos ON bl.id_puerto_destino_bl=puertos.id_puerto LEFT JOIN tipo_contenedor on bl.tipo_contenedor_bl=tipo_contenedor.id_tipo_contenedor LEFT JOIN paises on puertos.id_pais_puerto=paises.id_pais where bl.id_bl='$id_bl'";

				$resul = mysqli_query($conectar , $sql);
				$total = mysqli_num_rows($resul);

				while($row_total=mysqli_fetch_assoc($resul)){
					$pod=$row_total['nombre_puerto'];
					$tipo=$row_total['nombre_tipo_contenedor'];
					$paisd=$row_total['nombre_pais'];
					$size=$row_total['size'];
					$tp=$row_total['id_tipo_contenedor'];
					$iso2=$row_total['iso2'];
					$eta=$row_total['eta_bl'];
				}


				?> 

				
				
				

				<!--Inicio elementos contenedor-->

				<div class="container theme-showcase" role="main">
					<div class="page-header">
						<h1><img src="images/logot.png" width="8%"><?php echo $id_bl; ?> &nbsp;&nbsp;
							
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
						echo "<tr><td><span class='glyphicon glyphicon-time' aria-hidden='true'></span>&nbsp;<b><font color='darkblue'>Fecha estimada Llegada:</font>&nbsp;</b></td>";

							if ($eta=='0000-00-00'){
								echo "<td><font color='red'>Pendiente</font></td></tr>";
							}
							else {
								$eta = date("D, M j - Y", strtotime($eta));
								echo "<td><b>$eta</b></td></tr>";
							}


						echo "</table>";
						?>
					</div>
					<!--Información de los movimientos del contenedor-->

				<table class="table">
  					<thead class="thead-dark">
						<tr class="active">
							<th scope="col"></th><th scope="col">Fecha</th><th scope="col">Estado</th><th scope="col">Puerto</th>
						</tr>
					</thead>
					<tbody>

							<!--Se consulta la b.d. con los estados y se carga -->


							<?php

$sql="SELECT estados_contenedor.fecha,estados_contenedor.id_estado_contenedor,paises.iso2,movimientos_contenedor.id_movimiento,movimientos_contenedor.nombre_movimiento,puertos.nombre_puerto,paises.nombre_pais FROM estados_contenedor LEFT JOIN movimientos_contenedor on estados_contenedor.id_movimiento_estado_contenedor=movimientos_contenedor.id_movimiento LEFT JOIN puertos on estados_contenedor.id_puerto_estado_contenedor=puertos.id_puerto LEFT JOIN paises on puertos.id_pais_puerto=paises.id_pais WHERE id_bl__estado_contenedor='$id_bl' ORDER BY fecha ASC";
								$resul = mysqli_query($conectar , $sql);
								$total = mysqli_num_rows($resul);
								$i=0;

								while($row_total=mysqli_fetch_assoc($resul)){
									$i=$i+1;
									$id_estado=$row_total['id_estado_contenedor'];
									$fecha=$row_total['fecha'];
									$fecha = date("D, M j - Y", strtotime($fecha));

				echo "<form action='consultabl2.php?bl=$id_bl&id_estado=$id_estado' class='submit' method='post' name='form$i'>";
				echo "<tr>";
				echo "<th scope='row'><span class='glyphicon glyphicon-tag text-success' aria-hidden='true'></span></th>";
				echo "<td>$fecha</td>";
				echo "<td><img src='images/".$row_total['id_movimiento'].".png'>&nbsp;&nbsp;".$row_total['nombre_movimiento']."</td>";
				echo "<td><img src='https://flagcdn.com/24x18/".$row_total['iso2'].".png'>&nbsp;&nbsp;".$row_total['nombre_puerto']." - ".$row_total['nombre_pais']."</td>";

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
								<form class="form-horizontal" name="form" method="POST" action="edittrackbl.php">
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
								<td colspan="2"><input class="btn btn-success" type="submit" value="Actualizar"></td>
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