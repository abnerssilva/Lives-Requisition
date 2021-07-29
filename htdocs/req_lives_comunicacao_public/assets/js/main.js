////////////////////////////////////////////////////////////////////////////// MAIN JS - REQUISIÇÃO DE EVENTOS //////////////////////////////////////////////////////////////////////

// IIFS (IMMEDIATELY INVOKED FUNCTION EXPRESSION)

    function mostraFormulario(hashtagIdSection) {
        const section = document.querySelector(hashtagIdSection)
       
        //if(section) {
        //    escondePergunta(section)
        //}

        $(section).removeAttr('style')
        $(section).attr('style', `opacity: 0;`)
        section.classList.add(`entraDiv`)
       
    }

    // Função que mostra pergunta escondida em determinados eventos de click
    function mostraPergunta(Secao, hashtagIdSecao, idInput, idInput2) {//Ex.: 'LocalExt', '#local', 'local_ext'
        const secao = document.querySelector(hashtagIdSecao)
        const div = document.getElementById(`novaDiv${Secao}`)
        const input = document.getElementById(idInput)
        const input2 = document.getElementById(idInput2)
        if(div) {
            escondePergunta(div)
        }
        $(div).removeAttr('style')
        $(div).attr('style', `opacity: 0;`)
        div.classList.add(`entraDiv`)
        try {
            input.classList.add('validar')
            input2.classList.add('validar')
        } catch {}
    }

    // Função que esconde pergunta em determinados eventos de click
    function escondePergunta(hastagIdNovaDiv) { // Ex.: '#novaDivLocalExt'
        try {
            const divNova = document.querySelector(hastagIdNovaDiv)
            divNova.setAttribute('style', 'display: none;')
        } catch (err) {}   
    }

    // Função para criação da quantidade de sessões do evento de acordo com a quantidade selecionada
    function criaSessoes(valor) {
        const div = document.getElementById('novaDivHorarioAgenda')
        div.removeAttribute('style')
        let html = ''

        for(let i = 1; i <= valor; i++) {
            html += `<br>
                <li class="entraDiv" style="opacity: 0;">
                    Sessão ${i}
                    <div class="input-group-prepend d-flex">
                        <label class="input-group-text" style="width: 99.5%;">Data:</label>
                        <input id="data_ini${i}" class="validar form-control" type="date" name="data_sessao[]">                   
                    </div>
                    <div class="input-group-prepend d-flex">
                        <label class="input-group-text">Hora Início / Hora Final:</label>
                        <input id="hora_ini${i}" class="validar form-control" type="time" name="hora_inicio_sessao[]">
                        <input id="hora_fim${i}" class="form-control" type="time" name="hora_fim_sessao[]">
                    </div>
                </li>`
        }
        $('#ulHorarioAgenda').empty();
        $('#ulHorarioAgenda').show();
        $('#ulHorarioAgenda').html(html);
    }

    // Função que identifica se determinado checkbox está checado ou nâo para criar efeito
    function verificaCheckbox(idCheckbox, hashtagIdInput){  
        
        if($('#'+idCheckbox).is(':checked')){
            //Se retornar true, mostra a div
            $("#div"+idCheckbox).show(500);
            $(hashtagIdInput).attr('class', `form-control validar`)
        } else{
            //Se retornar false, esconde a div
            $("#div"+idCheckbox).hide(500);
            $(hashtagIdInput).removeAttr('class', `form-control validar`)
            $(hashtagIdInput).attr('class', `form-control`)
        }    
    }

    // Classe de Validação do Formulário
    class ValidaFormulario {
        constructor(){
            this.formulario = document.querySelector('.secao1')
            this.eventos()
        }

        eventos() {
            this.formulario.addEventListener('submit', e => {
                this.handleSubmit(e)
            })
        }

        handleSubmit(e) {
            e.preventDefault()
            const checkFields = this.isValid()
            console.log(checkFields);
            if(checkFields) {
            this.formulario.submit()
            } 
        }

        isValid() {

            let valid = true

            $('.invalid-feedback').remove();

            for(let campo of this.formulario.querySelectorAll('.validar')) {
                const label = campo.previousElementSibling.innerText
                if(!campo.value) {
                    campo.setAttribute('class', "validar form-control d-block is-invalid")
                    this.createError(campo, `Campo "${label}" é obrigatório.`)               
                    valid = false 
                } else { 
                    campo.setAttribute('class', "validar form-control d-block is-valid") 
                    valid = true
                }
            }

            let radioAgenda = $("input[name='sessao_unica']")
            if(radioAgenda.is(':checked')) {
                valid = true           
            } else {
                this.createError2('Pergunta "Sessâo Única?" precisa ser respondida.');
                valid = false 
            }

            let radioLocal = $("input[name='local0']")                                                              
            if(radioLocal.is(':checked')) {  
                let radioLocalInt = $("input[name='local_int']")                                                              
                if(radioLocalInt.is(':checked')) { 
                    valid = true          
                } else {
                    this.createError2('"Dentro da PIB" precisa ter algo marcado.');
                    valid = false
                }         
            } else {
                this.createError2('Pergunta "Seu Evento é na PIB ou Externo?" precisa ser respondida.');
                valid = false
            }      

            let checkboxsMidias = $("input[name='midia[]']")
            if(checkboxsMidias.is(':checked')) { 
                valid = true          
            } else {
                this.createError2('Seção "Canais e Redes" precisa ter algo marcado.');
                valid = false
            }

            let checkboxsRecursos = $("input[name='recurso[]']")
            if(checkboxsRecursos.is(':checked')) { 
                valid = true          
            } else {
                this.createError2('Seção "Recursos" precisa ter algo marcado.');
                valid = false
            }

            let radioEquipePropria = $("input[name='equipe_propria']")
            if(radioEquipePropria.is(':checked')) {  
                valid = true         
            } else {
                this.createError2('Pergunta "Tem Equipe Própria?" precisa ser respondida.');
                valid = false
            }

            let radioVoluntarios = $("input[name='volunteer']")
            if(radioVoluntarios.is(':checked')) {   
                valid = true        
            } else {
                this.createError2('Pergunta "Precisa de Voluntários?" precisa ser respondida.');
                valid = false
            }

            let radioInscricao = $("input[name='inscricao']")
            if(radioInscricao.is(':checked')) {
                valid = true           
            } else {
                this.createError2('Pergunta "Haverá Cobrança de Inscrição?" precisa ser respondida.');
                valid = false 
            }

            return valid;
        }                 

        createError(campo, msg) {
            const div = document.createElement('div')
            div.innerHTML = msg
            div.setAttribute('class', 'invalid-feedback d-block')
            div.setAttribute('style', 'width: 100%;')
            this.formulario.append(div)
        }

        createError2(msg) {
            const div = document.createElement('div')
            div.innerHTML = msg
            div.setAttribute('class', 'invalid-feedback d-block')
            div.setAttribute('style', 'width: 100%;')
            this.formulario.append(div)
        }

    }

    let valida = new ValidaFormulario()

    