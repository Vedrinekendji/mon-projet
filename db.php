<?php
$host='localhost';
$db='biblio';
$user= 'root';
$pass= 'toutoutou';
$con=mysqli_connect($host,$user,$pass,$db);
if(!$con){
    die("echec de la connexion:".mysqli_connect_error());

    
}