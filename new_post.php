<?php
include_once('php/config.php');
define("PAGENAME","Create New");
include_once('include/header.php');
$user = new USER($conn);
require_once("php/session.php");


if(!$user->loggedin())
{
	$user->redirect('login.php');

}

$userID = $_SESSION['user_session'];
$stmt = $conn->prepare("SELECT * FROM user WHERE userID=:userID");
$stmt->execute(array(":userID"=>$userID));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);



if(isset($_POST['send_post']))
{
   $title = trim($_POST['title']);
   $subtitle = trim($_POST['subtitle']);
   $preview = trim($_POST['preview']);
   $main_text = trim($_POST['main_text']);

/*	 if($title == ""){
		 echo "<div class='warning'>Oh no! You need a title for your post!</div>";
	 }
	 else if($subtitle == ""){
		 echo "<div class='warning'>Oh no! You need a subtitle for your post!</div>";
	 }
	else if($preview==""){
		 echo "<div class='warning'>Oh no! What's your etract?</div>";
	 }
	 else if($main_text==""){
		 echo "<div class='warning'>Oh no! C'mon, you need to write your post! This is a blog, afterall!</div>";
	 }
	 else {*/
		 if($user->insertBlog($userID, $title, $subtitle, $preview, $main_text))
		 {
 		 		$user->redirect('all_posts.php');
		 }

//	 }
     }

     ?>

		<main>
				<div class="feat create">
					<h1 class="dashboard">Create a new post</h1>

					<div class="dashboard">
						<h2>This will be posted to Bloggie. So, just follow our structure and you'll be awesome!</h2>
						<h3>There are four sections to this. Title, subtitle, preview and main text. We employ a simple WYSIWYG editor.</h3>
					</div>
				</div>


			<form method="POST" id="new_post" class="auto inputs create">

						<div class="margins create">
							<div class="explain">
								<label>Title:</label>
							</div>
							<div>
							<small>Your title should contain the essence of your topic</small>
									<input type="text"  maxlength="50" name="heading">
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

							<textarea name="main_text" class="simple-editor"></textarea>
				</div>
			</div>

					<input type="submit" name="send_post" class="feat create">
			</form>
	</main>


				<?php
				include_once('include/extra.php');
			include_once('include/footer.php');
			?>
