
<?php
//awesome page that runs php methods
	include_once('php/config.php');
	define("PAGENAME","Latest Posts");
	include_once('include/header.php');
	//creates an object
	$blog = new BLOG($conn);
	//shows only one post
	$blog->showOne();

include_once('include/footer.php');
?>
