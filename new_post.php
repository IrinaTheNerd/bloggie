<?php
include_once('php/config.php');
define("PAGENAME","Create New");
include_once('include/header.php');
$user = new USER($conn);
require_once("php/session.php");

if(!$user->loggedin())
{
	$user->redirect('login.php');
 //echo 'hi';
}
$userID = $_SESSION['user_session'];
$stmt = $conn->prepare("SELECT * FROM users WHERE userID=:userID");
$stmt->execute(array(":userID"=>$userID));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);


?>

		<main>
				<div class="feat create">
					<h1 class="dashboard">Create a new post</h1>

					<div class="dashboard">
						<h2>This will be posted to Bloggie. So, just follow our structure and you'll be awesome!</h2>
						<h3>There are four sections to this. Title, subtitle, preview and main text. We employ a simple WYSIWYG editor.</h3>
					</div>
				</div>


			<form action="include/functions/insert.php" method="POST" class="auto inputs create">

						<div class="margins create">
							<div class="explain">
								<label>Title:</label>
							</div>
							<div>
							<small>Your title should contain the essence of your topic</small>
									<input type="text" name="heading">
							</div>
						</div>

						<div class="margins create">
							<div class="explain">
								<label>Subitle:</label>
							</div>
							<div>
							<small>This is a the question you're answering in your post</small>
									<input type="text" name="subtitle">
							</div>
						</div>
						<div class="margins create">
							<div class="explain">
								<label>Summary:</label>
							</div>
							<div>
							<small>Make sure that most important information is on top of the page, it's valuable and consice</small>
									<textarea name="preview"></textarea>

								</div>
							</div>
								<div class="margins create">
								<div class="explain">
								<label>Main Text:</label>
							</div>
							<div>
							<small>Make sure that most important information is on top of the page, it's valuable and consice</small>
									
										<div class="simple-editor">
						<h2>This is your main text :)</h2>
						<p></p>
				</div>
			</div>

					<input type="submit" class="feat create">
			</form>
	</main>


				<?php
				include_once('include/extra.php');
			include_once('include/footer.php');
			?>
