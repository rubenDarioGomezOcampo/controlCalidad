<?php
//require_once 'mensajes.php';
include_once('db.php');
include("cod.php");

$cod=codigo(); //Se asigna un código aleatorio para cada usuario (sesion)
//Se almacenan los datos recibidos del formulario
$user = $_GET["u"];

$queElect = "UPDATE acceso SET online='$cod' WHERE user='$user'";
$resElect = mysqli_query($conectar,$queElect) or die(mysqli_error());
echo"<meta http-equiv='Refresh' content='0;url=index.html'>";
//Se cierra la conexión con la B.D.
mysqli_close($conectar);
?>