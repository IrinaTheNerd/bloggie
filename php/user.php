<?php
include_once('config.php');
//I suck at PDO, my dev environment stopped supporting mySQLi andmySQL, following a tutorial
//tutorial from http://www.codingcage.com/2015/04/php-login-and-registration-script-with.html
class USER
{
                private $db;
                function __construct($conn)
                {
                                $this->db = $conn;
                }
                public function register($email, $password)
                {
                                try {
                                                $pass  = password_hash($password, PASSWORD_DEFAULT); //hashing function for security
                                            
                                                // LEFT JOIN userblog ON users.userID = userblog.userID was a bad idea, so made another function
                                                $query = $this->db->prepare("INSERT INTO user (email, password)
      VALUES (:email, :password)");
                                                $query->bindParam(':email', $email);
                                                $query->bindParam(':password', $pass);
                                                //        $id = "SELECT userID FROM users WHERE :email=email  limit 1";
                                                //            $query->bindParam(':userID',$id);
                                                $query->execute(); //runs the statement
                                                return $query;
                                }
                                catch (PDOException $e) {
                                                echo $e->getMessage();
                                }
                }
                public function login($email, $password)
                {
                                try {
                                                $query = $this->db->prepare("SELECT * FROM user WHERE email=:email LIMIT 1");
                                                $query->execute(array(
                                                                ':email' => $email
                                                ));
                                                $row = $query->fetch(PDO::FETCH_ASSOC);
                                                if ($query->rowCount() > 0) {
                                                                if (password_verify($password, $row['password'])) {
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
                public function loggedin()
                {
                                if (isset($_SESSION['user_session'])) {
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


}
?>
