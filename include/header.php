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
					<a href="index"><img src="img/logo-small.png" alt="logo, or get back to the index page" class="logo"></a>
				</div>
				<div class="middle">
					<a href="all_posts">latest blogs</a>
				</div>
				<div class="middle">
					<a href="login" class="button">login</a>
				</div>
				<div class="middle">
					<a href="register" class="button">register</a>

				</div>
				<!-- Search Bar -->
				<form class="last" action="search.php" method="get">
					<label class="hidden" for="search">Search</label>
					<input placeholder="Search.." type="search" name="search" id="search">
					<input type="submit" value="submit">
				</form>
			</nav>
