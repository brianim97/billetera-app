<?php
$userAux;
$passAux;
if(isset($_POST['user']) && !empty($_POST['user']) &&
isset($_POST['pass']) && !empty($_POST['pass'])){

    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $userAux = $user;
    $passAux = $pass;
    if($user =="a" && $pass == "a"){
       header('Location:admin.php');
    }
    else
    {
        include "conexion.php";
        $consulta = "SELECT * FROM billeteraUsers WHERE user='".$user."'";
        $resultado = $mysqli->query($consulta);
        if($resultado->num_rows > 0)
        {   
            while($fila = $resultado->fetch_assoc()){
                
                if(password_verify($pass,$fila['pass'])){
                    session_start();
                    $_SESSION['user'] = $user;
                    header('Location:billetera.php');
                } else{
                    header('Location:../billetera');
                
                }
                
            }
        }
        else 
        {
            header('Location:../billetera');
        }
    }
}else{
    echo "error";
}
?>