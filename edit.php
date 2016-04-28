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
try{

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

}

}
catch(PDOException $e)
{
	echo "Error: " . $e->getMessage();
}
if(isset($_POST['update'])) {
	$blogID = $_GET['ID'];
	$title = trim($_POST['title']);
	$subtitle = trim($_POST['subtitle']);
	$preview = trim($_POST['preview']);
	$main_text = trim($_POST['main_text']);

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
		$user->update($blogID, $title, $subtitle, $preview, $main_text);
	//	var_dump($blogID, $title, $subtitle, $preview, $main_text);
	}
}
?>

<main>
	<div class="feat create">
		<h1 class="dashboard">Update new post</h1>


		<div class="dashboard">
			<h2>This will be posted to Bloggie. So, just follow our structure and you'll be awesome!</h2>

		</div>
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
				<small>This is a the question you're answering in your post</small>
				<input type="text" id="subtitle" value="<?php echo $subtitle ?>"name="subtitle">
			</div>
		</div>
		<div class="margins create">
			<div class="explain">
				<label for="preview">Summary:</label>
			</div>
			<div>
				<small>Make sure that most important information is on top of the page, it's valuable and consice</small>
				<textarea name="preview" id="preview"><?php echo $preview ?></textarea>

			</div>
		</div>
		<div class="margins create">
			<div class="explain">
				<label for="main_text">Main Text:</label>
			</div>
			<div>
				<small>Make sure that most important information is on top of the page, it's valuable and consice</small>
				<!-- .simple-editor calls for Trumbowyg to do it's magic -->
				<textarea name="main_text" id="main_text" class="simple-editor"><?php echo $main_text ?></textarea>
			</div>
		</div>

		<input type="submit" name="update" class="feat create">
	</form>
</main>


<?php
include_once('include/extra.php');
include_once('include/footer.php');
?>
