
-- -----------------------------------------------------
-- Drop Existing Constraints And Tables
-- -----------------------------------------------------

DROP DATABASE IF EXISTS eatrebs;

CREATE DATABASE eatrebs;

use eatrebs;

-- -----------------------------------------------------
-- Create Tables
-- -----------------------------------------------------

CREATE TABLE customers (
  cus_id INT(11) NOT NULL AUTO_INCREMENT,
  email VARCHAR(255) NOT NULL,
  name VARCHAR(255) NOT NULL,
  zipcode int(11) NOT NULL,
  PRIMARY KEY (cus_id)
)ENGINE = InnoDB ;

CREATE TABLE drivers (
  dr_id INT(11) NOT NULL AUTO_INCREMENT,
  earnings DECIMAL(13,2) NOT NULL DEFAULT 0,
  email VARCHAR(255) NOT NULL,
  name VARCHAR(255) NOT NULL,
  zipcode int(11) NOT NULL,
  PRIMARY KEY (dr_id)
)ENGINE = InnoDB;

CREATE TABLE items (
  item_id INT(11) NOT NULL AUTO_INCREMENT,
  rest_id INT(11) NOT NULL,
  cost decimal(13,2) NOT NULL,
  name VARCHAR(255) NOT NULL,
  images VARCHAR(255) NULL,
  description TEXT NULL DEFAULT NULL,
  PRIMARY KEY (item_id)
)ENGINE = InnoDB;

CREATE TABLE restaurants (
  rest_id INT(11) NOT NULL AUTO_INCREMENT,
  earnings DECIMAL(13,2) NOT NULL DEFAULT 0,
  email VARCHAR(255) NOT NULL,
  rest_name VARCHAR(255) NOT NULL,
  address VARCHAR(255) NOT NULL,
  pNumber VARCHAR(255) NOT NULL,
  zipcode int(11) NOT NULL,
  open VARCHAR(255) NOT NULL,
  close VARCHAR(255) NOT NULL,
  PRIMARY KEY (rest_id)
)ENGINE = InnoDB;

CREATE TABLE orders (
  ord_id INT(11) NOT NULL AUTO_INCREMENT,
  cus_id INT(11) NOT NULL,
  dr_id INT(11) NOT NULL,
  rest_id INT(11) NOT NULL,
  cost decimal(13,2) NOT NULL,
  address VARCHAR(255) NOT NULL,
  rest_confirm BOOLEAN NOT NULL DEFAULT FALSE,
  dr_confirm BOOLEAN NOT NULL DEFAULT FALSE,
  fulfilled BOOLEAN NOT NULL DEFAULT FALSE,
  PRIMARY KEY (ord_id)
)ENGINE = InnoDB;

CREATE TABLE order_items (
  oi_id INT(11) NOT NULL AUTO_INCREMENT,
  ord_id INT(11) NOT NULL,
  item_id INT(11) NOT NULL,
  instructions TEXT NULL DEFAULT NULL,
  PRIMARY KEY (oi_id)
)ENGINE = InnoDB;

-- -----------------------------------------------------
-- Create Constraints For orders
-- -----------------------------------------------------

ALTER TABLE orders
ADD CONSTRAINT FK_orders_cus_id
FOREIGN KEY (cus_id) REFERENCES customers(cus_id);

ALTER TABLE orders
ADD CONSTRAINT FK_orders_dr_id
FOREIGN KEY (dr_id) REFERENCES drivers(dr_id);

ALTER TABLE orders
ADD CONSTRAINT FK_orders_rest_id
FOREIGN KEY (rest_id) REFERENCES restaurants(rest_id);

-- -----------------------------------------------------
-- Create Constraints For order_items
-- -----------------------------------------------------

ALTER TABLE order_items
ADD CONSTRAINT FK_oi_ord_id
FOREIGN KEY (ord_id) REFERENCES orders(ord_id);

ALTER TABLE order_items
ADD CONSTRAINT FK_oi_item_id
FOREIGN KEY (item_id) REFERENCES items(item_id);

-- -----------------------------------------------------
-- Create Constraints For items
-- -----------------------------------------------------

ALTER TABLE items
ADD CONSTRAINT FK_items_rest_id
FOREIGN KEY (rest_id) REFERENCES restaurants(rest_id);