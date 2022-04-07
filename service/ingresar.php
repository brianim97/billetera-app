<?php

if(isset($_POST['patente']) && !empty($_POST['patente'])
 && isset($_POST['kilometros']) && !empty($_POST['kilometros'])
 && isset($_POST['aceiteUtilizado']) && !empty($_POST['aceiteUtilizado'])
 && isset($_POST['aceite']) && !empty($_POST['aceite'])
 && isset($_POST['fAceite']) && !empty($_POST['fAceite'])
 && isset($_POST['fAire']) && !empty($_POST['fAire'])
 && isset($_POST['fCombustible']) && !empty($_POST['fCombustible'])
 && isset($_POST['fHabitaculo']) && !empty($_POST['fHabitaculo'])
 && isset($_POST['fecha']) && !empty($_POST['fecha'])){

    $patente = $_POST['patente'];
    $kilometros = $_POST['kilometros'];
    $aceiteUtilizado = $_POST['aceiteUtilizado'];
    $aceite = $_POST['aceite'];
    $fAceite = $_POST['fAceite'];
    $fAire = $_POST['fAire'];
    $fCombustible = $_POST['fCombustible'];
    $fHabitaculo = $_POST['fHabitaculo'];
    $fecha = $_POST['fecha'];

    include 'conexion.php';
    $consulta = "INSERT INTO service (patente,kilometros,aceiteUtilizado,aceite,fAceite,fAire,fCombustible,fHabitaculo,fecha)
    VALUES ('".$patente."','".$kilometros."','".$aceiteUtilizado."','".$aceite."','".$fAceite."','".$fAire."','".$fCombustible."','".$fHabitaculo."','".$fecha."')";
    if($result = $mysqli->query($consulta)){
        echo json_encode('ok');
    }else{
        echo json_encode($mysqli->error);
    }
    
 }
 
 else {
    echo json_encode('error');
   }
?>