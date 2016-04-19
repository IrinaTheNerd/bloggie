<?php
include_once('php/config.php');
define("PAGENAME","Register");
include_once('include/header.php');
	$user = new USER($conn); //creating object user
if($user->loggedin()!="") //if user log in is snot null
{
    $user->redirect('dashboard.php'); //redirect to dashboard
}

if(isset($_POST['signup']))
{
   $email = trim($_POST['email']);
   $password = trim($_POST['password']);
	 $confirmed_password = trim($_POST['confirm_password']);
   if($email=="") {
      $error[] = "Provide your email!";
   }
   else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error[] = 'Please enter a valid email address!';
   }
   else if($password=="") {
      $error[] = "Provide a password!";
   }
   else if(strlen($password) < 6){
      $error[] = "Password must be atleast 6 characters";
   }
	 else if ($password !== $confirmed_password){
		 $error[] = 'Please check your passwords';
	 }
	 else if ($confirmed_password == ""){
		 $error[] = 'Please check your passwords';
	 }
   else
   {
      try
      {
         $query = $conn->prepare("SELECT email FROM user WHERE  email=:email");
         $query->execute(array(':email'=>$email));
         $row=$query->fetch(PDO::FETCH_ASSOC);

         if($row['email']==$email) {
            $error[] = "sorry email id already taken !";
         }
         else
         {
            if($user->register($email,$password))
            {    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
									$user->redirect('dashboard.php?joined');
								}


            }
         }
     }
     catch(PDOException $e)
     {
        echo $e->getMessage();
     }
  }
}
?>


<header class="big-header">
		<h1 class="no-margin">Please, register</h1>
</header>

<div class="intro bottom-margin">
<form method="post" class="inputs feat first">
	<div class="light-green">
		<h2>It's very easy to sign up</h2>
	</div>

			<?php
if(isset($error))
{

		foreach ($error as $value) {	?>
			<div class="alert" >
					Nooo <?php echo $value; ?>
			</div>
			<?php
}
}
?>
				<div class="feat">
					<label for="email" class="left col">Email:</label>
					<input type="text" id="email" maxlength="50" placeholder="email" name="email"  class="feat col">
				</div>
				<div class="feat">
					<label for="password" class="left col">Password:</label>
					<input type="password" id="password" name="password" placeholder="password" class="feat col">
				</div>
				<div class="feat">
					<label for="confirm_password" class="left col">Confirm Password:</label>
					<input type="password" id="confirm_password"  name="confirm_password" placeholder="confirm password" class="feat col">
				</div>
				<input type="submit" name="signup" value="submit">
			</form>
			</div>
	<?php
include_once('include/footer.php');
?>
