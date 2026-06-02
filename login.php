<?php


require_once("conexion.php");
require_once("session.php");

if($_SERVER["REQUEST_METHOD"]==="POST"){
//cogemos los metemos del formulario


$name=$_POST["username"];
$contra=$_POST["password"];
//la infor de los formularios se la damos esas valores
 
$selec="SELECT es_admin,username,password FROM usuarios where username =:username";
//selecionamos lo que queremos , en este caso queremos queremos si es admin y la contraseña
//el :username es como una variable temporal osea le decimos que username sera eso y ya en el execute le decimos su valor
$pepara=$gbd->prepare($selec);
//le decimos que con la consulta del selec me la prepare usando los valores del gbd que son bd_user y contraseña y ademas el host + el nombre de la tabla




$pepara->execute([
    ":username"=>$name
    
    ]);
//la ejecutamos y le decimos que username tiene el valor de name
 $nuevo=$pepara->fetch(PDO::FETCH_ASSOC);
 //si se que no se pone asi pero si fuera asi funcionaria nuevo
 //osea se que tengo mal el fecth_assoc y ahora no me sale pero tomemos el caso de que si estuviera bien
//aqui si funcionara seria una nuevo seria una array asociactiva



if($nuevo){
    //si existe nuevo
if(password_verify($contra,$nuevo["password"])){

    //verifica si la contraseña actual que pusismos en el formulario sea IGUAL a la de la base de datos
    //si es la buena contraseña hara todo eso:
$_SESSION["username"]=$name;
$_SESSION["es_admin"]=$nuevo["es_admin"];


//set_cookie("id",$nuevo["username"],time()+ 35000);
//me crea una cookie llamada como la de session , que me recuerde que solo el username del usuario , le ponemos tiempo (esta en segundo) 
 
header("Location:panel.php");
exit;


}



};


}









?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login con Recuérdame</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f9; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .login-box { background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); width: 300px; }
        input[type="text"], input[type="password"] { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        .checkbox-container { margin: 15px 0; display: flex; align-items: center; font-size: 14px; color: #555; }
        .checkbox-container input { margin-right: 8px; cursor: pointer; }
        button { width: 100%; padding: 10px; background: #007BFF; border: 0; color: #fff; border-radius: 4px; cursor: pointer; font-size: 16px; margin-top: 10px; }
        .error { color: #d9534f; background: #f2dede; padding: 10px; border-radius: 4px; margin-bottom: 15px; text-align: center; }
    </style>
</head>
<body>
<div class="login-box">
    <h2>Iniciar Sesión</h2>
    <form action="./login.php" method="POST">
        <label>Usuario</label>
        <input type="text" name="username" required autocomplete="off">
        
        <label>Contraseña</label>
        <input type="password" name="password" required>
        
        <div class="checkbox-container">
            <input type="checkbox" name="recuerdame" id="recuerdame">
            <label for="recuerdame">Recuérdame en este equipo</label>
        </div>

        <button type="submit">Entrar</button>
    </form>
</div>
</body>
</html>