CREATE TABLE tb_eventos_midias(
    id int not null primary key auto_increment,
    id_evento int not null,
    foreign key(id_evento) references tb_eventos(id),
    ref_midia varchar(20) not null
);