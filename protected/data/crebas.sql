/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     2017/8/10 15:16:03                           */
/*==============================================================*/


drop table if exists yc_annex;

drop table if exists yc_annex_type;

drop table if exists yc_column;

drop table if exists yc_comment;

drop table if exists yc_content;

drop table if exists yc_purview;

drop table if exists yc_user;

drop table if exists yc_user_column;

drop table if exists yc_user_purview;

/*==============================================================*/
/* Table: yc_annex                                              */
/*==============================================================*/
create table yc_annex
(
   Id                   int not null auto_increment,
   AnnexType            int,
   ContentId            int,
   Title                text,
   AnnexPath            text,
   OperateFlag          int comment '[2:启用;4:停用]',
   DeleteFlag           int comment '[2:未删除;4:已删除]',
   CreateTime           date,
   UpdateTime           date,
   DeleteTime           date,
   primary key (Id)
);

/*==============================================================*/
/* Table: yc_annex_type                                         */
/*==============================================================*/
create table yc_annex_type
(
   Id                   int not null auto_increment,
   Title                text,
   OperateFlag          int,
   DeleteFlag           int,
   CreateTime           date,
   UpdateTime           date,
   DeleteTime           date,
   primary key (Id)
);

/*==============================================================*/
/* Table: yc_column                                             */
/*==============================================================*/
create table yc_column
(
   Id                   int not null auto_increment,
   OrderNum             int,
   Title                text,
   ParentId             int,
   ImagePath            text,
   OperateFlag          int comment '[2:启用;4:停用]',
   DeleteFlag           int comment '[2:未删除;4:已删除]',
   CreateTime           date,
   UpdateTime           date,
   DeleteTime           date,
   primary key (Id)
);

/*==============================================================*/
/* Table: yc_comment                                            */
/*==============================================================*/
create table yc_comment
(
   Id                   int not null,
   OrderNum             int,
   ContentId            int,
   ParentId             int,
   Title                text,
   Content              text,
   Author               int,
   OperateFlag          int comment '[2:启用;4:停用]',
   DeleteFlag           int comment '[2:未删除;4:已删除]',
   CreateTime           date,
   UpdateTime           date,
   DeleteTime           date,
   primary key (Id)
);

/*==============================================================*/
/* Table: yc_content                                            */
/*==============================================================*/
create table yc_content
(
   Id                   int not null,
   OrderNum             int,
   ColumnId             int,
   Title                text,
   ImagePath            text,
   FileId               int,
   Author               int,
   OperateFlag          int comment '[2:启用;4:停用]',
   DeleteFlag           int comment '[2:未删除;4已删除]',
   CreateTime           date,
   UpdateTime           date,
   DeleteTime           date,
   primary key (Id)
);

/*==============================================================*/
/* Table: yc_purview                                            */
/*==============================================================*/
create table yc_purview
(
   PurviewId            int not null auto_increment,
   Title                text,
   Remark               text,
   OperateFlag          int,
   DeleteFlag           int,
   CreateTime           date,
   UpdateTime           date,
   DeleteTime           date,
   primary key (PurviewId)
);

INSERT INTO yc_purview (title, remark, operateflag, deleteflag, createtime, updatetime) VALUES ('add', 'none', 2, 2, NOW(), NOW());
INSERT INTO yc_purview (title, remark, operateflag, deleteflag, createtime, updatetime) VALUES ('select', 'none', 2, 2, NOW(), NOW());
INSERT INTO yc_purview (title, remark, operateflag, deleteflag, createtime, updatetime) VALUES ('update', 'none', 2, 2, NOW(), NOW());
INSERT INTO yc_purview (title, remark, operateflag, deleteflag, createtime, updatetime) VALUES ('delete', 'none', 2, 2, NOW(), NOW());

/*==============================================================*/
/* Table: yc_user                                               */
/*==============================================================*/
create table yc_user
(
   Id                   int not null auto_increment,
   Username             text,
   Password             text,
   Realname             text,
   OperateFlag          int comment '[2:启用;4:停用]',
   DeleteFlag           int comment '[2:未删除;4:已删除]',
   CreateTime           date,
   UpdateTime           date,
   DeleteTime           date,
   primary key (Id)
);

INSERT INTO yc_user (Username, Password, Realname, operateflag, deleteflag, createtime, updatetime) VALUES ('admin', '123456', '超级管理员', 2, 2, NOW(), NOW());

/*==============================================================*/
/* Table: yc_user_column                                        */
/*==============================================================*/
create table yc_user_column
(
   UserId               int,
   ColumnId             int,
   Remark               text,
   OperateFlag          int comment '[2:启用;4:停用]',
   DeleteFlag           int comment '[2:未删除;4:已删除]',
   CreateTime           date,
   UpdateTime           date,
   DeleteTime           date
);

/*==============================================================*/
/* Table: yc_user_purview                                       */
/*==============================================================*/
create table yc_user_purview
(
   UserId               int,
   PurviewId            int,
   Remark               text,
   OperateFlag          int comment '[2:启用;4:停用]',
   DeleteFlag           int comment '[2:未删除;4:已删除]',
   CreateTime           date,
   UpdateTime           date,
   DeleteTime           date
);

INSERT INTO yc_user_purview (UserId, PurviewId, remark, operateflag, deleteflag, createtime, updatetime) VALUES (1, 1, 'none', 2, 2, NOW(), NOW());
INSERT INTO yc_user_purview (UserId, PurviewId, remark, operateflag, deleteflag, createtime, updatetime) VALUES (1, 2, 'none', 2, 2, NOW(), NOW());
INSERT INTO yc_user_purview (UserId, PurviewId, remark, operateflag, deleteflag, createtime, updatetime) VALUES (1, 3, 'none', 2, 2, NOW(), NOW());
INSERT INTO yc_user_purview (UserId, PurviewId, remark, operateflag, deleteflag, createtime, updatetime) VALUES (1, 4, 'none', 2, 2, NOW(), NOW());

alter table yc_annex add constraint FK_Reference_2 foreign key (AnnexType)
      references yc_annex_type (Id) on delete restrict on update restrict;

alter table yc_annex add constraint FK_Reference_3 foreign key (ContentId)
      references yc_content (Id) on delete restrict on update restrict;

alter table yc_comment add constraint FK_Reference_10 foreign key (ContentId)
      references yc_content (Id) on delete restrict on update restrict;

alter table yc_comment add constraint FK_Reference_11 foreign key (Author)
      references yc_user (Id) on delete restrict on update restrict;

alter table yc_content add constraint FK_Reference_1 foreign key (ColumnId)
      references yc_column (Id) on delete restrict on update restrict;

alter table yc_content add constraint FK_Reference_8 foreign key (Author)
      references yc_user (Id) on delete restrict on update restrict;

alter table yc_user_column add constraint FK_Reference_4 foreign key (UserId)
      references yc_user (Id) on delete restrict on update restrict;

alter table yc_user_column add constraint FK_Reference_5 foreign key (ColumnId)
      references yc_column (Id) on delete restrict on update restrict;

alter table yc_user_purview add constraint FK_Reference_7 foreign key (UserId)
      references yc_user (Id) on delete restrict on update restrict;

alter table yc_user_purview add constraint FK_Reference_9 foreign key (PurviewId)
      references yc_purview (PurviewId) on delete restrict on update restrict;

