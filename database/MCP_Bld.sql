SET @@AUTOCOMMIT = 1;

DROP DATABASE IF EXISTS MCP;
CREATE DATABASE MCP;

USE MCP;

CREATE TABLE Customer(
	custId varchar(8) NOT NULL,
	title varchar(8),
	fname varchar(40) NOT NULL,
	lname varchar(40) NOT NULL,
	PRIMARY KEY(custId)
) AUTO_INCREMENT = 1;

CREATE TABLE Login(
	custId varchar(8) NOT NULL,
	usrNme varchar (20) NOT NULL,
	pwd varchar (20)NOT NULl,
	PRIMARY KEY(custId),
	FOREIGN KEY(CustId) REFERENCES Customer(custId)
);

CREATE TABLE CustResAddr(
	custId varchar(8),
	Street varchar(45),
	Suburb varchar(45),
	Postcode char(5) NOT NULL DEFAULT 1001,
	phone varchar(14) NOT NULL DEFAULT 555,
	email varchar(100),
	PRIMARY KEY (custId),
	FOREIGN KEY(CustId) REFERENCES Customer(custId)
);

CREATE TABLE CustDelAddr(
	custId varchar(8) NOT NULL,
	Street varchar(45),
	Suburb varchar(45),
	Postcode char(5),
	deliveryNote varchar(300),
	PRIMARY KEY(custId),
	FOREIGN KEY(custId) REFERENCES Customer(custId)
);

CREATE TABLE Product (
	stockNum varchar(10) NOT NULL,
	productName varchar(25),
	description varchar(300),
	unitCost decimal(6,2),
	stockQty int(8),
	PRIMARY KEY(stockNum)
);

CREATE TABLE Card (
	custId varchar(8) NOT NULL,
	cardNum	char(21) NOT NULL,
	PRIMARY KEY(custId),
	FOREIGN KEY(custId) REFERENCES Customer(custId)
);

CREATE TABLE Cart (
	custId varchar(8) NOT NULL,
	stockNum varchar(10),
	unitCost decimal(6,2),
	qty int(3),
	totalCost decimal(8,2),
	PRIMARY KEY(custId, stockNum)
);

CREATE TABLE Invoice (
	invoiceId char(10) NOT NULL,
	custId varchar(8)NOT NULL,
	invoiceDate	timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	deliveryFee decimal(5,2),
	finCost decimal(8,2) NOT NULL,
	PRIMARY KEY (invoiceId),
	FOREIGN KEY(custId) REFERENCES Customer(custId)
);

CREATE user IF NOT EXISTS 'dbadmin'@'localhost';
GRANT all privileges ON MCP.* TO dbadmin@localhost;
