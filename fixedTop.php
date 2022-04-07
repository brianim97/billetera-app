<div class="col-12 d-flex justify-content-center  fixed-top bg-dark overflow-auto">
    <button  class="shadow-none bg-dark p-2 text-light text-center btn fw-bold"><span id="infoUser"><?php echo $_SESSION['user'];?></span><br>
    <a class=" fw-bold p-1 rounded btn-danger salir" href="cerrarSesion.php">SALIR</a></button>
    <button class="bg-success  p-2 text-center text-light rounded-start btn">Billetera<h6 class="fw-bold" id="billetera"></h6></button>
    <button id="btnIngresos" class="bg-primary btn p-2 text-center text-light rounded-start">Ingresos<h6 class="fw-bold" id="ingresos"></h6></button>
    <!-- <span class="bg-warning p-2 text-center text-light rounded-end">Cantidad<h6 class="fw-bold" id="cantidadI"></h6></span> -->
    <div class="loader d-none m-auto"></div>
    <!-- <button  class="bg-secondary p-2 text-center btn text-light rounded-end">Desde<br>Hasta<h6 class="fw-bold" id="desdeHasta"></h6></button>  -->
    <button id="btnEgresos" class="bg-danger p-2 btn text-center text-light rounded-end">Egresos<h6 class="fw-bold" id="egresos"></h6></button>
    <!-- <span class="bg-warning p-2 text-center text-light rounded-end">Cantidad<h6 class="fw-bold" id="cantidadE"></h6></span>    -->
    <?php 
    if($_SESSION['user']=='Sanse'){
        echo"<br><a href='service' class='bg-warning p-2 btn text-center rounded-end d-flex'><h6 class='fw-bold m-auto' id='lubricentro'>Service</h6></a>";
    }
    ?>
</div>