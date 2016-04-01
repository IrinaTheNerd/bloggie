<?php
include_once('../../php/config.php');


try {
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO blogposts (title, subtitle, preview, main_text )
    VALUES (:title, :subtitle, :preview, :main_text)");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':subtitle', $subtitle);
    $stmt->bindParam(':main_text', $main_text);
    $stmt->bindParam(':preview', $preview);
    // SELECT blogID from blogposts, INSERT INTO userblog (blogID)
//    $stmt->bindParam();
    $stmt->execute();
 header('Location: ../../index.php');
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
?>
