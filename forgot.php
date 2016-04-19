<?php
	include_once('php/config.php');

	$user = new USER($conn);
	define("PAGENAME","Request new Password");
	include_once('include/header.php');


	if(isset($_POST['send_password']))
	{
		$email = $_POST['email'];
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$user->passwordRecovery($email);
					$message = "If your email is valid, we will send you a message. Please check your spam folder too!";
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
							<input type="text" maxlength="50" id="email" placeholder="email" name="email"  class="feat col">
						</div>
						<input type="submit" name="send_password" value="submit">

				</form>
			</div>
			<!-- Needs work-->
	<?php
include_once('include/footer.php');
?>
