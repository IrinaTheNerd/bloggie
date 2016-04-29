<?php
include_once('config.php');
//I suck at PDO, my dev environment stopped supporting mySQLi andmySQL, following a tutorial
//tutorial from http://www.codingcage.com/2015/04/php-login-and-registration-script-with.html
class USER
{
  //constructs object and connection
  private $db;
  function __construct($conn)
  {
    $this->db = $conn;
  }
  //registration
  public function register($email, $password)
  {
    try {
      //php.net recommended method of salting and hashing passwords with bcrypt
      $pass  = password_hash($password, PASSWORD_DEFAULT); //hashing function for security
      //query = the object run db prepare the statement insert into user where values are
      $query = $this->db->prepare("INSERT INTO user (email, password) VALUES (:email, :password)");
      $query->bindParam(':email', $email);
      $query->bindParam(':password', $pass);
      //   tried to encorporate blogs too     $id = "SELECT userID FROM users WHERE :email=email  limit 1";
      //            $query->bindParam(':userID',$id);
      $query->execute(); //runs the statement
      return $query;
    }
    //catching exceptions
    catch (PDOException $e) {
      echo $e->getMessage();
    }
  }
  //login method
  public function login($email, $password)
  {
    try {
      //compare the email with inserted eemail
      $query = $this->db->prepare("SELECT * FROM user WHERE email=:email LIMIT 1");
      $query->execute(array(
        ':email' => $email
      ));
      //fetch all rows
      $row = $query->fetch(PDO::FETCH_ASSOC);
      //if  there are rows containing that email
      if ($query->rowCount() > 0) {
        //compare the passwords and verify them
        if (password_verify($password, $row['password'])) {
          //if correct - start a session
          $_SESSION['user_session'] = $row['userID'];
          return true;
        } else {
          return false;
        }
      }
    }
    catch (PDOException $e) {
      echo $e->getMessage();
    }
  }
  //      function checkUser($oauth_provider, $oauth_uid, $email, $gender, $locale)
  //    {
  /*      try {
  $firstQuery = $this->db->prepare("SELECT * FROM user WHERE oauth_provider=:oauth_provider LIMIT 1");
  $query->execute(array(
  ':email' => $email
));

if ($firstQuery->rowCount() > 0) {
$update = $this->db->prepare("UPDATE user SET oauth_provider = :oauth_provider, oauth_uid = :oauth_uid, email = :email, locale = :locale, modified = GETDATE() WHERE oauth_provider = :oauth_provider. AND oauth_uid = :oauth_uid");

} else {
// No rows returned!
$insert = $this->db->prepare("INSERT INTO user SET oauth_provider = :oauth_provider, oauth_uid = :oauth_uid, email = :email, locale = :locale, modified = GETDATE() WHERE oauth_provider = :oauth_provider. AND oauth_uid = :oauth_uid");

}
$query  = $this->db->prepare("SELECT * FROM user WHERE oauth_provider = :oauth_provider AND oauth_uid = :$oauth_uid");

$query->bindParam(':oauth_provider', $oauth_provider);
$query->bindParam(':oauth_uid', $oauth_uid);
$query->bindParam(':email', $email);
$query->bindParam(':locale', $locale);

$query->execute();
return $result;
}
catch (PDOException $e) {
echo $e->getMessage();
}*/
/*
if(!$fbuser){
$fbuser = null;
$loginUrl = $facebook->getLoginUrl(array('redirect_uri'=>$homeurl,'scope'=>$fbPermissions));
$output = '<a href="'.$loginUrl.'"><img src="images/fb_login.png"></a>';
}else{
$user_profile = $facebook->api('/me?fields=id,first_name,last_name,email,gender,locale,picture');

$user_data = $user->checkUser('facebook',$user_profile['id'],$user_profile['email'],$user_profile['locale']);
if(!empty($user_data)){
$output = '<h1>Facebook Profile Details </h1>';
$output .= '<br/>Facebook ID : ' . $user_data['oauth_uid'];
$output .= '<br/>Email : ' . $user_data['email'];
$output .= '<br/>Locale : ' . $user_data['locale'];
$output .= '<br/>You are login with : Facebook';
$output .= '<br/>Logout from <a href="logout.php?logout">Facebook</a>';
}
else
{
$output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
}
}
*/

//     }
//logged in method that sets the session
//if logged in the session is set to true
public function loggedin()
{
  if (isset($_SESSION['user_session'])) {
    return true;
  }
}
//redirect method
public function redirect($url)
{
  header("Location: $url");
}
//log out kills the session
public function logout()
{
  session_destroy();
  unset($_SESSION['user_session']);
  return true;
}
//only users can insert posts
//insert into blogs needs to be here, however  the user id should be recorder in the database
public function insertBlog($userID, $title, $subtitle, $preview, $main_text)
{
  try {
    $query = $this->db->prepare("INSERT INTO blogpost (userID, title, subtitle, preview, main_text)
    VALUES (:userID, :title, :subtitle, :preview, :main_text)");

    $query->bindParam(':userID', $userID);
    $query->bindParam(':title', $title);
    $query->bindParam(':subtitle', $subtitle);
    $query->bindParam(':main_text', $main_text);
    $query->bindParam(':preview', $preview);

    $query->execute();
    return $query;
  }

  catch (PDOException $e) {
    echo $e->getMessage();
  }

}
//select from blog but scoping to user only
public function ownPosts($userID)
{
  try {
    $query = $this->db->prepare("SELECT blogID, title, subtitle, preview FROM blogpost WHERE userID = :userID");
    $query->bindParam(':userID', $userID);
    $query->execute();
    $result=$query->fetchAll();

    foreach ($result as $row) {
      $key = $row['blogID'];
      echo "<div class='box bg middle'>";
      echo  "<h3>{$row['title']}</h3>";
      echo "<h4>{$row['subtitle']}</h4>";
      echo "<p>{$row['preview']}<br>";
      echo "<a href='edit?ID={$key}' class='read-more button'>Update</a></p>";
      echo "<a href='delete?ID={$key}' class='read-more button'>Delete Post</a></p>";
      echo "</div>";

    }
  }

  catch (PDOException $e) {
    echo $e->getMessage();
  }

}
//delete method
public function delete($blogID)
{
  try {
    $query = $this->db->prepare("DELETE FROM blogpost WHERE blogID = :blogID");
    $query->execute(array(":blogID"=>$blogID));
    return $query;
  }

  catch (PDOException $e) {
    echo $e->getMessage();
  }

}
//can't get this to work properly
/*
public function showOnePost(){
  try{

    $query = $conn->prepare("SELECT * FROM blogpost WHERE blogID = :blogID");
    $query->execute(array(':blogID' => $_GET['ID']));
    $row=$query->fetch();
    //echo ;

    $title = $row['title'];
    $subtitle = $row['subtitle'];
    $preview = $row['preview'];
    $main_text = $row['main_text'];
    $userID = $row['userID'];

  }
  catch(PDOException $e)
  {
    echo "Error: " . $e->getMessage();
  }
}
*/
public function update($blogID, $title, $subtitle, $preview, $main_text){
  try{

    $query = $this->db->prepare("UPDATE blogpost SET title=:title, subtitle=:subtitle, preview=:preview, main_text=:main_text WHERE blogID=:blogID");
    $query->bindParam(':title',$title);
    $query->bindParam(':blogID', $blogID);
    $query->bindParam(':subtitle',$subtitle);
    $query->bindParam(':preview', $preview);
    $query->bindParam(':main_text', $main_text);
    //var_dump($blogID, $title, $subtitle, $preview, $main_text);
    //var_dump("UPDATE blogpost SET title=:title WHERE blogID=:blogID");
    $query->execute();
    return $query;
    //echo ;
  }
  catch(PDOException $e)
  {
    echo "Error: " . $e->getMessage();
  }
}
//password recovery following http://www.phpgang.com/how-to-create-forget-password-form-in-php_381.html
//and adapting code from registration method
function passwordRecovery($email){
  try {
    $query = $this->db->prepare("SELECT * FROM user WHERE email=:email LIMIT 1");
    $query->execute(array(
      ':email' => $email
    ));
    $row = $query->fetch(PDO::FETCH_ASSOC);
    if ($query->rowCount() > 0) {
      $key = hash('sha512',$row['userID']);
      $to = $row['email'];
      $from = "Bloggie";
      $subject = "Your password";
      $url = "http://bloggie.irinapetrova.uk";
      $message = "Hello! So sorry to hear that you lost your password,
      <br> don't worry though, just follow the link below, to reset it!
      <br><a href='http://bloggie.irinapetrova.uk/reset?key={$key}&action=reset'>https://bloggie.irinapetrova.uk/reset.php?key={$key}&action=reset</a>
      ";
      $headers = "From: " . strip_tags($from) . "\r\n";
      $headers .= "Reply-To: ". strip_tags($from) . "\r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
      mail($to,$subject,$message,$headers);
    }
  }

  catch (PDOException $e) {
    echo $e->getMessage();
  }
}
//written without following tutorials :D
function updateDetails($email,$password){
  try {
    $query = $this->db->prepare("UPDATE user SET password = :password WHERE email = :email");
    $renewPass  = password_hash($password, PASSWORD_DEFAULT);
    $query->bindParam(':email', $email);
    $query->bindParam(':password', $renewPass);

    $query->execute();
    return $query;
  }

  catch (PDOException $e) {
    echo $e->getMessage();
  }
}
//tidying up reset
/*function resetVerify($email){
try
{
$query = $conn->prepare("SELECT userID FROM user WHERE email = :email");
$query->execute(array(':email'=>$email));
$row=$query->fetch(PDO::FETCH_ASSOC);
$userID = hash('sha512', $row['userID']);


}
catch(PDOException $e)
{
echo $e->getMessage();
}
}*/
}
?>
