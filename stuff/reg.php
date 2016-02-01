<?php
include_once('../../php/config.php');


try {
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO users (email, password)
    VALUES (:email, :password)");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);


    // insert a row
    $email = $_POST['username'];
    $password = $_POST['password'];
    $password = md5($password);
    $stmt->execute(); 
 header('Location: ../../login.php');
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
?>