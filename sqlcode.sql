use foodorderdb;
drop table `menuitems_tbl`;
CREATE TABLE `menuitems_tbl` (
  `Category` int(11) NOT NULL ,
  `MenuItemID` int(11) NOT NULL UNIQUE,
  `ItemName` varchar(255) NOT NULL UNIQUE,
  `Price` int(30) NOT NULL,
  `Discount` int(30) NOT NULL,
  `ItemImg` blob NOT NULL,
  FOREIGN KEY (`Category`) REFERENCES `menucategory_tbl`(`Category`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `menuitems_tbl` ( `Category`, `MenuItemID`, `ItemName`, `Price`, `Discount` ) VALUES(4, 1, 'Semo', '$45', '$10');
INSERT INTO `menuitems_tbl` ( `Category`, `MenuItemID`, `ItemName`, `Price`, `Discount` ) VALUES(4, 2, 'Amala', '$45', '$10');
INSERT INTO `menuitems_tbl` ( `Category`, `MenuItemID`, `ItemName`, `Price`, `Discount` ) VALUES(1, 3, 'Small size Pizza', '$45', '$10');
INSERT INTO `menuitems_tbl` ( `Category`, `MenuItemID`, `ItemName`, `Price`, `Discount` ) VALUES(1, 4, 'Large size Pizza', '$45', '$10');

-- Create users table

CREATE TABLE `users_tbl` (
  `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `UserName` varchar(255) NOT NULL UNIQUE,
  `Password` varchar(255) NOT NULL,
  `UserType` varchar(20) NOT NULL,
  `ContactNo` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL UNIQUE,
  `DelAddress` varchar(255) NOT NULL,
  `City` varchar(100) NOT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Create admin table

CREATE TABLE `admins_tbl` (
  `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `AdminName` varchar(255) NOT NULL UNIQUE,
  `Password` varchar(255) NOT NULL,
  `UserType` varchar(20) NOT NULL,
  `ContactNo` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL UNIQUE,
  `Address` varchar(255) NOT NULL,
  `City` varchar(100) NOT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Create order details table.

CREATE TABLE `orderdetails_tbl` (
  `OrderID` int(11) NOT NULL UNIQUE,
  `productID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Amount` varchar(30) NOT NULL,
  `Discount` varchar(30) NOT NULL
);

-- Create orders table.

CREATE TABLE `orders_tbl` (
  `OrderID` int(11) NOT NULL UNIQUE,
  `OrderDate` date NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `AmtPaid` varchar(30) NOT NULL,
  `TotDiscount` varchar(30) NOT NULL
);

-- Create menu category table.

CREATE TABLE `menucategory_tbl` (
  `Category` int(11) NOT NULL PRIMARY KEY,
  `CatDesc` varchar(255) NOT NULL
);



ALTER TABLE
`menuitems_tbl` CHANGE COLUMN `MenuItemID` `MenuItemID` INT(11) NOT NULL UNIQUE;

ALTER TABLE `menuitems_tbl`
ADD FOREIGN KEY (`Category`) REFERENCES `menucategory_tbl`(`Category`) ON DELETE CASCADE;

use foodorderdb;
select * from menucategory_tbl;

create database shoe_store;
use shoe_store;
show tables;
select * from store;