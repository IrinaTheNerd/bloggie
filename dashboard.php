<?php
include_once('php/config.php');

define("PAGENAME","Dashboard");
include_once('include/header.php');
//creates an object
$user = new USER($conn);
require_once("php/session.php");
//checks whether the session has been started
if(!$user->loggedin())
{//if not, redirects to login.php
	$user->redirect('login.php');
}
//session == userID
$userID = $_SESSION['user_session'];
//will be used to implement proper user profiles in the future
$stmt = $conn->prepare("SELECT * FROM user WHERE userID=:userID");
$stmt->execute(array(":userID"=>$userID));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC)
?>

<header>
	<div class="feat">
		<h1 class="dashboard">Hello,
			<?php echo $userRow['email']; ?>!</h1>

			<div class="dashboard">
				<h2>Create catching content with a press of a button, take advantage of our guides to help you write and plan your content, delivery and further strategy. Keep in touch with other writers, share your opinions and add to our knowledge base.</h2>


			</div>
		</div>
	</header>
	<!--Dashboard options -->
	<div class="feat dashboard">
		<a href="new_post" class="box board">
			<div class="tile">
				<span class="icon-doc-add" aria-hidden="true"></span>
				<span class="access">Create new post</span>
			</div>
			<div class="tile">
				<h3>Write new...</h3>
			</div>
		</a>
		<a href="my_posts" class="box board">
			<div class="tile">
				<span class="icon-th-list" aria-hidden="true"></span>
				<span class="access">View your posts</span>
			</div>
			<div class="tile">
				<h3>View your posts</h3>
			</div>
		</a>
	</div>
	<div class="feat dashboard">
		<a href="mailto:hello@irinapetrova.uk" class="box board">
			<div class="tile">
				<span class="icon-mail-alt" aria-hidden="true"></span>
				<span class="access">Email support directly</span>
			</div>
			<div class="tile">
				<h3>Support</h3>
			</div>
		</a>
	<!-- this is currently out of scope, however it still links to a useful article about writing -->
		<a href="tips" target="_blank" class="box board">
			<div class="tile">
				<span class="icon-help-circled" aria-hidden="true"></span>
				<span class="access">Tips and Tricks</span>
			</div>
			<div class="tile">
				<h3>Tips</h3>
			</div>
		</a>
	</div>
	<?php
	include_once('include/footer.php');
	?>
