-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema gig_hunter
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema gig_hunter
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `gig_hunter` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `gig_hunter` ;

-- -----------------------------------------------------
-- Table `gig_hunter`.`enderecos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gig_hunter`.`enderecos` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `cep` VARCHAR(45) NOT NULL COMMENT '',
  `rua` VARCHAR(45) NOT NULL COMMENT '',
  `bairro` VARCHAR(45) NOT NULL COMMENT '',
  `cidade` VARCHAR(45) NOT NULL COMMENT '',
  `estado` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gig_hunter`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gig_hunter`.`usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nome` VARCHAR(45) NOT NULL COMMENT '',
  `email` VARCHAR(45) NOT NULL COMMENT '',
  `username` VARCHAR(45) NOT NULL COMMENT '',
  `senha` VARCHAR(45) NOT NULL COMMENT '',
  `data_nascimento` DATE NOT NULL COMMENT '',
  `telefone` VARCHAR(45) NOT NULL COMMENT '',
  `rg` VARCHAR(45) NOT NULL COMMENT '',
  `cpf` VARCHAR(45) NOT NULL COMMENT '',
  `status` VARCHAR(45) NOT NULL COMMENT '',
  `tempo_bloqueada` DATETIME NULL COMMENT '',
  `tipo` VARCHAR(45) NOT NULL COMMENT '',
  `instituicao` VARCHAR(45) NULL COMMENT '',
  `matricula` VARCHAR(45) NULL COMMENT '',
  `lattes` VARCHAR(45) NULL COMMENT '',
  `linkedin` VARCHAR(45) NULL COMMENT '',
  `endereco_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_usuario_endereco2_idx` (`endereco_id` ASC)  COMMENT '',
  CONSTRAINT `fk_usuario_endereco2`
    FOREIGN KEY (`endereco_id`)
    REFERENCES `gig_hunter`.`enderecos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gig_hunter`.`empresarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gig_hunter`.`empresarios` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nome` VARCHAR(45) NOT NULL COMMENT '',
  `email` VARCHAR(45) NOT NULL COMMENT '',
  `username` VARCHAR(45) NOT NULL COMMENT '',
  `senha` VARCHAR(45) NOT NULL COMMENT '',
  `data_nascimento` DATE NOT NULL COMMENT '',
  `telefone` VARCHAR(45) NOT NULL COMMENT '',
  `rg` VARCHAR(45) NOT NULL COMMENT '',
  `cpf` VARCHAR(45) NOT NULL COMMENT '',
  `status` VARCHAR(45) NOT NULL COMMENT '',
  `endereco_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_empresarios_endereco1_idx` (`endereco_id` ASC)  COMMENT '',
  CONSTRAINT `fk_empresarios_endereco1`
    FOREIGN KEY (`endereco_id`)
    REFERENCES `gig_hunter`.`enderecos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gig_hunter`.`empresas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gig_hunter`.`empresas` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nome` VARCHAR(45) NOT NULL COMMENT '',
  `razao_social` VARCHAR(45) NOT NULL COMMENT '',
  `email` VARCHAR(45) NOT NULL COMMENT '',
  `telefone` VARCHAR(45) NOT NULL COMMENT '',
  `cnpj` VARCHAR(45) NOT NULL COMMENT '',
  `endereco_id` INT NOT NULL COMMENT '',
  `empresario_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_empresa_empresario1_idx` (`empresario_id` ASC)  COMMENT '',
  INDEX `fk_empresa_endereco2_idx` (`endereco_id` ASC)  COMMENT '',
  CONSTRAINT `fk_empresa_empresario1`
    FOREIGN KEY (`empresario_id`)
    REFERENCES `gig_hunter`.`empresarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresa_endereco2`
    FOREIGN KEY (`endereco_id`)
    REFERENCES `gig_hunter`.`enderecos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gig_hunter`.`avaliacoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gig_hunter`.`avaliacoes` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nota` INT NOT NULL COMMENT '',
  `comentario` VARCHAR(450) NOT NULL COMMENT '',
  `status` VARCHAR(45) NOT NULL COMMENT '',
  `usuario_id` INT NOT NULL COMMENT '',
  `empresa_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_avaliacao_usuario2_idx` (`usuario_id` ASC)  COMMENT '',
  INDEX `fk_avaliacao_empresa2_idx` (`empresa_id` ASC)  COMMENT '',
  CONSTRAINT `fk_avaliacao_usuario2`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `gig_hunter`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_avaliacao_empresa2`
    FOREIGN KEY (`empresa_id`)
    REFERENCES `gig_hunter`.`empresas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gig_hunter`.`vagas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gig_hunter`.`vagas` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `descricao` VARCHAR(45) NOT NULL COMMENT '',
  `cargo` VARCHAR(45) NOT NULL COMMENT '',
  `usuario_alvo` VARCHAR(45) NOT NULL COMMENT '',
  `status` VARCHAR(45) NOT NULL COMMENT '',
  `empresa_id` INT NOT NULL COMMENT '',
  `usuario_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_vaga_empresa2_idx` (`empresa_id` ASC)  COMMENT '',
  INDEX `fk_vaga_usuario1_idx` (`usuario_id` ASC)  COMMENT '',
  CONSTRAINT `fk_vaga_empresa2`
    FOREIGN KEY (`empresa_id`)
    REFERENCES `gig_hunter`.`empresas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_vaga_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `gig_hunter`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gig_hunter`.`requisitos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gig_hunter`.`requisitos` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nome` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gig_hunter`.`usuario_requisitos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gig_hunter`.`usuario_requisitos` (
  `usuario_id` INT NOT NULL COMMENT '',
  `requisito_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`usuario_id`, `requisito_id`)  COMMENT '',
  INDEX `fk_usuario_has_requisito_requisito1_idx` (`requisito_id` ASC)  COMMENT '',
  INDEX `fk_usuario_has_requisito_usuario1_idx` (`usuario_id` ASC)  COMMENT '',
  CONSTRAINT `fk_usuario_has_requisito_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `gig_hunter`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_has_requisito_requisito1`
    FOREIGN KEY (`requisito_id`)
    REFERENCES `gig_hunter`.`requisitos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gig_hunter`.`vaga_requisitos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gig_hunter`.`vaga_requisitos` (
  `vaga_id` INT NOT NULL COMMENT '',
  `requisito_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`vaga_id`, `requisito_id`)  COMMENT '',
  INDEX `fk_vaga_has_requisito_requisito1_idx` (`requisito_id` ASC)  COMMENT '',
  INDEX `fk_vaga_has_requisito_vaga1_idx` (`vaga_id` ASC)  COMMENT '',
  CONSTRAINT `fk_vaga_has_requisito_vaga1`
    FOREIGN KEY (`vaga_id`)
    REFERENCES `gig_hunter`.`vagas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_vaga_has_requisito_requisito1`
    FOREIGN KEY (`requisito_id`)
    REFERENCES `gig_hunter`.`requisitos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gig_hunter`.`arquivos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gig_hunter`.`arquivos` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nome` VARCHAR(45) NOT NULL COMMENT '',
  `caminho` VARCHAR(45) NOT NULL COMMENT '',
  `tipo` VARCHAR(45) NOT NULL COMMENT '',
  `extensao` VARCHAR(45) NOT NULL COMMENT '',
  `usuario_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_arquivo_usuario1_idx` (`usuario_id` ASC)  COMMENT '',
  CONSTRAINT `fk_arquivo_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `gig_hunter`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gig_hunter`.`oferecidas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gig_hunter`.`oferecidas` (
  `vaga_id` INT NOT NULL COMMENT '',
  `usuario_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`vaga_id`, `usuario_id`)  COMMENT '',
  INDEX `fk_vaga_has_usuario1_usuario1_idx` (`usuario_id` ASC)  COMMENT '',
  INDEX `fk_vaga_has_usuario1_vaga1_idx` (`vaga_id` ASC)  COMMENT '',
  CONSTRAINT `fk_vaga_has_usuario1_vaga1`
    FOREIGN KEY (`vaga_id`)
    REFERENCES `gig_hunter`.`vagas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_vaga_has_usuario1_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `gig_hunter`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gig_hunter`.`candidatos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gig_hunter`.`candidatos` (
  `vaga_id` INT NOT NULL COMMENT '',
  `usuario_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`vaga_id`, `usuario_id`)  COMMENT '',
  INDEX `fk_vaga_has_usuario2_usuario1_idx` (`usuario_id` ASC)  COMMENT '',
  INDEX `fk_vaga_has_usuario2_vaga1_idx` (`vaga_id` ASC)  COMMENT '',
  CONSTRAINT `fk_vaga_has_usuario2_vaga1`
    FOREIGN KEY (`vaga_id`)
    REFERENCES `gig_hunter`.`vagas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_vaga_has_usuario2_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `gig_hunter`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
