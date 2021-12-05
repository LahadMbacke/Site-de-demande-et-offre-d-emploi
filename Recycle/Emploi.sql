DROP DATABASE IF EXISTS Emploi;
CREATE DATABASE Emploi;
USE Emploi;

CREATE TABLE Membre (
	Id_membre int AUTO_INCREMENT,
	adresse varchar(100),
	ville varchar(100),
	region varchar(100),
	tel varchar(100),
	email varchar(100),
	mot_de_passe varchar(100),
	constraint pk_membre primary key (Id_membre)
);
CREATE TABLE candidat (
	Id_candidat int AUTO_INCREMENT,
	nom varchar(100),
	prenom varchar(100),
	date_naiss date,
	sexe enum('m','f'),
	constraint pk_candidat primary key (Id_candidat),
	constraint fk_candidat foreign key (Id_candidat) references Membre (Id_membre)
);
CREATE TABLE recruteur (
	Id_recruteur int AUTO_INCREMENT,
	login_rec varchar(100),
	password_rec varchar(100),
	constraint pk_recruteur primary key (Id_recruteur),
	constraint fk_recruteur foreign key (Id_recruteur) references Membre (Id_membre)
);

CREATE TABLE Administrateur (
	Id_admin int AUTO_INCREMENT,
	nom varchar(100),
	prenom varchar(100),
	login varchar(100),
	password varchar(100),
	constraint pk_admin primary key (Id_admin)
);

CREATE TABLE offre (
	Id_offre int AUTO_INCREMENT,
	date_expiration date,
	formation_principale varchar(100),
	domaine varchar(100),
	fiche_detaillee varchar(100),
	disponibilite varchar(100),
	niveau varchar(100),
	id_recruteur_offre int,
	constraint pk_offre primary key (Id_offre),
	constraint fk_recruteur_offre foreign key (id_recruteur_offre) references recruteur (Id_recruteur)
);


CREATE TABLE candidature (
	
	id_offre_candidature int not null ,
	id_candidat_candidature int not null ,
	etat varchar(100),
	date_candidature date,
	lettre_motiv varchar(100),
	constraint pk_candidat_candu primary key (id_offre_candidature,id_candidat_candidature),
	constraint fk_offre_candu foreign key (id_offre_candidature) references offre (Id_offre),
	constraint fk_candidat_candu foreign key (id_candidat_candidature) references candidat (Id_candidat)
);

CREATE TABLE profil (
	Id_profil int AUTO_INCREMENT,
	photo varchar(100),
	disponibilite varchar(100),
	id_candidat_profil int,
	constraint pk_profil_profil primary key (Id_profil),
	constraint fk_candidat_profil foreign key (id_candidat_profil) references candidat (Id_candidat)
);

CREATE TABLE competences (
	Id_competence int AUTO_INCREMENT,
	libelle varchar(100),
	date_creation date,
	date_motif date,
	id_offre_comp int ,
	id_profil_comp int,
	constraint pk_competance primary key (Id_competence),
	constraint fk_profil_compt foreign key (id_profil_comp) references profil (Id_profil),
	constraint fk_offre_compt foreign key (id_offre_comp) references offre (Id_offre)
);
CREATE TABLE experience (
	Id_experience int AUTO_INCREMENT,
	intitule varchar(100),
	entreprise varchar(100),
	secteur varchar(100),
	date_deb date,
	date_fin date,
	id_offre_exp int ,
	id_profil_exp int,
	constraint pk_experience primary key (Id_experience),
	constraint fk_profil_exp foreign key (id_profil_exp) references profil (Id_profil),
	constraint fk_offre_exp foreign key (id_offre_exp) references offre (Id_offre)
);
CREATE TABLE diplomes (
	Id_diplome int AUTO_INCREMENT,
	intitule varchar(100),
	niveau varchar(100),
	cicle varchar(100),
	dat_obtenu date,
	id_offre_diplom int ,
	id_profil_diplom int,
	constraint pk_diplome primary key (Id_diplome),
	constraint fk_profil_dipl foreign key (id_profil_diplom) references profil (Id_profil),
	constraint fk_offre_dipl foreign key (id_offre_diplom) references offre (Id_offre)
);

CREATE TABLE langue (
	Id_lang int AUTO_INCREMENT,
	type_lang varchar(100),
	niveau varchar(100),
	id_profil_lang int,
	constraint pk_lang primary key (Id_lang),
	constraint fk_profil_lang foreign key (id_profil_lang) references profil (Id_profil)
);

CREATE TABLE entreprise (
	Id_entreprise int AUTO_INCREMENT,
	nom varchar(100),
	email varchar(100),
	siteWeb varchar(100),
	adresse varchar(100),
	constraint pk_entreprise primary key (Id_entreprise)
);

CREATE TABLE link (
	id_entreprise_link int ,
	id_recruteur_link int,
	constraint pk_recruteur_link primary key (id_entreprise_link,id_recruteur_link),
	constraint fk_recruteur_link foreign key (id_recruteur_link) references recruteur (Id_recruteur),
	constraint fk_entreprise_link foreign key (id_entreprise_link) references entreprise (Id_entreprise)
);