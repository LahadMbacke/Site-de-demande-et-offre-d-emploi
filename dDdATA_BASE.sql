/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de création :  06/09/2021 22:18:07                      */
/*==============================================================*/


drop table if exists Administrateur;

drop table if exists Candidat;

drop table if exists Candidature;

drop table if exists Competences;

drop table if exists Diplome;

drop table if exists Emploie;

drop table if exists Entreprise;

drop table if exists Experience;

drop table if exists Favorie;

drop table if exists Langue;

drop table if exists Membre;

drop table if exists Offre;

drop table if exists Profil;

drop table if exists Recruteur;

drop table if exists Statut;

drop table if exists link;

/*==============================================================*/
/* Table : Administrateur                                       */
/*==============================================================*/
create table Administrateur
(
   idAdmin              int not null,
   nom                  varchar(254),
   prenom               varchar(254),
   login                varchar(254),
   password             varchar(254),
   primary key (idAdmin)
);

/*==============================================================*/
/* Table : Candidat                                             */
/*==============================================================*/
create table Candidat
(
   idMembre             int not null,
   idCandidat           int not null,
   idDiplome            int,
   nom                  varchar(254),
   prenom               varchar(254),
   dateNaiss            datetime,
   sexe                 varchar(254),
   primary key (idMembre, idCandidat)
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
   date                 datetime,
   lettreMotiv          varchar(254),
   primary key (idMembre, idCandidat, idOffre, idCandidature)
);

/*==============================================================*/
/* Table : Competences                                          */
/*==============================================================*/
create table Competences
(
   idCompetence         int not null,
   idMembre             int not null,
   idCandidat           int not null,
   libelle              varchar(254),
   dateCreation         datetime,
   dateModification     datetime,
   primary key (idCompetence)
);

/*==============================================================*/
/* Table : Diplome                                              */
/*==============================================================*/
create table Diplome
(
   idDiplome            int not null,
   idMembre             int not null,
   idCandidat           int not null,
   intitule             varchar(254),
   niveau               varchar(254),
   ecole                varchar(254),
   datObtenu            datetime,
   primary key (idDiplome)
);

/*==============================================================*/
/* Table : Emploie                                              */
/*==============================================================*/
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
   primary key (idOffre, idEmploie)
);

/*==============================================================*/
/* Table : Entreprise                                           */
/*==============================================================*/
create table Entreprise
(
   idEntreprise         int not null,
   nom                  varchar(254),
   email                varchar(254),
   siteWeb              varchar(254),
   adresse              varchar(254),
   primary key (idEntreprise)
);

/*==============================================================*/
/* Table : Experience                                           */
/*==============================================================*/
create table Experience
(
   idExperience         int not null,
   idMembre             int not null,
   idCandidat           int not null,
   inititule            varchar(254),
   entreprise           varchar(254),
   secteur              varchar(254),
   detailExper          varchar(254),
   anneeExperience      int,
   dateDeb              datetime,
   dateFin              datetime,
   primary key (idExperience)
);

/*==============================================================*/
/* Table : Favorie                                              */
/*==============================================================*/
create table Favorie
(
   idFavorie            int not null,
   idOffre              int,
   idMembre             int not null,
   idCandidat           int not null,
   primary key (idFavorie)
);

/*==============================================================*/
/* Table : Langue                                               */
/*==============================================================*/
create table Langue
(
   idLang               int not null,
   idMembre             int not null,
   idCandidat           int not null,
   idProfil             int,
   typeLang             varchar(254),
   niveau               varchar(254),
   primary key (idLang)
);

/*==============================================================*/
/* Table : Membre                                               */
/*==============================================================*/
create table Membre
(
   idMembre             int not null,
   adresse              varchar(254),
   ville                varchar(254),
   region               varchar(254),
   tel                  varchar(254),
   email                varchar(254),
   motDePasse           varchar(254),
   primary key (idMembre)
);

/*==============================================================*/
/* Table : Offre                                                */
/*==============================================================*/
create table Offre
(
   idOffre              int not null,
   idMembre             int not null,
   idRecruteur          int not null,
   dateCreation         datetime,
   region               varchar(254),
   typeContrat          varchar(254),
   entreprise           varchar(254),
   primary key (idOffre)
);

/*==============================================================*/
/* Table : Profil                                               */
/*==============================================================*/
create table Profil
(
   idProfil             int not null,
   idStatut             int not null,
   idMembre             int,
   idCandidat           int,
   photo                varchar(254),
   cv                   varchar(254),
   disponibilite        varchar(254),
   fonctionPrincipale   varchar(254),
   primary key (idProfil)
);

/*==============================================================*/
/* Table : Recruteur                                            */
/*==============================================================*/
create table Recruteur
(
   idMembre             int not null,
   idRecruteur          int not null,
   nom                  varchar(254),
   prenom               varchar(254),
   login                varchar(254),
   password             varchar(254),
   primary key (idMembre, idRecruteur)
);

/*==============================================================*/
/* Table : Statut                                               */
/*==============================================================*/
create table Statut
(
   idStatut             int not null,
   idOffre              int,
   idEmploie            int,
   primary key (idStatut)
);

/*==============================================================*/
/* Table : link                                                 */
/*==============================================================*/
create table link
(
   idMembre             int not null,
   idRecruteur          int not null,
   idEntreprise         int not null,
   primary key (idMembre, idRecruteur, idEntreprise)
);

alter table Candidat add constraint FK_Generalisation_1 foreign key (idMembre)
      references Membre (idMembre) on delete restrict on update restrict;

alter table Candidat add constraint FK_association7 foreign key (idDiplome)
      references Diplome (idDiplome) on delete restrict on update restrict;

alter table Candidature add constraint FK_association1 foreign key (idMembre, idCandidat)
      references Candidat (idMembre, idCandidat) on delete restrict on update restrict;

alter table Candidature add constraint FK_association1 foreign key (idOffre)
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

alter table Profil add constraint FK_association13 foreign key (idStatut)
      references Statut (idStatut) on delete restrict on update restrict;

alter table Profil add constraint FK_association2 foreign key (idMembre, idCandidat)
      references Candidat (idMembre, idCandidat) on delete restrict on update restrict;

alter table Recruteur add constraint FK_Generalisation_2 foreign key (idMembre)
      references Membre (idMembre) on delete restrict on update restrict;

alter table Statut add constraint FK_association14 foreign key (idOffre, idEmploie)
      references Emploie (idOffre, idEmploie) on delete restrict on update restrict;

alter table link add constraint FK_link foreign key (idEntreprise)
      references Entreprise (idEntreprise) on delete restrict on update restrict;

alter table link add constraint FK_link foreign key (idMembre, idRecruteur)
      references Recruteur (idMembre, idRecruteur) on delete restrict on update restrict;

