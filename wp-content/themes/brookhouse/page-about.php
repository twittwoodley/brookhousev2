<?php
	get_header();

?>
	<section class="home-jumbotron" style="background-image: url(<?php echo get_theme_file_uri('/img/brook-house-cover.jpg'); ?>)">
		<div class="jumbo-dark-underlay dark-underlay"></div>
	    <div class="inner-jumbo">
	      <div class="bar"></div>
	      <div class="title-cont"><h2>About Us</h2></div>
	      <div class="bar"></div>
	    </div>
	</section>
<?php
	get_template_part('template-parts/content', 'navigation');
?>
	<div class="about-container">
<!-- Item 1 -->
		<div class="about-image" style="background-image:url('<?php echo get_theme_file_uri('/img/lounge-ph.jpg'); ?>')">
			<div class="white-overlay overlay-right"></div>
		</div>
		<div class="about-desc">
			<h2><i class="fa fa-couch"></i> Relax</h2>
			<p>Comfort is king here at Brook house. You will have exculsive access to our semi-detached annexe. It comes full equipped with everything you need and more, ensuring you have a trip to remember when you come to south east Devon.
			</p>
		</div>

<!-- Item 2 -->
		<div class="about-desc">
			<h2><i class="fa fa-compass"></i> Explore</h2>
			<p>We love our location, and we'llknow you'll love it to. Situated in an area of outstanding natural beauty, there is something for everyone. Have a look at our <a href="<?php echo get_post_type_archive_link( 'exmouth' ); ?>">interactive map</a> to see what's near by</p>
		</div>
		<div class="about-image" style="background-image:url('<?php echo get_theme_file_uri('/img/campfire-ph.jpg'); ?>');">
			<div class="white-overlay overlay-left"></div>
		</div>

<!-- Item 3 -->
		<div class="about-image" style="background-image:url('<?php echo get_theme_file_uri('/img/bbq-PH.jpg'); ?>')">
			<div class="white-overlay overlay-right"></div>
		</div>
		<div class="about-desc">
			<h2><i class="fa fa-utensils"></i> Eating</h2>
			<p>There's loads of great places to eat (you can check them out here), but if you fancied staying in, we've got you covered.
			Brook House comes with a fully equipped kitchen, just for you to use</p>
			<p> Fancy a BBQ? No problem! We can provide you with everything you need. Check out our BBQ hamper offers full of local delights!
			</p>
		
		</div>

<!-- Item 4 -->
		<div class="about-desc">
			<h2><i class="fa fa-bed"></i> Sleeping</h2>
			<p>Comfort is king here at Brook house. Our bedroom comes with a duluxe double bed, to ensure you get a good nights sleep.</p>
			<p>A sofa bed is also available if required</p>
		</div>
		<div class="about-image" style="background-image:url('<?php echo get_theme_file_uri('/img/bed-ph.jpg'); ?>');">
			<div class="white-overlay overlay-left"></div>
		</div>

		</div>
	</div>
	
<!-- 	<div class="autoplay" style="max-width:1100px;">
	<div style="width:100px; height:100px; background:red;">1</div>	
	<div style="width:100px; height:100px; background:pink;">2</div>	
	<div style="width:100px; height:100px; background:blue;">3</div>	
	<div style="width:100px; height:100px; background:yellow;">4</div>	
	<div style="width:100px; height:100px; background:orange;">5</div>	
	<div style="width:100px; height:100px; background:goldenrod;">6</div>	
	<div style="width:100px; height:100px; background:black;">7</div>	
</div> -->
<div class="reviews-cont">
	<div class="autoplay" style="max-width:1100px;">
		<div class="review">
			<h3>I love this Place</h3>
			<p>
				I love this place. It's a great place for the whole family. Perfect!
			</p>
			<div class="star-cont">
				<i class="far fa-star"></i>
				<i class="far fa-star"></i>
				<i class="far fa-star"></i>
				<i class="far fa-star"></i>
				<i class="far fa-star"></i>
			</div>
		</div>	
			<div class="review">
				<h3>Paridise</h3>
				<p>
					Sun, sea and sand. My idea of heaven. Such a nice place to stay
				</p>
				<div class="star-cont">
					<i class="far fa-star"></i>
					<i class="far fa-star"></i>
					<i class="far fa-star"></i>
					<i class="far fa-star"></i>
					<i class="far fa-star"></i>
				</div>
			</div>
			<div class="review">
				<h3>Heaven on earth</h3>
				<p>
					I challenge anyone to stay here and not have the time of thier lives
				</p>
				<div class="star-cont">
					<i class="far fa-star"></i>
					<i class="far fa-star"></i>
					<i class="far fa-star"></i>
					<i class="far fa-star"></i>
					<i class="far fa-star"></i>
				</div>
			</div>
			<div class="review">
				<h3>Lovely stuff</h3>
				<p>
					Cool place, great BBQ hamper, super beaches. 
				</p>
				<div class="star-cont">
					<i class="far fa-star"></i>
					<i class="far fa-star"></i>
					<i class="far fa-star"></i>
					<i class="far fa-star"></i>
					<i class="far fa-star"></i>
				</div>
			</div>
			<div class="review">
				<h3>The hosts with the most</h3>
				<p>
					Brook House is amazing. Bob and Dyi are the best
				</p>
				<div class="star-cont">
					<i class="far fa-star"></i>
					<i class="far fa-star"></i>
					<i class="far fa-star"></i>
					<i class="far fa-star"></i>
					<i class="far fa-star"></i>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
	get_footer();
	?>