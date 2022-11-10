<?php
	session_start();
	include_once('db.php');
	if(!empty($_GET["id_cliente"])){
		$id_cliente=$_GET["id_cliente"];
	}
	else {
		$id_cliente=$_POST["id_cliente"];
	}

 ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Consultar Cliente</title>

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
			$sql="SELECT clientes.nombre_cliente,clientes.apellidos_cliente,clientes.telefono_cliente,clientes.correo_cliente,municipios.nombre_municipio, tipo_id.nombre_tipo_id from clientes LEFT JOIN municipios ON clientes.id_ciudad_cliente=municipios.id_municipio LEFT JOIN tipo_id ON clientes.tipo_id_cliente=tipo_id.id_tipo_id WHERE clientes.id_cliente='$id_cliente'";

			$resul = mysqli_query($conectar , $sql);
			$total = mysqli_num_rows($resul);

			if($total==0){	
				echo"<div class='container theme-showcase' role='main'><div class='page-header'>";		
				echo "<div class='alert alert-danger' role='alert'>";
				echo "<span class='glyphicon glyphicon-warning-sign fa-2x text-danger' aria-hidden='true'></span>";
				echo " &nbsp;&nbsp;<b>EL CLIENTE DIGITADO: $id_cliente NO EXISTE </b></div></div></div>";
			}
			else { //Hace todo lo demás

				while($row_total=mysqli_fetch_assoc($resul)){
					$nombre_cliente=$row_total['nombre_cliente'];
					$apellidos_cliente=$row_total['apellidos_cliente'];
					$telefono_cliente=$row_total['telefono_cliente'];
					$correo_cliente=$row_total['correo_cliente'];
					$nombre_municipio=$row_total['nombre_municipio'];
					$nombre_tipo_id=$row_total['nombre_tipo_id'];
				}

				
				?> 

				

				

				<!--Inicio elementos contenedor-->

				<div class="container theme-showcase" role="main">
					<div class="page-header">
						<h1><img src="images/logot.png" width="8%"><?php echo $id_cliente; ?> &nbsp;&nbsp;
						<p></h1><hr>
						<?php
						echo "<table border='0'><tr>";
						echo "<td><i class='fas fa-ship'></i>&nbsp;<b><font color='darkblue'>Cliente:</td>";
						echo "<td></font></b>"; 
						echo "$nombre_cliente $apellidos_cliente</td></tr>";
						echo "<tr><td><i class='fas fa-ship'></i>&nbsp;<b><font color='darkblue'>Tel&eacute;fono:</td>";
						echo "<td></font></b>";
						echo "$telefono_cliente</td></tr>";
						echo "<tr><td><span class='glyphicon glyphicon-th-large' aria-hidden='true'></span>&nbsp;<b><font color='darkblue'>Correo Cliente:</font>&nbsp;</b></td>";
						echo "<td>$correo_cliente</td></tr>";
						echo "<tr><td><span class='glyphicon glyphicon-fullscreen' aria-hidden='true'></span>&nbsp;<b><font color='darkblue'>Municipio:</font>&nbsp;</b></td><td>$nombre_municipio</td></tr>";
						echo "<tr><td><span class='glyphicon glyphicon-time' aria-hidden='true'></span>&nbsp;<b><font color='darkblue'>Identificaci&oacute;n:</font>&nbsp;</b></td>";
						echo "<td>$id_cliente</td></font>&nbsp;</b>";
						echo "</td></tr>";

					    echo "</table>";

						?>


					</div>
					<!--Información de los movimientos del contenedor-->
					<?php 
					} // Cierre del else
					?>		
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