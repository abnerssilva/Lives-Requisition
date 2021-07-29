<?php

    require "../../req_lives_comunicacao_private/evento.php";
    require "../../req_lives_comunicacao_private/evento_service.php";
    require "../../req_lives_comunicacao_private/conexao.php";

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

    if( $acao == 'inserir' ) {
        
        $arrayMidia = array($_POST["midia"][0], $_POST["midia"][1], $_POST["midia"][2], $_POST["midia"][3], $_POST["midia"][4], $_POST["midia"][5]); 
        if (in_array("R-super", $arrayMidia)) { 
            $midia = 1; 
        } else {
            $midia = 0; 
        }
    
        $arrayRecurso = array($_POST["recurso"][0]); 
        if (in_array("Som", $arrayRecurso)) { 
            $recurso = 1; 
        } else {
            $recurso = 0; 
        }    
    
        if($_POST["local_int2"]) {
            $local_int = $_POST["local_int2"];
        } else {
            $local_int = $_POST["local_int"];
        }
        
        $evento = new Evento();
        $evento->evento = $_POST['evento'];
        $evento->nome_requisitante = $_POST["nome_requisitante"];
        $evento->ministerio_requisitante = $_POST['ministerio_requisitante'];
        $evento->resp_tec = $_POST['resp_tec'];
        $evento->tel_resp_tec = $_POST['tel_resp_tec'];
        $evento->resp_g = $_POST['resp_g'];
        $evento->tel_resp_g = $_POST['tel_resp_g'];
        $evento->sessao_unica = $_POST['sessao_unica'];
        $evento->local_ext = $_POST['local_ext'];
        $evento->local_int = $local_int;
        $evento->equipe_propria = $_POST['equipe_propria'];
        $evento->volunteer = $_POST['volunteer'];
        $evento->qtd_volunteer = $_POST['qtd_volunteer'];
        $evento->verba_total = $_POST['verba_total'];
        $evento->verba_op = $_POST['verba_op'];
        $evento->inscricao = $_POST['inscricao'];
        $evento->valor_insc = $_POST['valor_insc'];
        $evento->obs = $_POST['obs'];
        $evento->rede_super = $midia;
        $evento->operacoes = 1;
        $evento->engenharia = 1;
        $evento->sonotecnica = $recurso;
        $evento->agenda_pib = $_POST['local0'];
        $evento->grupo_gestor = 1;
    
        $evento->midia = $_POST['midia'];
        $evento->recurso = $_POST['recurso'];
        $evento->data_sessao = $_POST['data_sessao'];
        $evento->hora_inicio_sessao = $_POST['hora_inicio_sessao'];
        $evento->hora_fim_sessao = $_POST['hora_fim_sessao'];
    
        $conexao = new Conexao();
    
        $eventoService = new EventoService($conexao, $evento);
        $eventoService->inserir();
    
       header('Location: index.php?inclusao=1');
    } else if( $acao == 'recuperar' ) {
        
        $evento = new Evento();
        
        $conexao = new Conexao();
    
        $eventoService = new EventoService($conexao, $evento);
        $responsaveisEvento = $eventoService->recuperar();
    }

    
?>