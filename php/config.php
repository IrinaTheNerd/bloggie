<?php
define("SITENAME", "Bloggie");
define("SITEURL","http://localhost/");
define("SITEEMAIL","hello@irinapetrova.uk");

$dbhost = 'localhost';
$pass = 'Us2wVrHZBG4QWXGW';
$dbuser = '5wfO[qwdaS1.231';
$dbname='bloggie';
$conn;

try {
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
    include_once 'user.php';
//    $user = new USER($conn);
?>
