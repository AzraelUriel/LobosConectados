SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `Lobos_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `Lobos_db`;

-- -----------------------------------------------------
-- Table `Lobos_db`.`Users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Lobos_db`.`Users` (
  `matricula` VARCHAR(10) NOT NULL ,
  `name` VARCHAR(20) NULL ,
  `lastname` VARCHAR(20) NULL ,
  `password` VARCHAR(45) NULL ,
  `email` VARCHAR(45) NULL ,
  `career` VARCHAR(3) NULL ,
  `grade` INT NULL ,
  `group` CHAR NULL ,
  PRIMARY KEY (`matricula`) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
