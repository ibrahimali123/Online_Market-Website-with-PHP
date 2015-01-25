CREATE DATABASE IF NOT EXISTS OnlineMarket_DB;
USE OnlineMarket_DB;
CREATE TABLE Ad (id int(10) NOT NULL AUTO_INCREMENT, title varchar(50) NOT NULL, image varchar(50), description varchar(50), place varchar(16) NOT NULL, category varchar(16) NOT NULL, Userid int(10) NOT NULL, provider_name varchar(16) NOT NULL, provider_mobile varchar(16) NOT NULL, note varchar(50), PRIMARY KEY (id));
CREATE TABLE Home (Adid int(10) NOT NULL, price double NOT NULL, area real NOT NULL, address varchar(50) NOT NULL, rooms int(10) NOT NULL, toilets int(10) NOT NULL, PRIMARY KEY (Adid));
CREATE TABLE Car (Adid int(10) NOT NULL, brand varchar(16) NOT NULL, model varchar(16) NOT NULL, price real NOT NULL, kms int(10) NOT NULL, capacity real NOT NULL, PRIMARY KEY (Adid));
CREATE TABLE Job (Adid int(10) NOT NULL, experience int(6) NOT NULL, skills varchar(50) NOT NULL, field varchar(16) NOT NULL, type varchar(16) NOT NULL, salary double, PRIMARY KEY (Adid));
CREATE TABLE `User` (id int(10) NOT NULL AUTO_INCREMENT, email varchar(50) NOT NULL UNIQUE, password varchar(16) NOT NULL, name varchar(16) NOT NULL, facebook_name varchar(32), PRIMARY KEY (id));
CREATE TABLE SavingList (id int(10) NOT NULL AUTO_INCREMENT, name varchar(32), Userid int(10) NOT NULL, PRIMARY KEY (id));
CREATE TABLE Ad_SavingList (Adid int(10) NOT NULL, SavingListid int(10) NOT NULL, PRIMARY KEY (Adid, SavingListid));
ALTER TABLE Home ADD INDEX FKHome296447 (Adid), ADD CONSTRAINT FKHome296447 FOREIGN KEY (Adid) REFERENCES Ad (id);
ALTER TABLE Job ADD INDEX FKJob115995 (Adid), ADD CONSTRAINT FKJob115995 FOREIGN KEY (Adid) REFERENCES Ad (id);
ALTER TABLE Car ADD INDEX FKCar108850 (Adid), ADD CONSTRAINT FKCar108850 FOREIGN KEY (Adid) REFERENCES Ad (id);
ALTER TABLE SavingList ADD INDEX has (Userid), ADD CONSTRAINT has FOREIGN KEY (Userid) REFERENCES `User` (id);
ALTER TABLE Ad_SavingList ADD INDEX FKAd_SavingL253690 (Adid), ADD CONSTRAINT FKAd_SavingL253690 FOREIGN KEY (Adid) REFERENCES Ad (id);
ALTER TABLE Ad_SavingList ADD INDEX FKAd_SavingL955050 (SavingListid), ADD CONSTRAINT FKAd_SavingL955050 FOREIGN KEY (SavingListid) REFERENCES SavingList (id);
ALTER TABLE Ad ADD INDEX makes (Userid), ADD CONSTRAINT makes FOREIGN KEY (Userid) REFERENCES `User` (id);
