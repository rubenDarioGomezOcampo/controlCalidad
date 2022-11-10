<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>INGRESO BL</title>
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
	include_once('db.php');
	$conectar=conn(); //ejecuta las conexiones a la b.d.

	$bl = mysqli_real_escape_string($conectar, $_GET['bl']);
	$fecha = mysqli_real_escape_string($conectar, $_POST['fecha']);

	if ($fecha==''){
		$fecha='0000-00-00';
	}

	$result = "UPDATE bl set eta_bl='$fecha' where id_bl='$bl'";
	$resultado= mysqli_query($conectar, $result);
	//Variable para almacenar los mensajes de error
	$msgError="";

	if(!mysqli_error($conectar)){
		echo "<div class='alert alert-success' role='alert'>";
			echo "<span class='glyphicon glyphicon-pencil fa-2x text-success' aria-hidden='true'></span>";
			echo "&nbsp;&nbsp;<b>SE ACTUALIZO ETA EN BL ".$bl." CORRECTAMENTE EN LA BASE DE DATOS</b></div>";		
		}

		else {

			if(mysqli_errno($conectar) == 1062){$msgError="NO SE PUDO ACTUALIZAR EL BL $bl EN LA BASE DE DATOS";}
			
			echo "<div class='alert alert-danger' role='alert'>";
			echo "<span class='glyphicon glyphicon-warning-sign fa-2x text-danger' aria-hidden='true'></span>";
			echo " &nbsp;&nbsp;<b>NO SE PUDO ACTUALIZAR ETA EN EL BL $bl</b> <br>";
			echo "<b>Error:</b> ".$msgError." - <i>".mysqli_error($conectar)."</i></div>";

		}
	//header('Location: form_contacto.php');

?>

<a href="<?php echo "listarbl.php?cod=$cod&u=$u";?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Regresar</a>

<br><p><br><p><br><p>
<!--Fin elementos contenedor-->
	  </div>
	</div>
  </div>
</div>

<?php include 'footer_nosql.php'; ?>

</body>
</html>