<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>INGRESO PRICING</title>
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

    	<?php include 'header.php'; ?>

		<div class="container">
	  		<div class="row">
	    		<div class="col-md-12">
					<div class="panel-body">





<?php
	//session_start();
	include_once('db.php');
	$conectar=conn(); //ejecuta las conexiones a la b.d.

	$contrato = mysqli_real_escape_string($conectar, $_POST['id_contrato']);
	$pol = mysqli_real_escape_string($conectar, $_POST['pol']);
	$pod = mysqli_real_escape_string($conectar, $_POST['pod']);
	$agente = mysqli_real_escape_string($conectar, $_POST['agente']);
	$flete20 = mysqli_real_escape_string($conectar, $_POST['flete20']);
	$flete40 = mysqli_real_escape_string($conectar, $_POST['flete40']);
	$flete40hq = mysqli_real_escape_string($conectar, $_POST['flete40hq']);
	$free = mysqli_real_escape_string($conectar, $_POST['free']);
	$gd = mysqli_real_escape_string($conectar, $_POST['gd']);
	$fecha = mysqli_real_escape_string($conectar, $_POST['fecha']);
	$fecha2 = mysqli_real_escape_string($conectar, $_POST['fecha2']);
		
	$result = "INSERT INTO tarifas (contrato_tarifa,id_contrato_tarifa,vigenciai_tarifa,vigenciaf_tarifa,id_puerto_origen_tarifa,id_puerto_destino_tarifa,id_agente_carga_tarifa,flete20_tarifa,flete40_tarifa,flete40hq_tarifa,free_time_tarifa,gastos_en_destino_tarifa) VALUES (NULL,'$contrato', '$fecha', '$fecha2', '$pol', '$pod', '$agente', '$flete20', '$flete40', '$flete40hq', '$free', '$gd')";

	$resultado= mysqli_query($conectar, $result);
	//Variable para almacenar los mensajes de error
	$msgError="";

	if(!mysqli_error($conectar)){
		echo "<div class='alert alert-success' role='alert'>";
			echo "<span class='glyphicon glyphicon-pencil fa-2x text-success' aria-hidden='true'></span>";
			echo "&nbsp;&nbsp;<b>SE INGRESÓ LA NUEVA TARIFA ".$contrato." CORRECTAMENTE A LA BASE DE DATOS</b></div>";		
		}

		else {

			if(mysqli_errno($conectar) == 1062){$msgError="YA EXISTE UN REGISTRO DUPLICADO EN LA BASE DE DATOS";}
			
			echo "<div class='alert alert-danger' role='alert'>";
			echo "<span class='glyphicon glyphicon-warning-sign fa-2x text-danger' aria-hidden='true'></span>";
			echo " &nbsp;&nbsp;<b>NO SE PUDO AGREGAR LA TARIFA $bl</b> <br>";
			echo "<b>Error:</b> ".$msgError." - <i>".mysqli_error($conectar)."</i></div>";

		}
	//header('Location: form_contacto.php');

?>

<a href="<?php echo "listarpricing.php?cod=$cod&u=$u";?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Regresar</a>

<br><p><br><p><br><p>
<!--Fin elementos contenedor-->
	  </div>
	</div>
  </div>
</div>

<?php include 'footer_nosql.php'; ?>

</body>
</html>