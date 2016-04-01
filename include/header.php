<!Doctype html>
	<html lang="en">
		<head>
			<title><?php echo SITENAME . ' - '. PAGENAME;?> </title>

		
			<link href="css/import.css" rel="stylesheet" type="text/css">
			<meta name="viewport" content="width=device-width, initial-scale=1">
	
		</head>
		<body>
			<nav>
				<div class="first">
					<a href="index.php"><img src="img/logo-small.png" alt="logo, or get back to the index page" class="logo"></a>
				</div>
				<div class="middle">
					<a href="all_posts.php">latest blogs</a>
				</div>
				<div class="middle">
					<a href="login.php" class="button">login</a>
				</div>
				<div class="middle">
					<a href="register.php" class="button">register</a>
				
				</div>
				<!-- Search Bar -->
				<form class="last">
					<label class="hidden" for="search">Search</label>
					<input value="Search.." type="search" name="search" id="search">
					<input type="submit" value="submit" onclick="window.location='/dashboard';">
				</form>
			</nav>
