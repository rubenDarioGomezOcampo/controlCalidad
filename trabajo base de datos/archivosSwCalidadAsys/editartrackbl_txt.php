<?php
	session_start();
	include_once('db.php');
	if(!empty($_GET["bl"])){
		$id_bl=$_GET["bl"];
		$id_estado=$_GET["id_estado"];

		$id_puerto=$_GET["id_puerto"];
		$nombre_pais=$_GET["nombre_pais"];
		$nombre_puerto=$_GET["nombre_puerto"];
		$fecha=$_GET["fecha"];
		$id_movimiento=$_GET["im"];
		$nombre_movimiento=$_GET["nm"];
		$iso2=$_GET["iso2"];

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
		<form class="form-horizontal" name="form" method="POST" action="<?php echo "edittrackbl.php?cod=$cod&u=$u";?>">
			<?php
				$conectar=conn(); //ejecuta las conexiones a la b.d.
				$sql="select puertos.nombre_puerto,puertos.id_puerto,paises.nombre_pais from puertos LEFT JOIN paises ON puertos.id_pais_puerto = paises.id_pais order by nombre_pais";
				$resul = mysqli_query($conectar , $sql);
				$total = mysqli_num_rows($resul);
			?>

			<table border="0" width="40%">
				<tr>
					<th scope="col">	
						<label for="inputEmail3" class="col-sm-2 control-label"> 
							Puerto:
						</label>
					</td>
					<td colspan="2">
					 <select class="form-control chosen" aria-label="puerto" name="puerto" placeholder="puerto" required/>
					 	<?php
					 	echo "<option selected value=".$id_puerto.">".$nombre_pais." - ".$nombre_puerto."</option>";
                                while($row_total=mysqli_fetch_assoc($resul)){

									$id_puerto=$row_total['id_puerto'];
									$nombre_pais=$row_total["nombre_pais"];
									$nombre_puerto=$row_total["nombre_puerto"];

						 			echo "<option value=".$id_puerto.">".$nombre_pais." - ".$nombre_puerto."</option>"; 
						 		}
						 	?>
			    	 </select>
			    	 <?php 	
			    	 //Se muestra la bandera del pais correspondiente
			    	 //echo"<img src='https://flagcdn.com/24x18/$iso2.png'>";
			    	 ?>	

		    		</td>
				</tr>
				<tr><td colspan="3">&nbsp;</td></tr>
		    	<tr>
		    		<td>
		    			<label for="inputEmail3" class="col-sm-2 control-label">
		    				Fecha:
		    			</label>
		    		</td>
		    		<td width="50%"><input class="form-control input-sm" type="date" id="fecha" name="fecha" sise="30" value="<?php echo $fecha; ?>" required/></td>
		    		<td width="50%"></td>
		    	</tr>
		    	<tr><td colspan="3">&nbsp;</td></tr>
		    	<tr>
					<td>	
						<label for="inputEmail3" class="col-sm-2 control-label"> 
							Estado:
						</label>
					</td>

					<?php
						$sql="SELECT * FROM movimientos_contenedor";
						$resul = mysqli_query($conectar , $sql);
						$total = mysqli_num_rows($resul);
					?>

					<td colspan="2">
					 <select class="form-control chosen" aria-label="estado" name="estado" placeholder="estado" required/>
                        <?php
                        echo "<option selected value='$id_movimiento'>$nombre_movimiento</option>"; 
                        //<option selected>Seleccione el nuevo estado</option>
                            
                                while($row_total=mysqli_fetch_assoc($resul)){
									$id_mov=$row_total['id_movimiento'];
									$nombre_mov=$row_total["nombre_movimiento"];
						 			echo "<option value='$id_mov'>$nombre_mov</option>"; 
						 		}
						 	?>
			    	 </select>
		    		</td>
				</tr>
				<tr><td colspan="3">&nbsp;</td></tr>
				<tr>
					<td></td>
					<td colspan="2"><input class="btn btn-success" type="submit" value="Editar Estado">
					<a href="<?php echo "consultabl2.php?cod=$cod&u=$u&bl=$id_bl";?>" class="btn btn-success active" role="button" aria-pressed="true">Regresar</a>
						
					</td>
				</tr>



			</table>						

			<input type="hidden" name="bl" value="<?php echo $id_bl; ?>" />
			<input type="hidden" name="id_estado" value="<?php echo $id_estado; ?>" />
			<input type="hidden" name="id_mov" value="<?php echo $id_mov; ?>" />

		</form>
			<!--Inicio elementos contenedor-->

			<div class="container theme-showcase" role="main">
				<div class="page-header">
					<h1><img src="images/logot.png" width="8%">EDITAR Movimiento de BL <?php echo $id_bl; ?> &nbsp;&nbsp;</h1>
					<hr>

					<?php
					
					?>
				</div>
				<!--Información de los movimientos del contenedor-->
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