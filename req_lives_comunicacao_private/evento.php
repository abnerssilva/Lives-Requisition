<?php

class Evento {
    // Dado comum a todas as tabelas
    private $id_evento;
    
    // Dados tb_eventos
    private $data_solicitacao;
    private $evento;
    private $nome_requisitante;
    private $ministerio_requisitante;
    private $resp_tec;
    private $tel_resp_tec;
    private $resp_g;
    private $tel_resp_g;
    private $sessao_unica;
    private $local_ext;
    private $local_int;
    private $equipe_propria;
    private $volunteer;
    private $qtd_volunteer;
    private $verba_total;
    private $verba_op;
    private $inscricao;
    private $valor_insc;
    private $obs;
    private $rede_super;
    private $operacoes;
    private $engenharia;
    private $sonotecnica;
    private $agenda_pib;
    private $grupo_gestor;

    // Dado tb_eventos_midias
    private $midia;

    // Dado tb_eventos_recursos
    private $recurso;

    // Dados tb_eventos_sessoes
    private $data_sessao;
    private $hora_inicio_sessao;
    private $hora_fim_sessao;


    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }
}

?>