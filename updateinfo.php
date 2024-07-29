<?php
require_once 'infoupdate.html';

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
    $id = $_POST['id'];

$designatedbranch = $_POST['designatedbranch'];
$department = $_POST['department'];
$driver = $_POST['driver'];
$repairs = $_POST['repairs'];

if (isset($_POST['designatedbranch'])) $designatedbranch = cleanTheData($_POST['designatedbranch']);
if (isset($_POST['department'])) $department = cleanTheData($_POST['department']);
if (isset($_POST['driver'])) $driver = cleanTheData($_POST['driver']);
if (isset($_POST['repairs'])) $repairs = cleanTheData($_POST['repairs']);

$data=[
    'designatedbranch'=>$designatedbranch, 'department'=>$department, 'driver'=> $driver,'repairs'=> $repairs,'id'=> $id,
];

$query= "UPDATE vehicle SET designated_branch=:designatedbranch, department=:department, driver=:driver, repairs=:repairs WHERE id=:id";
 $stmt = $pdo->prepare($query);
if(!$stmt) {
echo 'Error: '.$pdo->error;
}
$stmt->execute($data);
 echo '<script>alert("Successfully Updated")</script>';


function cleanTheData($var)
{
    if (function_exists("get_magic_quotes_gpc") && get_magic_quotes_gpc())
    $var = stripslashes($var);
    $var = strip_tags($var);
    $var = htmlentities($var);
    return $var;
}
function sanitizeMySQL($pdo, $var)
{
    $var = $pdo->quote($var);
    $var = cleanTheData($var);
    return $var;
}

?>