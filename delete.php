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
foreach ($row as $row){
$title = $row['title'];
$subtitle = $row['subtitle'];
$preview = $row['preview'];
$main_text = $row['main_text'];
$userIdent = $row['userID'];
}
	$blogID = $_GET['ID'];
		//if no errors are found, run update
		$user->delete($blogID);
		$submitted[] = "Deleted! Now wasn't that easy?";
}

}
catch(PDOException $e)
{
	echo "Error: " . $e->getMessage();
}
//when the post has been changed and the user clicks update

?>

<?php
//but we also check if the user is the right user
if($userID==$userIdent) {?>
<main>
	<div class="feat create">
		<h1 class="dashboard">Deleted post <?php echo $title; ?></h1>

		<?php
		//show errors if there are any
		if(isset($error))
		{

			foreach ($error as $value) {	?>
				<div class="alert" >
					<?php echo $value; ?>
				</div>
				<?php
			}
		}
		if(isset($submitted))
		{

			foreach ($submitted as $value) {	?>
				<div class="message" >
					<p><?php echo $value; ?></p>
				</div>
				<?php
			}
		}
		?>
	</div>

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
