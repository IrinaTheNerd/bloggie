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
   if($email=="") {
      $error[] = "provide email id !";
   }
   else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error[] = 'Please enter a valid email address !';
   }
   else if($password=="") {
      $error[] = "provide password !";
   }
   else if(strlen($password) < 6){
      $error[] = "Password must be atleast 6 characters";
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
            {

                $user->redirect('dashboard.php?joined');
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
					<div class="feat">
						<h1>Please, register</h1>
						<h2>Welcome back! Just login though our services or alternatively login through one of our social media integrations</h2>
					</div>

			</header>

			<?php
if(isset($error))
{
	 foreach($error as $error)
	 {
			?>
			<div class="alert alert-danger">
					Nooo &nbsp; <?php echo $error; ?>
			</div>
			<?php
	 }
}
else if(isset($_GET['joined']))
{
		 ?>
		 <div class="alert alert-info">
				Yay &nbsp; Successfully registered <a href='index.php'>login</a> here
		 </div>
		 <?php
}
?>
			<div class="bottom-margin intro">
				<form method="POST" class="inputs feat first">
						<h3>Our fancy form</h3>
					<!--removed social logins-->
						<div class="feat">
							<label  class="feat col">email:</label>
							<input type="text" maxlength="50" name="email"  class="feat col">
						</div>
						<div class="feat">
							<label class="feat col">password:</label>
							<input type="password" name="password" class="feat col">
						</div>
						<input type="submit" value="submit" name="signup">

				</form>
			</div>
	<?php
include_once('include/footer.php');
?>
