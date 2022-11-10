<?php
	session_start();
	include_once('db.php');
 ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Listar BL</title>
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

		<div class="container theme-showcase" role="main">
			<table border="0" background="images/vessel.jpg" width="100%" align="center"><tr><td>
				<h1>&nbsp;<img src="images/logot2.png" width="14%"><br><p></h1></td></tr></table>
			<div class="page-header">				
				<table class="table">
  					<thead class="thead-dark">
						<tr class="active">
							<th scope="col">#</th>
							<th scope="col">Id BL</th>
							<th scope="col">Puerto Origen</th>
							<th scope="col">Puerto Destino</th>
							<th scope="col">Fecha Registro</th>
							<th scope="col">ETA</th>
						</tr>
					</thead>
					<tbody>


	
			<!-- consulta sql datos básicos BL -->
		<?php
			$conectar=conn(); //ejecuta las conexiones a la b.d.

			$id_estado=0;
			$sql="SELECT bl.id_bl,bl.fecha_registro_bl,bl.id_estadobl_bl,bl.eta_bl,puertos.nombre_puerto,paises.nombre_pais,paises.iso2,porto.nombre_puerto as puertoDestino,paiso.nombre_pais as paisDestino,paiso.iso2 as iso2Destino FROM bl LEFT JOIN puertos ON bl.id_puerto_origen_bl=puertos.id_puerto LEFT JOIN puertos as porto on bl.id_puerto_destino_bl=porto.id_puerto LEFT JOIN paises ON puertos.id_pais_puerto=paises.id_pais LEFT JOIN paises as paiso ON porto.id_pais_puerto=paiso.id_pais order by bl.fecha_registro_bl desc";

			$resul = mysqli_query($conectar , $sql);
			$total = mysqli_num_rows($resul);

			if($total==0){	
				echo"<div class='container theme-showcase' role='main'><div class='page-header'>";		
				echo "<div class='alert alert-danger' role='alert'>";
				echo "<span class='glyphicon glyphicon-warning-sign fa-2x text-danger' aria-hidden='true'></span>";
				echo " &nbsp;&nbsp;<b>NO EXISTEN BL PARA MOSTRAR </b></div></div></div>";
			}
			else { //Hace todo lo demás
				$i=1;
				while($row_total=mysqli_fetch_assoc($resul)){
					$id_bl=$row_total['id_bl'];
					$puertol=$row_total['nombre_puerto'];
					$paisl=$row_total['nombre_pais'];
					$isol=$row_total['iso2'];
					$puertod=$row_total['puertoDestino'];
					$paisd=$row_total['paisDestino'];
					$isod=$row_total['iso2Destino'];
					$fecha=$row_total['fecha_registro_bl'];
					$eta=$row_total['eta_bl'];
					$estado_bl=$row_total['id_estadobl_bl'];

					if ($estado_bl=='2'){
						echo "<tr bgcolor='#E8ECF3'>";	
					}else{
						echo "<tr>";
					}
					


					echo "<th scope='row'>$i</th>";
					echo "<td><a href='consultabl2.php?bl=$id_bl&cod=$cod&u=$u'>$id_bl</a></td>";
					echo "<td><img src='https://flagcdn.com/24x18/".$isol.".png'>&nbsp;&nbsp;$puertol - $paisl</td>";
					echo "<td><img src='https://flagcdn.com/24x18/".$isod.".png'>&nbsp;&nbsp;$puertod - $paisd</td>";
					echo "<td>$fecha</td>";
					if ($eta=='0000-00-00'){
						$eta="<font color='red'>Registrar ETA</font>";	
					
						echo "<td>";
						echo "<a href='addEta.php?cod=$cod&u=$u&id_bl=$id_bl' class='tooltip-test' title='Registrar ETA'>";
						echo "$eta";
					}
					else if($estado_bl=='2'){
						echo "<td><font color='#337AB7'>";
						echo "En destino ";
						echo "<span class='glyphicon glyphicon-ok' style='color:darkblue' aria-hidden='true' title='ETA'></span></td>";
						echo "</tr>";
					}

					else {
						echo "<td>";
						echo "<a href='addEta.php?cod=$cod&u=$u&id_bl=$id_bl'>";
						echo "$eta &nbsp; &nbsp;";
						echo "<span class='glyphicon glyphicon-time' aria-hidden='true' title='Registrar ETA'></span></a></td>";
						echo "</tr>";
					}
					$i+=1;		
				}
		?>

							<!--Fin sql-->
						</tbody>
					</table>

		<?php 
		} // Cierre del else
		?>		
	</div>
</div>


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