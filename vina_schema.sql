drop database if EXISTS Vina;

CREATE DATABASE if NOT EXISTS Vina;
Use Vina;


CREATE TABLE users (
user_id int NOT null AUTO_INCREMENT,
name varchar(255) NOT null,
domains varchar(255) NOT null,
position_held varchar(255) NOT null,
username varchar (255) NOT null,
passwords varchar (255) NOT null,
primary key (user_id),
unique (username)
);

CREATE TABLE db(
schema_id int NOT null AUTO_INCREMENT,
user_id int,
db varchar(255) NOT NULL,
tables text,
columns text,
domain varchar (255) NOT null,
primary key(schema_id),
FOREIGN key (user_id) REFERENCES users(user_id),
unique(db)
);

CREATE TABLE queries(
taskid int NOT null AUTO_INCREMENT,
user_id int NOT null,
question varchar(255),
result varchar(255),
feedback enum('Right','Wrong','Nearly good'),
primary key (taskid,user_id),
FOREIGN key (user_id) REFERENCES users(user_id)
);

insert into users values(1,'vivek','education','student','vina@1.com','42810cb02db3bb2cbb428af0d8b0376e');
