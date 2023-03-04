<?php

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','php-db');

$connect =new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if($connect->connect_error){
    die("Echec de connexion à la BD" . $connect->connect_error);
}
// si tout ce passe bie on peut afficher un connecté
/*
else{
    echo"Connecté!";
}
*/



?>