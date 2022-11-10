<?php
	session_start();
	include_once('db.php');
 ?>
<!DOCTYPE html>
<html>
	<head>
	

		<title>Tarifario</title>
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


		

    <!--Hojas de Estilo -->

     <!--Archivos de javascript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!--Archivos de javascript-->


		<!--fin scripts select-->
		<!--Estilo para que el select del modal salga completo-->
		<style type="text/css">
			.chosen-container{
			  width: 100% !important;
			}

			th{
				text-align: center;
			}

			td{
				font-size: 14px;
			}
		

		</style>

		<!--Script para que funcionen los títulos de los href-->
		<script>
			$(document).ready(function(){
			  $('[data-toggle="tooltip"]').tooltip();   
			});
		</script>

    </head>

	<body>
		<?php include 'header.php'; ?>
		<?php include 'modal.php'; ?>

		<div class="container-fluid theme-showcase" role="main">
			<table border="0" background="images/v7.png" width="80%" align="center"><tr><td>
				<h1>&nbsp;<img src="images/logot2.png" width="14%"><br><p></h1></td></tr></table>
			<div class="page-header">				
				<table class="table">
  					<thead class="thead-dark">
						<tr class="active">
							<th scope="col">#</th>
							<th scope="col">Contrato
								<a href="<?php echo "listarpricing.php?cod=$cod&u=$u&q=id_contrato_tarifa asc";?>" data-toggle="tooltip" data-placement="top" title="Ordenar A-Z">
								<span class='glyphicon glyphicon-sort-by-attributes' aria-hidden='true'></span></a>
								&nbsp;
								<a href="<?php echo "listarpricing.php?cod=$cod&u=$u&q=id_contrato_tarifa desc";?>" data-toggle="tooltip" data-placement="top" title="Ordenar Z-A">
								<span class='glyphicon glyphicon-sort-by-attributes-alt' aria-hidden='true'></span></a>
							</th>

							<th scope="col"><a href="" data-toggle="modal" data-target="#miModal" >Puerto Origen</a>
								<a href="<?php echo "listarpricing.php?cod=$cod&u=$u&q=id_puerto_origen_tarifa asc";?>" data-toggle="tooltip" data-placement="top" title="Ordenar A-Z" >
								<span class='glyphicon glyphicon-sort-by-attributes' aria-hidden='true'></span></a>
								&nbsp;
								<a href="<?php echo "listarpricing.php?cod=$cod&u=$u&q=id_puerto_origen_tarifa desc";?>" data-toggle="tooltip" data-placement="top" title="Ordenar Z-A">
								<span class='glyphicon glyphicon-sort-by-attributes-alt' aria-hidden='true'></span></a>					
							</th>

							<th scope="col"><a href="" data-toggle="modal" data-target="#miModal2" >Puerto Destino</a>
								<a href="<?php echo "listarpricing.php?cod=$cod&u=$u&q=id_puerto_destino_tarifa asc";?>" data-toggle="tooltip" data-placement="top" title="Ordenar A-Z">
								<span class='glyphicon glyphicon-sort-by-attributes' aria-hidden='true'></span></a>
								&nbsp;
								<a href="<?php echo "listarpricing.php?cod=$cod&u=$u&q=id_puerto_destino_tarifa desc";?>" data-toggle="tooltip" data-placement="top" title="Ordenar Z-A">
								<span class='glyphicon glyphicon-sort-by-attributes-alt' aria-hidden='true'></span></a>
							</th>
							<th scope="col"><a href="" data-toggle="modal" data-target="#miModal3" >Naviera</a>
								<a href="<?php echo "listarpricing.php?cod=$cod&u=$u&q=id_agente_carga_tarifa asc";?>" data-toggle="tooltip" data-placement="top" title="Ordenar A-Z">
								<span class='glyphicon glyphicon-sort-by-attributes' aria-hidden='true'></span></a>
								&nbsp;
								<a href="<?php echo "listarpricing.php?cod=$cod&u=$u&q=id_agente_carga_tarifa desc";?>" data-toggle="tooltip" data-placement="top" title="Ordenar Z-A">
								<span class='glyphicon glyphicon-sort-by-attributes-alt' aria-hidden='true'></span></a>
							</th>
							<th scope="col">20ST</th>
							<th scope="col">40ST</th>
							<th scope="col">40HC</th>
							<th scope="col">Free</th>
							<th scope="col">GD</th>
							<th scope="col" colspan="2">Vigencia de la Tarifa</th>
							
						</tr>
					</thead>
					<tbody>


	
			<!-- consulta sql datos básicos BL -->
		<?php
			$conectar=conn(); //ejecuta las conexiones a la b.d.
			$id_estado=0;

			if ($p==1){
				$sql="SELECT contrato_tarifa,vigenciai_tarifa,vigenciaf_tarifa,flete20_tarifa,flete40_tarifa,flete40hq_tarifa,free_time_tarifa,gastos_en_destino_tarifa,agentes_carga.id_agente_carga,agentes_carga.nombre_agente_carga,contratos.cod_contrato,puertos.id_puerto,puertos.nombre_puerto,paises.nombre_pais,paises.iso2,porto.nombre_puerto as puertoDestino,paiso.nombre_pais as paisDestino,paiso.iso2 as iso2Destino FROM tarifas LEFT JOIN contratos ON tarifas.id_contrato_tarifa=contratos.id_contrato LEFT JOIN puertos ON tarifas.id_puerto_origen_tarifa=puertos.id_puerto LEFT JOIN agentes_carga on tarifas.id_agente_carga_tarifa=agentes_carga.id_agente_carga LEFT JOIN puertos as porto on tarifas.id_puerto_destino_tarifa=porto.id_puerto LEFT JOIN paises ON puertos.id_pais_puerto=paises.id_pais LEFT JOIN paises as paiso ON porto.id_pais_puerto=paiso.id_pais where puertos.id_puerto='$puerto' order by $q";
			}
			else if ($p==0){
				$sql="SELECT contrato_tarifa,vigenciai_tarifa,vigenciaf_tarifa,flete20_tarifa,flete40_tarifa,flete40hq_tarifa,free_time_tarifa,gastos_en_destino_tarifa,agentes_carga.id_agente_carga,agentes_carga.nombre_agente_carga,contratos.cod_contrato,puertos.id_puerto,puertos.nombre_puerto,paises.nombre_pais,paises.iso2,porto.nombre_puerto as puertoDestino,paiso.nombre_pais as paisDestino,paiso.iso2 as iso2Destino FROM tarifas LEFT JOIN contratos ON tarifas.id_contrato_tarifa=contratos.id_contrato LEFT JOIN puertos ON tarifas.id_puerto_origen_tarifa=puertos.id_puerto LEFT JOIN agentes_carga on tarifas.id_agente_carga_tarifa=agentes_carga.id_agente_carga LEFT JOIN puertos as porto on tarifas.id_puerto_destino_tarifa=porto.id_puerto LEFT JOIN paises ON puertos.id_pais_puerto=paises.id_pais LEFT JOIN paises as paiso ON porto.id_pais_puerto=paiso.id_pais order by $q";
			}
			
			else if($p==2){
				$sql="SELECT contrato_tarifa,vigenciai_tarifa,vigenciaf_tarifa,flete20_tarifa,flete40_tarifa,flete40hq_tarifa,free_time_tarifa,gastos_en_destino_tarifa,agentes_carga.id_agente_carga,agentes_carga.nombre_agente_carga,contratos.cod_contrato,puertos.id_puerto,puertos.nombre_puerto,paises.nombre_pais,paises.iso2,porto.id_puerto,porto.nombre_puerto as puertoDestino,paiso.nombre_pais as paisDestino,paiso.iso2 as iso2Destino FROM tarifas LEFT JOIN contratos ON tarifas.id_contrato_tarifa=contratos.id_contrato LEFT JOIN puertos ON tarifas.id_puerto_origen_tarifa=puertos.id_puerto LEFT JOIN agentes_carga on tarifas.id_agente_carga_tarifa=agentes_carga.id_agente_carga LEFT JOIN puertos as porto on tarifas.id_puerto_destino_tarifa=porto.id_puerto LEFT JOIN paises ON puertos.id_pais_puerto=paises.id_pais LEFT JOIN paises as paiso ON porto.id_pais_puerto=paiso.id_pais where porto.id_puerto='$puerto' order by $q";

			}
			else if($p==3){
				$sql="SELECT contrato_tarifa,vigenciai_tarifa,vigenciaf_tarifa,flete20_tarifa,flete40_tarifa,flete40hq_tarifa,free_time_tarifa,gastos_en_destino_tarifa,agentes_carga.id_agente_carga,agentes_carga.nombre_agente_carga,contratos.cod_contrato,puertos.id_puerto,puertos.nombre_puerto,paises.nombre_pais,paises.iso2,porto.id_puerto,porto.nombre_puerto as puertoDestino,paiso.nombre_pais as paisDestino,paiso.iso2 as iso2Destino FROM tarifas LEFT JOIN contratos ON tarifas.id_contrato_tarifa=contratos.id_contrato LEFT JOIN puertos ON tarifas.id_puerto_origen_tarifa=puertos.id_puerto LEFT JOIN agentes_carga on tarifas.id_agente_carga_tarifa=agentes_carga.id_agente_carga LEFT JOIN puertos as porto on tarifas.id_puerto_destino_tarifa=porto.id_puerto LEFT JOIN paises ON puertos.id_pais_puerto=paises.id_pais LEFT JOIN paises as paiso ON porto.id_pais_puerto=paiso.id_pais where agentes_carga.id_agente_carga='$puerto' order by $q";

			}

			else{

			}
		
			$resul = mysqli_query($conectar , $sql);
			$total = mysqli_num_rows($resul);

			if($total==0){	
				echo"<div class='container theme-showcase' role='main'><div class='page-header'>";		
				echo "<div class='alert alert-danger' role='alert'>";
				echo "<span class='glyphicon glyphicon-warning-sign fa-2x text-danger' aria-hidden='true'></span>";
				echo " &nbsp;&nbsp;<b>NO EXISTEN TARIFAS PARA MOSTRAR </b></div></div></div>";
			}
			else { //Hace todo lo demás
				$i=1;
				while($row_total=mysqli_fetch_assoc($resul)){
					$contrato_tarifa=$row_total['contrato_tarifa'];
					$cod_contrato=$row_total['cod_contrato'];
					$puertol=$row_total['nombre_puerto'];
					$paisl=$row_total['nombre_pais'];
					$isol=$row_total['iso2'];
					$puertod=$row_total['puertoDestino'];
					$paisd=$row_total['paisDestino'];
					$isod=$row_total['iso2Destino'];
					$fecha=$row_total['vigenciai_tarifa'];
					$fecha2=$row_total['vigenciaf_tarifa'];
					$flete20=$row_total['flete20_tarifa'];
					$flete40=$row_total['flete40_tarifa'];
					$flete40hq=$row_total['flete40hq_tarifa'];
					$free_time=$row_total['free_time_tarifa'];
					$id_agente=$row_total['id_agente_carga'];
					//$ged=$row_total['gastos_en_destino_tarifa'];
					$agente=$row_total['nombre_agente_carga'];
					$gd=$row_total['gastos_en_destino_tarifa'];

					//Cálculo de la diferencia de días entre una fecha y otra
					//Si la diferencia es mayor a 3 días, se debe poner en rojo.
					$hoy = date("Y-m-d");
					$hoy = new DateTime($hoy);
   				$fin = new DateTime($fecha2);
    			$resultado = $hoy->diff($fin);
    			//Se formatea para poder asignar a una variable como número
    			$dias=$resultado->format('%R%a');
    			//Se convierte a entero el número obtenido para poder compararlo
    			$dias=intval($dias);

    			if (($dias >= 4) && ($dias < 6)) {
    				echo "<tr bgcolor='#FDFD96'>";	
    			}
    			elseif (($dias < 4) && ($dias >=0)){
    				echo "<tr bgcolor='#EF9A9A'>";	
    			}
    			elseif ($dias < 0) {
    				echo "<tr bgcolor='#BB0B0B' style='color:white;'>";	
    			}
    			else{
						echo "<tr>";
					}
					
					//Fechas con año incluido, por si es necesario
					//$fecha = date("M j - Y", strtotime($fecha));
					//$fecha2 = date("M j - Y", strtotime($fecha2));


					//Fechas sin año incluido
					$fecha = date("M j", strtotime($fecha));
					$fecha2 = date("M j", strtotime($fecha2));

					echo "<th scope='row'>$i</th>";
					echo "<td>";
					echo "<a href='editarpricing.php?contrato_tarifa=$contrato_tarifa&cod=$cod&u=$u'>$cod_contrato</a>";
				  echo "</td>";

					echo "<td><img src='https://flagcdn.com/24x18/".$isol.".png'>&nbsp;&nbsp;$puertol - $paisl</td>";
					echo "<td><img src='https://flagcdn.com/24x18/".$isod.".png'>&nbsp;&nbsp;$puertod - $paisd</td>";
					echo "<td>$agente</td>";
					echo "<td>\$$flete20</td>";
					echo "<td>\$$flete40</td>";
					echo "<td>\$$flete40hq</td>";
					echo "<td>$free_time</td>";
					echo "<td>\$$gd</td>";					

					//Escribir tarifa vencida si la cantidad de días es inferior a 0
					if ($dias < 0) {
    				echo "<td colspan='2'>Tarifa Venci&oacute; en $fecha2</td>";	
    			}
    			else{
    					echo "<td colspan='2'>$fecha - $fecha2 <b>($dias d&iacute;as)</b></td>";
    			}

					



					/*
					if ($fecha2=='0000-00-00'){
						$fecha2="<font color='red'>Registrar Fecha</font>";	
					
						echo "<td>";
						echo "<a href='addEta.php?cod=$cod&u=$u' class='tooltip-test' title='Registrar Fecha'>";
						echo "$fecha2";
					}
					else if($contrato_tarifa=='2'){
						echo "<td><font color='#337AB7'>";
						echo "En destino ";
						echo "<span class='glyphicon glyphicon-ok' style='color:darkblue' aria-hidden='true' title='ETA'></span></td>";
						echo "</tr>";
					}

					else {
						echo "<td>";
						echo "<a href='addEta.php?cod=$cod&u=$u'>";
						echo "$fecha2 &nbsp; &nbsp;";
						echo "<span class='glyphicon glyphicon-time' aria-hidden='true' title='Registrar ETA'></span></a></td>";
						echo "</tr>";
					}
					*/
					$i+=1;		
				}
		?>

							<!--Fin sql-->
						</tbody>
					</table>

		<?php 
		} // Cierre del else
		?>		
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