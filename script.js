window.onload = ()=>{
let descripcionI = document.getElementById('descripcionI');
let descripcionE = document.getElementById('descripcionE');
let fechaI = document.getElementById('fechaI');
let fechaE = document.getElementById('fechaE');

let montoI = document.getElementById('montoI');
let montoE = document.getElementById('montoE');

let cargarIngreso = document.getElementById('cargarIngreso');
let tbodyI = document.getElementById('tbodyI');
let tbodyE = document.getElementById('tbodyE');
let formI = document.getElementById('formI');
let formE = document.getElementById('formE');
let ingresos = document.getElementById('ingresos');
let cantidadI = document.getElementById('cantidadI');
let egresos = document.getElementById('egresos');
let cantidadE = document.getElementById('cantidadE');
let billetera = document.getElementById('billetera');
let cargarEgreso = document.getElementById('cargarEgreso');
let sectionIngresos = document.querySelectorAll('.section-ingresos');
let sectionEgresos = document.querySelectorAll('.section-egresos');
let seleccionado = document.createElement('div');

let btnIngresos = document.getElementById('btnIngresos');
let btnEgresos = document.getElementById('btnEgresos');

let infoUser = document.getElementById('infoUser');
let mes = document.getElementById('mes');
let mesAnterior = document.getElementById('mesAnterior');
let mesSiguiente = document.getElementById('mesSiguiente');

let mesE = document.getElementById('mesE');
let mesAnteriorE = document.getElementById('mesAnteriorE');
let mesSiguienteE = document.getElementById('mesSiguienteE');
let btnBuscar = document.getElementById('btnBuscar');
let busquedaContainer = document.querySelector('.busqueda-container')
let desde = document.querySelector('#desde')
let hasta = document.querySelector('#hasta')
let reload = document.querySelector('#reload')

let ingresosArr = [];
let egresosArr = [];
let ultimoMes ='';
let ultimoMesAux = '';
let ultimoMesE='';
let ultimoMesAuxE='';

let isIngresos = true;

seleccionado.style.width = "50%";
seleccionado.style.height = "3px";
seleccionado.classList.add('bg-dark','mx-auto','mt-1')
ingresos.textContent="0";
egresos.textContent = "0";

btnBuscar.addEventListener('click',()=>{
    busquedaContainer.classList.toggle('d-none')
    reload.classList.toggle('d-none')
}
)

reload.addEventListener('click',()=>{
    let arrFilterI = ingresosArr.filter(x=>{
        let fecha = x[2].split('-')
        return fecha[1] == ultimoMes;
    })
    let arrFilterE = egresosArr.filter(x=>{
        let fecha = x[2].split('-')
        return fecha[1] == ultimoMesE;
    })
    mostrarIngresos(arrFilterI)
    mostrarEgresos(arrFilterE)
    desde.value = '';
    hasta.value = '';
    busquedaContainer.classList.toggle('d-none')
    reload.classList.toggle('d-none')
})
hasta.addEventListener('change',()=>{
    filtrarDesdeHasta(desde,hasta)
})
desde.addEventListener('change',()=>{
    filtrarDesdeHasta(desde,hasta)
})
function filtrarDesdeHasta(desde,hasta){
    let arrFilterI = ingresosArr.filter(x=>{
        let fecha = x[2]
        return fecha >= desde.value && fecha <= hasta.value;
    })
    let arrFilterE = egresosArr.filter(x=>{
        let fecha = x[2]
        return fecha >= desde.value && fecha <= hasta.value;
    })
    mostrarIngresos(arrFilterI)
    mostrarEgresos(arrFilterE)
}

// mesAnterior.addEventListener('click',()=>{
//     ultimoMes--;
//     if(ultimoMes<1){
//         ultimoMes = 1;
//     };
//     mesToString(ultimoMes)
//     console.log(ultimoMes);
//     let arrFilter = ingresosArr.filter(x=>{
//         let fecha = x[2].split('-')
//         return fecha[1] == ultimoMes;
//     })
//     if(arrFilter.length == 0){
//         tbodyI.innerHTML = `<tr>
//         <td class='text-center fw-bold fs-5 text-secondary' colspan='4'>No se encontraron resultados...</td>
//     </tr>`;
//         cantidadI.textContent = 'Movimientos: 0';
//         billetera.textContent = '0'
//         ingresos.textContent = '0'
      

//     return;
//     }
//     mostrarIngresos(arrFilter)
// })

// mesSiguiente.addEventListener('click',()=>{
//     ultimoMes++;
//     if(ultimoMes>ultimoMesAux){
//         ultimoMes = ultimoMesAux
//     };
//     mesToString(ultimoMes)

//     console.log(ultimoMes);
//     let arrFilter = ingresosArr.filter(x=>{
//         let fecha = x[2].split('-')
//         return fecha[1] == ultimoMes;
//     })
//     if(arrFilter.length == 0){
//         tbodyI.innerHTML = `<tr>
//         <td class='text-center fw-bold fs-5 text-secondary' colspan='4'>No se encontraron resultados...</td>
//     </tr>`;
//     cantidadI.textContent = 'Movimientos: 0';
//     return
//     }
//     mostrarIngresos(arrFilter)
// })
// mesAnteriorE.addEventListener('click',()=>{
//     ultimoMesE--;
//     if(ultimoMesE<1){
//         ultimoMesE = 1;
//     };
//     mesToString(ultimoMesE)
//     console.log(ultimoMesE);
//     let arrFilter = egresosArr.filter(x=>{
//         let fecha = x[2].split('-')
//         return fecha[1] == ultimoMesE;
//     })
//     if(arrFilter.length == 0){
//         tbodyE.innerHTML = `<tr>
//         <td class='text-center fw-bold fs-5 text-secondary' colspan='4'>No se encontraron resultados...</td>
//     </tr>`;
//         cantidadE.textContent = 'Movimientos: 0';
//         egresos.textContent = '0'
//         billetera.textContent = '0'
//     return;
//     }
//     mostrarEgresos(arrFilter)
// })

// mesSiguienteE.addEventListener('click',()=>{
//     ultimoMesE++;
//     if(ultimoMesE>ultimoMesAuxE){
//         ultimoMesE = ultimoMesAuxE
//     };
//     mesToString(ultimoMesE)

//     console.log(ultimoMesE);
//     let arrFilter = egresosArr.filter(x=>{
//         let fecha = x[2].split('-')
//         return fecha[1] == ultimoMesE;
//     })
//     if(arrFilter.length == 0){
//         tbodyE.innerHTML = `<tr>
//         <td class='text-center fw-bold fs-5 text-secondary' colspan='4'>No se encontraron resultados...</td>
//     </tr>`;
//     cantidadE.textContent = 'Movimientos: 0';
//     return
//     }
//     mostrarEgresos(arrFilter)
// })


btnIngresos.addEventListener('click',()=>{
    isIngresos = true;
    // mesToString(ultimoMes)
    sectionEgresos.forEach(x=>x.classList.add('d-none'))
    sectionIngresos.forEach(x=>x.classList.remove('d-none'))
  //  egresos.removeChild(seleccionado);
  btnIngresos.appendChild(seleccionado);
})
btnEgresos.addEventListener('click',()=>{
    isIngresos = false;
    // mesToString(ultimoMesE)
    sectionIngresos.forEach(x=>x.classList.add('d-none'))
    sectionEgresos.forEach(x=>x.classList.remove('d-none'))
//ingresos.removeChild(seleccionado);
btnEgresos.appendChild(seleccionado);
    })



let loader = document.querySelector('.loader');

const eliminarId = async (e)=>{
    if(confirm("¿Seguro desea borrar este pago?")){
        loader.classList.remove('d-none');
        let id = e.target.parentElement.firstChild.textContent;
        var formData = new FormData();
        formData.append("id",id);
         console.log(formData.get("id"));
         let peticion = await fetch('eliminarIngreso.php',{
             method:"POST",
             body:formData,
         });
         let resultado = await peticion.json();
         getDatos();
         loader.classList.add('d-none');
    }
}


const getDatos =  ()=>{
    loader.classList.remove('d-none');
    let form = new FormData();
    form.append('user',infoUser.textContent)
    fetch('verIngresos.php',{
        method:"POST",
        body:form,
    })
    .then(res => res.json())
    .then(data => {
        ingresosArr = data;
        console.log(data);
        ultimoMes = ingresosArr[0][2].split('-');
        ultimoMes = ultimoMes[1]
        ultimoMesAux = ultimoMes;
        tbodyI.innerHTML ="";
        let arrFilter = data.filter(x=>{
            let fecha = x[2].split('-')
            return fecha[1] == ultimoMes;
        })
        console.log(ultimoMes);
        // mesToString(ultimoMes)
        mostrarIngresos(arrFilter)
    });
   
}

function mostrarIngresos(resultado){
    tbodyI.innerHTML = ''
    for (let i = 0; i < resultado.length; i++) {
        let tr = document.createElement('tr');
         for (let j = 0; j < resultado[i].length; j++) {
             let th = document.createElement('th');
             if(j==0){
                th.classList.add('d-none');
            }
             if(j==3){
                 th.classList.add('importeI');
             }if(j==4){
                continue;
            }
             th.textContent = resultado[i][j];
             tr.appendChild(th);
           
         }
         let btnEliminar = document.createElement('button');
         btnEliminar.textContent = "x";
         btnEliminar.classList.add('btnEliminar')
         btnEliminar.addEventListener('click',eliminarId);
         tr.appendChild(btnEliminar)
         tbodyI.appendChild(tr)
     }
     let totalIngreso=0;
     let cantidadIngresos = 0;
     let totalDeIngresos = document.querySelectorAll('.importeI');
     for(let item of totalDeIngresos){
        cantidadIngresos++;
        totalIngreso += parseInt(item.textContent,10);
     }
     cantidadI.textContent = "Movimientos: "+cantidadIngresos;
     ingresos.textContent = totalIngreso;//new Intl.NumberFormat().format(totalIngreso);
     ingresos.appendChild(seleccionado);
     let fechaActual = new Date();
     let dia = fechaActual.getDate();
     let mes = fechaActual.getMonth() +1;
     let year = fechaActual.getFullYear();
     if(mes < 10){
         mes = "0"+mes;
     }
     if(dia < 10){
        dia = "0"+dia;
    }
     fechaI.value = year+"-"+mes+"-"+dia;
     loader.classList.add('d-none');
     billetera.textContent = parseInt(ingresos.textContent)-parseInt(egresos.textContent);
}

const postPago = async (e)=>{
    loader.classList.remove('d-none');
    e.preventDefault();
    var formData = new FormData(formI);
    formData.append('user',infoUser.textContent)
    console.log(formData.get("descripcionI"));
    let peticion = await fetch('setIngreso.php',{
        method:"POST",
        body:formData,
    });
    let resultado = await peticion.json();
    getDatos();
    loader.classList.add('d-none');
    descripcionI.value="";
    montoI.value=""

}


cargarIngreso.addEventListener('click',postPago)
getDatos();


//EGRESOS

const eliminarEgreso = async (e)=>{
    if(confirm("¿Seguro desea borrar este pago?")){
        loader.classList.remove('d-none');
        let id = e.target.parentElement.firstChild.textContent;
        var formData = new FormData();
        formData.append("id",id);
         console.log(formData.get("id"));
         let peticion = await fetch('eliminarEgreso.php',{
             method:"POST",
             body:formData,
         });
         let resultado = await peticion.json();
         getEgresos();
         loader.classList.add('d-none');
    }
}


const getEgresos =  ()=>{
    loader.classList.remove('d-none');
    let form = new FormData();
    form.append('user',infoUser.textContent)
    fetch('verEgresos.php',{
        method:"POST",
        body:form
    })
    .then(res => res.json())
    .then(data => {
        tbodyE.innerHTML ="";
        egresosArr = data;
        console.log(data);
        ultimoMesE = egresosArr[0][2].split('-');
        ultimoMesE = ultimoMesE[1]
        ultimoMesAuxE = ultimoMesE;
        let arrFilter = data.filter(x=>{
            let fecha = x[2].split('-')
            return fecha[1] == ultimoMesE;
        })
        mostrarEgresos(arrFilter)
       
    });
   
}

function mostrarEgresos(resultado){
    tbodyE.innerHTML = ''
    for (let i = 0; i < resultado.length; i++) {
        let tr = document.createElement('tr');
         for (let j = 0; j < resultado[i].length; j++) {
             let th = document.createElement('th');
             if(j==0){
                th.classList.add('d-none');
            }
             if(j==3){
                 th.classList.add('importeE');
             }
             if(j==4){
                 continue;
             }
             th.textContent = resultado[i][j];
             tr.appendChild(th);
           
         }
         let btnEliminar = document.createElement('button');
         btnEliminar.textContent = "x";
         btnEliminar.classList.add('btnEliminar')
         btnEliminar.addEventListener('click',eliminarEgreso);
         tr.appendChild(btnEliminar)
         tbodyE.appendChild(tr)
     }
     let totalEgreso=0;
     let cantidadEgresos = 0;
     let totalDeEgresos = document.querySelectorAll('.importeE');
     for(let item of totalDeEgresos){
        cantidadEgresos++;
        totalEgreso += parseInt(item.textContent,10);
     }
     cantidadE.textContent = "Movimientos: "+cantidadEgresos;
     egresos.textContent = totalEgreso;//new Intl.NumberFormat().format(totalEgreso);
     console.log(parseInt(ingresos.textContent),parseInt(egresos.textContent))
     billetera.textContent = parseInt(ingresos.textContent)-parseInt(egresos.textContent);
     let fechaActual = new Date();
     let dia = fechaActual.getDate();
     let mes = fechaActual.getMonth() +1;
     let year = fechaActual.getFullYear();
     if(mes < 10){
         mes = "0"+mes;
     }
     if(dia < 10){
        dia = "0"+dia;
    }
     fechaE.value = year+"-"+mes+"-"+dia;
     loader.classList.add('d-none');
}

const postEgreso = async (e)=>{
    loader.classList.remove('d-none');
    e.preventDefault();
    var formData = new FormData(formE);
    formData.append('user',infoUser.textContent)
    console.log(formData.get("descripcionE"));
    let peticion = await fetch('setEgreso.php',{
        method:"POST",
        body:formData,
    });
    let resultado = await peticion.json();
    getEgresos();
    loader.classList.add('d-none');
    descripcionE.value="";
    montoE.value="";

}


cargarEgreso.addEventListener('click',postEgreso)
getEgresos();

function mesToString(num){
    num = parseInt(num)
    if(!isIngresos){
        switch(num){
            case 1: mesE.textContent = 'Enero'
            break;
            case 2: mesE.textContent = 'Febrero'
            break;
            case 3: mesE.textContent = 'Marzo'
            break;
            case 4: mesE.textContent = 'Abril'
            break;
            case 5: mesE.textContent = 'Mayo'
            break;
            case 6: mesE.textContent = 'Junio'
            break;
            case 7: mesE.textContent = 'Julio'
            break;
            case 8: mesE.textContent = 'Agosto'
            break;
            case 9: mesE.textContent = 'Septiembre'
            break;
            case 10: mesE.textContent = 'Octubre'
            break;
            case 11: mesE.textContent = 'Noviembre'
            break;
            case 12: mesE.textContent = 'Diciembre'
            break;
        }
    }
    else
    {
        switch(num){
            case 1: mes.textContent = 'Enero'
            break;
            case 2: mes.textContent = 'Febrero'
            break;
            case 3: mes.textContent = 'Marzo'
            break;
            case 4: mes.textContent = 'Abril'
            break;
            case 5: mes.textContent = 'Mayo'
            break;
            case 6: mes.textContent = 'Junio'
            break;
            case 7: mes.textContent = 'Julio'
            break;
            case 8: mes.textContent = 'Agosto'
            break;
            case 9: mes.textContent = 'Septiembre'
            break;
            case 10: mes.textContent = 'Octubre'
            break;
            case 11: mes.textContent = 'Noviembre'
            break;
            case 12: mes.textContent = 'Diciembre'
            break;
        }
    }
}
}



