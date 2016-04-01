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
		    	echo "</div>";
		    }

		    echo "</div></div>";

		    }
		catch(PDOException $e)
		    {
		    echo "Error: " . $e->getMessage();
		    }

					}
		}

?>
