CREATE TABLE tb_eventos_recursos(
    id int not null primary key auto_increment,
    id_evento int not null,
    foreign key(id_evento) references tb_eventos(id),
    ref_recurso varchar(50) not null
);