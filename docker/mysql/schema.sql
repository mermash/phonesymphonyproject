SET NAMES utf8mb4;
CREATE DATABASE `civenty`;

USE `civenty`;

-- DROP TABLE IF EXISTS `civenty`.`user`;
-- CREATE TABLE `civenty`.`user` (
-- `id` int NOT NULL AUTO_INCREMENT,
-- `name` varchar(50) NOT NULL,
-- `birthdate` datetime NOT NULL,
-- PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- DROP TABLE IF EXISTS `civenty`.`phone_operator`;
-- CREATE TABLE `civenty`.`phone_operator` (
-- `id` int NOT NULL AUTO_INCREMENT,
-- `code` VARCHAR(3) NOT NULL,
-- PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- DROP TABLE IF EXISTS `civenty`.`phone`;
-- CREATE TABLE `civenty`.`phone` (
-- `id` int NOT NULL AUTO_INCREMENT,
-- `user_id` int,
-- `phone_number` CHAR(7) NOT NULL,
-- `operator_id` int,
-- PRIMARY KEY (`id`),
-- CONSTRAINT fk_user_phone FOREIGN KEY (`user_id`) REFERENCES `civenty`.`user`(`id`),
-- CONSTRAINT fk_phone_phone_operator FOREIGN KEY (`operator_id`) REFERENCES `civenty`.`phone_operator`(`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- DROP TABLE IF EXISTS `civenty`.`phone_balance`;
-- CREATE TABLE `civenty`.`phone_balance` (
-- `id` int NOT NULL AUTO_INCREMENT,
-- `phone_id` int,
-- `code` VARCHAR(3) NOT NULL,
-- PRIMARY KEY (`id`),
-- CONSTRAINT fk_phone_phone_balance FOREIGN KEY (`phone_id`) REFERENCES `civenty`.`phone`(`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

