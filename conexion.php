 <?php


define("DB_HOST","localhost");
define("DB_NAME","funciona");
define("DB_USER","root");
define("DB_PASS","");

$dsn="mysql:host=".DB_HOST.";dbname=".DB_NAME;
//creo que me falla algo que es una tonteria muy grande
try {
 $gbd=NEW PDO($dsn,DB_USER,DB_PASS);
 
} catch (pdoExpceiton  $th) {
 $th->getMessage();
 echo "falto" . $th;
}







?>