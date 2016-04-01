<?php
define("SITENAME", "Bloggie");
define("SITEURL","http://irinapetrova.uk/");
define("SITEEMAIL","hello@irinapetrova.uk");

$dbhost = 'localhost';
$pass = 'Us2wVrHZBG4QWXGW';
$dbuser = 'irinnlso_admin';
$dbname='irinnlso_bloggie';
$conn;

try {
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
   // print_r(PDO->errorInfo());


    }
    include_once 'user.php';
    include_once 'blog.php';
  //  include_once 'blog.php';
//    $user = new USER($conn);
?>
