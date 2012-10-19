SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `reports` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `reports` ;

-- -----------------------------------------------------
-- Table `reports`.`tipo_usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `reports`.`tipo_usuario` ;

CREATE  TABLE IF NOT EXISTS `reports`.`tipo_usuario` (
  `idTipo` INT NOT NULL ,
  `tipo` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idTipo`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `reports`.`usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `reports`.`usuarios` ;

CREATE  TABLE IF NOT EXISTS `reports`.`usuarios` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `apellido` VARCHAR(45) NULL ,
  `usuario` VARCHAR(45) NULL ,
  `password` VARCHAR(45) NULL ,
  `tipo_usuario` INT NOT NULL ,
  `fecha` DATE NOT NULL ,
  `hora` TIME NOT NULL ,
  `status` TINYINT NOT NULL DEFAULT 1 ,
  PRIMARY KEY (`idUsuario`) ,
  INDEX `fk_usuarios_tipo_usuario1` (`tipo_usuario` ASC) ,
  CONSTRAINT `fk_usuarios_tipo_usuario1`
    FOREIGN KEY (`tipo_usuario` )
    REFERENCES `reports`.`tipo_usuario` (`idTipo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `reports`.`clientes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `reports`.`clientes` ;

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
-- Table `reports`.`redes_sociales`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `reports`.`redes_sociales` ;

CREATE  TABLE IF NOT EXISTS `reports`.`redes_sociales` (
  `idRed` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  `fecha` DATE NOT NULL ,
  `hora` TIME NOT NULL ,
  `status` TINYINT NOT NULL DEFAULT 1 ,
  PRIMARY KEY (`idRed`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `reports`.`cuentas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `reports`.`cuentas` ;

CREATE  TABLE IF NOT EXISTS `reports`.`cuentas` (
  `idCuenta` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(60) NOT NULL ,
  `usuario` VARCHAR(30) NOT NULL ,
  `password` VARCHAR(30) NOT NULL ,
  `idCliente` INT NOT NULL ,
  `idRed` INT NOT NULL ,
  `fecha` DATE NOT NULL ,
  `hora` TIME NOT NULL ,
  `status` TINYINT NOT NULL DEFAULT 1 ,
  PRIMARY KEY (`idCuenta`) ,
  INDEX `fk_cuentas_clientes1` (`idCliente` ASC) ,
  INDEX `fk_cuentas_redes_sociales1` (`idRed` ASC) ,
  CONSTRAINT `fk_cuentas_clientes1`
    FOREIGN KEY (`idCliente` )
    REFERENCES `reports`.`clientes` (`idCliente` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cuentas_redes_sociales1`
    FOREIGN KEY (`idRed` )
    REFERENCES `reports`.`redes_sociales` (`idRed` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `reports`.`reporte_diario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `reports`.`reporte_diario` ;

CREATE  TABLE IF NOT EXISTS `reports`.`reporte_diario` (
  `idReporteDiario` INT NOT NULL AUTO_INCREMENT ,
  `num_likes` INT NOT NULL ,
  `num_followers` INT NOT NULL ,
  `idCuenta` INT NOT NULL ,
  `fecha` DATE NOT NULL ,
  `status` TINYINT NOT NULL ,
  PRIMARY KEY (`idReporteDiario`) ,
  INDEX `fk_reporte_diario_cuentas1` (`idCuenta` ASC) ,
  CONSTRAINT `fk_reporte_diario_cuentas1`
    FOREIGN KEY (`idCuenta` )
    REFERENCES `reports`.`cuentas` (`idCuenta` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `reports`.`comentarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `reports`.`comentarios` ;

CREATE  TABLE IF NOT EXISTS `reports`.`comentarios` (
  `idComentario` INT NOT NULL AUTO_INCREMENT ,
  `comentario` TEXT NOT NULL ,
  `fecha_captura` DATE NOT NULL ,
  `hora_captura` TIME NOT NULL ,
  `num_comentarios` INT NOT NULL ,
  `num_visitos` INT NOT NULL ,
  `num_likes` INT NOT NULL ,
  `num_favoritos` INT NOT NULL ,
  `num_compartidos` INT NOT NULL ,
  `num_retweets` INT NOT NULL ,
  `idReporteDiario` INT NOT NULL ,
  `fecha` DATE NOT NULL ,
  `hora` TIME NOT NULL ,
  `status` TINYINT NOT NULL ,
  PRIMARY KEY (`idComentario`) ,
  INDEX `fk_comentarios_reporte_diario1` (`idReporteDiario` ASC) ,
  CONSTRAINT `fk_comentarios_reporte_diario1`
    FOREIGN KEY (`idReporteDiario` )
    REFERENCES `reports`.`reporte_diario` (`idReporteDiario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `reports`.`mensajes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `reports`.`mensajes` ;

CREATE  TABLE IF NOT EXISTS `reports`.`mensajes` (
  `idMensaje` INT NOT NULL AUTO_INCREMENT ,
  `remitente` VARCHAR(45) NOT NULL ,
  `mensaje` VARCHAR(45) NOT NULL ,
  `fecha_recibido` VARCHAR(45) NOT NULL ,
  `hora_recibido` VARCHAR(45) NOT NULL ,
  `idReporteDiario` INT NOT NULL ,
  `fecha` VARCHAR(45) NOT NULL ,
  `hora` VARCHAR(45) NOT NULL ,
  `status` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idMensaje`) ,
  INDEX `fk_mensajes_reporte_diario1` (`idReporteDiario` ASC) ,
  CONSTRAINT `fk_mensajes_reporte_diario1`
    FOREIGN KEY (`idReporteDiario` )
    REFERENCES `reports`.`reporte_diario` (`idReporteDiario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
