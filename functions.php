<?php
$host = 'localhost';
$data = 'fleet_management_db';
$user = 'root';
$pass = '';
$chrs = 'utf8mb4';
$attr = "mysql:host=$host;dbname=$data;charset=$chrs";
$opts = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
 try
 {
 $pdo = new PDO($attr, $user, $pass, $opts);
 }
 catch (PDOException $e)
 {
 throw new PDOException($e->getMessage(), (int)$e->getCode());
}


     function cleanTheData($var)
     {
         if (function_exists("get_magic_quotes_gpc") && get_magic_quotes_gpc())
         $var = stripslashes($var);
         $var = strip_tags($var);
         $var = htmlentities($var);
         return $var;
     }


?>