<?php
	require_once('php/session.php');

	require_once('php/user.php');
	$user_logout = new USER($conn);

	if($user_logout->loggedin()!="")
	{
		$user_logout->redirect('index.php');
	}
	if(isset($_GET['logout']) && $_GET['logout']=="true")
	{
		$user_logout->logout();
		$user_logout->redirect('index.php');
	}

?>