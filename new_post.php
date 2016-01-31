<?php
include_once('php/config.php');
define("PAGENAME","Create New");
include_once('/include/header.php');

?>

		<div id="main" class="span_12_of_12" role="main">
				<div class="feat span_8_of_12">
					<h1 class="dashboard">Create a new post</h1>

					<div class="dashboard">
						<h2>This will be posted to Bloggie. So, just follow our structure and you'll be awesome!</h2>
						<h3>There are four sections to this. Title, subtitle, preview and main text. We employ a simple WYSIWYG editor.</h3>
					</div>
				</div>


			<form action="include/functions/insert.php" method="POST" class="auto inputs span_8_of_12">

						<div class="margins span_12_of_12">
							<div class="span_1_of_12">
								<label>Title:</label>
							</div>
							<div class="span_12_of_12">
									<input type="text" name="heading"  class="col span_12_of_12">
							</div>
						</div>

						<div class="margins span_12_of_12">
							<div class="span_1_of_12">
								<label>Subtitle:</label>
							</div>
							<div class="span_12_of_12">
									<input type="text" name="subtitle"  class="col span_12_of_12">
							</div>
						</div>
						<div class="margins span_12_of_12">
							<div class="span_1_of_12">
								<label>Preview:</label>
							</div>
								<div class="span_12_of_12">
									<textarea name="preview"  class="col span_12_of_12"></textarea>

								</div>
							</div>
								<div class="margins span_12_of_12">
										<div class="simple-editor">
						<h2>This is your main text :)</h2>
						<p>Make sure that most important information is on top of the page, it's valuable and consice</p>
				</div>
			</div>

					<input type="submit" class="auto feat span_12_of_12">
			</form>
	</div>


				<?php
				include_once('include/extra.php');
			include_once('include/footer.php');
			?>
