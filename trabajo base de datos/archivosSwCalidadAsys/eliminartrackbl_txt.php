<?php

	session_start();

	include_once('db.php');

	if(!empty($_GET["bl"])){

		$id_bl=$_GET["bl"];

		$id_estado=$_GET["id_estado"];

		$id_mov=$_GET['id_mov'];

	}

	else {

		$id_bl=$_POST["bl"];

	}



 ?>

<!DOCTYPE html>

<html>

	<head>

		<title>Editar Movimiento BL</title>



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



		<!--Cuerpo del formulario par edición-->

	<div class="container theme-showcase" role="main">

			<?php

				$conectar=conn(); //ejecuta las conexiones a la b.d.

				$sql="delete from estados_contenedor where id_estado_contenedor=$id_estado";

				$resul = mysqli_query($conectar , $sql);

				//$total = mysqli_num_rows($resul);



				if($resul == 0){	

				echo"<div class='container theme-showcase' role='main'><div class='page-header'>";		

				echo "<div class='alert alert-danger' role='alert'>";

				echo "<span class='glyphicon glyphicon-warning-sign fa-2x text-danger' aria-hidden='true'></span>";

				echo " &nbsp;&nbsp;<b>EL Estado $id_estado del BL $id_bl no pudo ser eliminado </b></div></div></div>";



				echo "<form name='validar' action='consultabl2.php?cod=$cod&u=$u' method='post'>";

				echo "<input type='hidden' name='bl' value='$id_bl'/>";

				echo "<input class='btn btn-success' type='submit' value='Verificar Estados'></div></form>";

			}

			else { //Hace todo lo demás

				echo"<div class='container theme-showcase' role='main'><div class='page-header'>";		

				echo "<div class='alert alert-success' role='success'>";

				echo "<span class='glyphicon glyphicon-warning-sign fa-2x text-success' aria-hidden='true'></span>";

				echo " &nbsp;&nbsp;<b>EL Estado $id_estado del BL $id_bl fue eliminado con exito </b></div></div></div>";



				echo "<form name='validar' action='consultabl2.php?cod=$cod&u=$u' method='post'>";

				echo "<input type='hidden' name='bl' value='$id_bl'/>";

				echo "<input class='btn btn-success' type='submit' value='Verificar Estados'></div></form>";



				if ($id_mov=='7'){ //Si está eliminándose el estado final del contenedor, se reabre el bl.

						$result = "UPDATE bl SET bl.id_estadobl_bl='1' WHERE bl.id_bl='$id_bl'";

						$resultado= mysqli_query($conectar, $result);

				}

				

			}

			?>







		</div>

	</div>



		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

		<script src="js/bootstrap.min.js"></script>



<!--Fin elementos contenedor-->

<?php include 'footer_nosql.php'; ?>





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