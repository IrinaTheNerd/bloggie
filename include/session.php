<?php

	session_start();

	require_once '/php/user.php';
	$session = new USER($conn);

	// checks whether usersessions are active and redirect to login.php, if not

	if(!$session->loggedin())
	{
		// session no set redirects to login page
		$session->redirect('login.php');
	}
?>
