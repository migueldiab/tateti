SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';


-- -----------------------------------------------------
-- Table `usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `usuario` ;

CREATE  TABLE IF NOT EXISTS `usuario` (
  `id` INT NOT NULL ,
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
  `id` INT NOT NULL ,
  `creada` TIMESTAMP NULL ,
  `estado` VARCHAR(1) NULL ,
  `id_ganador` INT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_mesa_usuario`
    FOREIGN KEY (`id_ganador` )
    REFERENCES `tateti`.`usuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_mesa_usuario` ON `mesa` (`id_ganador` ASC) ;


-- -----------------------------------------------------
-- Table `jugada`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `jugada` ;

CREATE  TABLE IF NOT EXISTS `jugada` (
  `id` INT NOT NULL ,
  `hora` TIMESTAMP NULL ,
  `fila` INT NULL ,
  `columna` INT NULL ,
  `seguridad` VARCHAR(45) NULL ,
  `es_cruz` BOOLEAN NULL ,
  `id_jugador` INT NULL ,
  `id_mesa` INT NULL ,
  PRIMARY KEY (`id`) ,
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

CREATE INDEX `fk_jugada_usuario` ON `jugada` (`id_jugador` ASC) ;

CREATE INDEX `fk_jugada_mesa` ON `jugada` (`id_mesa` ASC) ;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
