<?php
	include_once('php/config.php');
  session_start();
// include_once ('include/session.php');
	$login = new USER($conn);
	define("PAGENAME","Login");
	include_once('include/header.php');

	if($login->loggedin()!="")
	{
	 $login->redirect('dashboard.php');
	}
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

				<header>
					<div class="feat">
						<h1>Please, log in</h1>
					</div>


			</header>
			<div class="intro">
				<div class="feat">
					<h2>Welcome back! Just login though our services or alternatively login through one of our social media integrations</h2>
				</div>
			</div>
			<div class="bottom-margin">
				<form method="post" class="inputs feat first">

						<h3>Loginning is so easy</h3>
						<div class="feat">
							<div class="feat middle">
								<?php
			            if(isset($error))
			            {
			                  ?>
			                  <div class="alert alert-danger">
			                      <strong>Oh no!</strong> <?php echo $error; ?> !
			                  </div>
			                  <?php
			            }
			            ?>
								<a href="#"><span class="icon-facebook-circled"></span></a>
							</div>
							<div class="feat middle">
								<a href="#"><span class="icon-twitter-circled"></span></a>
							</div>
							<div class="feat middle">
								<a href="#"><span class="icon-googleplus-rect"></span></a>
							</div>
						</div>
						<div class="feat">
							<label  class="feat col">email:</label>
							<input type="text" name="email"  class="feat col">
						</div>
						<div class="feat">
							<label class="feat col">password:</label>
							<input type="password" name="password" class="feat col">
						</div>
						<input type="submit" name="login_button" value="submit">

				</form>
			</div>
			<!-- Needs work-->
	<?php
include_once('include/footer.php');
?>
