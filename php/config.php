<?php
session_start();
define("SITENAME", "Bloggie");
define("SITEURL","http://irinapetrova.uk/");
define("SITEEMAIL","hello@irinapetrova.uk");
/*
$appId = '1594490410869816'; //Facebook App ID
$appSecret = '70562c2caae0622c66139ec3a8da7ac3'; // Facebook App Secret
$homeurl = 'http://bloggie.irinapetrova.uk/';  //return to home
$fbPermissions = 'email';  //Required facebook permissions

//Call Facebook API
$facebook = new Facebook(array(
  'appId'  => $appId,
  'secret' => $appSecret

));
$fbuser = $facebook->getUser();
*/
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
    //include all classes that will be useful
    include_once 'user.php';
    include_once 'blog.php';
?>
