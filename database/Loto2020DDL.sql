/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     13.03.2020. 18:18:53                         */
/*==============================================================*/


drop table if exists `Izvucena kombinacija`;

drop table if exists Statistika;

/*==============================================================*/
/* Table: `Izvucena kombinacija`                                */
/*==============================================================*/
create table `Izvucena kombinacija`
(
   RBkombinacija        int not null auto_increment,
   Godina               int not null,
   Kolo                 tinyint not null,
   Broj1                tinyint not null,
   Broj2                tinyint not null,
   Broj3                tinyint not null,
   Broj4                tinyint not null,
   Broj5                tinyint not null,
   Broj6                tinyint not null,
   Broj7                tinyint not null,
   primary key (RBkombinacija)
);

/*==============================================================*/
/* Table: Statistika                                            */
/*==============================================================*/
create table Statistika
(
   RBkombinacija        int not null,
   Par                  tinyint not null,
   Nepar                tinyint not null,
   V1                   tinyint not null,
   V2                   tinyint not null,
   V3                   tinyint not null,
   primary key (RBkombinacija)
);

alter table Statistika add constraint FK_Ima foreign key (RBkombinacija)
      references `Izvucena kombinacija` (RBkombinacija) on delete cascade on update cascade;

