-- MySQL Workbench Synchronization
-- Generated: 2016-03-27 06:54
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: Valeck

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

ALTER TABLE `capacitacion`.`preguntas` 
DROP FOREIGN KEY `fk_preguntas_curso`;

ALTER TABLE `capacitacion`.`respuestas` 
DROP FOREIGN KEY `fk_respuestas_preguntas1`,
DROP FOREIGN KEY `fk_respuestas_tipo_pregunta1`;

ALTER TABLE `capacitacion`.`key` 
DROP FOREIGN KEY `fk_key_preguntas1`,
DROP FOREIGN KEY `fk_key_respuestas1`;

ALTER TABLE `capacitacion`.`preguntas` 
DROP COLUMN `id_curso`,
ADD COLUMN `id_curso` INT(11) NOT NULL AFTER `id_pregunta`,
ADD INDEX `fk_preguntas_curso_idx` (`id_curso` ASC),
DROP INDEX `fk_preguntas_curso_idx` ;

ALTER TABLE `capacitacion`.`respuestas` 
DROP COLUMN `id_tipo_pregunta`,
DROP COLUMN `id_pregunta`,
ADD COLUMN `id_pregunta` INT(11) NOT NULL AFTER `id_respuesta`,
ADD COLUMN `id_tipo_pregunta` INT(11) NOT NULL AFTER `id_pregunta`,
ADD INDEX `fk_respuestas_preguntas1_idx` (`id_pregunta` ASC),
ADD INDEX `fk_respuestas_tipo_pregunta1_idx` (`id_tipo_pregunta` ASC),
DROP INDEX `fk_respuestas_tipo_pregunta1_idx` ,
DROP INDEX `fk_respuestas_preguntas1_idx` ;

ALTER TABLE `capacitacion`.`key` 
DROP COLUMN `id_respuesta`,
DROP COLUMN `id_pregunta`,
ADD COLUMN `id_pregunta` INT(11) NOT NULL AFTER `id_key`,
ADD COLUMN `id_respuesta` INT(11) NOT NULL AFTER `id_pregunta`,
ADD INDEX `fk_key_preguntas1_idx` (`id_pregunta` ASC),
ADD INDEX `fk_key_respuestas1_idx` (`id_respuesta` ASC),
DROP INDEX `fk_key_respuestas1_idx` ,
DROP INDEX `fk_key_preguntas1_idx` ;

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

DROP TABLE IF EXISTS `capacitacion`.`usuario_curso` ;

ALTER TABLE `capacitacion`.`preguntas` 
ADD CONSTRAINT `fk_preguntas_curso`
  FOREIGN KEY (`id_curso`)
  REFERENCES `capacitacion`.`curso` (`id_curso`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `capacitacion`.`respuestas` 
ADD CONSTRAINT `fk_respuestas_preguntas1`
  FOREIGN KEY (`id_pregunta`)
  REFERENCES `capacitacion`.`preguntas` (`id_pregunta`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_respuestas_tipo_pregunta1`
  FOREIGN KEY (`id_tipo_pregunta`)
  REFERENCES `capacitacion`.`tipo_pregunta` (`id_tipo_pregunta`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `capacitacion`.`key` 
ADD CONSTRAINT `fk_key_preguntas1`
  FOREIGN KEY (`id_pregunta`)
  REFERENCES `capacitacion`.`preguntas` (`id_pregunta`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_key_respuestas1`
  FOREIGN KEY (`id_respuesta`)
  REFERENCES `capacitacion`.`respuestas` (`id_respuesta`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
