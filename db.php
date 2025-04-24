<?php
$host='db';
$db='biblio';
$user= 'user';
$pass= 'toutoutou';
$con=mysqli_connect($host,$user,$pass,$db);
if(!$con){
    die("echec de la connexion:".mysqli_connect_error());

    
}