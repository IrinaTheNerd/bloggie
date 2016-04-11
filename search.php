<?php

  include_once("php/config.php");
  define("PAGENAME","Search Results");
//  include_once("include/header.php");
  $blog = new BLOG($conn);
	$blog->search();
  include_once("include/footer.php");
?>
