<?php
	session_start();
	include_once('db.php');


	$bl = $_GET["bl"];
	$pol = $_GET["pol"];
	$paiso = $_GET["paiso"];
	$iso1 = $_GET["iso1"];
	$id_pol = $_GET["id_pol"];
	$pod = $_GET["pod"];
	$paisd = $_GET["paisd"];
	$iso2 = $_GET["iso2"];
	$id_pod = $_GET["id_pod"];
	$tipo = $_GET["tipo"];
	$tp = $_GET["tp"];
	$size = $_GET["size"];
	$agente = $_GET["agente"];
	$id_agente = $_GET["id_agente"];
	$id_cliente = $_GET["id_cliente"];
	$nombre = $_GET["nombre"];
	$apellidos = $_GET["apellidos"];

//funciones de post para ajax
	if($_POST){
		if(!empty($_POST['id'])){
			$id=$_POST['id'];
		}
		else{

		}
	}
	else{

	}

//---------------------------





 ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Edici&oacute;n BL</title>
		<link  rel="icon"   href="images/favicon.png" type="image/png" />

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="js/bootstrap.min.js"></script>

		
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
			<table border="0" background="images/v6.png" width="100%" align="center"><tr><td>
				<h1>&nbsp;<img src="images/logot2.png" width="14%"><span class="glyphicon glyphicon-paste  text-dark" aria-hidden='true'></span>
					<br><p></h1></td></tr></table>
			<div class="page-header">
			
			</div>
			<form class="form-horizontal" name="formcontato" method="POST" action="<?php echo "editbl.php?cod=$cod&u=$u";?>">

            <div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">
					C&oacute;digo BL:
				</label>

				<div class="col-sm-2">
					<input type="text" class="form-control" name="bl" placeholder="# BL" value="<?php echo $bl; ?>" required>
				</div>
			</div>
			

			<!--Consulta de los clientes de la base de datos para ingresar el bl-->

			<?php
			$conectar=conn(); //ejecuta las conexiones a la b.d.
			$sql="SELECT clientes.id_cliente,clientes.nombre_cliente,clientes.apellidos_cliente,municipios.nombre_municipio from clientes left JOIN municipios on clientes.id_ciudad_cliente=municipios.id_municipio order by clientes.nombre_cliente ASC";
			$resul = mysqli_query($conectar , $sql);
			$total = mysqli_num_rows($resul);
			?>

			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">
					Cliente: <span class='glyphicon glyphicon-user' aria-hidden='true'></span>
				</label>

				<div class="col-sm-5">
				    <select class="form-control chosen" aria-label="id_cliente" name="id_cliente" placeholder="id_cliente" required>
					<?php 
echo "<option selected value=".$id_cliente.">".$nombre ." ".$apellidos." - ".$municipio_cliente."</option>";
                                while($row_total=mysqli_fetch_assoc($resul)){

									$id_cliente=$row_total['id_cliente'];
									$nombre_cliente=$row_total["nombre_cliente"];
									$apellidos_cliente=$row_total["apellidos_cliente"];
									$municipio_cliente=$row_total["nombre_municipio"];

						 			echo "<option value=".$id_cliente.">".$nombre_cliente ." ".$apellidos_cliente." - ".$municipio_cliente."</option>"; 
						 		}
						 	?>
			    	</select>
			    </div>
			</div>
			
			<!-- consulta sql para el select -->
			<?php
			$sql="select puertos.nombre_puerto,puertos.id_puerto,paises.nombre_pais from puertos LEFT JOIN paises ON puertos.id_pais_puerto = paises.id_pais order by nombre_pais";
			$resul = mysqli_query($conectar , $sql);
			$total = mysqli_num_rows($resul);
			?>

			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">
					Puerto de Origen: <i class="fas fa-ship"></i>
				</label>
				
				<div class="col-sm-4">					
				    <select class="form-control chosen" aria-label="id_pol" name="id_pol" placeholder="pol" id="pol" required>
                       <?php echo "<option selected value=".$id_pol.">".$paiso." - ".$pol."</option>";
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
			    </div>
			    <div id="isoPol">
						<?php echo "<img src='https://flagcdn.com/24x18/".$iso1.".png'>"; ?>
				</div>
			</div>

			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">
					Puerto de Destino: <i class="fas fa-ship"></i>
				</label>
				
				<div class="col-sm-4">
			    	<select class="form-control chosen" aria-label="id_pod" name="id_pod" placeholder="pod" id="pod"required>

                            <?php
                    		echo "<option selected value=".$id_pod.">".$paisd." - ".$pod."</option>";
                            $j=$i;
                            $i=0;
                                while($i<=$j){
						 			echo "<option value=".$id_puerto[$i].">".$nombre_pais[$i]." - ".$nombre_puerto[$i]."</option>"; 
						 			$i=$i+1;
						 		}?>
			    	</select>	    	
				</div>
				<div id="isoPod">
						<?php echo "<img src='https://flagcdn.com/24x18/".$iso2.".png'>"; ?>
				</div>
			</div>


			<!-- consulta sql para el select tipo de contenedor -->
			<?php
			
			$sql="select * from tipo_contenedor";
			$resul = mysqli_query($conectar , $sql);
			$total = mysqli_num_rows($resul);
			?>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">
					Tipo de Contenedor: <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
				</label>

				<div class="col-sm-3">
				     <select class="form-control" aria-label="tipo" name="tp" placeholder="tp" id="tp" required>
                            <?php
    							echo "<option selected value=".$tp.">".$tipo."</option>"; 
                                while($row_total=mysqli_fetch_assoc($resul)){
						 		echo "<option value=".$row_total['id_tipo_contenedor'].">".$row_total['nombre_tipo_contenedor']."</option>"; 
						 		}
						 	?>
			    	</select>
			    </div>
			    <div id="isoCont">
						<?php echo "<img src='images/cont/".$tp.".png'>"; ?>
				</div>
			</div>	


			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">
					Tama&ntilde;o: <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
				</label>

				<div class="col-sm-2">
				    <select class="form-control" aria-label="size" name="size" placeholder="size" required>
                  		<option selected value="<?php echo $size; ?>"><?php echo $size; ?></option>
						<option value="20">20 Pies</option>
						<option value="40">40 Pies</option>
			    	</select>
			    </div>
			</div>	


			<!-- consulta sql para el select agente de carga -->
			<?php
			$sql="select * from agentes_carga order by nombre_agente_carga";
			$resul = mysqli_query($conectar , $sql);
			$total = mysqli_num_rows($resul);
			?>

			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">
					Agente de Carga: <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
				</label>

				<div class="col-sm-3">
				     <select class="form-control chosen" aria-label="id_agente" name="id_agente" placeholder="tipo" id="agente"required>
                        <?php
        				echo "<option selected value=".$id_agente.">".$agente."</option>";
                        echo "<option value=".$row_total['id_agente_carga'].">".$row_total['nombre_agente_carga']."</option>";
                            while($row_total=mysqli_fetch_assoc($resul)){
					 		echo "<option value=".$row_total['id_agente_carga'].">".$row_total['nombre_agente_carga']."</option>"; 
					 		}
					 	?>
			    	</select>
			    </div>
			    <div id="isoAgente">
						<?php echo "<img src='images/agentes/".$id_agente.".png'>"; ?>
				</div>
			</div>	
			<br><p>



				<input class="btn btn-success" type="submit" value="Guardar Cambios en BL: <?php echo $bl; ?>">

				<!-- Botón Regresar -->
				<a href="<?php echo "consultabl2.php?bl=$bl&cod=$cod&u=$u";?>" class="btn btn-success" role="button" aria-pressed="true">Regresar</a></td>

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

<script type="text/javascript" src="js/funciones.js"></script>

</html>