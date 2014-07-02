SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema tasklist
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `tasklist` ;
CREATE SCHEMA IF NOT EXISTS `tasklist` DEFAULT CHARACTER SET latin1 ;
USE `tasklist` ;

-- -----------------------------------------------------
-- Table `tasklist`.`tasks`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tasklist`.`tasks` ;

CREATE TABLE IF NOT EXISTS `tasklist`.`tasks` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `content` VARCHAR(500) NOT NULL,
  `status` TINYINT(4) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 21
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
