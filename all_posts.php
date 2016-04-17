<?php
	include_once('php/config.php');
	define("PAGENAME","Latest Posts");
	include_once('include/header.php');


	$blog = new BLOG($conn);

	echo '<header class="big-header">
			<h1 class="no-margin">Your latest posts</h1>
	</header>';

	$blog->showBlog();


include_once('include/footer.php');
?>
