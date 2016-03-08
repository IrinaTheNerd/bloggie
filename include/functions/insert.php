<?php
include_once('../../php/config.php');


try {
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //
    //
    //$db_users_id = $row_data['users_id'];
    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO blogpost (title, subtitle, preview, main_text )
    VALUES (:title, :subtitle, :preview, :main_text)");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':subtitle', $subtitle);
    $stmt->bindParam(':main_text', $main_text);
    $stmt->bindParam(':preview', $preview);
    // SELECT blogID from blogposts, INSERT INTO userblog (blogID)
    $title =  trim($_POST["heading"]);
    $subtitle = trim($_POST['subtitle']);
    $preview = trim($_POST['preview']);
    $main_text = trim($_POST['main_text']);

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
