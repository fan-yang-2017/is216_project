drop database if exists users;
create database users;
use users;

CREATE TABLE IF NOT EXISTS `user` (
    `username` varchar(50) NOT NULL,    
    `password` varchar(256) NOT NULL,
    PRIMARY KEY (username)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4;

/*All 5 members acocunt*/
insert into user values ("jiaruey", "$2y$10$.E37ytNUJ8UQjhremWJPrOWgmat7cmrb6BGtKc/x8Y6vVZErbvtAu");
insert into user values ("yuhao", "$2y$10$hbSto/cIbvKOSPKCrNL6wOi17YX1YDNQIxnhwlJ81olRS4/HG59Aq");
insert into user values ("yangfan", "$2y$10$OeQO127qfiEz4UlnK5jgJu10nsh3aJJmjvWQ949a2JkFytNOtRRjG");
insert into user values ("jiaying", "$2y$10$ZfiERL2nM0HbrySSj7d7Duk.HvuskGxrE3EiHwvCHgSsOUVVdpIK.");
insert into user values ("zhaoqi", "$2y$10$fEx3rnOa8EJVBd7bMUVpG.m5o93u2WrpG2aIFAVFJ1Uw8nqr/7u62");

