/*==============================================================*/
/* Nom de SGBD :  Sybase SQL Anywhere 11                        */
/* Date de création :  28/11/2021 23:20:45                      */
/*==============================================================*/


if exists(select 1 from sys.sysforeignkey where role='FK_ALERTE_ASSOCIATI_CANDIDAT') then
    alter table Alerte
       delete foreign key FK_ALERTE_ASSOCIATI_CANDIDAT
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_CANDIDAT_GENERALIS_MEMBRE') then
    alter table Candidat
       delete foreign key FK_CANDIDAT_GENERALIS_MEMBRE
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_CANDIDAT_ASSOCIATI_DIPLOME') then
    alter table Candidat
       delete foreign key FK_CANDIDAT_ASSOCIATI_DIPLOME
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_COMPETEN_ASSOCIATI_CANDIDAT') then
    alter table Competences
       delete foreign key FK_COMPETEN_ASSOCIATI_CANDIDAT
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_DIPLOME_ASSOCIATI_CANDIDAT') then
    alter table Diplome
       delete foreign key FK_DIPLOME_ASSOCIATI_CANDIDAT
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_EMPLOIE_GENERALIS_OFFRE') then
    alter table Emploie
       delete foreign key FK_EMPLOIE_GENERALIS_OFFRE
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_EXPERIEN_ASSOCIATI_CANDIDAT') then
    alter table Experience
       delete foreign key FK_EXPERIEN_ASSOCIATI_CANDIDAT
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_LANGUE_ASSOCIATI_CANDIDAT') then
    alter table Langue
       delete foreign key FK_LANGUE_ASSOCIATI_CANDIDAT
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_LANGUE_ASSOCIATI_PROFIL') then
    alter table Langue
       delete foreign key FK_LANGUE_ASSOCIATI_PROFIL
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_OFFRE_ASSOCIATI_RECRUTEU') then
    alter table Offre
       delete foreign key FK_OFFRE_ASSOCIATI_RECRUTEU
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_PLANIFIC_ASSOCIATI_CANDIDAT') then
    alter table PlanificationEntretien
       delete foreign key FK_PLANIFIC_ASSOCIATI_CANDIDAT
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_PLANIFIC_ASSOCIATI_OFFRE') then
    alter table PlanificationEntretien
       delete foreign key FK_PLANIFIC_ASSOCIATI_OFFRE
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_PROFIL_ASSOCIATI_CANDIDAT') then
    alter table Profil
       delete foreign key FK_PROFIL_ASSOCIATI_CANDIDAT
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_RECRUTEU_GENERALIS_MEMBRE') then
    alter table Recruteur
       delete foreign key FK_RECRUTEU_GENERALIS_MEMBRE
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='ADMINISTRATEUR_PK'
     and t.table_name='Administrateur'
) then
   drop index Administrateur.ADMINISTRATEUR_PK
end if;

if exists(
   select 1 from sys.systable 
   where table_name='Administrateur'
     and table_type in ('BASE', 'GBL TEMP')
) then
    drop table Administrateur
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='ASSOCIATION12_FK'
     and t.table_name='Alerte'
) then
   drop index Alerte.ASSOCIATION12_FK
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='ALERTE_PK'
     and t.table_name='Alerte'
) then
   drop index Alerte.ALERTE_PK
end if;

if exists(
   select 1 from sys.systable 
   where table_name='Alerte'
     and table_type in ('BASE', 'GBL TEMP')
) then
    drop table Alerte
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='GENERALISATION_1_FK'
     and t.table_name='Candidat'
) then
   drop index Candidat.GENERALISATION_1_FK
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='ASSOCIATION7_FK'
     and t.table_name='Candidat'
) then
   drop index Candidat.ASSOCIATION7_FK
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='CANDIDAT_PK'
     and t.table_name='Candidat'
) then
   drop index Candidat.CANDIDAT_PK
end if;

if exists(
   select 1 from sys.systable 
   where table_name='Candidat'
     and table_type in ('BASE', 'GBL TEMP')
) then
    drop table Candidat
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='ASSOCIATION4_FK'
     and t.table_name='Competences'
) then
   drop index Competences.ASSOCIATION4_FK
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='COMPETENCES_PK'
     and t.table_name='Competences'
) then
   drop index Competences.COMPETENCES_PK
end if;

if exists(
   select 1 from sys.systable 
   where table_name='Competences'
     and table_type in ('BASE', 'GBL TEMP')
) then
    drop table Competences
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='ASSOCIATION8_FK'
     and t.table_name='Diplome'
) then
   drop index Diplome.ASSOCIATION8_FK
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='DIPLOME_PK'
     and t.table_name='Diplome'
) then
   drop index Diplome.DIPLOME_PK
end if;

if exists(
   select 1 from sys.systable 
   where table_name='Diplome'
     and table_type in ('BASE', 'GBL TEMP')
) then
    drop table Diplome
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='GENERALISATION_3_FK'
     and t.table_name='Emploie'
) then
   drop index Emploie.GENERALISATION_3_FK
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='EMPLOIE_PK'
     and t.table_name='Emploie'
) then
   drop index Emploie.EMPLOIE_PK
end if;

if exists(
   select 1 from sys.systable 
   where table_name='Emploie'
     and table_type in ('BASE', 'GBL TEMP')
) then
    drop table Emploie
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='ASSOCIATION5_FK'
     and t.table_name='Experience'
) then
   drop index Experience.ASSOCIATION5_FK
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='EXPERIENCE_PK'
     and t.table_name='Experience'
) then
   drop index Experience.EXPERIENCE_PK
end if;

if exists(
   select 1 from sys.systable 
   where table_name='Experience'
     and table_type in ('BASE', 'GBL TEMP')
) then
    drop table Experience
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='ASSOCIATION11_FK'
     and t.table_name='Langue'
) then
   drop index Langue.ASSOCIATION11_FK
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='ASSOCIATION3_FK'
     and t.table_name='Langue'
) then
   drop index Langue.ASSOCIATION3_FK
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='LANGUE_PK'
     and t.table_name='Langue'
) then
   drop index Langue.LANGUE_PK
end if;

if exists(
   select 1 from sys.systable 
   where table_name='Langue'
     and table_type in ('BASE', 'GBL TEMP')
) then
    drop table Langue
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='MEMBRE_PK'
     and t.table_name='Membre'
) then
   drop index Membre.MEMBRE_PK
end if;

if exists(
   select 1 from sys.systable 
   where table_name='Membre'
     and table_type in ('BASE', 'GBL TEMP')
) then
    drop table Membre
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='ASSOCIATION9_FK'
     and t.table_name='Offre'
) then
   drop index Offre.ASSOCIATION9_FK
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='OFFRE_PK'
     and t.table_name='Offre'
) then
   drop index Offre.OFFRE_PK
end if;

if exists(
   select 1 from sys.systable 
   where table_name='Offre'
     and table_type in ('BASE', 'GBL TEMP')
) then
    drop table Offre
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='ASSOCIATION1_FK2'
     and t.table_name='PlanificationEntretien'
) then
   drop index PlanificationEntretien.ASSOCIATION1_FK2
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='ASSOCIATION1_FK'
     and t.table_name='PlanificationEntretien'
) then
   drop index PlanificationEntretien.ASSOCIATION1_FK
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='PLANIFICATIONENTRETIEN_PK'
     and t.table_name='PlanificationEntretien'
) then
   drop index PlanificationEntretien.PLANIFICATIONENTRETIEN_PK
end if;

if exists(
   select 1 from sys.systable 
   where table_name='PlanificationEntretien'
     and table_type in ('BASE', 'GBL TEMP')
) then
    drop table PlanificationEntretien
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='ASSOCIATION2_FK'
     and t.table_name='Profil'
) then
   drop index Profil.ASSOCIATION2_FK
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='PROFIL_PK'
     and t.table_name='Profil'
) then
   drop index Profil.PROFIL_PK
end if;

if exists(
   select 1 from sys.systable 
   where table_name='Profil'
     and table_type in ('BASE', 'GBL TEMP')
) then
    drop table Profil
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='GENERALISATION_2_FK'
     and t.table_name='Recruteur'
) then
   drop index Recruteur.GENERALISATION_2_FK
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='RECRUTEUR_PK'
     and t.table_name='Recruteur'
) then
   drop index Recruteur.RECRUTEUR_PK
end if;

if exists(
   select 1 from sys.systable 
   where table_name='Recruteur'
     and table_type in ('BASE', 'GBL TEMP')
) then
    drop table Recruteur
end if;

/*==============================================================*/
/* Table : Administrateur                                       */
/*==============================================================*/
create table Administrateur 
(
   idAdmin              integer                        not null,
   nom                  varchar(254)                   null,
   prenom               varchar(254)                   null,
   "login"              varchar(254)                   null,
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
/* Table : Competences                                          */
/*==============================================================*/
create table Competences 
(
   idCompetence         integer                        not null,
   idMembre             integer                        not null,
   idCandidat           integer                        not null,
   libelle              varchar(254)                   null,
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
   idDiplome            integer                        not null,
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
   competence           varchar(254)                   null,
   secteur              varchar(254)                   null,
   DescriptionProfil    varchar(254)                   null,
   DescriptionPost      varchar(254)                   null,
   ficheDetaillee       varchar(254)                   null,
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
   idExperience         integer                        not null,
   idMembre             integer                        not null,
   idCandidat           integer                        not null,
   intitule             varchar(254)                   null,
   entreprise           varchar(254)                   null,
   secteur              varchar(254)                   null,
   detailExper          varchar(254)                   null,
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
   idLang               integer                        not null,
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
   idMembre             integer                        not null,
   adresse              varchar(254)                   null,
   ville                varchar(254)                   null,
   region               varchar(254)                   null,
   tel                  varchar(254)                   null,
   email                varchar(254)                   null,
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
   idOffre              integer                        not null,
   idMembre             integer                        not null,
   idRecruteur          integer                        not null,
   dateCreation         timestamp                      null,
   region               varchar(254)                   null,
   typeContrat          varchar(254)                   null,
   entreprise           varchar(254)                   null,
   dateExpiration       timestamp                      null,
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
/* Table : PlanificationEntretien                               */
/*==============================================================*/
create table PlanificationEntretien 
(
   idMembre             integer                        not null,
   idCandidat           integer                        not null,
   idOffre              integer                        not null,
   idConvacation        integer                        not null,
   convacation          varchar(254)                   null,
   constraint PK_PLANIFICATIONENTRETIEN primary key (idMembre, idCandidat, idOffre, idConvacation)
);

/*==============================================================*/
/* Index : PLANIFICATIONENTRETIEN_PK                            */
/*==============================================================*/
create unique index PLANIFICATIONENTRETIEN_PK on PlanificationEntretien (
idMembre ASC,
idCandidat ASC,
idOffre ASC,
idConvacation ASC
);

/*==============================================================*/
/* Index : ASSOCIATION1_FK                                      */
/*==============================================================*/
create index ASSOCIATION1_FK on PlanificationEntretien (
idMembre ASC,
idCandidat ASC
);

/*==============================================================*/
/* Index : ASSOCIATION1_FK2                                     */
/*==============================================================*/
create index ASSOCIATION1_FK2 on PlanificationEntretien (
idOffre ASC
);

/*==============================================================*/
/* Table : Profil                                               */
/*==============================================================*/
create table Profil 
(
   idProfil             integer                        not null,
   idMembre             integer                        null,
   idCandidat           integer                        null,
   photo                varchar(254)                   null,
   cv                   varchar(254)                   null,
   description_profil   varchar(254)                   null,
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
/* Table : Recruteur                                            */
/*==============================================================*/
create table Recruteur 
(
   idMembre             integer                        not null,
   idRecruteur          integer                        not null,
   nom                  varchar(254)                   null,
   siteWeb              varchar(254)                   null,
   description          varchar(254)                   null,
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

alter table PlanificationEntretien
   add constraint FK_PLANIFIC_ASSOCIATI_CANDIDAT foreign key (idMembre, idCandidat)
      references Candidat (idMembre, idCandidat)
      on update restrict
      on delete restrict;

alter table PlanificationEntretien
   add constraint FK_PLANIFIC_ASSOCIATI_OFFRE foreign key (idOffre)
      references Offre (idOffre)
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

