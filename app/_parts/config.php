<?php
session_start();
define('DSN','mysql:host=localhost;dbname=phpcrud;charset=utf8mb4');
define('SITE_URL', 'http://localhost/php_crud/web/');
define('DB_USR', 'root');
define('DB_PASS', '');

spl_autoload_register(function($class){
    $prefix = 'MyApp\\';
    if(strpos($class, $prefix) === 0)
        {
            // $fileName = sprintf(__DIR__ . '/%s.php' , substr($class, 6));
            $fileName = sprintf(__DIR__ . '/%s.php' , substr($class, strlen($prefix)));
            if(file_exists($fileName)){
                require($fileName);
            }else
            {
                echo 'File not found'. $fileName;
                exit;
            }
        }
});