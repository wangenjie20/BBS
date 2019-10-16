#1.创建数据库
create database bbs;
#2.选择默认的数据库
use bbs;

#3.创建用户表
create table user (
    user_id int unsigned primary key auto_increment comment '主键',
    user_name varchar(20) not null unique key comment '用户名',
    use_password char(30) not null comment '用户密码'
);

#4.创建帖子表
create table publish(
    pub_id int unsigned primary key auto_increment comment '主键',
    pub_title varchar(50) not null comment '发帖标题',
    pub_content text not null comment '发帖内容',
    pub_owner varchar(20) not null comment '发帖人名字',
    pub_time int unsigned not null comment '发帖时间戳',
    pub_hits int unsigned not null default 0 comment '点击量'
);

#5.创建回帖表
create table reply(
    rep_id int unsigned primary key auto_increment comment '主键',
    rep_pub_id int unsigned not null comment '外键，指向发帖人的id',
    rep_user varchar(20) not null comment '回帖人名字',
    rep_content text not null comment '回帖内容',
    rep_time int unsigned not null comment '回帖时间戳'
)
#6.添加reply两列,楼层和被引用的id
--被引用的楼层数
alter table reply add rep_num int UNSIGNED not null DEFAULT 0;
--被引用的帖子的id
alter table reply add rep_quote_id int UNSIGNED not null DEFAULT 0;
--增加保存图片的字段
alter table user add user_image VARCHAR(50) not null DEFAULT 'default.jpg';
