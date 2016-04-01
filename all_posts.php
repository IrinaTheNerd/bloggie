<?php
	include_once('php/config.php');
	define("PAGENAME","Latest Posts");
	include_once('include/header.php');


	$blog = new BLOG($conn);
	$blog->showBlog();


?>
	<?php
include_once('include/footer.php');
?>
