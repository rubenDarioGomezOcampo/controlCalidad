<?php
	include_once('db.php');
	//incluye las instrucciones para el bloqueo de la página
	if(!empty($_GET["cod"]) and !empty($_GET["u"])){
		$cod = $_GET["cod"]; //se recibe el código aleatorio y se verifica que exista en la B.D.
		$u = $_GET["u"]; //se recibe el usuario y se verifica que exista en la B.D.
		
		if (validar($conectar,$u,$cod)==1){  //if 1
	  		echo"<meta http-equiv='Refresh' content='0;url=index.html'>";
		}
		else { //else 1
			//Toda la página queda dentro del else para que nos se muestre nada en caso de error.
			include_once('editarpricing_txt.php');

		}// del else 1
	}//if 1 del inicio se cierra
	else {
		echo"<meta http-equiv='Refresh' content='0;url=index.html'>";
	}
 ?>
