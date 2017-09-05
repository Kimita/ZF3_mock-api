-- DROP DATABASE `zf3test`;
-- CREATE DATABASE zf3test DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;


CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'シーケンシャルID',
  `username` varchar(50) DEFAULT NULL           COMMENT 'ユーザ名',
  `email` varchar(254) DEFAULT NULL             COMMENT 'メールアドレス',
  `password` binary(60) DEFAULT NULL            COMMENT 'パスワード',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
)
ENGINE=InnoDB DEFAULT CHARSET=utf8
COMMENT='ユーザ';

