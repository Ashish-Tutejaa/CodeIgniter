CREATE TABLE stations
(
ID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
ST_NAME VARCHAR(40) NOT NULL,
ENERGY INT NOT NULL
);
DESCRIBE stations;
INSERT INTO stations VALUES (1,'INDORE',382404);
INSERT INTO stations VALUES (2,'MUMBAI',100213);
SELECT * FROM stations;
SELECT SUM(ENERGY) FROM stations;
DROP TABLE stations;
SHOW TABLES;