securecode

https://github.com/eurekasolution/securecode


$sql = "select * from user whre id='$id' and pass='$pass' ";

id = test
pass = 1234

id = ' or 2>1 limit 1,1 -- 

create table users (
    idx     int(10) auto_increment,
    id      char(30) unique,
    name    char(30),
    pass    char(50),
    primary key(idx)
);

insert into users (id, name, pass) values ('test', '테스트', 'abcd');
insert into users (id, name, pass) values ('admin', '관리자', 'abcd');
insert into users (id, name, pass) values ('test1', '네글자다', 'abcd');

쿠키의 확인

javascript:alert(document.cookie);

Day 2

create table bbs (
    idx     int(10) auto_increment,
    title   char(255),
    name    char(20),
    content text,
    primary key(idx)
);

insert into bbs (title, name, content) 
    values ('첫번째 게시글', '홍길동', '첫번째 글입니다.');
    

Day 3 
비밀번호의 안전성 테스트 , 2022-12-14 12:34:56
https://www.security.org/how-secure-is-my-password/

create table logs (
    idx     int(10) auto_increment,
    ip      char(20),
    work    char(255),
    name    char(30),
    time    datetime,

    primary key(idx)
);


Day 4

create table bbs (
    idx     int(10) auto_increment,
    title   char(255),
    name    char(20),
    content text,
    primary key(idx)
);

alter table bbs add test char(20) after title;
alter table bbs change test  sec char(10);
alter table bbs drop sec;

alter table bbs add file char(20);
alter table bbs add fname char(50);

Day 5
