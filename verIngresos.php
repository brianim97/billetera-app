<?php
if(isset($_POST['user']) && !empty($_POST['user'])){
   $user = $_POST['user'];
include "conexion.php";

$resultado = $mysqli->query("SELECT * FROM ingresos WHERE user = '".$user."' ORDER BY fecha DESC,id DESC");

$filas = array();
while ($fila = $resultado->fetch_row()) {
   array_push($filas,$fila);
}
echo json_encode($filas);
}else{
   echo json_encode("usuario no seteado");
}
?>