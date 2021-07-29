CREATE TABLE tb_eventos_sessoes(
    id int not null primary key auto_increment,
    id_evento int not null,
    foreign key(id_evento) references tb_eventos(id),
    ref_sessao int not null, /*Referência 0 seria para sessão única*/
    data_sessao date not null,
    hora_inicio_sessao time not null,
    hora_fim_sessao time not null
);