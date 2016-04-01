
<?php
	include_once('php/config.php');
	define("PAGENAME","Latest Posts");
	include_once('include/header.php');
	

     
     	$stmt = $conn->prepare('SELECT blogID, title, subtitle, preview, main_text FROM blogpost WHERE blogID = :blogID');
    	$stmt->execute(array(':blogID' => $_GET['ID']));
    	$row=$stmt->fetch();
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
?>
	<?php
include_once('include/footer.php');
?>