<?php
if(isset($_POST['busqueda']) && !empty($_POST['busqueda'])){
    $busqueda = $_POST['busqueda'];
    include 'conexion.php';

    if($result = $mysqli->query("SELECT * FROM service WHERE patente like'".$busqueda."' ORDER BY id DESC")){
        $array = array();
        if($result->num_rows > 0){
            while($fila = $result->fetch_row()){
                array_push($array,$fila);
            }
            echo json_encode($array);
        }else {
            echo json_encode('error');
        }
    }else{
        echo json_encode('error');
    }
}else {
    echo json_encode('error');
}


?>