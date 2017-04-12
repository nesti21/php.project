<?php

if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

define('MYSQL_HOST', '127.0.0.1');
define('MYSQL_PORT', '3306');
define('MYSQL_USER', 'root');
define('MYSQL_PASS', '123456789max');
define('MYSQL_DB', 'blog');

//echo 'hello';