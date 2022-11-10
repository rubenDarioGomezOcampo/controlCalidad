<!DOCTYPE html>
<html>
	<head>
		<title>Consultar Cliente</title>
		
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

			<!--Inicio elementos contenedor-->

		<div class="container theme-showcase" role="main">
			<table border="0" background="images/v5.png" width="100%" align="center"><tr><td>
				<h1>&nbsp;<img src="images/logot2.png" width="14%">
					<span class="glyphicon glyphicon-search  text-dark" aria-hidden='true'></span>
					<br><p></h1></td></tr></table>
			<div class="page-header">
			<font face="verdana" size="2">
				Escriba el n&uacute;mero de identificaci&oacute;n del cliente en el cuadro de texto.
			</font>	
			</div>
			<form class="form-horizontal" name="formcontato" method="POST" action="<?php echo "consultacliente2.php?cod=$cod&u=$u";?>">

            <div class="form-group">
				<table border="0" width="100%">
				<tr>
					<td width="30%" align="right">
						<label for="inputEmail3" class="col-sm-14 control-label">
						<h3><span class='glyphicon glyphicon-search text-dark' aria-hidden='true'></span>&nbsp;ID Cliente:</h3>
					</label>
					</td>
					<td width="70%">
						<div class="col-sm-5">&nbsp;
						<input type="text" class="form-control" name="id_cliente" placeholder="Escriba el # de ID" required>
					</div>
					</td>
				</tr>
			
			</div>
			<tr><td></td>
				<td>
					<br><p>&nbsp;&nbsp;&nbsp;&nbsp;<input class="btn btn-success" type="submit" value="Buscar">
				</td>
			</tr>
			
			</table>
			</form>
		</div>
		<br><p>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>

<!--Fin elementos contenedor-->
<?php include 'footer_nosql.php'; ?>

</body>

</html>
