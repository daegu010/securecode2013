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