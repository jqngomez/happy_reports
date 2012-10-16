SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `reports` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `reports` ;

-- -----------------------------------------------------
-- Table `reports`.`usuarios`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `reports`.`usuarios` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `apellido` VARCHAR(45) NULL ,
  `usuario` VARCHAR(45) NULL ,
  `password` VARCHAR(45) NULL ,
  `tipo_usuario` VARCHAR(45) NULL ,
  `fecha` DATE NOT NULL ,
  `hora` TIME NOT NULL ,
  `status` TINYINT NOT NULL DEFAULT 1 ,
  PRIMARY KEY (`idUsuario`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `reports`.`clientes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `reports`.`clientes` (
  `idCliente` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(60) NOT NULL ,
  `giro` VARCHAR(50) NOT NULL ,
  `inicio` DATE NOT NULL ,
  `productos` VARCHAR(60) NOT NULL ,
  `mercado_potencial` VARCHAR(50) NULL ,
  `horario` VARCHAR(30) NOT NULL ,
  `telefono` VARCHAR(30) NOT NULL ,
  `direccion` VARCHAR(60) NULL ,
  `correo` VARCHAR(50) NULL ,
  `sitio_web` VARCHAR(60) NULL ,
  `usuario` VARCHAR(20) NOT NULL ,
  `password` VARCHAR(20) NOT NULL ,
  `nombre_encargado` VARCHAR(50) NOT NULL ,
  `apellido_encargado` VARCHAR(50) NOT NULL ,
  `correo_encargado` VARCHAR(50) NULL ,
  `telefono_encargado` VARCHAR(50) NULL ,
  `extencion_encargado` VARCHAR(50) NULL ,
  `skype_encargado` VARCHAR(50) NULL ,
  `idUsuario` INT NOT NULL ,
  `fecha` DATE NOT NULL ,
  `hora` TIME NOT NULL ,
  `status` TINYINT NOT NULL DEFAULT 1 ,
  PRIMARY KEY (`idCliente`) ,
  INDEX `fk_clientes_usuarios` (`idUsuario` ASC) ,
  CONSTRAINT `fk_clientes_usuarios`
    FOREIGN KEY (`idUsuario` )
    REFERENCES `reports`.`usuarios` (`idUsuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `reports`.`cuentas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `reports`.`cuentas` (
  `idCuenta` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(60) NOT NULL ,
  `usuario` VARCHAR(30) NOT NULL ,
  `password` VARCHAR(30) NOT NULL ,
  `idCliente` INT NOT NULL ,
  `fecha` DATE NOT NULL ,
  `hora` TIME NOT NULL ,
  `status` TINYINT NOT NULL DEFAULT 1 ,
  PRIMARY KEY (`idCuenta`) ,
  INDEX `fk_cuentas_clientes1` (`idCliente` ASC) ,
  CONSTRAINT `fk_cuentas_clientes1`
    FOREIGN KEY (`idCliente` )
    REFERENCES `reports`.`clientes` (`idCliente` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `reports`.`redes_sociales`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `reports`.`redes_sociales` (
  `idRed` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  `fecha` DATE NOT NULL ,
  `hora` TIME NOT NULL ,
  `status` TINYINT NOT NULL DEFAULT 1 ,
  PRIMARY KEY (`idRed`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `reports`.`cuentas_redes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `reports`.`cuentas_redes` (
  `idCuenta` INT NOT NULL ,
  `idRed` INT NOT NULL ,
  PRIMARY KEY (`idCuenta`, `idRed`) ,
  INDEX `fk_cuentas_has_redes_sociales_redes_sociales1` (`idRed` ASC) ,
  INDEX `fk_cuentas_has_redes_sociales_cuentas1` (`idCuenta` ASC) ,
  CONSTRAINT `fk_cuentas_has_redes_sociales_cuentas1`
    FOREIGN KEY (`idCuenta` )
    REFERENCES `reports`.`cuentas` (`idCuenta` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cuentas_has_redes_sociales_redes_sociales1`
    FOREIGN KEY (`idRed` )
    REFERENCES `reports`.`redes_sociales` (`idRed` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
