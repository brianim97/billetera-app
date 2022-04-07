let btnEliminar = document.querySelectorAll('.btnEliminar');
let editables = document.querySelectorAll('.editable');
btnEliminar.forEach(item =>{
    item.addEventListener('click',function(){
        let id = item.parentElement.parentElement.children[1].textContent;
        document.getElementById('inputId').value = id;
        document.forms['form-delete'].submit();
    })});
    editables.forEach(item =>{
        item.addEventListener('dblclick',editablesDbl)
        console.log('funcion creada')
    })
    
    function editablesDbl(){
        if(this.firstChild.firstChild)
        {
        }
        else
        {

       this.innerHTML = "<div class='parent'><input value="+this.firstChild.textContent+" ><button class='btnEditar btn'><i class='bi bi-check-circle-fill'></i></button></div>";
       let inputTr = this.firstChild.firstChild;
       let name = this.getAttribute('name');
       
       let btnEditar = document.querySelectorAll('.btnEditar');
       btnEditar.forEach(item=>{
           item.addEventListener('click',function(){
            console.log(item.parentElement.parentElement.parentElement.children)
            let id = item.parentElement.parentElement.parentElement.children[1].textContent;
            let input = document.getElementById('editId');
            input.value = id+"/"+name+"/"+inputTr.value;
            console.log(input.value);
            document.forms['form-edit'].submit();
           
           })
       })
    }
    }