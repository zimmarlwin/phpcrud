<?php

session_start();
define('DSN','mysql:host=localhost;dbname=phpcrud;charset=utf8mb4');
define('SITE_URL', 'http://localhost/php_crud/web/');
define('DB_USR', 'root');
define('DB_PASS', '');

require_once(__DIR__ . '/functions.php');