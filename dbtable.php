<?php
require_once 'functions.php';
function createTable($name, $query)
{
    queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
   
}
function queryMysql($query)
{
    global $pdo;
    $result = $pdo-> query($query);
    if (!$result) die($PDO->error);
    return $result;
} 
createTable('vehicle',
         'ID int(11) unsigned NOT NULL auto_increment PRIMARY KEY ,
    VEHICLE_REGISTRATION_NUMBER VARCHAR(16),
     MAKE VARCHAR(16) NOT NULL,
     MODEL VARCHAR(16) NOT NULL,
     FUEL_TYPE VARCHAR(16) NOT NULL,
     TANK_CAPACITY VARCHAR(16) NOT NULL,
     PREVIOUS_OWNER VARCHAR(32) NOT NULL,
     DESIGNATED_BRANCH VARCHAR(32)NOT NULL,
     DEPARTMENT VARCHAR(16) NOT NULL,
     DRIVER VARCHAR(32) NOT NULL,
     REPAIRS VARCHAR(32) NOT NULL'
         
     );

     ?>