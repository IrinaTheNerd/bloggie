<?php
$session = new USER($conn);
?>
<!Doctype html>
	<html lang="en">
		<head>
			<!-- favicons -->
			<!--general browser -->
			<link href="img/favicon.ico" rel="icon" type="image/x-icon">
			<!--Specific for each device -->
			<link href="img/favicon_opera.png" rel="icon" type="image/png">
			<link href="img/ipad.png" rel="apple-touch-icon-precomposed" sizes="72x72" type="image/png">
			<link href="img/retina.png" rel="apple-touch-icon-precomposed" sizes="114x114" type="image/png">
			<link href="img/iphone.png" rel="apple-touch-icon-precomposed" sizes="57x57" type="image/png">


			<!-- allows for defines to work their magic :)  -->
			<title><?php echo SITENAME . ' - '. PAGENAME;?> </title>


			<link href="css/import.css" rel="stylesheet" type="text/css">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<!-- meta tags for SEO-->
			<meta name="description" content="Bloggie, content oriented blogging platform">
			<meta http-equiv="content-type" content="text/html;charset=UTF-8">

		</head>
		<body>
			<!-- Navigation -->

				<?php if(!$session->loggedin()){ ?>
				<nav>
				<div class="first">
					<a href="index"><img src="img/logo-small.png" alt="logo, or get back to the index page" class="logo" width="100" height="77"></a>
					<!-- only shows up on a mobile device: tablet or a phone -->
					<span class="icon-search responsive hidden"></span>
				</div>

				<div class="middle">
					<a href="all_posts">latest blogs</a>
				</div>
				<div class="middle">
					<a href="login">login</a>
				</div>
				<div class="middle">
					<a href="register" class="button">register</a>

				</div>
				<!-- Search Bar -->
				<form class="last" action="search.php" method="get">
					<label class="hidden" for="search">Search</label>
					<input placeholder="Search for blog posts" type="search" name="search" id="search">
					<input type="submit" name="search_input" value="submit">
				</form>
				<?php }
				else {?>
				<nav id="logged">
					<div class="new-nav">
						<a href="index"><img src="img/logo-small.png" alt="logo, or get back to the index page" class="logo" width="100" height="77"></a>
						<!-- only shows up on a mobile device: tablet or a phone -->
						<span class="icon-search responsive hidden"></span>
					</div>
					<div class="middle">
						<a href="all_posts">all posts</a>
					</div>
					<div class="middle">
						<a href="dashboard">dashboard</a>
					</div>
					<div class="middle">
						<a href="logout.php?logout=true">log out</a>
					</div>
					<div class="middle">
						<a href="tips">tips</a>
					</div>
					<div class="middle cta">
						<a href="new_post" class="button">new post</a>
					</div>
					<!-- Search Bar -->
					<form class="logged-search" action="search.php" method="get">
						<label class="hidden" for="search">Search</label>
						<input placeholder="Search for blog posts" type="search" name="search" id="search">
						<input type="submit" name="search_input" value="submit">
					</form>
					<?php } ?>

			</nav>
