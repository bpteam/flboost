CREATE TABLE `flboost` (
  `id` int(11) NOT NULL,
  `title` text,
  `description` text,
  `date` int(11) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `url` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
