<?php
include_once('../../php/config.php');

/*
try {
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("SELECT * from users WHERE email = :email LIMIT 1");
    if()
    // insert a row
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);
    $stmt->execute();
  }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }

$conn = null;*/


	if($user->loggedin()!="")
	{
	 $user->redirect('dashboard.php');
	}
	if(isset($_POST['login_button']))
	{
		$email = $_POST['email'];
		$pass = $_POST['password'];
		if($user->login($email,$pass))
		{
		 $user->redirect('dashboard.php');
		}
		else
		{
		 $error = "Wrong Details !";
		}
	}
  
?>
