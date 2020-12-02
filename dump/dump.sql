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
(1, 'Всем привет! это новый суперский чат, заходите все сюда!!',  'admin',  1606660379, 1606828599, 10),
(2, 'Привет админ! ты что бальноЙ! какой он суперский, лажа полная',  'mmisha', 1606660388, 1606660388, 10),
(5, 'привет', 'admin',  1606729988, 1606729988, 10),
(8, 'что тебе еще?',  'admin',  1606730076, 1606730076, 10),
(9, 'да уж',  'mmisha', 1606730270, 1606730270, 10),
(12,  'слушайте анекдот', 'mmisha', 1606735675, 1606735675, 10),
(14,  'давай, слушаю',  'admin',  1606738343, 1606818852, 0),
(15,  'я уже забыл',  'amon_amorth',  1606738368, 1606738368, 10),
(16,  'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore dicta ipsam accusantium porro unde sunt atque, est nam commodi minima, dolores quasi cupiditate ipsa laudantium. Non soluta expedita reiciendis cumque?', 'test_vasya', 1606819050, 1606819050, 10);
 

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`, `role`) VALUES
(8, 'mmisha', 'BOooaKYnq1bwfodTpRoXbXxB0JtgbGsh', '$2y$13$p95lVt9vUTbeTVEfUhkdtOkA4KnNI7vUvX/yN/m2JibnqdMRjXfR2', NULL, 'mmishavlad@gmail.com', 10, 1606595590, 1606595685, 'L6cJ4MVObZuTA1S9x1SXphRpj9PBhecz_1606595590',  0),
(9, 'admin',  '38NESL8SSlJUG7r6IDdkS2v4wgljCpQ-', '$2y$13$eLRYICq9sOYdjfoyrFhtF.83NYJe7D7jAtDyVUKhsrXJoHvPamPY.', NULL, 'alxche@mail.ru', 10, 1606660528, 1606830701, 'O3gE8Hq612GhzHlvOlnye8QcEiBjVVOC_1606660528',  1),
(10,  'peter_floyd',  '1RblazBSu7SI5PvL5_oelZPgZXvRZZez', '$2y$13$U5d/pTcrq3HEAGpXfMMcneltkudQlYiAAa/r1zJJPwVrKXQtKJn8K', NULL, 'a.alxche@yandex.ua', 9,  1606660621, 1606827587, 'BFRVQcMUAc7urihmHOkrAYEew1Hngd_m_1606660621',  1),
(11,  'amon_amorth',  'FsNbrDip8RV30wtNa8uy3yWLZckm_Z0g', '$2y$13$3zoc6w7HbaIBhTXg8k5DDuka2mzUAdRpHRRteaU2GsWZ3Z5Az28Xe', NULL, 'amon@amorath.ru',  10, 1606662231, 1606662231, '5uRHJLeKANtBVcjbs8UUkTjFYjYiIzWR_1606662231',  0),
(12,  'test_vasya', 'Z8Pw7K8EJDTGShCn_6A1rMlQbFa7mW_9', '$2y$13$BrXpeJ2oHc8A7WDgvNZjquSKg5jtk5Ed.q1o/2qODnMT9vz3ygqfa', NULL, 'asd@mail.ru',  10, 1606825684, 1606825684, '9nofGd1lWmQdyYYn8W8OzWhnZdQpM6P-_1606825684',  0),
(13,  'test_vasya_2', '7OI-PE1--Zq2HYji45HYpfAnxov8BJ2q', '$2y$13$YnCgq12CRR8K.GUviEJGGeQ6y5TJ2PihzxW5JyazJVGUltqBhzB/y', NULL, 'asdzd@asd.sa', 10, 1606826119, 1606826119, 'EMnFY8yjrkXK1gRy2aaqUENILW5QicE7_1606826119',  0),
(14,  'mubaragh', '00cPS_mkKOsNDnKbgl5WVqJ0q0_oMG7Y', '$2y$13$jXaqa.C19yWh2/ivUQS3ieaygzeO6V34HZgM0WeViGIXkR.N0ugHS', NULL, 'asdqwer@as.asdasdasd', 10, 1606826199, 1606826199, 'OypdRZmwXhLniYrheHaQoOiz-ht9jS9r_1606826199',  0);

-- 2020-12-02 08:33:18