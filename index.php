<?php
include_once('php/config.php');
define("PAGENAME","Blogging platform");
include_once('/include/header.php');

?>
				<header id="header">
					<div class="feat span_12_of_12">

						<div class="col span_4_of_12">
							<img src="img/logov2.png" alt="bloggie, a friendly blogging platform">
						</div>

						<div class="col span_5_of_12">
							<h1 class="main absolute top">
							 a friendly blogging platform</h1>
						</div>


				</div>

			</header>

			<div class="container">
				<article>
					<h2>Write well structured and adapted content for all platforms</h2>
				</article>
				<div class="blue span_12_of_12">
					<div class="feat span_8_of_12">
						<div class="box bg col span_4_of_12 wow slideInLeft" data-wow-duration="1s" data-wow-delay="1s">
							<h3>Blogging</h3>
							<p>Bloggie will guide you through the forest of content, structuring and simply improve writing for web.
							</p>
						</div>
						<div class="box bg col span_4_of_12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="2s">
							<h3>Intuitive</h3>
							<p>It's nice and simple. No unnecessary fields, no extra buttons. Just pure content writing.
							</p>
						</div>
						<div class="box bg col span_4_of_12 wow slideInRight" data-wow-duration="1s" data-wow-delay="2s">
							<h3>Responsive</h3>
							<p>It's lightweight and responsive, you can write on the go, or read from your tablet.
							</p>
						</div>
					</div>
				</div>
			</div>
			<!-- Testimonials http://www.webchief.co.uk/blog/simple-jquery-slideshow/ -->
			<!-- http://css-plus.com/2013/10/create-your-own-jquery-image-slider/ -->
			<!-- Needs work-->
			<section id="testimonials" class="span_12_of_12">
				<div class="span_8_of_12 feat">
					    <div class="col span_4_of_12">
					 		<!--<input type="radio" id="testimony1" name="slide" checked>
					 		<label for="testimony1"></label>-->

					        <img src="img/testim-one.gif" alt="Jane Doe">
					        <p>This is an amazing platform</p>

					    </div>
					    <div class="col span_4_of_12">
					    	<!--<input type="radio" id="testimony1" name="slide" checked>
					 		<label for="testimony1"></label>-->
					        <img src="img/testim-one.gif" alt="Erica Doe">
					        <p>I simply &hearts; this</p>
					    </div>
					     <div class="col span_4_of_12">
					    	<!--<input type="radio" id="testimony1" name="slide" checked>
					 		<label for="testimony1"></label>-->
					        <img src="img/testim-one.gif" alt="Erica Doe">
					        <p>There are three of me</p>
					    </div>


					</ul>
				</div>
			</section>

	<?php
include_once('include/footer.php');
?>
