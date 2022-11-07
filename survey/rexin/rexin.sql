create table rexin_q (
    id int auto_increment primary key,
    createDate datetime,
    question1 varchar(2),

    question2_1 varchar(2),
    question2_2 varchar(2),
    question2_3 varchar(2),
    question2_4 varchar(2),
    question2_5 varchar(2),
    question2_text varchar(128),

    question3_1 varchar(2),
    question3_2 varchar(2),
    question3_3 varchar(2),
    question3_4 varchar(2),
    question3_5 varchar(2),
    question3_6 varchar(2),
    
    question4 varchar(2),
    question5 varchar(2),
    question6 varchar(2),
    question7 varchar(2),
    question8 varchar(2),
    email varchar(128),
    tel varchar(12) unique,
    message varchar(256)
);
