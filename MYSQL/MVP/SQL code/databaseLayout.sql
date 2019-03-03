

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema eatrebs
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema eatrebs
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `eatrebs` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `eatrebs` ;

-- -----------------------------------------------------
-- Table `eatrebs`.`customer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eatrebs`.`customer` (
  `cus_id` INT(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) NULL DEFAULT NULL,
  `name` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY USING BTREE (`cus_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `eatrebs`.`driver`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eatrebs`.`driver` (
  `del_id` INT(11) NOT NULL AUTO_INCREMENT,
  `earnings` DECIMAL(13,2) NULL DEFAULT NULL,
  `email` VARCHAR(255) NULL DEFAULT NULL,
  `name` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`del_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `eatrebs`.`restaurant`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eatrebs`.`restaurant` (
  `rest_id` INT(11) NOT NULL AUTO_INCREMENT,
  `earnings` DECIMAL(13,2) NULL DEFAULT NULL,
  `email` VARCHAR(255) NULL DEFAULT NULL,
  `rest_name` VARCHAR(255) NULL DEFAULT NULL,
  `address` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`rest_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `eatrebs`.`items`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eatrebs`.`items` (
  `item_id` INT(11) NOT NULL AUTO_INCREMENT,
  `rest_id` INT(11) NULL DEFAULT NULL,
  `cost` DECIMAL(13,2) NULL DEFAULT NULL,
  `prod_cost` DECIMAL(13,2) NULL DEFAULT NULL,
  `name` VARCHAR(255) NULL DEFAULT NULL,
  `description` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  INDEX `rest_id` (`rest_id` ASC) VISIBLE,
  CONSTRAINT `items_ibfk_1`
    FOREIGN KEY (`rest_id`)
    REFERENCES `eatrebs`.`restaurant` (`rest_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `eatrebs`.`orders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eatrebs`.`orders` (
  `ord_id` INT(11) NOT NULL AUTO_INCREMENT,
  `cus_id` INT(11) NULL DEFAULT NULL,
  `del_id` INT(11) NULL DEFAULT NULL,
  `rest_id` INT(11) NULL DEFAULT NULL,
  `cost` DECIMAL(13,2) NULL DEFAULT NULL,
  `address` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`ord_id`),
  INDEX `cus_id` (`cus_id` ASC) VISIBLE,
  INDEX `del_id` (`del_id` ASC) VISIBLE,
  INDEX `rest_id` (`rest_id` ASC) VISIBLE,
  CONSTRAINT `orders_ibfk_1`
    FOREIGN KEY (`cus_id`)
    REFERENCES `eatrebs`.`customer` (`cus_id`),
  CONSTRAINT `orders_ibfk_2`
    FOREIGN KEY (`del_id`)
    REFERENCES `eatrebs`.`driver` (`del_id`),
  CONSTRAINT `orders_ibfk_3`
    FOREIGN KEY (`rest_id`)
    REFERENCES `eatrebs`.`restaurant` (`rest_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `eatrebs`.`ordered_items`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eatrebs`.`ordered_items` (
  `oi_id` INT(11) NOT NULL AUTO_INCREMENT,
  `ord_id` INT(11) NULL DEFAULT NULL,
  `item_id` INT(11) NULL DEFAULT NULL,
  `instructions` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`oi_id`),
  INDEX `ord_id` (`ord_id` ASC) VISIBLE,
  INDEX `item_id` (`item_id` ASC) VISIBLE,
  CONSTRAINT `ordered_items_ibfk_1`
    FOREIGN KEY (`ord_id`)
    REFERENCES `eatrebs`.`orders` (`ord_id`),
  CONSTRAINT `ordered_items_ibfk_2`
    FOREIGN KEY (`item_id`)
    REFERENCES `eatrebs`.`items` (`item_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
