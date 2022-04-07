<?php
session_start();
if(!isset($_SESSION['user'])){
    header('Location: acceso.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="google" content="notranslate" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Control de ingresos y egresos</title>
</head>
<body>
    <div class="container ">
    <?php include "fixedTop.php";?>   
        <div class="row" id="section-ingresos">
            <div class="col-12 d-flex justify-content-center mt-5">
                <form id="formI" class="mt-4">
                    <input class="form-control mt-2" type="text" name="descripcion" id="descripcionI" placeholder="Descripcion ingreso">
                    <input type="date" name="fecha" id="fechaI" class="form-control mt-2">
                    <input class="form-control mt-2" type="text" name="monto" id="montoI" placeholder="Monto ingreso">
                    <button type="submit" class="btn btn-dark w-100 mt-2" id="cargarIngreso">Insertar</button>
                </form>
               
            </div>
            

            <div class="col-12 mt-4">
               <div class="d-flex justify-content-center align-items-center mb-3">
                    <button class="btn border-dark" id="mesAnterior"><</button>
                    <span class="mx-2 fw-bold">Mes: <span class="fw-normal" id="mes"></span></span>
                    <button class="btn border-dark" id="mesSiguiente">></button>
                </div>
                <h6 class="text-center fw-bold" id="cantidadI"></h6>
                <table class="table small table table-hover table-responsive"  >
                    <thead>
                        <tr class="bg-dark text-light">
                            <!-- <th>ID</th> -->
                            <th>Descripcion</th>
                            <th>Fecha</th>
                            <th>Monto</th>
                            <th style="width: 15px;"></th>
                        </tr>
                    </thead>
                    <tbody id="tbodyI"></tbody>
                </table>
            </div>
        </div>
        <div class="row d-none"id="section-egresos">
            <div class="col-12 d-flex justify-content-center mt-5 ">
                <form id="formE" class="mt-4">
                    <input class="form-control mt-2" type="text" name="descripcion" id="descripcionE" placeholder="Descripcion egreso">
                    <input type="date" name="fecha" id="fechaE" class="form-control mt-2">
                    <input class="form-control mt-2" type="text" name="monto" id="montoE" placeholder="Monto egreso">
                    <button type="submit" class="btn btn-dark w-100 mt-2" id="cargarEgreso">Insertar</button>
                </form>
            </div>
            

            <div class="col-12 mt-4 ">
            <div class="d-flex justify-content-center align-items-center mb-3">
                    <button class="btn border-dark" id="mesAnteriorE"><</button>
                    <span class="mx-2 fw-bold">Mes: <span class="fw-normal" id="mesE"></span></span>
                    <button class="btn border-dark" id="mesSiguienteE">></button>
                </div>
            <h6  class="text-center fw-bold"  id="cantidadE"></h6>
                <table class="table small table table-hover table-responsive  h-25">
                    <thead>
                        <tr class="bg-dark text-light">
                            <!-- <th>ID</th> -->
                            <th>Descripcion</th>
                            <th>Fecha</th>
                            <th>Monto</th>
                            <th style="width: 15px;"></th>
                        </tr>
                    </thead>
                    <tbody id="tbodyE"></tbody>
                </table>
            </div>
        </div>
    </div>
    
    <script src="script.js"></script>
</body>
</html>