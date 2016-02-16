<?php
include_once('php/config.php');

define("PAGENAME","dashboard");
include_once('include/header.php');
$user = new USER($conn);
require_once("include/session.php");

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
						<h1 class="dashboard">Hello, Username!</h1>

						<div class="dashboard">
							<h2>Create catching content with a press of a button, take advantage of our guides to help you write and plan your content, delivery and further strategy. Keep in touch with other writers, share your opinions and add to our knowledge base.</h2>
							<h3><a href="logout.php?logout=true">&nbsp;Sign Out</a></h3>
						</div>
					</div>
				</header>
				<div class="feat dashboard">
					<a href="new_post.php" class="col box board span_6_of_12">
						<div class="tile col span_5_of_12">
							<span class="icon-doc-new-circled"></span>
						</div>
						<div class="tile col span_7_of_12">
							<h3>Write new..</h3>
						</div>
					</a>
				<a href="#" class="col box board span_6_of_12">
					<div class="tile col span_5_of_12">
						<span class="icon-help-circled"></span>
					</div>
					<div class="tile col span_7_of_12">
						<h3>Tips</h3>
					</div>
				</a>
			</div>
			<div class="feat dashboard">
				<a href="mailto:hello@irinapetrova.uk" class="col box board span_6_of_12">
					<div class="tile col span_5_of_12">
						<span class="icon-mail"></span>
					</div>
					<div class="tile col span_7_of_12">
						<h3>Support</h3>
					</div>
				</a>
			<a href="all_posts.html" class="col box board span_6_of_12">
					<div class="tile col span_5_of_12">
						<span class="icon-book"></span>
					</div>
						<div class="tile col span_7_of_12">
						<h3>View all posts</h3>
					</div>
				</a>
			</div>
	<?php
include_once('include/footer.php');
?>
