<?php
	include_once('php/config.php');
	define("PAGENAME","Latest Posts");
	include_once('include/header.php');
	//creates a new object from the class

	$blog = new BLOG($conn);
	//prints the header
	echo '<header class="big-header">
			<h1 class="no-margin">All the latest posts</h1>
	</header>';
	//calls to showBlog
	$blog->showBlog();


include_once('include/footer.php');
?>
