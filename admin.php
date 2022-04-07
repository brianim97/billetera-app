<?php
$user;
$pass;
if(isset($_GET['user']) && !empty($_GET['user']) &&isset($_GET['pass']) && !empty($_GET['pass'])){
$user = $_GET['user'];
$pass = $_GET['pass'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-5 mt-5 m-auto bg-danger p-5 rounded">
                <h4 class="text-center mb-3 text-light">Bienvenido<br>Brian</h4>
                <h6 class="text-center mb-3 text-light">Crear usuario</h6>
                <form action="crearUsuario.php"method="POST">
                <input class="form-control mt-2 text-center" type="text" name="user" placeholder="Usuario">
                <input class="form-control mt-2 text-center" type="password" name="pass" placeholder="Contraseña">
                <button type="submit" class="w-100 btn btn-dark mt-2">Crear usuario</button>
                <?php
                    if(isset($user) && isset($pass)){
                        echo "
                        <h6 class='text-center mt-2 text-light'>Usuario: ".$user."</h6>
                        <h6 class='text-center text-light'>Contraseña: ".$pass."</h6>
                        ";
                    }
                ?>
                </form>
            </div>
        </div>
    </div>
</form>
</body>
</html>