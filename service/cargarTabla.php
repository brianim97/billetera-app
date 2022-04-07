<?php
include 'conexion.php';

if($result = $mysqli->query('SELECT * FROM service ORDER BY id DESC')){
    $array = array();
    if($result->num_rows > 0){
        while($fila = $result->fetch_row()){
            array_push($array,$fila);
        }
        echo json_encode($array);
    }else {
        echo json_encode('sin datos');
    }
}else{
    echo json_encode('error');
}

?>