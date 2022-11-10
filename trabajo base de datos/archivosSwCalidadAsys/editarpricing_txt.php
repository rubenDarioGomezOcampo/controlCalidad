<?php
	session_start();
	include_once('db.php');

	$contrato_tarifa = $_GET["contrato_tarifa"];
	
//funciones de post para ajax
	if($_POST){
		if(!empty($_POST['contrato_tarifa'])){
			$id=$_POST['contrato_tarifa'];
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
		<title>Edici&oacute;n Tarifa</title>
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


		<?php
			$conectar=conn(); //ejecuta las conexiones a la b.d.

			$sql="SELECT contrato_tarifa,id_contrato_tarifa,vigenciai_tarifa,vigenciaf_tarifa,flete20_tarifa,flete40_tarifa,flete40hq_tarifa,free_time_tarifa,gastos_en_destino_tarifa,id_puerto_origen_tarifa,id_puerto_destino_tarifa,id_agente_carga_tarifa,agentes_carga.id_agente_carga,agentes_carga.nombre_agente_carga,contratos.cod_contrato,contratos.id_contrato,contratos.nombre_contrato,puertos.nombre_puerto,paises.nombre_pais,paises.iso2,porto.nombre_puerto as puertoDestino,paiso.nombre_pais as paisDestino,paiso.iso2 as iso2Destino FROM tarifas LEFT JOIN contratos ON tarifas.id_contrato_tarifa=contratos.id_contrato LEFT JOIN puertos ON  tarifas.id_puerto_origen_tarifa=puertos.id_puerto LEFT JOIN agentes_carga on tarifas.id_agente_carga_tarifa=agentes_carga.id_agente_carga LEFT JOIN puertos as porto on tarifas.id_puerto_destino_tarifa=porto.id_puerto LEFT JOIN paises ON puertos.id_pais_puerto=paises.id_pais LEFT JOIN paises as paiso ON porto.id_pais_puerto=paiso.id_pais WHERE contrato_tarifa='$contrato_tarifa'";


			$resul = mysqli_query($conectar , $sql);
			$total = mysqli_num_rows($resul);

			while($row_total=mysqli_fetch_assoc($resul)){
				$id_contrato_tarifa=$row_total['id_contrato_tarifa'];
				$contrato_tarifa=$row_total['contrato_tarifa'];
				$cod_contrato=$row_total['cod_contrato'];
				$nombre_contrato=$row_total['nombre_contrato'];
				$vigenciai_tarifa=$row_total['vigenciai_tarifa'];
				$vigenciaf_tarifa=$row_total['vigenciaf_tarifa'];
				$id_puerto_origen_tarifa=$row_total['id_puerto_origen_tarifa'];
				$id_puerto_destino_tarifa=$row_total['id_puerto_destino_tarifa'];
				$id_agente_carga_tarifa=$row_total['id_agente_carga_tarifa'];
				$flete20_tarifa=$row_total['flete20_tarifa'];
				$flete40_tarifa=$row_total['flete40_tarifa'];
				$flete40hq_tarifa=$row_total['flete40hq_tarifa'];
				$free_time_tarifa=$row_total['free_time_tarifa'];
				$gastos_en_destino_tarifa=$row_total['gastos_en_destino_tarifa'];
				$puertol=$row_total['nombre_puerto'];
				$paisl=$row_total['nombre_pais'];
				$puertod=$row_total['puertoDestino'];
				$paisd=$row_total['paisDestino'];
				$fecha=$row_total['vigenciai_tarifa'];
				$fecha2=$row_total['vigenciaf_tarifa'];
				$id_agente=$row_total['id_agente_carga'];
				$agente=$row_total['nombre_agente_carga'];
				
			}


		?>

			<!--Inicio elementos contenedor-->

			

		<div class="container theme-showcase" role="main">
			<table border="0" background="images/v6.png" width="100%" align="center"><tr><td>
				<h1>&nbsp;<img src="images/logot2.png" width="14%"><span class="glyphicon glyphicon-paste  text-dark" aria-hidden='true'></span>
					<br><p></h1></td></tr></table>
			<div class="page-header">
			
			</div>
			<form class="form-horizontal" name="formcontato" method="POST" action="<?php echo "editpricing.php?cod=$cod&u=$u";?>">

			<!--Consulta de los clientes de la base de datos para ingresar el bl-->

			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">
					Contrato ALX:
				</label>

				<?php
					//consulta sql para el select contratos-->
					
					$sql="SELECT * FROM contratos order by cod_contrato, nombre_contrato";
					$resul = mysqli_query($conectar , $sql);
					$total = mysqli_num_rows($resul);
				?>

				<input type="hidden" name="id_contrato_tarifa" value="<?php echo $id_contrato_tarifa; ?>">


				<div class="col-sm-5">
				    <select class="form-control chosen" aria-label="contrato" name="contrato" id="contrato" placeholder="contrato" required>

                            <?php
                            echo "<option selected value=".$contrato_tarifa.">".$cod_contrato." - ".$nombre_contrato."</option>";
                                while($row_total=mysqli_fetch_assoc($resul)){

									$id_contrato=$row_total['id_contrato'];
									$cod_contrato=$row_total["cod_contrato"];
									$nombre_contrato=$row_total["nombre_contrato"];

						 			echo "<option value=".$id_contrato.">".$cod_contrato." - ".$nombre_contrato."</option>"; 
						 		}
						 	?>
			    	</select>
			    </div>

			</div>



			<?php			
			//consulta sql para el select puertos-->
			
			$sql="select puertos.nombre_puerto,puertos.id_puerto,paises.nombre_pais from puertos LEFT JOIN paises ON puertos.id_pais_puerto = paises.id_pais order by nombre_pais, nombre_puerto";
			$resul = mysqli_query($conectar , $sql);
			$total = mysqli_num_rows($resul);
			?>

			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">
					Puerto de Origen: <i class="fas fa-ship"></i>
				</label>

				<div class="col-sm-5">
				    <select class="form-control chosen" aria-label="pol" name="pol" id="pol" placeholder="pol" required>
                            <?php
                            	$i=0;
                            	echo "<option selected value=".$id_puerto_origen_tarifa.">".$paisl." - ".$puertol."</option>"; 
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
			</div>

			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">
					Puerto de Destino: <i class="fas fa-ship"></i>
				</label>
				<div class="col-sm-5">
			    	<select class="form-control chosen" aria-label="pod" id="pod" name="pod" placeholder="pod" required>
                            <?php
                            echo "<option selected value=".$id_puerto_destino_tarifa.">".$paisd." - ".$puertod."</option>"; 
                            $j=$i;
                            $i=0;
                                while($i<=$j){
						 			echo "<option value=".$id_puerto[$i].">".$nombre_pais[$i]." - ".$nombre_puerto[$i]."</option>"; 
						 			$i=$i+1;
						 		}?>
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
					Naviera: <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
				</label>

				<div class="col-sm-3">
				     <select class="form-control chosen" aria-label="tipo" id="agente" name="agente" placeholder="tipo" required>
                        <?php
                        echo "<option selected value=".$id_agente.">".$agente."</option>";
                            while($row_total=mysqli_fetch_assoc($resul)){
					 		echo "<option value=".$row_total['id_agente_carga'].">".$row_total['nombre_agente_carga']."</option>"; 
					 		}
					 	?>
			    	</select>
			    </div>
			</div>	

			<!--Tarifa 20ST-->
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">
					Tarifa 20 ST :
				</label>

				<div class="col-sm-2">
					<input type="number" class="form-control" name="flete20" placeholder="Escriba el valor" required value="<?php echo "$flete20_tarifa";?>">
				</div>
			</div>

			<!--Tarifa 40ST-->
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">
					Tarifa 40 ST :
				</label>

				<div class="col-sm-2">
					<input type="number" class="form-control" name="flete40" placeholder="Escriba el valor" required value="<?php echo "$flete40_tarifa";?>" onkeyup="document.getElementById('flete40hq').value = this.value">
				</div>
			</div>

			<!--Tarifa 40HC-->
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">
					Tarifa 40 HC :
				</label>

				<div class="col-sm-2">
					<input type="number" class="form-control" id="flete40hq" name="flete40hq" placeholder="Escriba el valor" required value="<?php echo "$flete40hq_tarifa";?>">
				</div>
			</div>

			<!--días libres en destino-->
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">
					D&iacute;as Libres en destino :
				</label>

				<div class="col-sm-2">
					<input type="number" style="width:80px;" class="form-control" name="free" placeholder=" # " required value="<?php echo "$free_time_tarifa";?>">
				</div>
			</div>

			<!--Gastos en destino-->
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">
					Gastos en Destino :
				</label>

				<div class="col-sm-2">
					<input type="number" class="form-control" name="gd" placeholder="Escriba el valor" required value="<?php echo "$gastos_en_destino_tarifa";?>">
				</div>
			</div>

			<!--Fecha inicio vegencia-->
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">
					Fecha Inicio Vigencia :
				</label>

				<div class="col-sm-2">
					<input class="form-control input-sm" type="date" id="fecha" name="fecha" sise="30" required/ value="<?php echo "$fecha";?>">
				</div>
			</div>

			<!--Fecha fin vegencia-->
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">
					Fecha Fin Vigencia :
				</label>

				<div class="col-sm-2">
					<input class="form-control input-sm" type="date" id="fecha2" name="fecha2" sise="30" required/ value="<?php echo "$fecha2";?>">
				</div>
			</div>
			




			<br><p>



				<input class="btn btn-success" type="submit" value="Guardar Cambios en tarifa">

				<!-- Botón Regresar -->
				<a href="<?php echo "listarpricing.php?cod=$cod&u=$u";?>" class="btn btn-success" role="button" aria-pressed="true">Regresar</a></td>

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