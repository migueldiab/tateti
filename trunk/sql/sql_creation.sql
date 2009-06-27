SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';


-- -----------------------------------------------------
-- Table `usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `usuario` ;

CREATE  TABLE IF NOT EXISTS `usuario` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `apellido` VARCHAR(45) NULL ,
  `email` VARCHAR(45) NULL ,
  `usuario` VARCHAR(45) NULL ,
  `clave` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mesa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mesa` ;

CREATE  TABLE IF NOT EXISTS `mesa` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `creada` TIMESTAMP NULL ,
  `estado` VARCHAR(11) NULL ,
  `id_ganador` INT NULL ,
  `id_jugador_1` INT NULL ,
  `id_jugador_2` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_mesa_usuario` (`id_ganador` ASC) ,
  INDEX `fk_mesa_usuario1` (`id_jugador_1` ASC) ,
  INDEX `fk_mesa_usuario2` (`id_jugador_2` ASC) ,
  CONSTRAINT `fk_mesa_usuario`
    FOREIGN KEY (`id_ganador` )
    REFERENCES `tateti`.`usuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_mesa_usuario1`
    FOREIGN KEY (`id_jugador_1` )
    REFERENCES `tateti`.`usuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_mesa_usuario2`
    FOREIGN KEY (`id_jugador_2` )
    REFERENCES `tateti`.`usuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jugada`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `jugada` ;

CREATE  TABLE IF NOT EXISTS `jugada` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `hora` TIMESTAMP NULL ,
  `id_campo` INT NULL ,
  `es_cruz` BOOLEAN NULL ,
  `id_jugador` INT NULL ,
  `id_mesa` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_jugada_usuario` (`id_jugador` ASC) ,
  INDEX `fk_jugada_mesa` (`id_mesa` ASC) ,
  CONSTRAINT `fk_jugada_usuario`
    FOREIGN KEY (`id_jugador` )
    REFERENCES `tateti`.`usuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_jugada_mesa`
    FOREIGN KEY (`id_mesa` )
    REFERENCES `tateti`.`mesa` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
