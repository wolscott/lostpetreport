/* When completed, this file can be read with mysql to initialize the database structure.
   Running this file will wipe the entire db and reinitialize it, 
   SO DON'T DO IT IF YOU DON'T WANT TO WHIPE THE DB!!!
*/

/* this file does not specify a DB to use. You must pipe it in with the mysql command like this
     mysql -u <username> -p <DBName> < dbinit.sql 
*/

/* drop tables for clean slate. Order is important because it will complain about 
   foreign key constraints if you try to drop them in the wrong order
*/

DROP TABLE IF EXISTS resetToken;

CREATE TABLE resetToken (
    UserName varchar(255) NOT NULL,
	Token varchar(255) NOT NULL,
    RequestDateTime datetime,
	PRIMARY KEY (Email, Token),
    FOREIGN KEY (UserName) REFERENCES user(UserName)
); 
