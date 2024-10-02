DROP DATABASE db_cliente;
CREATE DATABASE IF NOT EXISTS `db_cliente` DEFAULT CHARACTER SET utf8 ;
USE `db_cliente` ;

-- -----------------------------------------------------
-- Table `db_cliente`.`USUARIO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_cliente`.`USUARIO` (
  `ID_USUARIO` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `NOME` VARCHAR(45) NULL,
  `EMAIL` VARCHAR(45) NULL,
  `PERFIL` VARCHAR(1) NULL,
  `SENHA` VARCHAR(32) NULL);


-- -----------------------------------------------------
-- Table `db_cliente`.`PERFIL`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_cliente`.`PERFIL` (
  `ID_PERFIL` INT NOT NULL AUTO_INCREMENT,
  `DRESCICAO` VARCHAR(45) NULL,
  PRIMARY KEY (`ID_PERFIL`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_cliente`.`LOGIN`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_cliente`.`LOGIN` (
  `ID_LOGIN` INT NOT NULL AUTO_INCREMENT,
  `USER` VARCHAR(45) NULL,
  `SENHA` VARCHAR(80) NULL,
  `ID_PERFIL` INT NULL,
  `ID_USUARIO` INT NULL,
  PRIMARY KEY (`ID_LOGIN`),
  INDEX `FK_ID_PERFIL_LOGIN_idx` (`ID_PERFIL` ASC) ,
  INDEX `FK_ID_USUARIO_PERFIL_idx` (`ID_USUARIO` ASC) ,
  CONSTRAINT `FK_ID_PERFIL_LOGIN`
    FOREIGN KEY (`ID_PERFIL`)
    REFERENCES `db_cliente`.`PERFIL` (`ID_PERFIL`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_ID_USUARIO_PERFIL`
    FOREIGN KEY (`ID_USUARIO`)
    REFERENCES `db_cliente`.`USUARIO` (`ID_USUARIO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
