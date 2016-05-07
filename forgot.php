<?php
	include_once('php/config.php');

	$user = new USER($conn);
	define("PAGENAME","Request New Password");
	include_once('include/header.php');

	//if the request input clicked
	if(isset($_POST['send_password']))
	{
		//check if the email is a proper email
		$email = $_POST['email'];
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			//run the query
					$user->passwordRecovery($email);
					$message = "If your email is valid, we will send you a message. Please check your spam folder too!";
			}
	}



?>

				<header class="big-header">
						<h1 class="no-margin">Forgot your password?</h1>
			</header>

			<div class="intro bottom-margin">
				<form method="post" class="inputs feat first">
					<div class="light-green">
						<h2>Just fill in your email</h2>
					</div>
								<?php
								//feedback
			            if(isset($message))
			            {
			                  ?>
			                  <div class="message">
			                      <strong> <?php echo $message; ?> </strong>
			                  </div>
			                  <?php
			            }
			            ?>
				 <!-- removed social login -->

						<div class="feat">
							<label for="email" class="left col">Email:</label>
							<input type="text" maxlength="50" id="email" placeholder="email"  required name="email"  class="feat col">
						</div>
						<input type="submit" name="send_password" value="submit">

				</form>
			</div>
			<!-- Needs work-->
	<?php
include_once('include/footer.php');
?>
