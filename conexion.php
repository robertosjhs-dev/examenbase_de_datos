 <?php


define("DB_HOST","host");
define("DB_NAME","funciona");
define("DB_USER","root");
define("DB_PASS","");

$dsn="mysql:localhost=".DB_HOST.";dbname=".DB_NAME;

try {
 $gbd=NEW PDO($dsn,DB_USER,DB_PASS);
 
} catch (pdoExpceiton  $th) {
 $th->getMessage();
 echo "falto" . $th;
}







?>