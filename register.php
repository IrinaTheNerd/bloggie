<?php
include_once('php/config.php');
define("PAGENAME","Register");
include_once('/include/header.php');

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
			<section class="bottom-margin span_12_of_12">
				<form action="include/functions/reg.php" method="POST" class="inputs feat span_4_of_12">
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
							<input type="text" name="username"  class="feat span_12_of_12">
						</div>
						<div class="feat span_12_of_12">
							<label class="feat span_12_of_12">password:</label>
							<input type="password" name="password" class="feat span_12_of_12">
						</div>
						<input type="submit" value="submit" onclick="window.location='/login.html';">
					</legend>
				</form>
			</section>
	<?php
include_once('include/footer.php');
?>