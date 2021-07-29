// Função que insere a classe Bootstrap no Select de responsáveis
$(document).ready(function() {
    let valor1 = $('#sel1 option:selected').val();
    const select1 = document.getElementById('sel1')

    if(valor1 == 0) {
         select1.setAttribute('class', `form-control list-group list-group-item-danger`)
         select1.blur()
     } else if (valor1 == 1) {
         select1.setAttribute('class', `form-control list-group list-group-item-warning`)
         select1.blur()
     } else if (valor1 == 2) {
        select1.setAttribute('class', `form-control list-group list-group-item-primary`)
        select1.blur()
     } else if (valor1 == 3) {
        select1.setAttribute('class', `form-control list-group list-group-item-dark`)
        select1.blur()
     } else if (valor1 == 4) {
        select1.setAttribute('class', `form-control list-group list-group-item-success`)
        select1.blur()
    } 

    let valor2 = $('#sel2 option:selected').val();
    const select2 = document.getElementById('sel2')

    if(valor2 == 0) {
         select2.setAttribute('class', `form-control list-group list-group-item-danger`)
         select2.blur()
     } else if (valor2 == 1) {
         select2.setAttribute('class', `form-control list-group list-group-item-warning`)
         select2.blur()
     } else if (valor2 == 2) {
        select2.setAttribute('class', `form-control list-group list-group-item-primary`)
        select2.blur()
     } else if (valor2 == 3) {
        select2.setAttribute('class', `form-control list-group list-group-item-dark`)
        select2.blur()
     } else if (valor2 == 4) {
        select2.setAttribute('class', `form-control list-group list-group-item-success`)
        select2.blur()
    }

    let valor3 = $('#sel3 option:selected').val();
    const select3 = document.getElementById('sel3')

    if(valor3 == 0) {
         select3.setAttribute('class', `form-control list-group list-group-item-danger`)
         select3.blur()
     } else if (valor3 == 1) {
         select3.setAttribute('class', `form-control list-group list-group-item-warning`)
         select3.blur()
     } else if (valor3 == 2) {
        select3.setAttribute('class', `form-control list-group list-group-item-primary`)
        select3.blur()
     } else if (valor3 == 3) {
        select3.setAttribute('class', `form-control list-group list-group-item-dark`)
        select3.blur()
     } else if (valor3 == 4) {
        select3.setAttribute('class', `form-control list-group list-group-item-success`)
        select3.blur()
    }

    let valor4 = $('#sel4 option:selected').val();
    const select4 = document.getElementById('sel4')

    if(valor4 == 0) {
         select4.setAttribute('class', `form-control list-group list-group-item-danger`)
         select4.blur()
     } else if (valor4 == 1) {
         select4.setAttribute('class', `form-control list-group list-group-item-warning`)
         select4.blur()
     } else if (valor4 == 2) {
        select4.setAttribute('class', `form-control list-group list-group-item-primary`)
        select4.blur()
     } else if (valor4 == 3) {
        select4.setAttribute('class', `form-control list-group list-group-item-dark`)
        select4.blur()
     } else if (valor4 == 4) {
        select4.setAttribute('class', `form-control list-group list-group-item-success`)
        select4.blur()
    }

    let valor5 = $('#sel5 option:selected').val();
    const select5 = document.getElementById('sel5')

    if(valor5 == 0) {
         select5.setAttribute('class', `form-control list-group list-group-item-danger`)
         select5.blur()
     } else if (valor5 == 1) {
         select5.setAttribute('class', `form-control list-group list-group-item-warning`)
         select5.blur()
     } else if (valor5 == 2) {
        select5.setAttribute('class', `form-control list-group list-group-item-primary`)
        select5.blur()
     } else if (valor5 == 3) {
        select5.setAttribute('class', `form-control list-group list-group-item-dark`)
        select5.blur()
     } else if (valor5 == 4) {
        select5.setAttribute('class', `form-control list-group list-group-item-success`)
        select5.blur()
    }

    let valor6 = $('#sel6 option:selected').val();
    const select6 = document.getElementById('sel6')

    if(valor6 == 0) {
         select6.setAttribute('class', `form-control list-group list-group-item-danger`)
         select6.blur()
     } else if (valor6 == 1) {
         select6.setAttribute('class', `form-control list-group list-group-item-warning`)
         select6.blur()
     } else if (valor6 == 2) {
        select6.setAttribute('class', `form-control list-group list-group-item-primary`)
        select6.blur()
     } else if (valor6 == 3) {
        select6.setAttribute('class', `form-control list-group list-group-item-dark`)
        select6.blur()
     } else if (valor6 == 4) {
        select6.setAttribute('class', `form-control list-group list-group-item-success`)
        select6.blur()
    }
 })

 function criaClasseSelectResp(id, valor) {
     const select = document.getElementById(id)
     if(valor == 0) {
         select.setAttribute('class', `form-control list-group list-group-item-danger`)
         select.blur()
     } else if (valor == 1) {
         select.setAttribute('class', `form-control list-group list-group-item-warning`)
         select.blur()
     } else if (valor == 2) {
        select.setAttribute('class', `form-control list-group list-group-item-primary`)
        select.blur()
     } else if (valor == 3) {
        select.setAttribute('class', `form-control list-group list-group-item-dark`)
        select.blur()
     } else if (valor == 4) {
        select.setAttribute('class', `form-control list-group list-group-item-success`)
        select.blur()
    }
 }
