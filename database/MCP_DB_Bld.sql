/* 
Enter first 6 lines to create database
in ampps SQL tab
*/
SET @@AUTOCOMMIT = 1;
 
 drop database if exists MCP;
 
 create database MCP;
 
  use MCP;

  create user dbadmin@localhost;
  grant all privileges on MCP.* to dbadmin@localhost;


/*
DROP TABLE Customer;
DROP TABLE CustResAddr;
DROP TABLE CustDelAddr;
DROP TABLE Product;
DROP TABLE Card;
DROP TABLE Cart;
DROP TABLE Checkout;
DROP TABLE Invoice;
*/

/* 
Enter all the following into ampps SQL tab after selecting the MCP database.
*/

CREATE TABLE Customer(
	custId varchar(8) NOT NULL,
	title varchar(8),
	fname varchar(40) NOT NULL,
	lname varchar(40) NOT NULL,
	PRIMARY KEY(custId)
); /*AUTO_INCREMENT = 1;*/

CREATE TABLE CustResAddr(
	custId varchar(8),
	rStreet varchar(45),
	rSuburb varchar(45),
	rPostcode char(4,5) NOT NULL DEFAULT 1001,
	phone varchar(14) NOT NULL DEFAULT 555,
	email varchar(100),
	PRIMARY KEY (custId),
	FOREIGN KEY(CustId) REFERENCES Customer(custId)
);

CREATE TABLE CustDelAddr(
	custId varchar(8) NOT NULL,
	dStreet varchar(45),
	dSuburb varchar(45),
	dPostcode char(4),
	deliveryNote varchar(300),
	PRIMARY KEY(custId),
	FOREIGN KEY(custId) REFERENCES Customer(custId)
);

CREATE TABLE Product (
	stockNum varchar(10) NOT NULL,
	productName varchar(25),
	description varchar(300),
	unitCost decimal(5,2),
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
	cartId varchar(10) NOT NULL,
	stockNum varchar(10),
	unitCost decimal(5,2),
	totalCost decimal(8,2),
	qty int(3),
	custId varchar(8),
	PRIMARY KEY(cartId),
	FOREIGN KEY(custId) REFERENCES Customer(custId),
	FOREIGN KEY(stockNum) REFERENCES Product(stockNum)
);

CREATE TABLE Checkout (
	cartId varchar(10) NOT NULL,
	custId varchar(8) NOT NULL,
	cardNum char(21) NOT NULL,
	delFee decimal (5,2),
	finCost decimal (8,2) NOT NULL,
	PRIMARY KEY (cartId, custId),
	FOREIGN KEY (cartId) REFERENCES Cart(cartId),
	FOREIGN KEY (custId) REFERENCES Customer(custId)
);	

CREATE TABLE Invoice (
	invoiceId char(10) NOT NULL,
	custId varchar(8),
	cartId varchar(10),
	invoiceDate	timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	deliveryFee decimal(5,2),
	finalCost decimal(8,2) NOT NULL,
	PRIMARY KEY (invoiceId),
	FOREIGN KEY(custId) REFERENCES Customer(custId),
	FOREIGN KEY(cartId) REFERENCES Cart(cartId)
);
