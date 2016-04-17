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
							<label  class="left col">Email:</label>
							<input type="text" maxlength="50" placeholder="email" name="email"  class="feat col">
						</div>
						<input type="submit" name="send_password" value="submit">

				</form>
			</div>
			<!-- Needs work-->
	<?php
include_once('include/footer.php');
?>
