<?php
/**
 * Created by PhpStorm.
 * User: EC_l
 * Date: 18.02.14
 * Time: 12:24
 * Email: bpteam22@gmail.com
 */
require_once dirname(__FILE__) . '/cfg.php';

$query = "CREATE TABLE `flboost` (
  `id` int(11) NOT NULL,
  `title` text,
  `description` text,
  `date` int(11) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `url` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
";
$mysqli->query($query);