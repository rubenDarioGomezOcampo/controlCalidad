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

			<form class="form-horizontal" name="form" method="POST" action="<?php echo "addEtabl.php?cod=$cod&u=$u&bl=$id_bl";?>">
								
						<table border="0" width="30%" align="center">
							
					    	<tr>
					    		<td>
					    			<label for="inputEmail3" class="col-sm-2 control-label">
					    				Fecha:
					    			</label>
					    		</td>
					    		<td><input class="form-control input-sm" type="date" id="fecha" name="fecha" /required></td>
					    	</tr>
					    	<tr><td>&nbsp;</td></tr>
					    	
							<tr>
								<td colspan="2"><input class="btn btn-success" type="submit" value="Agregar ETA - BL: <?php echo $id_bl; ?>"></td>
								<td><a href="<?php echo "listarbl.php?cod=$cod&u=$u";?>" class="btn btn-success" role="button" aria-pressed="true">Regresar</a></td>
							</tr>



						</table>						

								<input type="hidden" name="bl" value="<?php echo $id_bl; ?>" />

								</form>
							</div>
						</div>
					</div>
				</div>
				<!--Fin Modal-->

		</body>
</html>