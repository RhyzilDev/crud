CREATE DATABASE IF NOT EXISTS test;

USE test;

DROP TABLE IF EXISTS users;

CREATE TABLE `users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `address` VARCHAR(255) NOT NULL,
  `class` VARCHAR(50) NOT NULL,
  `phone` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`id`)
);
