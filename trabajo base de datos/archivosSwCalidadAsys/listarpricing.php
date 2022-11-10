<?php
	include_once('db.php');
	//incluye las instrucciones para el bloqueo de la página
	if(!empty($_GET["cod"]) and !empty($_GET["u"])){
		$cod = $_GET["cod"]; //se recibe el código aleatorio y se verifica que exista en la B.D.
		$u = $_GET["u"]; //se recibe el usuario y se verifica que exista en la B.D.

		if(!empty($_GET["q"])){
			$q = $_GET["q"];
		}
		else{
			//Por defecto ordena la consulta según la fecha de vigencia final
			$q="tarifas.vigenciaf_tarifa asc";
		}


		//adicion a la consulta sql, que filtra el puerto
		if(!empty($_GET["puerto"])){
			$puerto=$_GET["puerto"];
			$p=1;
			$q="nombre_agente_carga";
		}
		else if(!empty($_GET["puertod"])){
			$puerto=$_GET["puertod"];
			$p=2;
			//Permite ordenar la consulta segun la siguiente columan de la tabla
			$q="nombre_agente_carga";
		}
		else if(!empty($_GET["naviera"])){
			$puerto=$_GET["naviera"];
			$p=3;
			//Permite ordenar la consulta segun la siguiente columan de la tabla
			$q="puertoDestino";
		}
		else{
			//Si se accede a la lista general, no se filtran puertos
			$p=0;
		}


		
		if (validar($conectar,$u,$cod)==1){  //if 1
	  		echo"<meta http-equiv='Refresh' content='0;url=index.html'>";
		}
		else { //else 1
			//Toda la página queda dentro del else para que nos se muestre nada en caso de error.
			include_once('listarpricing_txt.php');

		}// del else 1
	}//if 1 del inicio se cierra
	else {
		echo"<meta http-equiv='Refresh' content='0;url=index.html'>";
	}
 ?>
