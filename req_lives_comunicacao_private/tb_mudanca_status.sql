CREATE TABLE tb_mudanca_status(
    id int not null primary key auto_increment,
    id_evento int not null,
    foreign key(id_evento) references tb_eventos(id),
    id_user int not null,
    foreign key(id_user) references tb_users(id),
    perfil_id int not null,
    foreign key(perfil_id) references tb_perfis(id),
    nome_user varchar(250) not null,
    data_mudanca_status datetime not null default current_timestamp,
    status_atual int not null
);