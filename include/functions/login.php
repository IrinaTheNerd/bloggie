<?php

if(isset($_POST['login_button']))
{
  $email = $_POST['email'];
  $pass = $_POST['password'];

  if($login->login($email,$pass))
  {
   $login->redirect('dashboard.php');
  }
  else
  {
   $error = "Wrong Details !";
  }
}
?>
