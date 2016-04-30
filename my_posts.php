<?php
include_once('php/config.php');

define("PAGENAME","My Posts");
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
		<h1 class="dashboard">Here are your posts,
			<?php echo $userRow['email']; ?>!</h1>

		</div>
	</header>
	<!--Dashboard options -->
	<div class="post">
		<?php
		$user->ownPosts($userID);
		?>
	</div>
	<?php
	include_once('include/footer.php');
	?>
