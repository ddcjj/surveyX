create database surveyx_creator default character set utf8 collate utf8_general_ci;
create database surveyx_questionnaire default character set utf8 collate utf8_general_ci;

use surveyx_creator;
create table member_profile (
    id int auto_increment primary key,
    account varchar(20) unique,
    password varchar(128),
    c_rank int,
    name varchar(20),
    email varchar(20),
    tel varchar(20),
    company_name varchar(50),
    uniform_numbers varchar(20),
    industry_category varchar(20),
    createDate datetime,
    updateDate datetime
);

create table question_table ( 
    creator_account varchar(20), project_name varchar(20), q_no int(3),
    q_title varchar(100), q_form varchar(4), 
    q_1 varchar(50), q_2 varchar(50), q_3 varchar(50), q_4 varchar(50), 
    q_5 varchar(50), q_6 varchar(50), q_7 varchar(50), q_8 varchar(50), 
    q_9 varchar(50), q_10 varchar(50), createDate datetime, updateDate datetime,
    primary key(creator_account, project_name, q_no) 
);

create table project_table (
    project_account varchar(20), project_name varchar(50), 
    project_title varchar(20), ga_head varchar(512), ga_body varchar(300),
    fb_code varchar(1024), 
    talking_date date, talking_time varchar(2), bgImgName varchar(30),
    bg_type varchar(10),
    logoImgName varchar(30), createName datetime, updateDate datetime, 
    primary key(project_account, project_name)
);
