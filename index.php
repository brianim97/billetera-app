<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: acceso.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <meta charset="UTF-8">
    <meta name="google" content="notranslate" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Control de ingresos y egresos</title>
</head>

<body>
    <div class="container ">
        <?php include "fixedTop.php"; ?>
        <div class="row">

        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center section-ingresos mt-5">
                <form id="formI" class="mt-5">
                    <input class="form-control mt-2" type="text" name="descripcion" id="descripcionI" placeholder="Descripcion ingreso">
                    <input type="date" name="fecha" id="fechaI" class="form-control mt-2">
                    <input class="form-control mt-2" type="number" name="monto" id="montoI" placeholder="Monto ingreso">
                    <button type="submit" class="btn btn-dark w-100 mt-2" id="cargarIngreso">Insertar</button>
                </form>
            </div>
            <div class="col-12 d-flex justify-content-center mt-5 section-egresos d-none">
                <form id="formE" class="mt-5">
                    <input class="form-control mt-2" type="text" name="descripcion" id="descripcionE" placeholder="Descripcion egreso">
                    <input type="date" name="fecha" id="fechaE" class="form-control mt-2">
                    <input class="form-control mt-2" type="number" name="monto" id="montoE" placeholder="Monto egreso">
                    <button type="submit" class="btn btn-dark w-100 mt-2" id="cargarEgreso">Insertar</button>
                </form>
            </div>
            <div class="col-12 col-md-6 m-auto mt-5 d-flex align-items-center flex-column flex-md-row busqueda-container d-none">
                <label class="me-md-1 fw-bold" for="">Desde</label>
                <input id="desde" type="date" class="form-control">
                <label class="ms-md-5 me-md-1 fw-bold" for="">Hasta</label>
                <input id="hasta" type="date" class="form-control">
            </div>
            <div class="col-12 d-flex justify-content-between align-items-end">
                <h6 class="text-center fw-bold section-ingresos" id="cantidadI"></h6>
                <h6 class="text-center fw-bold section-egresos d-none" id="cantidadE"></h6>
                <div class="d-flex align-items-end">
                    <button id="reload" class="btn btn-dark mb-1 me-1 d-none"><i class="bi bi-arrow-clockwise"></i></button>
                    <button class="btn btn-primary mt-4 mb-1" id="btnBuscar">Buscar</button>
                </div>
            </div>
            <div class="col-12  section-ingresos">
                <div class="d-flex justify-content-center align-items-center mb-3 d-none">
                    <button class="btn border-dark" id="mesAnterior">
                        < </button>
                            <span class="mx-2 fw-bold">Mes: <span class="fw-normal" id="mes"></span></span>
                            <button class="btn border-dark" id="mesSiguiente">></button>
                </div>

                <table class="table small table table-hover table-responsive">
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
            <div class="col-12  section-egresos d-none">
                <div class="d-flex justify-content-center align-items-center mb-3 d-none">
                    <button class="btn border-dark" id="mesAnteriorE">
                        <</button>
                            <span class="mx-2 fw-bold">Mes: <span class="fw-normal" id="mesE"></span></span>
                            <button class="btn border-dark" id="mesSiguienteE">></button>
                </div>
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