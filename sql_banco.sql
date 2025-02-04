CREATE TABLE pessoas (
    id int AUTO_INCREMENT NOT NULL,
    tipo char(1) NOT NULL,
    nome varchar(70) NOT NULL,
    email varchar(70) NOT NULL,
    idade int NOT NULL,
    cpf varchar(30) NOT NULL,
    curso varchar(70),
    titulacao varchar(20),
    PRIMARY KEY (id)
);