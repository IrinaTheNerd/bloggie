<?php
include_once('php/config.php');
define("PAGENAME","Blogging platform");
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

	<div class="container">

		<div class="blue">
			<div class="feat first">
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
	<section id="testimonials">
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
								<p>This is an awesome platform</p>
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



		</section>

		<?php
		include_once('include/footer.php');
		?>
