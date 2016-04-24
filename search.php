<?php

  include_once("php/config.php");
  define("PAGENAME","Search Results");
  include_once("include/header.php");
  $blog = new BLOG($conn); //new object
	$blog->search(); //searching from the class method
  include_once("include/footer.php");
?>
