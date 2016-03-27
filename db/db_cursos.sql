-- MySQL Workbench Synchronization
-- Generated: 2016-03-27 11:38
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: Valeck

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `capacitacion` DEFAULT CHARACTER SET utf8 ;

CREATE TABLE IF NOT EXISTS `capacitacion`.`curso` (
  `id_curso` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(150) NULL DEFAULT NULL,
  `descripcion` VARCHAR(200) NULL DEFAULT NULL,
  `creado` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id_curso`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `capacitacion`.`preguntas` (
  `id_pregunta` INT(11) NOT NULL AUTO_INCREMENT,
  `id_curso` INT(11) NOT NULL,
  `pregunta` VARCHAR(45) NULL DEFAULT NULL,
  `imagen` VARCHAR(45) NULL DEFAULT NULL,
  `video` VARCHAR(45) NULL DEFAULT NULL,
  `creado` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id_pregunta`),
  INDEX `fk_preguntas_curso_idx` (`id_curso` ASC),
  CONSTRAINT `fk_preguntas_curso`
    FOREIGN KEY (`id_curso`)
    REFERENCES `capacitacion`.`curso` (`id_curso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `capacitacion`.`respuestas` (
  `id_respuesta` INT(11) NOT NULL AUTO_INCREMENT,
  `id_pregunta` INT(11) NOT NULL,
  `id_tipo_pregunta` INT(11) NOT NULL,
  `respuesta` VARCHAR(255) NULL DEFAULT NULL,
  `imagen` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id_respuesta`),
  INDEX `fk_respuestas_preguntas1_idx` (`id_pregunta` ASC),
  INDEX `fk_respuestas_tipo_pregunta1_idx` (`id_tipo_pregunta` ASC),
  CONSTRAINT `fk_respuestas_preguntas1`
    FOREIGN KEY (`id_pregunta`)
    REFERENCES `capacitacion`.`preguntas` (`id_pregunta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_respuestas_tipo_pregunta1`
    FOREIGN KEY (`id_tipo_pregunta`)
    REFERENCES `capacitacion`.`tipo_pregunta` (`id_tipo_pregunta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `capacitacion`.`tipo_pregunta` (
  `id_tipo_pregunta` INT(11) NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(10) NULL DEFAULT NULL,
  `status` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id_tipo_pregunta`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `capacitacion`.`key` (
  `id_key` INT(11) NOT NULL AUTO_INCREMENT,
  `id_pregunta` INT(11) NOT NULL,
  `id_respuesta` INT(11) NOT NULL,
  `resultado` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id_key`),
  INDEX `fk_key_preguntas1_idx` (`id_pregunta` ASC),
  INDEX `fk_key_respuestas1_idx` (`id_respuesta` ASC),
  CONSTRAINT `fk_key_preguntas1`
    FOREIGN KEY (`id_pregunta`)
    REFERENCES `capacitacion`.`preguntas` (`id_pregunta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_key_respuestas1`
    FOREIGN KEY (`id_respuesta`)
    REFERENCES `capacitacion`.`respuestas` (`id_respuesta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `capacitacion`.`usuarios` (
  `id_usuario` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL DEFAULT NULL,
  `apellidos` VARCHAR(45) NULL DEFAULT NULL,
  `usuario` VARCHAR(45) NULL DEFAULT NULL,
  `password` VARCHAR(255) NULL DEFAULT NULL,
  `creado` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(1) NULL DEFAULT NULL,
  `email` VARCHAR(150) NULL DEFAULT NULL,
  `telefono` VARCHAR(15) NULL DEFAULT NULL,
  PRIMARY KEY (`id_usuario`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `capacitacion`.`usuario_curso` (
  `id_usuario` INT(11) NOT NULL,
  `id_curso` INT(11) NOT NULL,
  PRIMARY KEY (`id_usuario`, `id_curso`),
  INDEX `fk_usuarios_curso1_idx` (`id_curso` ASC),
  INDEX `fk_usuarios1_curso_idx` USING BTREE (`id_usuario` ASC),
  CONSTRAINT `fk_usuarios1_curso`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `capacitacion`.`usuarios` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarios_curso1`
    FOREIGN KEY (`id_curso`)
    REFERENCES `capacitacion`.`curso` (`id_curso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `capacitacion`.`resultados` (
  `id_resultado` INT(11) NOT NULL AUTO_INCREMENT,
  `id_curso` INT(11) NOT NULL,
  `id_usuario` INT(11) NOT NULL,
  `total_positivo` INT(11) NULL DEFAULT NULL,
  `total_negativo` INT(11) NULL DEFAULT NULL,
  `resultado_final` INT(11) NULL DEFAULT NULL,
  `status` ENUM('A', 'R') NULL DEFAULT NULL,
  PRIMARY KEY (`id_resultado`),
  INDEX `fk_resultados_curso1_idx` (`id_curso` ASC),
  INDEX `fk_resultados_usuarios1_idx` (`id_usuario` ASC),
  CONSTRAINT `fk_resultados_curso1`
    FOREIGN KEY (`id_curso`)
    REFERENCES `capacitacion`.`curso` (`id_curso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_resultados_usuarios1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `capacitacion`.`usuarios` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
