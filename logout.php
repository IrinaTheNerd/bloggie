<?php
	require_once('php/session.php');

	require_once('php/user.php');
	//new user object
	$user_logout = new USER($conn);
	//if user login has a session redirects to index
	if($user_logout->loggedin()!="")
	{
		$user_logout->redirect('index');
	}
	//if the session and url gets logout then logout and redirect
	if(isset($_GET['logout']) && $_GET['logout']=="true")
	{
		$user_logout->logout();
		$user_logout->redirect('index.php');
	}

?>
