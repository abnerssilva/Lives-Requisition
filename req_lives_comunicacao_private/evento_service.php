<?php

//CRUD
class EventoService {

    private $conexao;
    private $evento;
    

    //                          tipagem de        
    //                          segurança         
    public function __construct(Conexao $conexao, Evento $evento) {
        $this->conexao = $conexao->conectar();
        $this->evento  = $evento;
    }

    public function inserir() {
        
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

        // Populando tb_eventos
        $query = 'insert into tb_eventos(
                                    evento,
                                    nome_requisitante,
                                    ministerio_requisitante,
                                    resp_tec,
                                    tel_resp_tec,
                                    resp_g,
                                    tel_resp_g,
                                    sessao_unica,
                                    local_ext,
                                    local_int,
                                    equipe_propria,
                                    volunteer,
                                    qtd_volunteer,
                                    verba_total,
                                    verba_op,
                                    inscricao,
                                    valor_insc,
                                    obs,
                                    rede_super,
                                    operacoes,
                                    engenharia,
                                    sonotecnica,
                                    agenda_pib,
                                    grupo_gestor
                                )values(
                                    "'.$_POST["evento"].'",
                                    "'.$_POST["nome_requisitante"].'",
                                    "'.$_POST["ministerio_requisitante"].'",
                                    "'.$_POST["resp_tec"].'",
                                    "'.$_POST["tel_resp_tec"].'",
                                    "'.$_POST["resp_g"].'",
                                    "'.$_POST["tel_resp_g"].'",
                                    '.$_POST["sessao_unica"].',
                                    "'.$_POST["local_ext"].'",
                                    "'.$local_int.'",
                                    '.$_POST["equipe_propria"].',
                                    '.$_POST["volunteer"].',
                                    "'.$_POST["qtd_volunteer"].'",
                                    "'.$_POST["verba_total"].'",
                                    "'.$_POST["verba_op"].'",
                                    '.$_POST["inscricao"].',
                                    "'.$_POST["valor_insc"].'",
                                    "'.$_POST["obs"].'",
                                    '.$midia.',
                                    1,
                                    1,
                                    '.$recurso.',
                                    '.$_POST["local0"].',
                                    1                               
                                )';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();

        //Buscar a info do id evento 
        $sql = 'SELECT id FROM tb_eventos ORDER BY id DESC LIMIT 1';
    
        foreach ($this->conexao->query($sql) as $row) {
            $id_evento = $row['id'];
        }

        // Populando tb_eventos_midias
        for($i = 0; $i < sizeof($_POST["midia"]); $i++) {
            
            $query_midias =  'insert into tb_eventos_midias (
                                                    id_evento,
                                                    ref_midia                        
                                                ) VALUES (
                                                    '.$id_evento.',
                                                    "'.$_POST["midia"][$i].'"
                                                )';
            $stmt2 = $this->conexao->prepare($query_midias);
            if($_POST["midia"][$i] != '') {
                $stmt2->execute();
            }
                                                   
        }

        // Populando tb_eventos_recursos
        for($i = 0; $i < sizeof($_POST["recurso"]); $i++) {
            $query_recursos = 'insert into tb_eventos_recursos (
                                            id_evento,
                                            ref_recurso                        
                                        ) VALUES (
                                            '.$id_evento.',
                                            "'.$_POST["recurso"][$i].'"
                                        )';
            $stmt3 = $this->conexao->prepare($query_recursos);
            if($_POST["recurso"][$i] != '') {
                $stmt3->execute();
            }                               
        }
       
        // Populando tb_eventos_sessoes
        if(sizeof($_POST["data_sessao"]) == 1) {            
            $query_sessoes = 'insert into tb_eventos_sessoes (
                                                            id_evento,
                                                            ref_sessao, 
                                                            data_sessao, 
                                                            hora_inicio_sessao,
                                                            hora_fim_sessao
                                                        ) VALUES (
                                                            '.$id_evento.',
                                                            0,
                                                            "'.$_POST["data_sessao"][0].'",
                                                            "'.$_POST["hora_inicio_sessao"][0].'",
                                                            "'.$_POST["hora_fim_sessao"][0].'"
                                                        )';
           
            $stmt4 = $this->conexao->prepare($query_sessoes);
            $stmt4->execute();
        }else {
            for($i = 1; $i < sizeof($_POST["data_sessao"]); $i++) {
                $query_sessoes = 'insert into tb_eventos_sessoes (
                                                                id_evento,
                                                                ref_sessao, 
                                                                data_sessao, 
                                                                hora_inicio_sessao,
                                                                hora_fim_sessao
                                                            ) VALUES (
                                                                '.$id_evento.',
                                                                '.$i.',
                                                                "'.$_POST["data_sessao"][$i].'",
                                                                "'.$_POST["hora_inicio_sessao"][$i].'",
                                                                "'.$_POST["hora_fim_sessao"][$i].'"
                                                            )';
                $stmt4 = $this->conexao->prepare($query_sessoes);
                $stmt4->execute();                            
            }
        }
        return $this;
    }

    
    public function recuperar() {

      
        $id_evento = $_GET['id'];

        $query = 'select id, evento, rede_super, operacoes, engenharia, sonotecnica, agenda_pib, grupo_gestor from tb_eventos where id='.$id_evento.'';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /*
    public function atualizar() {

    };

    public function apagar() {

    };
    */
}

?>
