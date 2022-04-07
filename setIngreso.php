<?php
// $json = file_get_contents('php://input');
// $datos = json_decode($json, true);



if(isset($_POST["descripcion"]) && !empty($_POST["descripcion"]) && isset($_POST["fecha"])
  && !empty($_POST["fecha"]) && isset($_POST["monto"]) && !empty($_POST["monto"]) && isset($_POST["user"]) 
  && !empty($_POST["user"])){
    $descripcion =  $_POST["descripcion"];
    $fecha = $_POST["fecha"];
    $monto = $_POST["monto"];
    $user = $_POST["user"];
    include "conexion.php";

    $mysqli->query("INSERT INTO ingresos (descripcion,fecha,monto,user) VALUES ('".$descripcion."','".$fecha."','".$monto."','".$user."')");
    echo json_encode("cargado correctamente");
}else{
    echo json_encode("error:");
}



//$mysqli->query("INSERT INTO pago (descripcion,fecha,monto) VALUES ('pepe','pepe','pepo')");



?>