CREATE TABLE `pets` (
  `id` varchar(50) NOT NULL DEFAULT '',
  `name` varchar(100) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `birth` varchar(10) NOT NULL,
  `createdAt` bigint(20) NOT NULL,
  `updatedAt` bigint(20) NOT NULL,
  `version` bigint(20) NOT NULL,
  `ownerId` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `users` (
  `id` varchar(50) NOT NULL DEFAULT '',
  `name` varchar(100) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `birth` varchar(10) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL,
  `passwd` varchar(100) NOT NULL,
  `createdAt` bigint(20) NOT NULL,
  `updatedAt` bigint(20) NOT NULL,
  `version` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE USER 'www'@'localhost' IDENTIFIED BY '123456aC$';
