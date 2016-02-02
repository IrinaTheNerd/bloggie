<?php
include_once('php/config.php');
define("PAGENAME","Register");
include_once('/include/header.php');
	$user = new USER($conn);
if($user->loggedin()!="")
{
    $user->redirect('dashboard.php');
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
         $query = $conn->prepare("SELECT email FROM users WHERE  email=:email");
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


				<header>
					<div class="feat span_6_of_12">
						<h1 class="main">Please, register</h1>
					</div>

			</header>
			<section class="intro span_12_of_12">
				<div class="feat span_8_of_12">
					<h2>Welcome back! Just login though our services or alternatively login through one of our social media integrations</h2>
				</div>

			</section>
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
			<section class="bottom-margin span_12_of_12">
				<form method="POST" class="inputs feat span_4_of_12">
					<legend class="span_12_of_12">
						<h3>Our fancy form</h3>
						<div class="feat span_9_of_12">
							<div class="col feat span_4_of_12">
								<a href="#"><span class="icon-facebook-circled"></span></a>
							</div>
							<div class="col feat span_4_of_12">
								<a href="#"><span class="icon-twitter-circled"></span></a>
							</div>
							<div class="col feat span_4_of_12">
								<a href="#"><span class="icon-googleplus-rect"></span></a>
							</div>
						</div>
						<div class="feat span_12_of_12">
							<label  class="feat span_12_of_12">email:</label>
							<input type="text" name="email"  class="feat span_12_of_12">
						</div>
						<div class="feat span_12_of_12">
							<label class="feat span_12_of_12">password:</label>
							<input type="password" name="password" class="feat span_12_of_12">
						</div>
						<input type="submit" value="submit" name="signup">
					</legend>
				</form>
			</section>
	<?php
include_once('include/footer.php');
?>
