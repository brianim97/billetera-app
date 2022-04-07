window.onload = () =>{
    let insertar = document.getElementById('btnInsertar');
    let patente = document.getElementById('patente');
    let kilometros = document.getElementById('kilometros');
    let aceiteUtilizado = document.getElementById('aceiteUtilizado');
    let aceite = document.getElementById('aceite');
    let fAceite = document.getElementById('fAceite');
    let fAire = document.getElementById('fAire');
    let fCombustible = document.getElementById('fCombustible');
    let fHabitaculo = document.getElementById('fHabitaculo');
    let fecha = document.getElementById('fecha');
    let tbody = document.getElementById('tbody'); 
    let buscar = document.getElementById('buscar');

    fecha.value = fechActual();
    
    buscar.addEventListener('input',(e)=>{
        let form = new FormData();
        form.append('busqueda',e.target.value)
        fetch('buscar.php',{
            method:'post',
            body:form
        })
        .then(res=>res.json())
        .then(res=> {
            if(e.target.value == ""){
                cargarTabla();
            }else if(res !='error'){
            tbody.innerHTML =""
            renderizarTabla(res);
         }
        }
      )
    })

    insertar.addEventListener('click',(e)=>{
        console.log('ajja')
        e.preventDefault();
        let form = new FormData();
        form.append('patente',patente.value.toUpperCase())
        form.append('kilometros',kilometros.value)
        form.append('aceiteUtilizado',aceiteUtilizado.value)
        form.append('aceite',parsearCheckbox(aceite.checked))
        form.append('fAceite',parsearCheckbox(fAceite.checked))
        form.append('fAire',parsearCheckbox(fAire.checked))
        form.append('fCombustible',parsearCheckbox(fCombustible.checked))
        form.append('fHabitaculo',parsearCheckbox(fHabitaculo.checked))
        form.append('fecha',fecha.value)
       
        fetch('ingresar.php',{
            method:'POST',
            body:form
        })
        .then(res=>res.json())
        .then(res=>cargarTabla())
    })
    function cargarTabla(){
        fetch('cargarTabla.php')
        .then(res=>res.json())
        .then(res=> {
            if(res !='error' && res != "sin datos"){
            console.log(res)
            tbody.innerHTML =""
            renderizarTabla(res);
            limpiarCampos();
        }else if(res == "error" || res == "sin datos"){
            tbody.innerHTML =""
        }
        }
      )
    }

    cargarTabla()

    function limpiarCampos(){
        patente.value ="";
        kilometros.value ="";
        aceiteUtilizado.value ="";
        aceite.checked = false;
        fAceite.checked = false;
        fAire.checked = false;
        fCombustible.checked = false;
        fHabitaculo.checked = false;

    }
   
    function renderizarTabla(res){
        for(let i = 0; i < res.length; i++) {
            let tr = document.createElement('tr');

            for (let j = 0; j < res[i].length; j++) {

                let th = document.createElement('th');
                if(j == 0){
                    th.classList.add('d-none')
                }
                if(res[i][j] == 't'){
                    th.innerHTML = "<h4 class='span'></h4>";
                }else if(res[i][j] == 'f'){

                }else{
                    th.textContent = res[i][j];    
                }
                tr.appendChild(th)  
            }
            let th = document.createElement('th');
            let btnEliminar = document.createElement('button')
            btnEliminar.classList.add('btn','btn-red','btnEliminar','fw-bold');
            btnEliminar.textContent = "x";
            btnEliminar.addEventListener('click',eliminar)
            th.appendChild(btnEliminar)
            tr.append(th)
            tbody.appendChild(tr)
            
        }
    }
   function eliminar(e){
    id = e.target.parentElement.parentElement.firstChild.textContent;
    let form = new FormData();
    form.append('id',id);    
    fetch('eliminar.php',{
            method:'post',
            body:form
        })
        .then(res=>res.json())
        .then(res=>{
            console.log(res)
            cargarTabla()
        })
   }
   
   
   
    function fechActual(){
        let fecha = new Date();
        let day = fecha.getDate();
        let month = fecha.getMonth()+1;
      
        day = agregarCero(day);
        month = agregarCero(month);
      
        let fechaH = fecha.getFullYear()+"-"+month+"-"+day;
        return fechaH;
    }
    
    function agregarCero(item){
        if(item<10){
            item = "0"+item;
        }
        return item;
    }


    function parsearCheckbox(value){
        if(value){
            return 't';
        }
        return  'f';
        
    }

}