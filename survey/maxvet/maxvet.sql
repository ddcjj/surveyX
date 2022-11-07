create table maxvet_q (
    id int auto_increment primary key,
    createDate datetime,
    wcf varchar(32),
    company varchar(64),
    contact varchar(128),
    email varchar(64),
    whatsapp varchar(32),

    Mon_1 varchar(2),
    Mon_2 varchar(2),
    Tues_1 varchar(2),
    Tues_2 varchar(2),
    Wed_1 varchar(2),
    Wed_2 varchar(2),
    Thur_1 varchar(2),
    Thur_2 varchar(2),
    Fri_1 varchar(2),
    Fri_2 varchar(2)
);
