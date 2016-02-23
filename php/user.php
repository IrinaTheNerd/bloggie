<?php

	include_once('php/config.php');
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
      $query = $this->db->prepare("INSERT INTO users (email, password)
      VALUES (:email, :password)");
      $query->bindParam(':email',$email);
      $query->bindParam(':password',$pass);
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
      $query = $this->db->prepare("SELECT * FROM users WHERE email=:email LIMIT 1");
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

}

?>
