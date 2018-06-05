<?php
	get_header();

?>
	<section class="home-jumbotron" style="background-image: url(<?php echo get_theme_file_uri('/img/brook-house-cover.jpg'); ?>)">
		<div class="jumbo-dark-underlay dark-underlay"></div>
		<div class="inner-jumbo">
			<div class="bar"></div>
			<img src="<?php echo get_theme_file_uri('/img/carly-logo-white.png'); ?>">
			<div class="bar"></div>
		</div>
	</section>
<?php
	get_template_part('template-parts/content', 'navigation');
?>

<!-- About Section -->
<div class="about-section">
	<div>
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
<br><br>
Etiam a feugiat augue. Vivamus a finibus purus, id posuere turpis. Vestibulum quis elit quis lectus accumsan iaculis quis ac tellus. Nam sed urna nisi. Aenean lacinia pellentesque nibh ut cursus. Proin ac tortor sit amet erat lobortis mollis. Vestibulum bibendum vulputate nulla.<br><br></p></div>
</div>
	</div>
<!-- Gallery Section -->
<section>
	<div id="gallery">
		<div id="bigimages">

			<?php
			$gallery = get_post_gallery_images_with_info();	
			$counter = 1;
			$counter2 = 1;


				// Loop through each image in each gallery
			foreach( $gallery as $image_obj ) { ?>
				<div class="main-image" id="normal<?php echo $counter++ ?>" style="background-image: url(<?php echo $image_obj['src'] ?>);">
					<div class="inner-gallery-overlay"><?php echo $image_obj['caption']	?></div>
				</div>
				<?php
			} ?>
		</div>
		<div class="gallery-thumb-cont">
			<h2>Gallery</h2>
			<div id="thumbs">
				<?php foreach( $gallery as $image_obj ) { ?>
				<a href="javascript: changeImage(<?php echo $counter2++ ?>);"><img src="<?php echo $image_obj['src'] ?>"/></a>
			<?php
			}?>
			</div>
		</div>
	</div>
</section>

<!-- Best of Exmouth Section -->
<div class="panels-cont">
	<h2>The Best Of Exmouth</h2>
	<div class="panels">
<?php
	$args = array( 'hide_empty' => '0');
	$categories = get_categories($args);
	$exmouthCats = array();

	foreach($categories as $category) { 
			if ($category->name === 'Uncategorized') {
			continue;
			}
			
			$image = get_field('background_image', 'category_'.$category->term_id);
			?>

           	<div class="panel" style="background-image:url(<?php echo $image ?>)">
           	<div class="dark-underlay"></div>

		      <h3><?php echo $category->name ?></h3>
				<p class="panel-excerpt">
					<?php echo $category->description ?>
					<br>
					<span class="read-more"><a href="<?php echo get_site_url(null, '/category/'.$category->slug) ?>">Read More >></a></span>
				</p>
			</div>
            <?php 
        } 
/*        print_r($categories);
*/        wp_reset_postdata();?>	    
	  </div>
</div>
</div><!-- Content-wrap closing div -->




<?php
	get_footer();
?>