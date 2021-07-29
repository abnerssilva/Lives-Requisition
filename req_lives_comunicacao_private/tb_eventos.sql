CREATE TABLE tb_eventos (
    id int not null primary key auto_increment,
    data_solicitacao datetime not null default current_timestamp,
    id_usuario int not null,
    foreign key(id_usuario) references tb_users(id),
    evento varchar(100) not null,
    nome_requisitante varchar(50) not null,
    ministerio_requisitante varchar(20) null,
    resp_tec varchar(50) null,
    tel_resp_tec char(14) null,
    resp_g varchar(50) not null,
    tel_resp_g char(14) not null,
    sessao_unica boolean not null,
    local_ext varchar(50) null,
    local_int varchar(20) null,
    equipe_propria boolean not null,
    volunteer boolean not null,
    qtd_volunteer varchar(3) null,
    verba_total float(10,2) default 0,
    verba_op float(9,2) default 0,
    inscricao boolean default false,
    valor_insc float(7,2) default 0,
    obs text null,
    rede_super int not null,
    operacoes int not null default 1,
    engenharia int not null default 1,
    sonotecnica int not null,
    agenda_pib int not null,
    grupo_gestor int not null default 1
);