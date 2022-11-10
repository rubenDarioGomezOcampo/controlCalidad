<?php
        include_once('db.php');

        if(!empty($_POST['id'])){
                $id = $_POST['id'];
        }
        $arrayTotal = array();

        $conectar=conn(); //ejecuta las conexiones a la b.d.
        $sql="select puertos.nombre_puerto,puertos.id_puerto,paises.nombre_pais,paises.iso2 from puertos LEFT JOIN paises ON puertos.id_pais_puerto = paises.id_pais where puertos.id_puerto='$id'";
        $resul = mysqli_query($conectar , $sql);
        $total = mysqli_num_rows($resul);
        if ($total > 0){
                $arrayTotal=mysqli_fetch_assoc($resul);
                echo json_encode($arrayTotal,JSON_UNESCAPED_UNICODE);
                exit;      
        }else{
                echo "No hay datos";
        }
?>