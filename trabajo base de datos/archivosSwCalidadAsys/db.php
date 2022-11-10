<?php

// Configuración necesaria para acceder a la data base.

$hostname = "localhost";

$usuariodb = "root";

$passworddb = "";

$dbname = "puerto_control_calidad";

// $hostname = "localhost";

// $usuariodb = "root";

// $passworddb = "";

// $dbname = "<puerto_control_calidad></puerto_control_calidad>";





// Generando la conexión con el servidor

$conectar = mysqli_connect($hostname, $usuariodb, $passworddb, $dbname);



function conn(){

  $hostname = "localhost";

  $usuariodb = "root";
  
  $passworddb = "";
  
  $dbname = "puerto_control_calidad";

// $hostname = "localhost";

// $usuariodb = "id17153162_root";

// $passworddb = "F++~jC%a2_u*j=";

// $dbname = "id17153162_alx_tracking";



  // Generando la conexión con el servidor

  $conectar = mysqli_connect($hostname, $usuariodb, $passworddb, $dbname);

  return $conectar;

}







function validar($conexion,$u,$cod){

  //::::ACCESO MEDIANTE EL USUARIO:::

  //Se seleccionan los datos de usuario y codigo de acceso para dar entrada



  $queAcceso = "SELECT online FROM acceso where user='".$u."'";

  $resAcceso = mysqli_query($conexion,$queAcceso) or die(mysqli_error($conexion));

  $rowAcceso = mysqli_fetch_assoc($resAcceso);

  if(mysqli_num_rows($resAcceso)==0){

    return 1;

  }

  else

  {//else 1

    if ($rowAcceso['online']!=$cod || $u==null || $cod==null) {

       mysqli_close($conexion);

       return 1;

    }

    else{

       mysqli_close($conexion);

       return 0;

     }

   }//else 1



}



?>