<?php
session_start();
if($_SESSION['usuario'] != "administrador"){
    session_destroy();
    header('Location:../../billetera');
}
$user;
$pass;
if(isset($_GET['user']) && !empty($_GET['user']) &&isset($_GET['pass']) && !empty($_GET['pass'])){
$user = $_GET['user'];
$pass = $_GET['pass'];
}
include '../conexion.php';
$result = $mysqli->query('SELECT * FROM billeteraUsers ORDER BY id ASC');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <style>
        .parent{
        display: flex;
        }
        .parent input{
        width: 100px;
        }
    </style>
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
                <a href="cerrarAdmin.php" class="btn btn-dark mt-2 w-100">Salir</a>
            
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
            <div class="col-12 col-md-8 offset-md-2">
                <?php
                if($result->num_rows > 0){
                    ?>
                    <div class="table-responsive">
                    <table class="table " >
                        <thead>
                            <tr>
                                <th class="text-center"></th>
                                <th class="d-none">ID</th>
                                <th>User</th>
                                <th>Pass</th>
                            </tr>
                        </thead>
                    <tbody>
                    <?php
                    while($fila = $result->fetch_assoc()){
                        ?>
                        <tr>
                            <th><button class='btnEliminar btn btn-danger'>x</button></th>
                            <th  class="d-none"><?php echo $fila['id'];?></th>
                            <th name="user" class="editable"><?php echo $fila['user'];?></th>
                            <th name="pass" class="editable" style="width:50px !important;"><?php echo $fila['pass'];?></th> 
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                    </table>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    
            <form action="deleteAdmin.php" style="display:none" method="POST" name="form-delete">
                <input type="text" name="id" id="inputId">
            </form>
            <form action="editAdmin.php" style="display:none" method="POST" name="form-edit">
                <input type="text" name="value" id="editId">
            </form>
            <script src="admin.js"></script>
</body>
</html>