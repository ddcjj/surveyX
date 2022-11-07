create table necfree_q (
    id int auto_increment primary key,
    createDate datetime,
    question1 varchar(2),

    question2_1 varchar(2),
    question2_2 varchar(2),
    question2_3 varchar(2),
    question2_4 varchar(2),

    question3_1 varchar(2),
    question3_2 varchar(2),
    question3_3 varchar(2),
    question3_4 varchar(2),
    question3_5 varchar(2),
    question3_6 varchar(2),
    question3_text varchar(128),
    
    question4_1 varchar(2),
    question4_2 varchar(2),
    question4_3 varchar(2),
    question4_4 varchar(2),
    question4_5 varchar(2),
    question4_6 varchar(2),

    question5 varchar(2),
    question6 varchar(2),

    question7_1 varchar(2),
    question7_2 varchar(2),
    question7_3 varchar(2),
    question7_4 varchar(2),
    question7_5 varchar(2),
    question7_6 varchar(2),
    question7_7 varchar(2),

    question8_1 varchar(2),
    question8_2 varchar(2),
    question8_3 varchar(2),
    question8_4 varchar(2),
    question8_5 varchar(2),

    question9 varchar(2),
    question10 varchar(2),

    email varchar(128),
    tel varchar(12) unique,
    message varchar(256)
);
