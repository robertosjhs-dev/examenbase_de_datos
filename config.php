<?php
 
define("DB_HOST","host");
define("DB_NAME","funciona");
define("DB_USER","root");
define("DB_PASS","");

$dsn="mysql:host=".DB_HOST.";dbname=".DB_NAME;

try {
 $gbd=new pdo($dsn,DB_USER,DB_PASS);
} catch (  $th) {
    
}








?>








