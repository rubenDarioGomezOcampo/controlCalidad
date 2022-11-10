<?php
	include_once('PHPMailer/src/PHPMailer.php');
	include_once('PHPMailer/src/SMTP.php');
	require_once "PHPMailer/src/Exception.php";
	include_once('db.php');
	if(!empty($_GET["bl"])){
		$id_bl=$_GET["bl"];
	}
	else {
		$id_bl=$_POST["bl"];
	}
$mail="";
$mail=$mail."<!DOCTYPE html><head><title>CONSULTA BL</title>";
$mail=$mail. "<link href='css/bootstrap.min.css' rel='stylesheet'>
		<script src='js/bootstrap.min.js'></script>";
$mail=$mail. "<link  rel='icon' href='images/favicon.png' type='image/png' />";
$mail=$mail. "</head><body>";
			$id_estado=0;
			$sql="SELECT puertos.nombre_puerto,paises.nombre_pais,paises.iso2 FROM bl LEFT JOIN puertos ON bl.id_puerto_origen_bl = puertos.id_puerto LEFT JOIN paises ON puertos.id_pais_puerto=paises.id_pais where bl.id_bl='$id_bl'";
			$resul = mysqli_query($conectar , $sql);
			$total = mysqli_num_rows($resul);

			if($total==0){	
				//$mail=$mail. "<div class='container theme-showcase' role='main'><div class='page-header'>";		
				//$mail=$mail. "<div class='alert alert-danger' role='alert'>";
				//$mail=$mail. "<span class='glyphicon glyphicon-warning-sign fa-2x text-danger' aria-hidden='true'></span>";
				//$mail=$mail. " &nbsp;&nbsp;<b>EL BL DIGITADO: $id_bl NO EXISTE </b></div></div></div>";
			}
			else {
				while($row_total=mysqli_fetch_assoc($resul)){
					$pol=$row_total['nombre_puerto'];
					$paiso=$row_total['nombre_pais'];
					$iso1=$row_total['iso2'];
				}

				//consultar el correo del cliente:
				$sql="SELECT correo_cliente FROM clientes LEFT JOIN bl on clientes.id_cliente=bl.id_cliente_bl WHERE bl.id_bl='$id_bl'";
				$resul = mysqli_query($conectar , $sql);
				$total = mysqli_num_rows($resul);
				while($row_total=mysqli_fetch_assoc($resul)){
					$correo_cliente=$row_total['correo_cliente'];
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

$mail=$mail."<div class='container theme-showcase' role='main'>
					<div class='page-header'>
						<h1><img src='http://www.alx.com.co/tracking/images/logot.png' width='8%'>$id_bl &nbsp;&nbsp;
						</h1>
						<hr>";

						$mail=$mail."<table border='0'><tr>";
						$mail=$mail. "<td><i class='fas fa-ship'></i>&nbsp;<b><font color='darkblue'>Puerto Origen:</td>";
						$mail=$mail. "<td></font></b>"; 
						$mail=$mail."<img src='https://flagcdn.com/24x18/".$iso1.".png'>&nbsp;&nbsp;$pol - $paiso</td></tr>";
						$mail=$mail."<tr><td><i class='fas fa-ship'></i>&nbsp;<b><font color='darkblue'>Puerto Destino:</td>";
						$mail=$mail. "<td></font></b>";
						$mail=$mail. "<img src='https://flagcdn.com/24x18/".$iso2.".png'>&nbsp;&nbsp;$pod - $paisd</td></tr>";
						$mail=$mail. "<tr><td><span class='glyphicon glyphicon-th-large' aria-hidden='true'></span>&nbsp;<b><font color='darkblue'>Tipo de Contenedor:</font>&nbsp;</b></td>";
						$mail=$mail. "<td>$tipo&nbsp;<img src='http://www.alx.com.co/tracking/images/cont/".$tp.".png'></td></tr>";
						$mail=$mail. "<tr><td><span class='glyphicon glyphicon-fullscreen' aria-hidden='true'></span>&nbsp;<b><font color='darkblue'>Tama&ntilde;o de Contenedor:</font>&nbsp;</b></td><td>$size PIES</td></tr>";
						$mail=$mail. "<tr><td><span class='glyphicon glyphicon-time' aria-hidden='true'></span>&nbsp;<b><font color='darkblue'>Fecha estimada Llegada:</font>&nbsp;</b></td>";

							if ($eta=='0000-00-00'){
								$mail=$mail. "<td><font color='red'>Pendiente</font></td></tr>";
							}
							else {
								$eta = date('D, M j - Y', strtotime($eta));
								$mail=$mail. "<td><b>$eta</b></td></tr>";
							}


						$mail=$mail. "</table>";
					
					$mail=$mail."</div><table class='table' border='0'><thead class='thead-dark'><tr class='active'>";
					$mail=$mail."<th scope='col'></th><th scope='col'>Fecha</th><th scope='col'>Estado</th><th scope='col'>Puerto</th>";
					$mail=$mail."</tr></thead><tbody>";

				$sql="SELECT estados_contenedor.fecha,estados_contenedor.id_estado_contenedor,paises.iso2,movimientos_contenedor.id_movimiento,movimientos_contenedor.nombre_movimiento,puertos.nombre_puerto,paises.nombre_pais FROM estados_contenedor LEFT JOIN movimientos_contenedor on estados_contenedor.id_movimiento_estado_contenedor=movimientos_contenedor.id_movimiento LEFT JOIN puertos on estados_contenedor.id_puerto_estado_contenedor=puertos.id_puerto LEFT JOIN paises on puertos.id_pais_puerto=paises.id_pais WHERE id_bl__estado_contenedor='$id_bl' ORDER BY fecha ASC";

								$resul = mysqli_query($conectar , $sql);
								$total = mysqli_num_rows($resul);
								$i=0;

								while($row_total=mysqli_fetch_assoc($resul)){


									$i=$i+1;
									$id_estado=$row_total['id_estado_contenedor'];
									$fecha=$row_total['fecha'];
									$fecha = date('D, M j - Y', strtotime($fecha));

				$mail=$mail."<form action='consultabl2.php?bl=$id_bl&id_estado=$id_estado' class='submit' method='post' name='form$i'>";
				$mail=$mail."<tr>";
				$mail=$mail. "<th scope='row'><span class='glyphicon glyphicon-tag text-success' aria-hidden='true'></span></th>";
				$mail=$mail. "<td>$fecha</td>";
				$mail=$mail. "<td><img src='http://www.alx.com.co/tracking/images/".$row_total['id_movimiento'].".png'>&nbsp;&nbsp;".$row_total['nombre_movimiento']."</td>";
				$mail=$mail. "<td><img src='https://flagcdn.com/24x18/".$row_total['iso2'].".png'>&nbsp;&nbsp;".$row_total['nombre_puerto']." - ".$row_total['nombre_pais']."</td>";

				$mail=$mail. "</tr>";

								}
						$mail=$mail."</tbody></table>";
					} 		
			$mail=$mail."<div class='page-header'>";
			$mail=$mail."<p>Si desea consultar el BL directamente en nuestra p&aacute;gina web ingrese ";
			$mail=$mail."<a href='http://www.alx.com.co/tracking/consultabl2_cliente.php?bl=$id_bl'>aqu&iacute;</a></div></div>";

$mail=$mail."</body></html>";

	

 ?>
