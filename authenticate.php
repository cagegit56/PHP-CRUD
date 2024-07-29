<?php
$user = $_POST['username'];
$pass = $_POST['password'];

if (isset($_POST['username'])) $user = cleanTheData($_POST['username']);
if (isset($_POST['password'])) $pass = cleanTheData($_POST['password']);


 if($user == "kg" && $pass == "12345") {
      header("location: dashboardhom.html");
}

else {
    echo '<script>alert("Wrong Password or Username")</script>';
    echo '<a href="index.html">Try Again</a> ';
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