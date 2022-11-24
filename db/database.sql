create table if not exists Categorie(
    idCategorie int primary key auto_increment,
    nomCategorie varchar(100) not null,
    obligatoire varchar(1) not null,
    createdAt datetime
);

create table if not exists Orateur(
    idOrateur int primary key auto_increment,
    prenomOrateur varchar(50) not null,
    postnomOrateur varchar(50) not null,
    titreOrateur varchar(10)
);

create table if not exists Predication(
    idPredication int primary key auto_increment,
    idCategorie int references Categorie(idCategorie),
    idOrateur int references Orateur(idOrateur),
    titre varchar(255) not null,
    texte varchar(255),
    contenu text,
    tags varchar(255),
    video text,
    photo text,
    audio text,
    createdAt datetime
);