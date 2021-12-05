DROP DATABASE IF EXISTS Bd_Emploi;
CREATE DATABASE Bd_Emploi;
USE Bd_Emploi;


/*==============================================================*/
/* Table : Alerte                                               */
/*==============================================================*/
create table Alerte 
(
   idAlerte             integer                        not null AUTO_INCREMENT,
   idMembre             integer                        not null,
   idCandidat           integer                        not null,
   metier               varchar(254)                   null,
   emploi               varchar(254)                   null,
   lieu                 varchar(254)                   null,
   mail                 varchar(254)                   null,
   constraint PK_ALERTE primary key (idAlerte)
);


/*==============================================================*/
/* Table : Administrateur                                       */
/*==============================================================*/
create table Administrateur
(
   idAdmin              int not null AUTO_INCREMENT,
   nom                  varchar(100),
   prenom               varchar(100),
   login                varchar(100),
   password             varchar(100),
   primary key (idAdmin)
);
/*==============================================================*/
/* Table : Membre                                               */
/*==============================================================*/
create table Membre
(
   idMembre             int not null AUTO_INCREMENT,
   adresse              varchar(100),
   ville                varchar(100),
   region               varchar(100),
   tel                  varchar(100),
   email                varchar(100),
   motDePasse           varchar(100),
   primary key (idMembre)
);
/*==============================================================*/
/* Table : Candidat                                             */
/*==============================================================*/
create table Candidat
(
   idMembre             int not null,
   idCandidat           int not null ,
   nom                  varchar(100),
   prenom               varchar(100),
   dateNaiss            date,
   sexe                 varchar(100),
   primary key (idMembre, idCandidat)
);
create table Favorie
(
   idFavorie            int not null AUTO_INCREMENT,
   idOffre              int not null,
   idMembre             int not null,
   idCandidat           int not null,
   primary key (idFavorie)
);
/*==============================================================*/
/* Table : Candidature                                          */
/*==============================================================*/
create table Candidature
(
   idMembre             int not null,
   idCandidat           int not null,
   idOffre              int not null,
   idCandidature        int not null,
   statut                varchar(254),
   datee                 date,
   cv          varchar(254),
   primary key (idMembre, idCandidat, idOffre, idCandidature)
);

/*==============================================================*/
/* Table : Competences                                          */
/*==============================================================*/
create table Competences
(
   idCompetence         int not null AUTO_INCREMENT,
   idMembre             int not null,
   idCandidat           int not null,
   libelle              varchar(100),
   dateCreation         date,
   dateModification     date,
   primary key (idCompetence)
);

/*==============================================================*/
/* Table : Diplome                                              */
/*==============================================================*/
create table Diplome
(
   idDiplome            int not null AUTO_INCREMENT,
   idMembre             int not null,
   idCandidat           int not null,
   intitule             varchar(100),
   niveau               varchar(100),
   ecole                varchar(100),
   datObtenu            date,
   primary key (idDiplome)
);

/*==============================================================*/
/* Table : Emploie                                              */
/*==============================================================*/
-- create table Emploie
-- (
--    idOffre              int not null,
--    idEmploie            int not null,
--    idProfil             int not null,
--    nom                  varchar(100),
--    experience           varchar(100),
--    niveauEtude          varchar(100),
--    competence           varchar(100),
--    -- disponibilite        varchar(100),
--    -- age                  int,
--    -- sexe                 varchar(100),
--    secteur              varchar(100),
--    DescriptionPoste       varchar(255),
--    DescriptionProfil       varchar(255),

--    primary key (idOffre, idEmploie)
-- );
create table Emploie
(
   idOffre              int not null,
   idEmploie            int not null,
   nom                  varchar(254),
   experience           varchar(254),
   niveauEtude          varchar(254),
   competence           varchar(254),
   secteur              varchar(254),
   DescriptionProfil    varchar(254),
   DescriptionPost      varchar(254),
   fiche_detaillee      varchar(200),
   primary key (idOffre, idEmploie)
);
/*==============================================================*/
/* Table : Entreprise                                           */
/*==============================================================*/
-- create table Entreprise
-- (
--    idEntreprise         int not null AUTO_INCREMENT,
--    nom                  varchar(100),
--    email                varchar(100),
--    siteWeb              varchar(100),
--    adresse              varchar(100),
--    Description          varchar(100),
--    ville                varchar(100),
--    primary key (idEntreprise)
-- );

/*==============================================================*/
/* Table : Experience                                           */
/*==============================================================*/
create table Experience
(
   idExperience         int not null AUTO_INCREMENT,
   idMembre             int not null,
   idCandidat           int not null,
   inititule            varchar(100),
   entreprise           varchar(100),
   secteur              varchar(100),
   detailExper          varchar(100),
   anneeExperience      int,
   dateDeb              date,
   dateFin              date,
   primary key (idExperience)
);

/*==============================================================*/
/* Table : Langue                                               */
/*==============================================================*/
create table Langue
(
   idLang               int not null AUTO_INCREMENT,
   idMembre             int not null,
   idCandidat           int not null,
   idProfil             int,
   typeLang             varchar(100),
   niveau               varchar(100),
   primary key (idLang)
);



/*==============================================================*/
/* Table : Offre                                                */
/*==============================================================*/
create table Offre
(
   idOffre              int not null AUTO_INCREMENT,
   idMembre             int not null,
   idRecruteur          int not null,
   dateCreation         date,
   dateExpiration       date,
   -- disponibilite        varchar(100),
   -- fonctionPrincipale   varchar(100),
   Entreprise        varchar(200),
   region               varchar(100),
   -- nomSecteur           varchar(100),
   typeContrat          varchar(100),
   logoEntrprise     varchar(200),
   primary key (idOffre)
);

/*==============================================================*/
/* Table : Profil                                               */
/*==============================================================*/
create table Profil
(
   idProfil             int not null,
   idMembre             int ,
   idCandidat           int,
   photo                varchar(254),
   cv                   varchar(254),
   Description          varchar(254),
   primary key (idProfil)
);

/*==============================================================*/
/* Table : Recruteur                                            */
/*==============================================================*/
create table Recruteur
(
   idMembre             int not null,
   idRecruteur          int not null ,
   -- nom                  varchar(100),
   -- prenom               varchar(100),
   login                varchar(100),
   password             varchar(100),
   primary key (idMembre, idRecruteur)
);

/*==============================================================*/
/* Table : link                                                 */
/*==============================================================*/
-- create table link
-- (
--    idMembre             int not null,
--    idRecruteur          int not null,
--    idEntreprise         int not null,
--    primary key (idMembre, idRecruteur, idEntreprise)
-- );

alter table Alerte
   add constraint FK_ALERTE_ASSOCIATI_CANDIDAT foreign key (idMembre, idCandidat)
      references Candidat (idMembre, idCandidat)
      on update restrict
      on delete restrict;
alter table Candidat add constraint FK_Generalisation_1 foreign key (idMembre)
      references Membre (idMembre) on delete restrict on update restrict;

-- alter table Candidat add constraint FK_association7 foreign key (idDiplome)
--       references Diplome (idDiplome) on delete restrict on update restrict;

alter table Candidature add constraint FK_association1 foreign key (idMembre, idCandidat)
      references Candidat (idMembre, idCandidat) on delete restrict on update restrict;

alter table Candidature add constraint FK_association0 foreign key (idOffre)
      references Offre (idOffre) on delete restrict on update restrict;

alter table Competences add constraint FK_association4 foreign key (idMembre, idCandidat)
      references Candidat (idMembre, idCandidat) on delete restrict on update restrict;

alter table Diplome add constraint FK_association8 foreign key (idMembre, idCandidat)
      references Candidat (idMembre, idCandidat) on delete restrict on update restrict;

alter table Emploie add constraint FK_Generalisation_3 foreign key (idOffre)
      references Offre (idOffre) on delete restrict on update restrict;


alter table Experience add constraint FK_association5 foreign key (idMembre, idCandidat)
      references Candidat (idMembre, idCandidat) on delete restrict on update restrict;
alter table Favorie add constraint FK_association15 foreign key (idMembre, idCandidat)
      references Candidat (idMembre, idCandidat) on delete restrict on update restrict;

alter table Favorie add constraint FK_association16 foreign key (idOffre)
      references Offre (idOffre) on delete restrict on update restrict;
alter table Langue add constraint FK_association11 foreign key (idMembre, idCandidat)
      references Candidat (idMembre, idCandidat) on delete restrict on update restrict;

alter table Langue add constraint FK_association3 foreign key (idProfil)
      references Profil (idProfil) on delete restrict on update restrict;

alter table Offre add constraint FK_association9 foreign key (idMembre, idRecruteur)
      references Recruteur (idMembre, idRecruteur) on delete restrict on update restrict;

alter table Profil add constraint FK_association2 foreign key (idMembre, idCandidat)
      references Candidat (idMembre, idCandidat) on delete restrict on update restrict;

alter table Recruteur add constraint FK_Generalisation_2 foreign key (idMembre)
      references Membre (idMembre) on delete restrict on update restrict;

-- alter table link add constraint FK_link0 foreign key (idEntreprise)
--       references Entreprise (idEntreprise) on delete restrict on update restrict;

-- alter table link add constraint FK_link foreign key (idMembre, idRecruteur)
--       references Recruteur (idMembre, idRecruteur) on delete restrict on update restrict;

