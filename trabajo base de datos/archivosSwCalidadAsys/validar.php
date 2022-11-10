<?php
//require_once 'mensajes.php';
include_once('db.php');
include("cod.php");
include("varios.php");

$cod=codigo(); //Se asigna un código aleatorio para cada usuario (sesion)
//Se almacenan los datos recibidos del formulario
$acceso=0;
$user = $_POST["user"];
$password = $_POST["password"];
$fecha_hoy= date("Y-m-d H:i:s");
$ip=getRealIP();

$queElect = "SELECT user,password,online FROM acceso";
$resElect = mysqli_query($conectar,$queElect) or die(mysqli_error());

	while ($rowElect = mysqli_fetch_assoc($resElect)) {
		if ($rowElect['user']==$user and $rowElect['password']==$password){ //comprueba si el usuario y clave son correctos
                   $acceso=1; //da acceso al usuario mediante la bandera acceso
                   $q="UPDATE acceso SET online='$cod',ingreso='$fecha_hoy',ip='$ip' WHERE user='$user'"; //almacena en la B.D. el código aleatorio de la sesión.
                   $res=mysqli_query($conectar,$q) or die(mysqli_error());
                   Break; //sale del while pues se ha encontrado el usuario. No hace falta buscar mas.
                }

  }
if ($acceso==1) {
echo"<meta http-equiv='Refresh' content='0;url=listarbl.php?cod=$cod&u=$user'>";
  }
else
echo"<meta http-equiv='Refresh' content='0;url=index.html'>";

//Se cierra la conexión con la B.D.
mysqli_close($conectar);
?>