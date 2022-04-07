<?php
$userAux;
$passAux;
if(isset($_POST['user']) && !empty($_POST['user']) &&
isset($_POST['pass']) && !empty($_POST['pass'])){

    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $passHash = password_hash($pass,PASSWORD_DEFAULT);
    $userAux = $user;
    $passAux = $pass;
    include "conexion.php";
    $consulta = "INSERT INTO billeteraUsers (user,pass) values(?,?)";
    $statement = $mysqli->prepare($consulta);
    $statement->bind_param('ss',$user,$passHash);
                 // $consulta = "INSERT INTO usuarios (user,pass) values ('".$user."','".$passHash."')";
                 // if($mysqli->query($consulta))echo '<h4>Correcto<h4/>';
    if($statement->execute()){
        header('Location:admin.php?user='.$user.'&pass='.$pass);
    }
    else{
        echo '<h4>Error<h4/>'.$passAux.$userAux;
    }
}




?>