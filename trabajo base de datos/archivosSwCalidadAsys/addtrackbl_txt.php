<?php
	session_start();
	include_once('db.php');
 ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Agregar nuevo estado BL</title>

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
		<?php include 'header.php'; ?>


	
			<!-- consulta sql datos básicos BL -->

			<?php
				$conectar=conn(); //ejecuta las conexiones a la b.d.
				$bl = mysqli_real_escape_string($conectar, $_POST['bl']);
				$puerto = mysqli_real_escape_string($conectar, $_POST['puerto']);
				$fecha = mysqli_real_escape_string($conectar, $_POST['fecha']);
				$estado = mysqli_real_escape_string($conectar, $_POST['estado']);

				//Cambiar la fecha a tipo año-mes-dia para mysql
				$fecha = date("Y-m-d", strtotime($fecha));		
				
				$result = "INSERT INTO estados_contenedor (id_bl__estado_contenedor, fecha, id_movimiento_estado_contenedor, id_puerto_estado_contenedor) VALUES ('$bl', '$fecha', '$estado', '$puerto');";

				$resultado= mysqli_query($conectar, $result);
				//Variable para almacenar los mensajes de error
				$msgError="";


				if(!mysqli_error($conectar)){
					echo "<div class='alert alert-success' role='alert'>";
						echo "<span class='glyphicon glyphicon-pencil fa-2x text-success' aria-hidden='true'></span>";
						echo "&nbsp;&nbsp;<b>SE INGRESÓ EL NUEVO ESTADO DEL CONTENEDOR CON BL ".$bl." CORRECTAMENTE A LA BASE DE DATOS</b><br><p><br><p>";

						echo "<form name='validar' action='consultabl2.php?cod=$cod&u=$u' method='post'>";
						echo "<input type='hidden' name='bl' value='$bl'/>";
						echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
						echo "<input class='btn btn-success' type='submit' value='Verificar Estados'></div>";	
					}

					else {

						if(mysqli_errno($conectar) == 1062){$msgError="YA EXISTE UN REGISTRO DUPLICADO EN LA BASE DE DATOS";}
						
						echo "<div class='alert alert-danger' role='alert'>";
						echo "<span class='glyphicon glyphicon-warning-sign fa-2x text-danger' aria-hidden='true'></span>";
						echo " &nbsp;&nbsp;<b>NO SE PUDO AGREGAR EL ESTADO DEL BL $bl</b> <br>";
						echo "<b>Error:</b> ".$msgError." - <i>".mysqli_error($conectar)."</i></div><br><p><br><p>";

						echo "<form name='validar' action='consultabl2.php?cod=$cod&u=$u' method='post'>";
						echo "<input type='hidden' name='bl' value='$bl'/>";
						echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
						echo "<input class='btn btn-success' type='submit' value='Verificar Estados'></div>";

					}

					if ($estado=='7'){ //Si está agregándose el estado final del contenedor, se cierra el bl.
						$result = "UPDATE bl SET bl.id_estadobl_bl='2' WHERE bl.id_bl='$bl'";
						$resultado= mysqli_query($conectar, $result);
					}
				//header('Location: form_contacto.php');

			?>
			
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>


<!--Fin elementos contenedor-->
<?php include 'footer_nosql.php'; ?>

</body>

</html>