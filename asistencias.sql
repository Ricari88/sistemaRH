-- MySQL Script generated by MySQL Workbench
-- Mon Mar 28 08:27:32 2022
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema asistencias
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema asistencias
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `asistencias` DEFAULT CHARACTER SET utf8 ;
USE `asistencias` ;

-- -----------------------------------------------------
-- Table `asistencias`.`empleado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asistencias`.`empleado` (
  `idempleado` INT NOT NULL,
  `no_tarjeta` INT NOT NULL,
  `rpe` VARCHAR(5) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido` VARCHAR(45) NULL,
  PRIMARY KEY (`idempleado`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `asistencias`.`asistencia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asistencias`.`asistencia` (
  `Tiempo` DATETIME NOT NULL,
  `empleado_idempleado` INT NOT NULL,
  `Nombre` VARCHAR(45) NULL,
  `Número de tarjeta` INT NULL,
  `Dispositivo` VARCHAR(45) NULL,
  `Punto del evento` VARCHAR(45) NULL,
  `Verificacion` VARCHAR(45) NULL,
  `Estado` VARCHAR(45) NULL,
  `Evento` VARCHAR(45) NULL,
  PRIMARY KEY (`empleado_idempleado`),
  CONSTRAINT `fk_asistencia_empleado`
    FOREIGN KEY (`empleado_idempleado`)
    REFERENCES `asistencias`.`empleado` (`idempleado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
