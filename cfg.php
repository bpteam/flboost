<?php
/**
 * Created by PhpStorm.
 * User: EC
 * Date: 22.11.13
 * Time: 9:07
 * Project: free-notify
 * @author: Evgeny Pynykh bpteam22@gmail.com
 */
define('DB_HOST', 'localhost');
define('DB_USER', 'Z');
define('DB_PASSWD', '123456');
define('DB_NAME', 'free_notify');
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);
if ($mysqli->connect_error) {
	echo "Не удалось подключиться к БД.(" . $mysqli->connect_errno . ')' . $mysqli->connect_error;
	exit;
}
$mysqli->options(MYSQLI_OPT_CONNECT_TIMEOUT, 7200);
$mysqli->set_charset("utf8");