<?php
include_once('php/config.php');
define("PAGENAME","Blogging platform");
include_once('include/header.php');

?>
				<header id="index">
					<div class="feat">

						<div class="middle">
							<img src="img/logov2.png" alt="bloggie, a friendly blogging platform">
						</div>

						<div class="last">
							<h1 class="main absolute">
							 a friendly blogging platform</h1>
						</div>


				</div>

			</header>

			<div class="container">
				<article>
					<h2>Write well structured and adapted content for all platforms</h2>
				</article>
				<div class="blue">
					<div class="feat first">
						<div class="box bg middle wow slideInLeft" data-wow-duration="1s" data-wow-delay="1s">
							<h3>Blogging</h3>
							<p>Bloggie will guide you through the forest of content, structuring and simply improve writing for web.
							</p>
						</div>
						<div class="box bg middle wow fadeInUp" data-wow-duration="1s" data-wow-delay="2s">
							<h3>Intuitive</h3>
							<p>It's nice and simple. No unnecessary fields, no extra buttons. Just pure content writing.
							</p>
						</div>
						<div class="box bg middle wow slideInRight" data-wow-duration="1s" data-wow-delay="2s">
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
			<section id="testimonials">
				<div class="first feat">
					<div class="swiper-container middle">
							<div class="swiper-wrapper">
									<div class="swiper-slide" data-hash="slide1">Slide 1</div>
									<div class="swiper-slide" data-hash="slide2">Slide 2</div>
									<div class="swiper-slide" data-hash="slide3">Slide 3</div>
							</div>
							<!-- Add Pagination -->
							<div class="swiper-pagination"></div>
							<!-- Add Arrows -->
							<div class="swiper-button-next"></div>
							<div class="swiper-button-prev"></div>
					</div>

					    	<!--<input type="radio" id="testimony1" name="slide" checked>
					 		<label for="testimony1"></label>-->
						<!--	<div id="testimonial1" class="slider transition">
					    </div>
					     <div id="testimonial2" class="slider transition">
					    </div>
					     <div id="testimonial3" class="transition slider">
					    </div>
					    <div class="slideLink">
					      <ul> <!--can add links
					        <a href="#testimonial1"><li  class="link"></li></a>
					        <a href="#testimonial2"><li  class="link"></li></a>
					        <a href="#testimonial3"><li  class="link"></li></a>
					       </ul>
					    </div>

						</div>

					</ul>-->
				</div>
			</section>

	<?php
include_once('include/footer.php');
?>
