<?php
include_once('php/config.php');

define("PAGENAME","dashboard");
include_once('include/header.php');

//
//require_once("include/session.php");
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

				<header>
					<div class="feat">
						<h1 class="dashboard">Hello,
						Web Traveller!</h1>

						<div class="dashboard">
							<h2>Create catching content with a press of a button, take advantage of our guides to help you write and plan your content, delivery and further strategy. Keep in touch with other writers, share your opinions and add to our knowledge base.</h2>

									<h3><a href="logout.php?logout=true">&nbsp;Sign Out</a></h3>


						</div>
					</div>
				</header>
				<div class="feat dashboard">
					<a href="new_post.php" class="box board">
						<div class="tile">
							<span class="icon-doc-new-circled"></span>
						</div>
						<div class="tile">
							<h3>Write new..</h3>
						</div>
					</a>
				<a href="#" class="box board">
					<div class="tile">
						<span class="icon-help-circled"></span>
					</div>
					<div class="tile">
						<h3>Tips</h3>
					</div>
				</a>
			</div>
			<div class="feat dashboard">
				<a href="mailto:hello@irinapetrova.uk" class="box board">
					<div class="tile">
						<span class="icon-mail"></span>
					</div>
					<div class="tile">
						<h3>Support</h3>
					</div>
				</a>
			<a href="all_posts.html" class="box board">
					<div class="tile">
						<span class="icon-book"></span>
					</div>
						<div class="tile">
						<h3>View all posts</h3>
					</div>
				</a>
			</div>
	<?php
include_once('include/footer.php');
?>
