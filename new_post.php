<?php
include_once('php/config.php');
//include_once('php/blog.php');
define("PAGENAME","Create New");
include_once('include/header.php');
$user = new USER($conn);
$blog = new BLOG($conn);
require_once("php/session.php");

if(!$user->loggedin())
{
	$user->redirect('login.php');
 //echo 'hi';
}
$userID = $_SESSION['user_session'];
$query = $conn->prepare("SELECT userID FROM user WHERE  email=:email");
$query->execute(array(':userID'=>$userID));
$result = $query->fetch(PDO::FETCH_ASSOC);
//$ask =  $conn->prepare("SELECT userID FROM user WHERE  email=:email");
//$result = $ask->fetch(PDO::FETCH_ASSOC);
echo $result;
//$final_query = $conn->prepare("INSERT INTO blogpost (userID) VALUES (userID=:userID)");
//$stmt->bindParam(':userID', $result);

/*if(isset($_POST['send_post']))
{

	 $title =  trim($_POST["heading"]);
	 $subtitle = trim($_POST['subtitle']);
	 $preview = trim($_POST['preview']);
	 $main_text = trim($_POST['main_text']);
	 if($title=="") {
			$error[] = "Please, write your title!";
	 }
	 else if($main_text=="") {
			$error[] = "Write your post!";
	 }
	 else if($preview=="") {
			$error[] = "Write your preview!";
	 }

	 else
	 {

	  try {
		  $query->fetch(PDO::FETCH_ASSOC);

			if ($blog->insert($title, $subtitle, $preview, $main_text)){
				 header('Location: index.php');
			}
		}
		catch (PDOException $e)
		{
			 echo $e->getMessage();
		}
 }
*/
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

										<div class="simple-editor">
						<h2>This is your main text :)</h2>
						<p></p>
				</div>
			</div>

					<input type="submit" name="send_post" class="feat create">
			</form>
	</main>


				<?php
				include_once('include/extra.php');
			include_once('include/footer.php');
			?>
