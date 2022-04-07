<?php
if(isset($_POST['value']) && $_POST['value'] != "" ){
    include "../conexion.php";

   $value = $_POST['value'];
   $value = explode('/',$value);
    if($value[1] == 'pass'){
        $value[2] = password_hash($value[2],PASSWORD_DEFAULT);
    }                                             
    $consulta = "UPDATE billeteraUsers  SET ".$value[1]."='".$value[2]."' WHERE id ='".$value[0]."'";   
    $resultado = $mysqli->query($consulta);
    if($resultado){
      
        header('Location: ../admin');
    }
    else {
        echo $mysqli->error."    ".$value[2];
        // echo "ERROR EL CARGAR USUARIO";
    }
}else{
    echo "ERROR VACIO";
}
?>