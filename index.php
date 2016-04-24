<?php
//typical include statements, connecting to the database and defining page information
include_once('php/config.php');
define("PAGENAME","Blogging platform");
//header doesn't change throughout pages, so keeping it as an include
include_once('include/header.php');

?>
<header class="big-header">
	<!--<div class="feat">
old design
		<div class="middle">
			<img src="img/logov2.png" alt="bloggie, a friendly blogging platform">
		</div>
		<div class="last">
			<h1 class="main absolute">
				a friendly blogging platform</h1>
			</div>
		</div>-->
		<h1>Bloggie, a super friendly blogging platform</h1>
			<h2>Write well structured and adapted content for all platforms</h2>
	</header>
<!-- add element reveals on scroll-->
	<div class="container">
		<div class="blue">
			<div class="feat first">
				<div class="middle fade">
					<div class="round">
					<h3>Create</h3>
				</div>
				</div>
				<div class="middle fade">
					<div class="round">
					<h3>Enjoy</h3>
				</div>
				</div>
				<div class="middle fade">
					<div class="round">
					<h3>Learn</h3>
				</div>
				</div>
				<!-- nice fancy boxes -->
				<div class="box bg middle fade">
					<h3>Blogging</h3>
					<p>Bloggie will guide you through the forest of content, structuring and simply improve writing for web.
					</p>
				</div>
				<div class="box bg middle fade">
					<h3>Intuitive</h3>
					<p>It's nice and simple. No unnecessary fields, no extra buttons. Just pure content writing.
					</p>
				</div>
				<div class="box bg middle fade">
					<h3>Responsive</h3>
					<p>It's lightweight and responsive, you can write and read from whereever you are, whatever your device is.
					</p>
				</div>
			</div>
		</div>
	</div>
	<!-- Testimonials http://www.webchief.co.uk/blog/simple-jquery-slideshow/ -->
	<!-- http://codepen.io/doodlemarks/pen/aFcly -->
	<!-- Needs work-->
	<div id="testimonials">
		<div class="first feat">

			<div id="slider">
				<a class="control_next"><img src="img/right.png" alt="next"></a>
				<a class="control_prev"><img src="img/left.png" alt="previous"></a>
				<ul>
					<li>
						<div class="hover-image">
							<img src="img/testim-one.gif" alt="first testimony">
							<div class="hover-text">
								<p>This is an awesome platform</p>
							</div>
						</div>
					</li>
					<li>
						<div class="hover-image">
							<img src="img/writing.jpg" alt="first testimony">
							<div class="hover-text">
								<p>Writing is so easy!</p>
							</div>
						</div></li>
						<li>
						<div class="hover-image">
							<img src="img/typing.jpg" alt="first testimony">
							<div class="hover-text">
								<p>This is an awesome platform</p>
							</div>
						</div></li>
					</ul>
				</div>
			</div>
			<!--Icons taken from google material design https://design.google.com/icons/ -->



		</div>


		<?php
		//footer also stays the same throughout
		include_once('include/footer.php');
		?>
