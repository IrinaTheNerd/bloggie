<?php

include_once('php/config.php');
define("PAGENAME","Update");
include_once('include/header.php');
$user = new USER($conn);



if(!$user->loggedin())
{
	$user->redirect('login');

}

$userID = $_SESSION['user_session'];
$stmt = $conn->prepare("SELECT * FROM user WHERE userID=:userID");
$stmt->execute(array(":userID"=>$userID));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
//not tidied up
try{
	//runs a query depending on the id of the post
	$query = $conn->prepare("SELECT * FROM blogpost WHERE blogID = :blogID");
	$query->execute(array(':blogID' => $_GET['ID']));
	$row=$query->fetch();
	//echo ;
	if($row == "") {
		echo "OH NO";
	}
	else{
$title = $row['title'];
$subtitle = $row['subtitle'];
$preview = $row['preview'];
$main_text = $row['main_text'];
$userIdent = $row['userID'];
}

}
catch(PDOException $e)
{
	echo "Error: " . $e->getMessage();
}
//when the post has been changed and the user clicks update
if(isset($_POST['update'])) {

	$blogID = $_GET['ID'];
	$title = trim($_POST['title']);
	$subtitle = trim($_POST['subtitle']);
	$preview = trim($_POST['preview']);
	$main_text = trim($_POST['main_text']);
	//check for errors
	if($title == ""){
		$error[] = "Oh no! You need a title for your post!";
	}
	else if($subtitle == ""){
		$error[] = "Oh no! You need a subtitle for your post!";
	}
	else if($preview== ""){
		$error[] = "Oh no! What's your extract?";
	}
	else if($main_text== ""){
		$error[] = "Oh no! C'mon, you need to write your post! This is a blog, afterall!";
	}
	else {
		//if no errors are found, run update
		$user->update($blogID, $title, $subtitle, $preview, $main_text);
		$submitted[] = "Updated! Now wasn't that easy?";
	}
}
?>

<?php
//but we also check if the user is the right user
if($userID==$userIdent) {?>
<main>
	<div class="feat create">
		<h1 class="dashboard">Update new post</h1>


		<div class="dashboard">
			<h2>This will be posted to Bloggie. So, just follow our structure and you'll be awesome!</h2>

		</div>
		<?php
		//show errors if there are any
		if(isset($error))
		{

			foreach ($error as $value) {	?>
				<div class="alert" >
					<p><?php echo $value; ?></p>
				</div>
				<?php
			}
		}
		if(isset($submitted))
		{

			foreach ($submitted as $value) {	?>
				<div class="message" >
				<p>	<?php echo $value; ?></p>
				</div>
				<?php
			}
		}
		?>
	</div>
	<form method="POST" id="new_post" class="auto inputs create">

		<div class="margins create">
			<div class="explain">
				<label for="heading">Title:</label>
			</div>
			<div>
				<input type="text" value="<?php echo $title;?>" id="heading" maxlength="50" name="title">
			</div>
		</div>

		<div class="margins create">
			<div class="explain">
				<label for="subtitle">Subitle:</label>
			</div>
			<div>
				<input type="text" id="subtitle" value="<?php echo $subtitle ?>"name="subtitle">
			</div>
		</div>
		<div class="margins create">
			<div class="explain">
				<label for="preview">Summary:</label>
			</div>
			<div>
			<textarea name="preview" id="preview"><?php echo $preview ?></textarea>

			</div>
		</div>
		<div class="margins create">
			<div class="explain">
				<label for="main_text">Main Text:</label>
			</div>
			<div>
				<!-- .simple-editor calls for Trumbowyg to do it's magic -->
				<textarea name="main_text" id="main_text" class="simple-editor"><?php echo $main_text ?></textarea>
			</div>
		</div>

		<input type="submit" name="update" class="feat create">
	</form>
</main>
<?php
//if the user isn't the right one, display error
 } else {?>
		<div class="alert">
			Hey, you're trying to access someone else's account!
		</div>
	<?php } ?>

<?php
include_once('include/extra.php');
include_once('include/footer.php');
?>
