SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`usuarios`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`usuarios` (
  `idUsuario` INT NOT NULL ,
  `nombre` VARCHAR(45) NULL ,
  `apellido` VARCHAR(45) NULL ,
  `usuario` VARCHAR(45) NULL ,
  `password` VARCHAR(45) NULL ,
  `tipo_usuario` VARCHAR(45) NULL ,
  `fecha` DATE NOT NULL ,
  `hora` TIME NOT NULL ,
  `status` TINYINT NOT NULL ,
  PRIMARY KEY (`idUsuario`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`clientes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`clientes` (
  `idCliente` INT NOT NULL ,
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
  `status` TINYINT NOT NULL ,
  PRIMARY KEY (`idCliente`) ,
  INDEX `fk_clientes_usuarios` (`idUsuario` ASC) ,
  CONSTRAINT `fk_clientes_usuarios`
    FOREIGN KEY (`idUsuario` )
    REFERENCES `mydb`.`usuarios` (`idUsuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
