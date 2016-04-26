<?php
include_once('php/config.php');
define("PAGENAME","Register");
include_once('include/header.php');
	$user = new USER($conn); //creating object user
if($user->loggedin()!="") //if user log in is snot null
{
    $user->redirect('dashboard.php'); //redirect to dashboard
}
//once signup input is clicked ...
if(isset($_POST['signup'])){
//getting rid of whitespace around sqlite_unbuffered_query
   $email = trim($_POST['email']);
   $password = trim($_POST['password']);
	 $confirmed_password = trim($_POST['confirm_password']);
	 //checking whether the form is filled correctly
   if($email=="") {
      $error[] = "Provide your email!";
   }
	 //checks whether the email is an actual email address and not some random characters
   else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error[] = 'Please enter a valid email address!';
   }
	 //checks whether the password field is empty
   else if($password=="") {
      $error[] = "Provide a password!";
   }
	 //checks for the number of bytes of the password entered
   else if(strlen($password) < 6){
      $error[] = "Password must be atleast 6 characters";
   }
	 //same with it's confirmation
	 else if(strlen($confirmed_password) < 6){
      $error[] = "Confirmations for your password must be atleast 6 characters";
   }
	 //checks whether the passwords are the same
	 else if ($password !== $confirmed_password){
		 $error[] = 'Please check your passwords';
	 }
	 //checks if the confirmation is not empty
	 else if ($confirmed_password == ""){
		 $error[] = 'Please check your passwords';
	 }
   else
   {
      try
      {
				//checks if the email address is already registered
         $query = $conn->prepare("SELECT email FROM user WHERE  email=:email");
         $query->execute(array(':email'=>$email));
         $row=$query->fetch(PDO::FETCH_ASSOC);

         if($row['email']==$email) {
            $error[] = "sorry email id already taken !";
         }
         else
         {//runs  the register method
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
<!-- if there are errors, it prints out them in a nice alert box -->
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
					<input type="text" id="email" maxlength="50" placeholder="email" name="email" required class="feat col">
				</div>
				<div class="feat">
					<label for="password" class="left col">Password:</label>
					<input type="password" id="password" name="password" placeholder="password" required class="feat col">
				</div>
				<div class="feat">
					<label for="confirm_password" class="left col">Confirm Password:</label>
					<input type="password" id="confirm_password"  name="confirm_password" required placeholder="confirm password" class="feat col">
				</div>
				<input type="submit" name="signup" value="submit">
			</form>
			</div>
	<?php
include_once('include/footer.php');
?>
