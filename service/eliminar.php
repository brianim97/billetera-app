<?php
if(isset($_POST['id']) && !empty($_POST['id'])){
    $id = $_POST['id'];

    include 'conexion.php';

    if($result = $mysqli->query("DELETE FROM service WHERE id = '".$id."'")){
        echo json_encode('ok');
    }else {
            echo json_encode($mysqli->error);
    }
}
?>