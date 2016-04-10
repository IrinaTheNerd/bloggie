<?php

	include_once('config.php');
//based on the previous class and procedural code
class BLOG
{
    private $db;

    function __construct($conn)
    {
      $this->db =$conn;
    }
			public function showBlog() {
				try {
		echo "<div class='post'>
								<div class='feat span_10_of_12'>";
		    $query = $this->db->prepare("SELECT blogID, title, subtitle, preview FROM blogpost");
		    $query->execute();
		    $result=$query->fetchAll();

		        $showOne = $this->db->prepare("SELECT blogID, title, subtitle, preview, main_text FROM blogpost");
		     	$showOne->execute();
		     	$singlePost=$showOne->fetch();
		    foreach($result as $row){

		    	echo "<div class='box bg middle'>";
		    	echo  "<h3>{$row['title']}</h3>";
		    	echo "<h4>{$row['subtitle']}</h4>";
		    	echo $row['preview'];
		    	echo "<a href='view.php?ID={$row['blogID']}'>Read More</a>";
		    	echo "<div class='social-buttons'><div id='fb-root'></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = '//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5&appId=1594490410869816';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class='fb-like' data-href='https://developers.facebook.com/docs/plugins/' data-layout='button' data-action='like' data-show-faces='true' data-share='true'></div>
	<a href='https://twitter.com/share' class='twitter-share-button' data-via='irinathenerd' data-hashtags='bloggie'>Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<!-- Place this tag in your head or just before your close body tag. -->
<script src='https://apis.google.com/js/platform.js' async defer></script>

<!-- Place this tag where you want the share button to render. -->
<div class='g-plus' data-action='share'></div>";
		    	echo "</div></div>";
		    }

		    echo "</div></div>";

		    }
		catch(PDOException $e)
		    {
		    echo "Error: " . $e->getMessage();
		    }

		}
		public function showOne(){
			try{

				 $query = $this->db->prepare('SELECT blogID, title, subtitle, preview, main_text FROM blogpost WHERE blogID = :blogID');
				 $query->execute(array(':blogID' => $_GET['ID']));
				 $row=$query->fetch();
				 //echo ;
				 if($row == "") {
					 echo "OH NO";
				 }
		 echo "<div class='post'>";
	 echo "<div class='box bg middle'>";
				 echo  "<h3>{$row['title']}</h3>";
				 echo "<h4>{$row['subtitle']}</h4>";
				 echo $row['preview'];
				 echo $row['main_text'];
			 echo "</div></div>";
			}
			catch(PDOException $e)
					{
					echo "Error: " . $e->getMessage();
					}
		}
		public function search(){
			try
			 {
				 $name="%".$_GET["search"]."%";
				   $stmt =  $this->db->prepare("SELECT title, subtitle, preview FROM blogpost where title LIKE :name");
				   $stmt->execute(array(':name' => '%'$name'%');
				   $result = $stmt->fetchAll();

			  if( ! $result)
			  {
			   print('No Records Found');
			  }
			  else
			  {
			   echo "<section>";
			   foreach($result as $row)
			   {

			     echo "<div class='box bg middle'>";
			     echo  "<h3>{$row['title']}</h3>";
			     echo "<h4>{$row['subtitle']}</h4>";
			     echo $row['preview'];
			     echo "<a href='view.php?ID={$row['blogID']}'>Read More</a>";
			     echo "<div class='social-buttons'><div id='fb-root'></div>
			 <script>(function(d, s, id) {
			 var js, fjs = d.getElementsByTagName(s)[0];
			 if (d.getElementById(id)) return;
			 js = d.createElement(s); js.id = id;
			 js.src = '//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5&appId=1594490410869816';
			 fjs.parentNode.insertBefore(js, fjs);
			 }(document, 'script', 'facebook-jssdk'));</script>

			 <div class='fb-like' data-href='https://developers.facebook.com/docs/plugins/' data-layout='button' data-action='like' data-show-faces='true' data-share='true'></div>
			 <a href='https://twitter.com/share' class='twitter-share-button' data-via='irinathenerd' data-hashtags='bloggie'>Tweet</a>
			 <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
			 <!-- Place this tag in your head or just before your close body tag. -->
			 <script src='https://apis.google.com/js/platform.js' async defer></script>

			 <!-- Place this tag where you want the share button to render. -->
			 <div class='g-plus' data-action='share'></div>";
			     echo "</div></div>";

			   }
			   echo "</section>";
			  }
			 }
			 catch(PDOException $e)
			 {
			  echo "Error: " . $e->getMessage();
			 }
		}

}

?>
