-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
DROP DATABASE IF EXISTS `sistemaweb`;
CREATE SCHEMA IF NOT EXISTS `sistemaweb` DEFAULT CHARACTER SET utf8 ;
USE `sistemaweb` ; 

-- -----------------------------------------------------
-- Table `mydb`.`Alumno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistemaweb`.`Alumno` (
  `idAlum` INT NOT NULL auto_increment,
  `Nombre` VARCHAR(45) NOT NULL,
  `Apellido` VARCHAR(45) NOT NULL,
  `Correo` VARCHAR(45) NOT NULL,
  `Contra` VARCHAR(75) NOT NULL,
  `FechaNa` DATE NOT NULL,
  `Genero` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idAlum`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Encuesta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistemaweb`.`Encuesta` (
  `idEnc` INT NOT NULL,
  `Pregunta` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idEnc`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Asignar`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistemaweb`.`Asignar` (
  `idAsig` INT auto_increment,
  `FechaEn` DATE NOT NULL,
  `idAlum` INT NOT NULL,
  `idEnc` INT NULL,
  PRIMARY KEY (`idAsig`),
    FOREIGN KEY (`idEnc`)
    REFERENCES `sistemaweb`.`Encuesta` (`idEnc`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
    FOREIGN KEY (`idAlum`)
    REFERENCES `sistemaweb`.`Alumno` (`idAlum`)
    ON DELETE SET NULL
    ON UPDATE ON CASCADE)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Coordinador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistemaweb`.`Coordinador` (
  `idCoor` INT auto_increment,
  `Nom` VARCHAR(45) NOT NULL,
  `Ape` VARCHAR(45) NOT NULL,
  `Cor` VARCHAR(45) NOT NULL,
  `Password` VARCHAR(45) NOT NULL,
  `Fecha` DATE NOT NULL,
  `Sexo` VARCHAR(45) NOT NULL,
  `Estatus` INT NULL,
  PRIMARY KEY (`idCoor`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Receta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistemaweb`.`Receta` (
  `idRec` INT auto_increment,
  `Titulo` VARCHAR(45) NOT NULL,
  `Contenido` TEXT NOT NULL,
  `Multimedia` TEXT NULL,
  `FechaPub` DATETIME NOT NULL,
  `Estatus` INT NOT NULL,
  `idAlum` INT NOT NULL,
  PRIMARY KEY (`idRec`),
    FOREIGN KEY (`idAlum`)
    REFERENCES `sistemaweb`.`Alumno` (`idAlum`)
    ON DELETE SET NULL
    ON UPDATE ON CASCADE)
ENGINE = InnoDB; 	

-- -----------------------------------------------------
-- Table `mydb`.`Respuesta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistemaweb`.`Respuesta` (
  `idRes` INT auto_increment,
  `Resultado` VARCHAR(45) NOT NULL,
  `Grado` VARCHAR(45) NOT NULL,
  `idAsig` INT NULL,
  PRIMARY KEY (`idRes`),
    FOREIGN KEY (`idAsig`)
    REFERENCES `sistemaweb`.`Asignar` (`idAsig`)
    ON DELETE SET NULL
    ON UPDATE ON CASCADE)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Comentario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistemaweb`.`Comentario` (
  `idCom` INT auto_increment,
  `Comentario` TEXT NULL,
  `Calificacion` INT NULL,
  `idRec` INT NOT NULL,
  PRIMARY KEY (`idCom`),
    FOREIGN KEY (`idRec`)
    REFERENCES `sistemaweb`.`Receta` (`idRec`)
    ON DELETE SET NULL
    ON UPDATE ON CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
