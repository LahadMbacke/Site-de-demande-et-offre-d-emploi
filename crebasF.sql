/*==============================================================*/
/* Nom de SGBD :  Sybase SQL Anywhere 11                        */
/* Date de création :  19/11/2021 21:24:30                      */
/*==============================================================*/

DROP DATABASE IF EXISTS Bd_Emploi;
CREATE DATABASE Bd_Emploi;
USE Bd_Emploi;




/*==============================================================*/
/* Table : Administrateur                                       */
/*==============================================================*/
create table Administrateur 
(
   idAdmin              integer                        not null,
   nom                  varchar(254)                   null,
   prenom               varchar(254)                   null,
   login              varchar(254)                   null,
   password             varchar(254)                   null,
   constraint PK_ADMINISTRATEUR primary key (idAdmin)
);

/*==============================================================*/
/* Index : ADMINISTRATEUR_PK                                    */
/*==============================================================*/
create unique index ADMINISTRATEUR_PK on Administrateur (
idAdmin ASC
);

/*==============================================================*/
/* Table : Alerte                                               */
/*==============================================================*/
create table Alerte 
(
   idAlerte             integer                        not null,
   idMembre             integer                        not null,
   idCandidat           integer                        not null,
   metier               varchar(254)                   null,
   emploi               varchar(254)                   null,
   lieu                 varchar(254)                   null,
   mail                 varchar(254)                   null,
   constraint PK_ALERTE primary key (idAlerte)
);

/*==============================================================*/
/* Index : ALERTE_PK                                            */
/*==============================================================*/
create unique index ALERTE_PK on Alerte (
idAlerte ASC
);

/*==============================================================*/
/* Index : ASSOCIATION12_FK                                     */
/*==============================================================*/
create index ASSOCIATION12_FK on Alerte (
idMembre ASC,
idCandidat ASC
);

/*==============================================================*/
/* Table : Candidat                                             */
/*==============================================================*/
create table Candidat 
(
   idMembre             integer                        not null,
   idCandidat           integer                        not null,
   idDiplome            integer                        null,
   nom                  varchar(254)                   null,
   prenom               varchar(254)                   null,
   dateNaiss            timestamp                      null,
   sexe                 varchar(254)                   null,
   constraint PK_CANDIDAT primary key (idMembre, idCandidat)
);

/*==============================================================*/
/* Index : CANDIDAT_PK                                          */
/*==============================================================*/
create unique index CANDIDAT_PK on Candidat (
idMembre ASC,
idCandidat ASC
);

/*==============================================================*/
/* Index : ASSOCIATION7_FK                                      */
/*==============================================================*/
create index ASSOCIATION7_FK on Candidat (
idDiplome ASC
);

/*==============================================================*/
/* Index : GENERALISATION_1_FK                                  */
/*==============================================================*/
create index GENERALISATION_1_FK on Candidat (
idMembre ASC
);

/*==============================================================*/
/* Table : Candidature                                          */
/*==============================================================*/
create table Candidature 
(
   idMembre             integer                        not null,
   idCandidat           integer                        not null,
   idOffre              integer                        not null,
   idCandidature        integer                        not null,
   statut               varchar(254)                   null,
   datee                timestamp                      null,
   cv                   varchar(254)                   null,
   constraint PK_CANDIDATURE primary key (idMembre, idCandidat, idOffre, idCandidature)
);

/*==============================================================*/
/* Index : CANDIDATURE_PK                                       */
/*==============================================================*/
create unique index CANDIDATURE_PK on Candidature (
idMembre ASC,
idCandidat ASC,
idOffre ASC,
idCandidature ASC
);

/*==============================================================*/
/* Index : ASSOCIATION1_FK                                      */
/*==============================================================*/
create index ASSOCIATION1_FK on Candidature (
idMembre ASC,
idCandidat ASC
);

/*==============================================================*/
/* Index : ASSOCIATION1_FK2                                     */
/*==============================================================*/
create index ASSOCIATION1_FK2 on Candidature (
idOffre ASC
);

/*==============================================================*/
/* Table : Competences                                          */
/*==============================================================*/
create table Competences 
(
   idCompetence         int not null AUTO_INCREMENT,
   idMembre             integer                        not null,
   idCandidat           integer                        not null,
   libelle              Text                  null,
   constraint PK_COMPETENCES primary key (idCompetence)
);

/*==============================================================*/
/* Index : COMPETENCES_PK                                       */
/*==============================================================*/
create unique index COMPETENCES_PK on Competences (
idCompetence ASC
);

/*==============================================================*/
/* Index : ASSOCIATION4_FK                                      */
/*==============================================================*/
create index ASSOCIATION4_FK on Competences (
idMembre ASC,
idCandidat ASC
);

/*==============================================================*/
/* Table : Diplome                                              */
/*==============================================================*/
create table Diplome 
(
   idDiplome           int not null AUTO_INCREMENT,
   idMembre             integer                        not null,
   idCandidat           integer                        not null,
   intitule             varchar(254)                   null,
   niveau               varchar(254)                   null,
   ecole                varchar(254)                   null,
   datObtenu            timestamp                      null,
   constraint PK_DIPLOME primary key (idDiplome)
);

/*==============================================================*/
/* Index : DIPLOME_PK                                           */
/*==============================================================*/
create unique index DIPLOME_PK on Diplome (
idDiplome ASC
);

/*==============================================================*/
/* Index : ASSOCIATION8_FK                                      */
/*==============================================================*/
create index ASSOCIATION8_FK on Diplome (
idMembre ASC,
idCandidat ASC
);

/*==============================================================*/
/* Table : Emploie                                              */
/*==============================================================*/
create table Emploie 
(
   idOffre              integer                        not null,
   idEmploie            integer                        not null,
   nom                  varchar(254)                   null,
   experience           varchar(254)                   null,
   niveauEtude          varchar(254)                   null,
   competence           Text                 null,
   secteur              varchar(254)                   null,
   DescriptionProfil    Text                 null,
   DescriptionPost      Text                   null,
   ficheDetaillee       Text                 null,
   constraint PK_EMPLOIE primary key (idOffre, idEmploie)
);

/*==============================================================*/
/* Index : EMPLOIE_PK                                           */
/*==============================================================*/
create unique index EMPLOIE_PK on Emploie (
idOffre ASC,
idEmploie ASC
);

/*==============================================================*/
/* Index : GENERALISATION_3_FK                                  */
/*==============================================================*/
create index GENERALISATION_3_FK on Emploie (
idOffre ASC
);

/*==============================================================*/
/* Table : Experience                                           */
/*==============================================================*/
create table Experience 
(
   idExperience         int not null AUTO_INCREMENT,
   idMembre             integer                        not null,
   idCandidat           integer                        not null,
   intitule             varchar(254)                   null,
   entreprise           varchar(254)                   null,
   secteur              varchar(254)                   null,
   detailExper          Text                   null,
   anneeExperience      integer                        null,
   constraint PK_EXPERIENCE primary key (idExperience)
);

/*==============================================================*/
/* Index : EXPERIENCE_PK                                        */
/*==============================================================*/
create unique index EXPERIENCE_PK on Experience (
idExperience ASC
);

/*==============================================================*/
/* Index : ASSOCIATION5_FK                                      */
/*==============================================================*/
create index ASSOCIATION5_FK on Experience (
idMembre ASC,
idCandidat ASC
);

/*==============================================================*/
/* Table : Langue                                               */
/*==============================================================*/
create table Langue 
(
   idLang               int not null AUTO_INCREMENT,
   idMembre             integer                        not null,
   idCandidat           integer                        not null,
   idProfil             integer                        null,
   typeLang             varchar(254)                   null,
   niveau               varchar(254)                   null,
   constraint PK_LANGUE primary key (idLang)
);

/*==============================================================*/
/* Index : LANGUE_PK                                            */
/*==============================================================*/
create unique index LANGUE_PK on Langue (
idLang ASC
);

/*==============================================================*/
/* Index : ASSOCIATION3_FK                                      */
/*==============================================================*/
create index ASSOCIATION3_FK on Langue (
idProfil ASC
);

/*==============================================================*/
/* Index : ASSOCIATION11_FK                                     */
/*==============================================================*/
create index ASSOCIATION11_FK on Langue (
idMembre ASC,
idCandidat ASC
);

/*==============================================================*/
/* Table : Membre                                               */
/*==============================================================*/
create table Membre 
(
   idMembre             int not null AUTO_INCREMENT,
   adresse              varchar(254)                   null,
   ville                varchar(254)                   null,
   region               varchar(254)                   null,
   tel                  varchar(254)                   null,
   email                varchar(254)                unique   null,
   motDePasse           varchar(254)                   null,
   constraint PK_MEMBRE primary key (idMembre)
);

/*==============================================================*/
/* Index : MEMBRE_PK                                            */
/*==============================================================*/
create unique index MEMBRE_PK on Membre (
idMembre ASC
);

/*==============================================================*/
/* Table : Offre                                                */
/*==============================================================*/
create table Offre 
(
   idOffre              int not null AUTO_INCREMENT,
   idMembre             integer                        not null,
   idRecruteur          integer                        not null,
   dateCreation         timestamp                      null,
   region               varchar(254)                   null,
   typeContrat          varchar(254)                   null,
   entreprise           varchar(254)                   null,
   dateExpiration       date                      null,
   logoEntrprise        varchar(254)                   null,
   constraint PK_OFFRE primary key (idOffre)
);

/*==============================================================*/
/* Index : OFFRE_PK                                             */
/*==============================================================*/
create unique index OFFRE_PK on Offre (
idOffre ASC
);

/*==============================================================*/
/* Index : ASSOCIATION9_FK                                      */
/*==============================================================*/
create index ASSOCIATION9_FK on Offre (
idMembre ASC,
idRecruteur ASC
);

/*==============================================================*/
/* Table : Profil                                               */
/*==============================================================*/
create table Profil 
(
  idProfil            integer not null AUTO_INCREMENT,
   idMembre             integer                        null,
   idCandidat           integer                        null,
   photo                varchar(254)                   null,
   cv                   varchar(254)                   null,
   description_profil   text                   null,
   constraint PK_PROFIL primary key (idProfil)
);

/*==============================================================*/
/* Index : PROFIL_PK                                            */
/*==============================================================*/
create unique index PROFIL_PK on Profil (
idProfil ASC
);

/*==============================================================*/
/* Index : ASSOCIATION2_FK                                      */
/*==============================================================*/
create index ASSOCIATION2_FK on Profil (
idMembre ASC,
idCandidat ASC
);



/*==============================================================*/
/* Table : PlanificationEntretien                               */
/*==============================================================*/
create table PlanificationEntretien 
(
   idConvacation        integer                        not null,
   idMembre             integer                        null,
   idCandidat           integer                        null,
   idOffre              integer                        null,
   convacation          varchar(254)                   null,
   constraint PK_PLANIFICATIONENTRETIEN primary key (idConvacation)
);

/*==============================================================*/
/* Index : PLANIFICATIONENTRETIEN_PK                            */
/*==============================================================*/
create unique index PLANIFICATIONENTRETIEN_PK on PlanificationEntretien (
idConvacation ASC
);

/*==============================================================*/
/* Index : ASSOCIATION14_FK                                     */
/*==============================================================*/
create index ASSOCIATION14_FK on PlanificationEntretien (
idOffre ASC
);

/*==============================================================*/
/* Index : ASSOCIATION13_FK                                     */
/*==============================================================*/
create index ASSOCIATION13_FK on PlanificationEntretien (
idMembre ASC,
idCandidat ASC
);


/*==============================================================*/
/* Table : Recruteur                                            */
/*==============================================================*/
create table Recruteur 
(
   idMembre             integer                        not null,
   idRecruteur          integer                        not null,
   nom                  varchar(254)                   null,
   siteWeb              varchar(254)                   null,
   description          text                   null,
   constraint PK_RECRUTEUR primary key (idMembre, idRecruteur)
);

/*==============================================================*/
/* Index : RECRUTEUR_PK                                         */
/*==============================================================*/
create unique index RECRUTEUR_PK on Recruteur (
idMembre ASC,
idRecruteur ASC
);

/*==============================================================*/
/* Index : GENERALISATION_2_FK                                  */
/*==============================================================*/
create index GENERALISATION_2_FK on Recruteur (
idMembre ASC
);

alter table Alerte
   add constraint FK_ALERTE_ASSOCIATI_CANDIDAT foreign key (idMembre, idCandidat)
      references Candidat (idMembre, idCandidat)
      on update restrict
      on delete restrict;

alter table Candidat
   add constraint FK_CANDIDAT_GENERALIS_MEMBRE foreign key (idMembre)
      references Membre (idMembre)
      on update restrict
      on delete restrict;

alter table Candidat
   add constraint FK_CANDIDAT_ASSOCIATI_DIPLOME foreign key (idDiplome)
      references Diplome (idDiplome)
      on update restrict
      on delete restrict;

alter table Candidature
   add constraint FK_CANDIDAT_ASSOCIATI_CANDIDAT foreign key (idMembre, idCandidat)
      references Candidat (idMembre, idCandidat)
      on update restrict
      on delete restrict;

alter table Candidature
   add constraint FK_CANDIDAT_ASSOCIATI_OFFRE foreign key (idOffre)
      references Offre (idOffre)
      on update restrict
      on delete restrict;

alter table Competences
   add constraint FK_COMPETEN_ASSOCIATI_CANDIDAT foreign key (idMembre, idCandidat)
      references Candidat (idMembre, idCandidat)
      on update restrict
      on delete restrict;

alter table Diplome
   add constraint FK_DIPLOME_ASSOCIATI_CANDIDAT foreign key (idMembre, idCandidat)
      references Candidat (idMembre, idCandidat)
      on update restrict
      on delete restrict;

alter table Emploie
   add constraint FK_EMPLOIE_GENERALIS_OFFRE foreign key (idOffre)
      references Offre (idOffre)
      on update restrict
      on delete restrict;

alter table Experience
   add constraint FK_EXPERIEN_ASSOCIATI_CANDIDAT foreign key (idMembre, idCandidat)
      references Candidat (idMembre, idCandidat)
      on update restrict
      on delete restrict;

alter table Langue
   add constraint FK_LANGUE_ASSOCIATI_CANDIDAT foreign key (idMembre, idCandidat)
      references Candidat (idMembre, idCandidat)
      on update restrict
      on delete restrict;

alter table Langue
   add constraint FK_LANGUE_ASSOCIATI_PROFIL foreign key (idProfil)
      references Profil (idProfil)
      on update restrict
      on delete restrict;

alter table Offre
   add constraint FK_OFFRE_ASSOCIATI_RECRUTEU foreign key (idMembre, idRecruteur)
      references Recruteur (idMembre, idRecruteur)
      on update restrict
      on delete restrict;

alter table Profil
   add constraint FK_PROFIL_ASSOCIATI_CANDIDAT foreign key (idMembre, idCandidat)
      references Candidat (idMembre, idCandidat)
      on update restrict
      on delete restrict;

alter table Recruteur
   add constraint FK_RECRUTEU_GENERALIS_MEMBRE foreign key (idMembre)
      references Membre (idMembre)
      on update restrict
      on delete restrict;

