-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `messages` (`id`, `text`, `author`, `created_at`, `updated_at`, `status`) VALUES
(1,	'Всем привет! это новый суперский чат, заходите все сюда!!',	'admin',	1606660379,	1606660379,	10),
(2,	'Привет админ! ты что бальноЙ! какой он суперский, лажа полная',	'mmisha',	1606660388,	1606660388,	10);

DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base',	1606569496),
('m130524_201442_init',	1606569500),
('m190124_110200_add_verification_token_column_to_user_table',	1606569501);

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`, `role`) VALUES
(8,	'mmisha',	'BOooaKYnq1bwfodTpRoXbXxB0JtgbGsh',	'$2y$13$p95lVt9vUTbeTVEfUhkdtOkA4KnNI7vUvX/yN/m2JibnqdMRjXfR2',	NULL,	'mmishavlad@gmail.com',	10,	1606595590,	1606595685,	'L6cJ4MVObZuTA1S9x1SXphRpj9PBhecz_1606595590',	0),
(9,	'admin',	'38NESL8SSlJUG7r6IDdkS2v4wgljCpQ-',	'$2y$13$eLRYICq9sOYdjfoyrFhtF.83NYJe7D7jAtDyVUKhsrXJoHvPamPY.',	NULL,	'alxche@mail.ru',	10,	1606660528,	1606660561,	'O3gE8Hq612GhzHlvOlnye8QcEiBjVVOC_1606660528',	1),
(10,	'peter_floyd',	'1RblazBSu7SI5PvL5_oelZPgZXvRZZez',	'$2y$13$U5d/pTcrq3HEAGpXfMMcneltkudQlYiAAa/r1zJJPwVrKXQtKJn8K',	NULL,	'a.alxche@yandex.ua',	10,	1606660621,	1606660643,	'BFRVQcMUAc7urihmHOkrAYEew1Hngd_m_1606660621',	0),
(11,	'amon_amorth',	'FsNbrDip8RV30wtNa8uy3yWLZckm_Z0g',	'$2y$13$3zoc6w7HbaIBhTXg8k5DDuka2mzUAdRpHRRteaU2GsWZ3Z5Az28Xe',	NULL,	'amon@amorath.ru',	10,	1606662231,	1606662231,	'5uRHJLeKANtBVcjbs8UUkTjFYjYiIzWR_1606662231',	0);

-- 2020-11-29 19:42:16