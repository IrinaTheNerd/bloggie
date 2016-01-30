<?php
include_once('php/config.php');
define("PAGENAME","Create New");
include_once('/include/header.php');

?>
	
				<header>
					<div class="feat span_8_of_12">
						<h1 class="dashboard">Create a new post</h1>

						<div class="dashboard">
							<h2>This will be posted to Bloggie. So, just follow our structure and you'll be awesome!</h2>
						</div>
					</div>
					<div id="writing-tips"> </div>
				</header>
			<div class="new-post span_12_of_12">
				<form class="inputs feat span_10_of_12">
					
						<div class="margins span_12_of_12">
							<div class="span_1_of_12">
								<label>Title:</label>
							</div>
								<div class="span_12_of_12">
									<input type="text" name="title"  class="col span_11_of_12">
								<div class="col span_1_of_12">
									<a href="title.html" id="title"><span class="icon-help-circled"></span></a>
								</div>
							</div>
						</div>


						<div class="margins span_12_of_12">
							<div class="span_1_of_12">
								<label>Subtitle:</label>
							</div>
							<div class="span_12_of_12">
									<input type="text" name="sub-title"  class="col span_11_of_12">
								<div class="col span_1_of_12">
									<a href="sb.html" id="sb"><span class="icon-help-circled"></span></a>
								</div>
							</div>
						</div>
						<div class="margins span_12_of_12">
							<div class="span_1_of_12">
								<label>Body:</label>
							</div>
								<div class="span_12_of_12">
									<textarea name="main-text"  class="col span_11_of_12"></textarea>
									<div class="col span_1_of_12">
										<a href="main.html" id="body-text"><span class="icon-help-circled"></span></a>
									</div>
								</div>
							</div>
						<div class="margins span_12_of_12">
							<div class="span_1_of_12">
								<label>Preview:</label>
							</div>
							<div class="span_12_of_12">
								<textarea name="preview-text"  class="col span_11_of_12"></textarea>
								<div class="col span_1_of_12">
									<a href="preview.html" id="preview"><span class="icon-help-circled"></span></a>
								</div>
							</div>
						
						<input type="submit" value="submit" class="span_6_of_12">
					</div>
			</form>	
		</div>
			

	<?php
include_once('include/footer.php');
?>