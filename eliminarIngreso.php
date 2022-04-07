<?php

    
if(isset($_POST['id'])){
    $id = $_POST['id'];

    include "conexion.php";

    $mysqli->query("DELETE FROM ingresos WHERE id =$id");

    echo json_encode("Pago borrado correctamente");


}else{
    echo json_encode("Error al borrar pago, id recibido: ".$_POST['id']);
}

?>