CREATE DATABASE hotwiredb;

CREATE TABLE IF NOT EXISTS  `users` (
	id int(5) NOT NULL AUTO_INCREMENT,
	name varchar(255) DEFAULT NULL,
	access_group varchar(255) DEFAULT NULL,
	username varchar(255) DEFAULT NULL,
	password varchar(32) DEFAULT NULL,
	insert_time varchar(32) DEFAULT NULL,
	PRIMARY KEY (id),
	UNIQUE(username)
);


CREATE TABLE IF NOT EXISTS  `ci_sessions` (
	session_id varchar(40) DEFAULT '0' NOT NULL,
	ip_address varchar(45) DEFAULT '0' NOT NULL,
	user_agent varchar(120) NOT NULL,
	last_activity int(10) unsigned DEFAULT 0 NOT NULL,
	user_data text NOT NULL,
	PRIMARY KEY (session_id),
	KEY `last_activity_idx` (`last_activity`)
);

INSERT INTO users (name, access_group, username, password, insert_time)
VALUES 
	('Tom Jones', 'admin', 'Tjones', '123abc', '5/22/13'), 
	('Bill Richards', 'admin', 'brichards', 'cba321', '6/12/13'),
	('John Paul', 'View', 'jpaul', '456asd', '1/1/14'),
	('Sandeep Gopal', 'phpdev', 'sgopal', 'sgopal', '3/15/14')
;