<?php
try {
    $dsn="mysql:host=localhost;dbname=gestion_article";
    $user="root";
    $pw="";
    // Etablissement d'une connexion avec mysql
    //créer un objet PDO
    $cnx=new PDO($dsn,$user,$pw);
} catch (Exception $e) {
    echo"Problème de connexion :".$e->getMessage();
}


$conn = mysqli_connect("localhost","root","","gestion_article");

if(!$conn)
{
	echo "Database connection failed..."; die();
}
?>