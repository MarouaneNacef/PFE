create table User (
    mat int not null unique,
    passwd varchar(15),
    email varchar(30),
    tel int,
    pervillage int,
    nom varchar(40),
    prenom varchar(40),
    service varchar(40),
    atelier varchar(40),
    unite varchar(40),
    sexe varchar(10),
    date_n varchar(10),
    lieu_n varchar(40),
    situ_fam varchar(10),
    addresse varchar(80),
    formation varchar(100),
    qualifiquation varchar(100),
    post varchar(40),
    service_nat varchar(20),
    act_anterieur varchar(100),
    primary key(mat)
        );

create table Visit (
    id int not null unique AUTO_INCREMENT,
    id_med int,
    id_emp int,
    date varchar(10),
    heure varchar(10),
    ordonnance varchar(100),
    conclusion varchar(100),
    nature varchar(20),
    valid boolean,
    primary key(id),
    foreign key(id_med) references User(mat),
    foreign key(id_emp) references User(mat)
    );

create table Demande (
    id int not null unique AUTO_INCREMENT,
    id_v int,
    primary key(id),
    foreign key(id_v) references Visit(id)
    );
