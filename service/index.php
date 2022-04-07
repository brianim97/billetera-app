<?php
session_start();
if($_SESSION['user']=="Sanse"){
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lubricentro</title>
        <meta name="google" content="notranslate" />
        <link rel="stylesheet" href="stylesLubricentro.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    </head>
    <body>
    <div class="container">
        <div class="row">
            <a href="../" class="btn btn-warning fw-bold ">Volver atras</a>
            <div class="col-12 col-md-6 offset-md-3">
                
                <h4 class='text-center mt-2'>Administracion de Service</h4>
                <form id='form-ingresar'>
                    <input  type="date" name="fecha" id="fecha" class="form-control mt-3">
                    <input autocomplete="off" class='form-control  mt-3' type="text" name="patente" id="patente" placeholder="Patente..">
                    <input autocomplete="off" class='form-control my-3' type="number" name="kilometros" id="kilometros" placeholder="Kilometros..">
                    <input autocomplete="off" class='form-control my-3' type="text" name="aceiteUtilizado" id="aceiteUtilizado" placeholder="Aceite..">
                    <div class="d-flex flex-wrap-custom border border-2 justify-content-center align-items-baseline text-center">
                    <div class='p-2'>
                    <label class="form-check-label">Cambio Aceite</label>
                    <input class='form-check-input p-3' type="checkbox" id="aceite" name='aceite'>
                    </div>
                    <div class='p-2'>
                    <label class="form-check-label">Filtro Aceite</label>
                    <input class='form-check-input p-3' type="checkbox" id="fAceite" name='fAceite'>
                    </div>
                    <div class='p-2'>
                    <label class="form-check-label">Filtro Aire</label>
                    <input class='form-check-input p-3' type="checkbox" name='fAire' id="fAire">
                    </div>
                    <div class='p-2'>
                    <label class="form-check-label">Filtro Combustible</label>
                    <input class='form-check-input p-3' type="checkbox" name='fCombustible' id="fCombustible">
                    </div>
                    <div class='p-2'>
                    <label class="form-check-label">Filtro Habitaculo</label>
                    <input class='form-check-input p-3' type="checkbox" name='fHabitaculo' id="fHabitaculo">
                    </div>
                    </div>
                    <button type="submit" id="btnInsertar" class='btn btn-dark w-100 p-2 mt-3'>Insertar</button>
                </form>
            </div>
            <div class="col-12 col-md-6 p-0 offset-md-3">
               
                <input type="text" name='buscar' id="buscar" class="form-control mt-5" placeholder='Buscar por patente..'>
               
                <div class="table-responsive">
                <table class="table table-bordered text-center small table-hover table-dark">
                    <thead>
                        <tr>
                            <th>PATENTE</th>
                            <th>KM</th>
                            <th>TIPO AC</th>
                            <th>C/AC</th>
                            <th>F/AC</th>
                            <th>F/AI</th>
                            <th>F/CB</th>
                            <th>F/HB</th>
                            <th>FECHA</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id='tbody' class="">
                      
                            <!-- <th><h4 class='span'></h4></th> -->
                           
                            <!-- <th></th> -->
                        

                        
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>    
    <script src="lubricentro.js"></script>
    </body>
    </html>
    <?php
}else {
    header('Location:../');
}
?>