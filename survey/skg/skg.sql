create table skg_q (
    id int auto_increment primary key,
    createDate datetime,
    question1_1 varchar(2),
    question1_2 varchar(2),
    question1_3 varchar(2),
    question1_4 varchar(2),

    question2_1 varchar(2),
    question2_2 varchar(2),
    question2_3 varchar(2),
    question2_4 varchar(2),
    question2_5 varchar(2),

    question3_1 varchar(2),
    question3_2 varchar(2),
    question3_3 varchar(2),
    question3_4 varchar(2),
    question3_5 varchar(2),
    
    question4_1 varchar(2),
    question4_2 varchar(2),
    question4_3 varchar(2),
    question4_4 varchar(2),
    question4_5 varchar(2),
    question4_6 varchar(2),

    question5 varchar(2),
    question6 varchar(2),
    question7 varchar(2),
    question8 varchar(2),

    email varchar(128),
    tel varchar(12) unique,
    message varchar(256)
);
