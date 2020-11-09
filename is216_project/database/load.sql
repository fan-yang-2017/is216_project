drop database if exists users;
create database users;
use users;

CREATE TABLE IF NOT EXISTS user (
  username varchar(50) NOT NULL,
  hashed_password varchar(256) NOT NULL,
  PRIMARY KEY (username)
);