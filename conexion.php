 <?php


define("DB_HOST","localhost");
define("DB_NAME","funciona");
define("DB_USER","root");
define("DB_PASS","");
//mira , te hare parte del codigo en texto porque no me parece justo que por un error que a saber cual es
//este condenado a un 0 
$dsn="mysql:host=".DB_HOST.";dbname=".DB_NAME;
 
 
try {

 $gbd=NEW PDO($dsn,DB_USER,DB_PASS);
 
} catch (PDOExeception  $th) {
 $th->getMessage();
 echo "falto" . $th;
}







?>