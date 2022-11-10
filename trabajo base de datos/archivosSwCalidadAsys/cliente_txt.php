<?php
	session_start();
	include_once('db.php');
 ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Ingreso Cliente</title>
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

    </head>

	<body>
		<?php include 'header.php'; ?>

			<!--Inicio elementos contenedor-->

		<div class="container theme-showcase" role="main">
			<table border="0" background="images/v7.png" width="100%" align="center"><tr><td>
				<h1>&nbsp;<img src="images/logot2.png" width="14%">
					<span class="glyphicon glyphicon-paste  text-dark" aria-hidden='true'></span>
					<br><p></h1></td></tr></table>


			<div class="page-header">
				
			</div>
			<form class="form-horizontal" name="formcontato" method="POST" action="<?php echo "ingresocliente.php?cod=$cod&u=$u";?>">

            <div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">
					Identificaci&oacute;n:
				</label>

				<div class="col-sm-2">
					<input type="text" class="form-control" name="id_cliente" placeholder="Escriba el # de ID" required>
				</div>
			</div>

			<!--Consulta el tipo de identificación del cliente-->

			<?php
			$conectar=conn(); //ejecuta las conexiones a la b.d.
			$sql="SELECT nombre_tipo_id,id_tipo_id from tipo_id";
			$resul = mysqli_query($conectar , $sql);
			$total = mysqli_num_rows($resul);
			?>

			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">
					Tipo de Identificaci&oacute;n:
				</label>

				<div class="col-sm-3">
				    <select class="form-control chosen" aria-label="tipo_id_cliente" name="tipo_id_cliente" placeholder="tipo_id_cliente" required>
                        <option selected>Seleccione tipo ID</option>
                            <?php
                                while($row_total=mysqli_fetch_array($resul)){

									$id_tipo_id=$row_total['id_tipo_id'];
									$nombre_tipo_id=$row_total['nombre_tipo_id'];

						 			echo "<option value=".$id_tipo_id.">".$nombre_tipo_id."</option>"; 
						 		}
						 	?>
			    	</select>
			    </div>
			</div>

			<!-- nombre del cliente -->

			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">
					Nombre Empresa / Cliente:
				</label>

				<div class="col-sm-5">
					<input type="text" class="form-control" name="nombre_cliente" placeholder="Escriba el nombre" required>
				</div>
			</div>



			<!-- apellidos del cliente -->

			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">
					Apellidos del Cliente:
				</label>

				<div class="col-sm-5">
					<input type="text" class="form-control" name="apellidos_cliente" placeholder="Escriba el apellido">
				</div>
			</div>


			<!-- telefono del cliente -->

			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">
					Tel&eacute;fono del Cliente:
				</label>

				<div class="col-sm-3">
					<input type="text" class="form-control" name="telefono_cliente" placeholder="Escriba el # de tel&eacute;fono" required>
				</div>
			</div>

			
			<!-- consulta sql para el select -->
			<?php
			$sql="SELECT municipios.id_municipio,municipios.nombre_municipio,municipios.id_deparamtento_municipio,departamentos.nombre_departamento FROM municipios LEFT JOIN departamentos ON departamentos.id_departamento=municipios.id_deparamtento_municipio";
			$resul = mysqli_query($conectar , $sql);
			$total = mysqli_num_rows($resul);
			?>

			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">
					Ciudad:
				</label>

				<div class="col-sm-4">
				    <select class="form-control chosen" aria-label="id_municipio_cliente" name="id_municipio_cliente" placeholder="id_municipio_cliente" required>
                        <option selected>Seleccione la ciudad del cliente</option>
                            <?php
                                while($row_total=mysqli_fetch_assoc($resul)){
									$id_municipio_cliente=$row_total['id_municipio']; //en la bd en cliente está así ;(
									$nombre_municipio=$row_total["nombre_municipio"];
									$nombre_departamento=$row_total['nombre_departamento'];								

						 			echo "<option value=".$id_municipio_cliente.">".$nombre_municipio." - ".$nombre_departamento."</option>"; 
						 		}
						 	?>
			    	</select>
			    </div>
			</div>

			<!-- correo-e del cliente -->

			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">
					Correo del Cliente:
				</label>

				<div class="col-sm-5">
					<input type="text" class="form-control" name="correo_cliente" placeholder="Escriba el correo-e" required>
				</div>
			</div>
	
			<br><p>
				<input class="btn btn-success" type="submit" value="Ingresar Cliente">
			</form>
		</div>
		<br><p>
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