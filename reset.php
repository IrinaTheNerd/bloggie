<?php
	include_once('php/config.php');
  session_start();
// include_once ('include/session.php');
	$reset = new USER($conn);
	define("PAGENAME","Reset");
	include_once('include/header.php');

  if(isset($_POST['reset_password']))
  {
     $email = trim($_POST['email']);
     $password = trim($_POST['password']);
  	 $confirmed_password = trim($_POST['confirm_password']);
     $currentID = $_GET['key'];
     if($email=="") {
        $error[] = "Provide your email!";
     }
     else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = 'Please enter a valid email address!';
     }
     else if($password=="") {
        $error[] = "Provide a password!";
     }
     else if(strlen($password) < 6){
        $error[] = "Password must be atleast 6 characters";
     }
  	 else if ($password !== $confirmed_password){
  		 $error[] = 'Please check your passwords';
  	 }
  	 else if ($confirmed_password == ""){
  		 $error[] = 'Please check your passwords';
  	 }
     else
     {
        try
        {
           $query = $conn->prepare("SELECT userID FROM user WHERE email = :email");
           $query->execute(array(':email'=>$email));
           $row=$query->fetch(PDO::FETCH_ASSOC);
           $userID = hash('sha512', $row['userID']);


           if($userID !== $currentID) {
              $error[] = "I think you have the wrong email!";
           }
           else
           {
            if($reset->updateDetails($email,$password))
              {    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
  									//$user->redirect('dashboard.php?joined');
  								}


              }
           }
       }
       catch(PDOException $e)
       {
          echo $e->getMessage();
       }
    }
  }

?>

				<header class="big-header">
						<h1 class="no-margin">Vuala!</h1>
			</header>

			<div class="intro bottom-margin">
				<form method="post" class="inputs feat first">
					<div class="light-green">
						<h2>Confirm your new details</h2>
					</div>

          			<?php
          if(isset($error))
          {

          		foreach ($error as $value) {	?>
          			<div class="alert" >
          					Nooo <?php echo $value; ?>
          			</div>
          			<?php
          }
          }
          ?>
          <div class="feat">
            <label class="left col">Email:</label>
            <input type="text" name="email" placeholder="email" class="feat col">
          </div>

            <div class="feat">
              <label class="left col">Password:</label>
              <input type="password" name="password" placeholder="password" class="feat col">
            </div>
            <div class="feat">
              <label class="left col">Confirm Password:</label>
              <input type="password" name="confirm_password" placeholder="confirm password" class="feat col">
            </div>
						<input type="submit" name="reset_password" value="submit">

				</form>
			</div>
			<!-- Needs work-->
	<?php
include_once('include/footer.php');
?>
