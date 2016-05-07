<?php
	include_once('php/config.php');
	$login = new USER($conn);
	define("PAGENAME","Login");
	include_once('include/header.php');
//if logged in already rediret
	if($login->loggedin()!="")
	{
	 $login->redirect('dashboard');
	}
	//if not, then check details through running a method
	if(isset($_POST['login_button']))
	{
		$email = $_POST['email'];
		$pass = $_POST['password'];

		if($login->login($email,$pass))
		{
		 $login->redirect('dashboard');
		}
		else
		{
		 $error = "Wrong Details!";
		}
	}



?>

				<header class="big-header">
						<h1 class="no-margin">Please, log in</h1>
			</header>

			<div class="intro bottom-margin">
				<form method="post" class="inputs feat first">
					<div class="light-green">
						<h2>Just fill in your details</h2>
					</div>
								<?php
			            if(isset($error))
			            {
			                  ?>
			                  <div class="alert">
			                      <strong>Oh no! <?php echo $error; ?> </strong>
			                  </div>
			                  <?php
			            }
			            ?>
				 <!-- removed social login -->

						<div class="feat">
							<label  for="email" class="left col">Email:</label>
							<input type="text" id="email" maxlength="50" placeholder="email" name="email"  class="feat col">
						</div>
						<div class="feat">
							<label for="password" class="left col">Password:</label>
							<input type="password" id="password" name="password" placeholder="password" class="feat col">
						</div>
						<div class="feat">
							<small><a href="forgot">Forgot your password?</a></small>
						</div>
						<input type="submit" name="login_button" value="submit">

				</form>
			</div>
			<!-- Needs work-->
	<?php
include_once('include/footer.php');
?>
