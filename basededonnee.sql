/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de cr�ation :  29/01/2025 12:47:16                      */
/*==============================================================*/


drop table if exists CATEGORIE;

drop table if exists CLIENT;

drop table if exists COMMANDE;

drop table if exists COMMANDE_PRODUIT;

drop table if exists PRODUIT;

drop table if exists PROMOTION;

drop table if exists SOUS_CATEGORIE;

/*==============================================================*/
/* Table : CATEGORIE                                            */
/*==============================================================*/
create table CATEGORIE
(
   ID_CATEGORIE         int not null,
   NOM_CATEGORIE        varchar(100),
   DESCRIPTION_CATEGORIE text,
   primary key (ID_CATEGORIE)
);

/*==============================================================*/
/* Table : CLIENT                                               */
/*==============================================================*/
create table CLIENT
(
   ID_CLIENT            int not null,
   NOM_CLIENT           varchar(100),
   EMAIL                varchar(150),
   TELEPHONE            varchar(15),
   ADDRESSE             text,
   TYPE_COMPTE          varchar(10),
   primary key (ID_CLIENT)
);

/*==============================================================*/
/* Table : COMMANDE                                             */
/*==============================================================*/
create table COMMANDE
(
   ID_COMMANDE          int not null,
   ID_CLIENT            int,
   DATE                 date,
   TOTAL                float,
   STATUT               varchar(25),
   primary key (ID_COMMANDE)
);

/*==============================================================*/
/* Table : COMMANDE_PRODUIT                                     */
/*==============================================================*/
create table COMMANDE_PRODUIT
(
   ID_COMMANDE          int not null,
   ID_PRODUIT           int not null,
   QUANTITE             int,
   PRIX_UNITAIRE        float,
   primary key (ID_COMMANDE, ID_PRODUIT)
);

/*==============================================================*/
/* Table : PRODUIT                                              */
/*==============================================================*/
create table PRODUIT
(
   ID_PRODUIT           int not null,
   ID_SOUS_CATEGORIE    int,
   NOM_PRODUIT          varchar(100),
   DESCRIPTION_PRODUIT  text,
   PRIX                 float(8,2),
   STOCK                int,
   primary key (ID_PRODUIT)
);

/*==============================================================*/
/* Table : PROMOTION                                            */
/*==============================================================*/
create table PROMOTION
(
   ID_PROMOTION         int not null,
   ID_PRODUIT           int,
   DESCRIPTION_PROMOTION text,
   POURCENTAGE          float,
   DATE_DEBUT           date,
   DATE_FIN             date,
   primary key (ID_PROMOTION)
);

/*==============================================================*/
/* Table : SOUS_CATEGORIE                                       */
/*==============================================================*/
create table SOUS_CATEGORIE
(
   ID_SOUS_CATEGORIE    int not null,
   ID_CATEGORIE         int,
   NOM_SOUS_CATEGORIE   varchar(100),
   primary key (ID_SOUS_CATEGORIE)
);

alter table COMMANDE add constraint FK_RELATION_1 foreign key (ID_CLIENT)
      references CLIENT (ID_CLIENT) on delete restrict on update restrict;

alter table COMMANDE_PRODUIT add constraint FK_COMMANDE_PRODUIT foreign key (ID_PRODUIT)
      references PRODUIT (ID_PRODUIT) on delete restrict on update restrict;

alter table COMMANDE_PRODUIT add constraint FK_COMMANDE_PRODUIT2 foreign key (ID_COMMANDE)
      references COMMANDE (ID_COMMANDE) on delete restrict on update restrict;

alter table PRODUIT add constraint FK_RELATION_2 foreign key (ID_SOUS_CATEGORIE)
      references SOUS_CATEGORIE (ID_SOUS_CATEGORIE) on delete restrict on update restrict;

alter table PROMOTION add constraint FK_RELATION_4 foreign key (ID_PRODUIT)
      references PRODUIT (ID_PRODUIT) on delete restrict on update restrict;

alter table SOUS_CATEGORIE add constraint FK_RELATION_3 foreign key (ID_CATEGORIE)
      references CATEGORIE (ID_CATEGORIE) on delete restrict on update restrict;

ALTER TABLE `produit` ADD `photo` VARCHAR(100) NOT NULL AFTER `STOCK`;

