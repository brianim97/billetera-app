<?php
if(isset($_POST['id']) && $_POST['id'] != "" ){
    include "../conexion.php";

   $id = $_POST['id'];

    $consulta = "DELETE FROM billeteraUsers WHERE id =".$id;   
    $resultado = $mysqli->query($consulta);
    if($resultado){
        header('Location: ../admin');
    }
    else {
        echo "ERROR EL CARGAR USUARIO";
    }
}else{
    echo "ERROR VACIO";
}
?>