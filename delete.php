<?php

include_once('php/config.php');
define("PAGENAME","Delete");
include_once('include/header.php');
$user = new USER($conn);

$blogID = $_GET['ID'];

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
	$query = $conn->prepare("SELECT userID, title FROM blogpost WHERE blogID = :blogID");
	$query->execute(array(":blogID" => $blogID));
	$row=$query->fetch(PDO::FETCH_ASSOC);

	//if no results, display "Oh,no!"
	if($row == "") {
		echo "OH NO";
	}
	else{
		//setting variables
		$userIdent = $row['userID'];
		$title = $row['title'];
	}
	if(isset($_POST['delete'])){
		//if no errors are found, run update
		if($userID==$userIdent){
			$user->delete($blogID);
			$submitted[] = "Deleted! Now wasn't that easy?";
		}
	}

}

catch(PDOException $e)
{
	echo "Error: " . $e->getMessage();
}

/*
//when the post has been changed and the user clicks update
*/
?>

<?php
//but we also check if the user is the right user
if($userID==$userIdent) {?>
	<main>
		<div class="feat create">
			<h1 class="dashboard">Delete post "<?php echo $title ?>"</h1>

			<?php
			//show errors if there are any
			if(isset($error))
			{

				foreach ($error as $value) {	?>
					<div class="alert" >
						<p><?php echo $value ?></p>
					</div>
					<?php
				}
			}
			if(isset($submitted))
			{

				foreach ($submitted as $value) {	?>
					<div class="message" >
						<p><?php echo $value ?></p>
					</div>
					<?php
				}
			}
			?>
		</div>
		<form method="POST" class="auto inputs create">
			<input type="submit" value="Delete" class="feat create" name="delete">
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
