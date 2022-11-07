drop database if exists surveyx_order;
create database surveyx_order default character set utf8 collate utf8_general_ci;
grant all on surveyx_order.* to 'root'@'localhost' identified by 'password';

use surveyx_order;

create table customer(
    orderNo varchar(30) primary key, orderStatus varchar(10),
    account varchar(20), name varchar(20), companyName varchar(50),
    phoneNo varchar(20), email varchar(50), mpId varchar(10),
    orderMemo varchar(100), createDate datetime
);
create table orders(
    orderNo varchar(30) primary key, orderStatus varchar(10), sonetOrderNo varchar(15),
    productNo varchar(15), productName varchar(100), userId varchar(20), mpId varchar(10),
    icpId varchar(20), price int, memo varchar(200), authCode varchar(32), resultCode varchar(5),
    resultMesg varchar(250), authFlag varchar(1), createDate datetime,
    vatmAccount varchar(30), expireDatetime datetime, payStatus varchar(6),
    payDate datetime
);
create table orders_setUp(
    orderNo varchar(30) primary key, orderStatus varchar(10), sonetOrderNo varchar(15),
    productNo varchar(15), productName varchar(100), userId varchar(20), mpId varchar(10),
    icpId varchar(20), price int, memo varchar(200), authCode varchar(32), resultCode varchar(5),
    resultMesg varchar(250), authFlag varchar(1), createDate datetime,
    vatmAccount varchar(30), expireDatetime datetime, payStatus varchar(6),
    payDate datetime
);
create table transRecords(
    orderNum varchar(30), mpId varchar(10), errorCode varchar(5),
    description varchar(250), createDate datetime
);

