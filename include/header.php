<!Doctype html>
	<html lang="en">
		<head>
			<title><?php echo SITENAME . ' - '. PAGENAME;?> </title>

			<!--TypeKit fonts-->
			<!--<script src="https://use.typekit.net/cde8idd.js"></script>
			<script>try{Typekit.load({ async: true });}catch(e){}</script>-->
			<!--end of Typekit Fonts -->
			<link href='https://fonts.googleapis.com/css?family=Lato:400,400italic,700' rel='stylesheet' type='text/css'>
			<link href="css/style.css" rel="stylesheet" type="text/css">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet"  type="text/css" href="dist/ui/trumbowyg.css">
		</head>
		<body>

			<nav>
				<div class="col span_8_of_12">
					<a href="index.php"><img src="img/logo-small.png" alt="logo, or get back to the index page" class="logo"></a>
				</div>
				<div class="col span_1_of_12">
					<a href="all_posts.php">latest blogs</a>
				</div>
				<div class="col span_1_of_12">
					<a href="login.php" class="button">login</a>
				</div>
				<div class="col span_1_of_12">
					<a href="register.php" class="button">register</a>
				</div>
				<!-- Search Bar -->
				<form class="col span_4_of_12">
					<label class="hidden" for="search">Search</label>
					<input value="Search.." type="search" name="search" id="search">
					<input type="submit" value="submit" onclick="window.location='/dashboard';">
				</form>
			</nav>
