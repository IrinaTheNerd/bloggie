<?php
	include_once('config.php');
//I suck at PDO, my dev environment stopped supporting mySQLi andmySQL, following a tutorial
//tutorial from http://www.codingcage.com/2015/04/php-login-and-registration-script-with.html
class USER
{
    private $db;
    function __construct($conn)
    {
      $this->db =$conn;
    }
  public function register($email,$password){
    try {
      $pass = password_hash($password, PASSWORD_DEFAULT); //hashing function for security
			// LEFT JOIN userblog ON users.userID = userblog.userID
      $query = $this->db->prepare("INSERT INTO user (email, password)
      VALUES (:email, :password)");
      $query->bindParam(':email',$email);
      $query->bindParam(':password',$pass);
	//		$id = "SELECT userID FROM users WHERE :email=email  limit 1";
//			$query->bindParam(':userID',$id);
      $query->execute(); //runs the statement
      return $query;
    }
    catch(PDOException $e)
      {
          echo $e->getMessage();
      }
  }
  public function login($email,$password){
    try {
      $query = $this->db->prepare("SELECT * FROM user WHERE email=:email LIMIT 1");
      $query->execute(array(':email'=>$email));
      $row=$query->fetch(PDO::FETCH_ASSOC);
      if($query->rowCount() > 0){
        if(password_verify($password, $row['password'])) {
          $_SESSION['user_session'] = $row['userID'];
          return true;
        }
        else {
          return false;
        }
      }
    }
    catch(PDOException $e)
      {
          echo $e->getMessage();
      }
  }
public function loggedin() {
  if(isset($_SESSION['user_session'])){
    return true;
  }
}
public function redirect($url)
{
  header("Location: $url");
}
public function logout()
     {
          session_destroy();
          unset($_SESSION['user_session']);
          return true;
     }
   //only users can insert posts
 public function insertBlog($userID, $title, $subtitle, $preview, $main_text){
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

				catch(PDOException $e)
					{
							echo $e->getMessage();
					}

			}


}
?>
