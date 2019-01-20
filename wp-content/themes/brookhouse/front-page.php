<?php
	get_header();

?>
	<section class="home-jumbotron" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)">
		<div class="jumbo-dark-underlay dark-underlay"></div>
		<div class="inner-jumbo">
							<img src="<?php echo get_theme_file_uri('/img/little-brook-logo.png'); ?>">
			<h4 style="color:white">Premium accomodation situated within Exmouth, Devon</h4>
		</div>
	</section>
<?php
	get_template_part('template-parts/content', 'navigation');
?>

<!-- About Section -->
<div class="about-section">
	<div class="info-with-logos">
		<div class="about-inner">
			<div class="about-icon-container">
				<div class="about-icon"><i class="fa fa-bed"></i></div>
			</div>
			<div class="about-text-container">
				<h2>Sleep</h2>
				<p>Brook house can accomodate up to 4 people. It comes with 1 doubole bedroom, with the addition of a comfortable sofa bed situated in the lounge area.</p>
			</div>
		</div>
		<div class="about-inner">
			<div class="about-icon-container">
				<div class="about-icon"><i class="fa fa-utensils"></i></div>
			</div>
			<div class="about-text-container">
				<h2>Eat</h2>
				<p>If you fancy eating in, you can use the private, fully equiped kitchen</p>
			</div>
		</div>
			<div class="about-inner">
			<div class="about-icon-container">
				<div class="about-icon"><i class="fa fa-couch"></i></div>
			</div>
			<div class="about-text-container">
				<h2>Relax</h2>
				<p>Had a long day exploring the wonderful surroundings? Relax in your own private living room.</p>
			</div>
		</div>
	</div>
	<div class="about-inner" style="background: var(--wheat)"><div>
		<h2 style="margin-top: 43px;">A perfect getaway in a perfect location</h2>
Nullam magna velit, vestibulum et massa vel, pretium fringilla odio. Maecenas at facilisis massa. Donec a nunc blandit, scelerisque tellus et, pharetra quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed tempus est. Vestibulum vehicula tortor sem, vitae aliquam lacus fringilla at. Maecenas vel ante lacus. Nunc mollis et lectus sed consequat. Fusce iaculi.
<br><br>
Cras tempus nunc venenatis orci efficitur, ac accumsan sem ultrices. Curabitur interdum lacus ut justo sodales porta. Aliquam ante velit, consequat ut augue quis, tincidunt viverra orci. Nam cursus, ligula vitae imperdiet interdum, odio orci condimentum lectus, interdum dictum tortor mauris a tellus.
<br><br>
Praesent ut lacus dapibus dolor semper convallis eu vel mauris. Phasellus orci massa, convallis ut hendrerit in, scelerisque eget leo. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut enim sem, malesuada quis augue non, mollis blandit erat. Nullam in aliquet tortor. Nulla tellus justo, eleifend ut nibh eget, fermentum ultrices odio. Mauris a dolor sed mauris accumsan viverra. 
</p></div>
</div>
	</div>
<!-- Gallery Section -->
<section>
<h2 class="title-mobile">Gallery</h2>

	<div id="gallery">
		<div id="bigimages">
			<div class="nextprev" id="previousImage"></div>
			<div class="nextprev" id="nextImage"></div>
			<?php
			$gallery = get_post_gallery_images_with_info();	
			$counter = 1;
			$counter2 = 0;
?>

				<div class="main-image" style="background-image: url(<?php echo $gallery[0][src] ?>);">
					<div class="inner-gallery-overlay"><?php echo $gallery[0][caption]	?></div>
				</div>
		</div>
		<div class="gallery-thumb-cont">
			<h2 class="title-desktop">Gallery</h2>
			<div id="thumbs">
				<?php foreach( $gallery as $image_obj ) { 
					?>
				
				<a href="#" data-count=<?php echo $counter2++?>
					data-full-size-url = "<?php echo $image_obj['src'] ?>"
					data-caption="<?php echo $image_obj['caption'] ?>"
				>
					<div class="thumb"
					style="background-image: url(<?php echo $image_obj['medium_src'] ?>)"
				></div>
				</a>
			<?php
			}?>
			</div>
		</div>
	</div>
</section>

<!-- Reviews Section -->
<?php
	get_template_part('template-parts/content', 'reviews');

?>
<!-- Best of Exmouth Section -->
	<h2>The Best Of Exmouth</h2>
<?php get_template_part('template-parts/content', 'flex-panel-gallery'); ?>

</div><!-- Content-wrap closing div -->




<?php
	get_footer();
?>