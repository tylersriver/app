-- 
-- User Table
-- 
CREATE TABLE user (
    id int(11) AUTO_INCREMENT primary key,
    username varchar(256),
    firstName varchar(512),
    lastName varchar(512),
    email varchar(512),
    password varchar(512)
);