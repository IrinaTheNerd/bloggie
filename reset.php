<?php
  //merge between registration method, online tutorial and previous code
	include_once('php/config.php');
  session_start();
	$reset = new USER($conn);
	define("PAGENAME","Reset");
	include_once('include/header.php');
//once form is submitted php is going to ...
  if(isset($_POST['reset_password']))
  {
    //trim email and passwords
     $email = trim($_POST['email']);
     $password = trim($_POST['password']);
  	 $confirmed_password = trim($_POST['confirm_password']);
     $currentID = $_GET['key']; //get the key from the url
     //print out error messages if information isn't filled correctly
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
     {//if details are filled properly then run another query
        try
        {
           $query = $conn->prepare("SELECT userID FROM user WHERE email = :email");
           $query->execute(array(':email'=>$email)); //checks if there is an array of results
           $row=$query->fetch(PDO::FETCH_ASSOC); //fetches the results
           $userID = hash('sha512', $row['userID']); //encrypt the id


           if($userID !== $currentID) { //if the current id != to the id from the db
              $error[] = "I think you have the wrong email!";
           }
           else
           {//run the update method
            if($reset->updateDetails($email,$password))
              {    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $reset->login($email, $password);
  									$reset->redirect('login.php');
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
            <label for="email" class="left col">Email:</label>
            <input type="text" id="email" name="email" placeholder="email" class="feat col">
          </div>

            <div class="feat">
              <label for="password" class="left col">Password:</label>
              <input type="password" id="password" name="password" placeholder="password" class="feat col">
            </div>
            <div class="feat">
              <label for="confirm_password" class="left col">Confirm Password:</label>
              <input type="password"  id="confirm_password" name="confirm_password" placeholder="confirm password" class="feat col">
            </div>
						<input type="submit" name="reset_password" value="submit">

				</form>
			</div>
			<!-- Needs work-->
	<?php
include_once('include/footer.php');
?>
