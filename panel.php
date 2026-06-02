<?php
 if($_SESSION["es_admin"]!==1){
//esto me sirve para que haya seguridad
//evita que cualqueir persona que NO SEA en el es_admin ES 1
//lo mande a login.php
header("location:login.php");
exit;



 }


require_once("conexion.php");
 
$sl="SELECT * from usuarios";

$s=$gbd->prepare($sl);

$s->execute();

 
 







$i=1;




?>
<table>
   
<td>   <?php foreach ($s as $hola) {

echo  "<img src=perfil/$i.png> ";
$i++;
 echo $hola["username"];
  
 echo $hola["nombre"];
 echo $hola["apellido"];
 
  echo $hola["fecha_nac"];
if($hola["es_admin"]!==0){
    echo" admin";
}else{
     echo "usuario";
}
 

?>
 </td>






</table>

</P>
<p><?php }?></p>