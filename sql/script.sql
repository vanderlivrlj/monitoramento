create database monitoramento;

create table ip(
    id_ips int NOT NULL,
    nome varchar (100)N OT NULL,
    url varchar (255) NOT NULL,
    PRIMARY KEY (id_ips)
);

create table consulta (
    id_consulta int NOT NULL, 
    mensagem varchar(255) NOT NULL,
    data date NOT NULL, 
    id_ips int NOT NULL,
    PRIMARY KEY (id_consulta),
    FOREIGN KEY (id_ips) REFERENCES ip (id_ips) 
);

INSERT INTO ip (id_ips, nome, url) VALUES (1, "Facebook", "www.facebook.com.br");
