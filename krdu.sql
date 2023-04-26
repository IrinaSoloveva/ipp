-- Adminer 4.8.1 MySQL 8.0.30 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `blog`;
CREATE TABLE `blog` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` datetime DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `users_id` int NOT NULL,
  `request_id` int NOT NULL,
  PRIMARY KEY (`id`,`users_id`,`request_id`),
  KEY `fk_blog_users1_idx` (`users_id`),
  KEY `fk_blog_request1_idx` (`request_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `department` (`id`, `name`) VALUES
(1,	'ООВИТ'),
(2,	'ООВИТ');

DROP TABLE IF EXISTS `educational_work`;
CREATE TABLE `educational_work` (
  `id` int NOT NULL AUTO_INCREMENT,
  `load_plan_one` decimal(10,1) DEFAULT NULL,
  `load_fact_one` decimal(10,1) DEFAULT NULL,
  `time_one` datetime DEFAULT NULL,
  `mark_date_one` datetime DEFAULT NULL,
  `load_plan_two` decimal(10,1) DEFAULT NULL,
  `load_fact_two` decimal(10,1) DEFAULT NULL,
  `time_two` datetime DEFAULT NULL,
  `mark_date_two` datetime DEFAULT NULL,
  `load_year` decimal(10,1) DEFAULT NULL,
  `type_educational_work_id` int NOT NULL,
  `request_id` int NOT NULL,
  `mark_name_one_id` int NOT NULL,
  `mark_name_two_id` int NOT NULL,
  PRIMARY KEY (`id`,`type_educational_work_id`,`request_id`,`mark_name_one_id`,`mark_name_two_id`),
  KEY `fk_educational_work_type_educational_work1_idx` (`type_educational_work_id`),
  KEY `fk_educational_work_request1_idx` (`request_id`),
  KEY `fk_educational_work_type_event1_idx` (`mark_name_one_id`),
  KEY `fk_educational_work_type_event2_idx` (`mark_name_two_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


DROP TABLE IF EXISTS `group`;
CREATE TABLE `group` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `group` (`id`, `name`) VALUES
(1,	'ППС');

DROP TABLE IF EXISTS `methodical_work`;
CREATE TABLE `methodical_work` (
  `id` int NOT NULL AUTO_INCREMENT,
  `discipline_one` varchar(45) DEFAULT NULL,
  `load_plan_one` decimal(10,1) DEFAULT NULL,
  `load_fact_one` decimal(10,1) DEFAULT NULL,
  `mark_date_one` datetime DEFAULT NULL,
  `mark_number_one` varchar(45) DEFAULT NULL,
  `discipline_two` varchar(45) DEFAULT NULL,
  `load_plan_two` decimal(10,1) DEFAULT NULL,
  `load_fact_two` decimal(10,1) DEFAULT NULL,
  `mark_date_two` datetime DEFAULT NULL,
  `mark_number_two` varchar(45) DEFAULT NULL,
  `type_methodical_work_id` int NOT NULL,
  `request_id` int NOT NULL,
  `mark_name_one_id` int NOT NULL,
  `mark_name_two_id` int NOT NULL,
  PRIMARY KEY (`id`,`type_methodical_work_id`,`request_id`,`mark_name_one_id`,`mark_name_two_id`),
  KEY `fk_methodical_work_type_methodical_work1_idx` (`type_methodical_work_id`),
  KEY `fk_methodical_work_request1_idx` (`request_id`),
  KEY `fk_methodical_work_type_event1_idx` (`mark_name_one_id`),
  KEY `fk_methodical_work_type_event2_idx` (`mark_name_two_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `methodical_work` (`id`, `discipline_one`, `load_plan_one`, `load_fact_one`, `mark_date_one`, `mark_number_one`, `discipline_two`, `load_plan_two`, `load_fact_two`, `mark_date_two`, `mark_number_two`, `type_methodical_work_id`, `request_id`, `mark_name_one_id`, `mark_name_two_id`) VALUES
(8,	'',	NULL,	NULL,	NULL,	'',	'',	NULL,	NULL,	NULL,	'',	5,	98,	1,	1),
(9,	'Уголовное право',	36.0,	36.0,	'2026-01-20 23:00:00',	'15-23',	'',	NULL,	NULL,	NULL,	'',	3,	98,	2,	1),
(25,	'УПиК',	32.0,	16.0,	'2023-02-09 00:00:00',	'12',	'',	NULL,	NULL,	NULL,	'',	3,	106,	1,	1),
(26,	'УПиК',	12.0,	16.0,	'2023-02-03 00:00:00',	'12',	'',	NULL,	NULL,	NULL,	'',	4,	106,	2,	1);

DROP TABLE IF EXISTS `request`;
CREATE TABLE `request` (
  `id` int NOT NULL AUTO_INCREMENT,
  `table_name` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `date_request` datetime DEFAULT NULL,
  `date_response` datetime DEFAULT NULL,
  `academic_year` int NOT NULL,
  `users_id_request` int DEFAULT NULL,
  `users_id_response` int DEFAULT NULL,
  `status_id` int NOT NULL,
  `response_id` int NOT NULL,
  PRIMARY KEY (`id`,`status_id`,`response_id`),
  KEY `fk_request_users1_idx` (`users_id_request`),
  KEY `fk_request_users2_idx` (`users_id_response`),
  KEY `fk_request_status1_idx` (`status_id`),
  KEY `fk_request_response1_idx` (`response_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `request` (`id`, `table_name`, `date_request`, `date_response`, `academic_year`, `users_id_request`, `users_id_response`, `status_id`, `response_id`) VALUES
(98,	'methodical_work',	'2016-12-22 00:00:00',	NULL,	2022,	2,	2,	1,	1),
(100,	'methodical_work',	'2016-12-22 00:00:00',	NULL,	2022,	1,	1,	1,	1),
(106,	'methodical_work',	'2023-02-16 00:00:00',	NULL,	2023,	2,	NULL,	1,	1);

DROP TABLE IF EXISTS `response`;
CREATE TABLE `response` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `response` (`id`, `name`) VALUES
(1,	'Ожидает проверки');

DROP TABLE IF EXISTS `scientific_work`;
CREATE TABLE `scientific_work` (
  `id` int NOT NULL AUTO_INCREMENT,
  `load_plan_one` decimal(10,1) DEFAULT NULL,
  `load_fact_one` decimal(10,1) DEFAULT NULL,
  `time_one` datetime DEFAULT NULL,
  `mark_discipline_one` varchar(45) DEFAULT NULL,
  `mark_number_one` varchar(45) DEFAULT NULL,
  `mark_date_one` datetime DEFAULT NULL,
  `load_plan_two` decimal(10,1) DEFAULT NULL,
  `load_fact_two` decimal(10,1) DEFAULT NULL,
  `time_two` datetime DEFAULT NULL,
  `mark_discipline_two` varchar(45) DEFAULT NULL,
  `mark_number_two` varchar(45) DEFAULT NULL,
  `mark_date_two` datetime DEFAULT NULL,
  `load_year` decimal(10,1) DEFAULT NULL,
  `type_scientific_work_id` int NOT NULL,
  `request_id` int NOT NULL,
  `mark_name_one_id` int NOT NULL,
  `mark_name_two_id` int NOT NULL,
  PRIMARY KEY (`id`,`type_scientific_work_id`,`request_id`,`mark_name_one_id`,`mark_name_two_id`),
  KEY `fk_scientific_work_type_scientific_work1_idx` (`type_scientific_work_id`),
  KEY `fk_scientific_work_request1_idx` (`request_id`),
  KEY `fk_scientific_work_type_event1_idx` (`mark_name_one_id`),
  KEY `fk_scientific_work_type_event2_idx` (`mark_name_two_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(25) DEFAULT NULL,
  `priority` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `status` (`id`, `name`, `priority`) VALUES
(1,	'Преподаватель',	1);

DROP TABLE IF EXISTS `teaching_load_fact`;
CREATE TABLE `teaching_load_fact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `path_file` varchar(45) DEFAULT NULL,
  `request_id` int NOT NULL,
  PRIMARY KEY (`id`,`request_id`),
  KEY `fk_teaching_load_fact_request1_idx` (`request_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


DROP TABLE IF EXISTS `teaching_load_plan`;
CREATE TABLE `teaching_load_plan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `path_file` varchar(45) DEFAULT NULL,
  `request_id` int NOT NULL,
  PRIMARY KEY (`id`,`request_id`),
  KEY `fk_teaching_load_plan_request1_idx` (`request_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


DROP TABLE IF EXISTS `type_educational_work`;
CREATE TABLE `type_educational_work` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


DROP TABLE IF EXISTS `type_event`;
CREATE TABLE `type_event` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `type_event` (`id`, `name`) VALUES
(1,	'Заседание кафедры'),
(2,	'Заседание ученого совета');

DROP TABLE IF EXISTS `type_methodical_work`;
CREATE TABLE `type_methodical_work` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `type_methodical_work` (`id`, `name`) VALUES
(3,	'1 Разработка примерной программы дисциплины'),
(4,	'2.1.1 Разработка общей характеристики образовательной программы высшего образования'),
(5,	'2.1.2 Переработка общей характеристики образовательной программы высшего образования'),
(6,	'2.2.1 Разработка РПД (при отсутствии примерной программы дисциплины или типовой РПД)');

DROP TABLE IF EXISTS `type_scientific_work`;
CREATE TABLE `type_scientific_work` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `login` varchar(45) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `department_id` int NOT NULL,
  `group_id` int NOT NULL,
  `status_id` int NOT NULL,
  PRIMARY KEY (`id`,`department_id`,`group_id`,`status_id`),
  KEY `fk_user_department_idx` (`department_id`),
  KEY `fk_users_group1_idx` (`group_id`),
  KEY `fk_users_status1_idx` (`status_id`),
  CONSTRAINT `fk_user_department` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `users` (`id`, `name`, `login`, `password`, `email`, `department_id`, `group_id`, `status_id`) VALUES
(2,	'Соловьева Ирина Игоревна',	'solovevaII',	'$2y$13$ylxGJVza8dWEmyu8DnMYruX9Lj45e5YlAVEA4ULp44wNC1ReewWeG',	NULL,	1,	1,	1),
(3,	'admin',	'admin',	'$2y$13$NMQlBJk8jG.d5mBwZUhfUOS5T3NyBkNAvEzBC7Tu9IjFfMPSHuSeq',	NULL,	1,	0,	0),
(4,	'Соловьева И.И.',	'soloveva',	'$2y$13$ylxGJVza8dWEmyu8DnMYruX9Lj45e5YlAVEA4ULp44wNC1ReewWeG',	NULL,	1,	1,	1);

-- 2023-04-26 20:50:17
