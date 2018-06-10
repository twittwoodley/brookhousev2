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
		<div class="about-image one" style="background-image:url('<?php echo get_theme_file_uri('/img/brook-house-cover.jpg'); ?>');"></div>
		<div class="about-desc two">
			<div class="about-inner">
				<div class="about-icon-container">
					<div class="about-icon"><i class="fa fa-utensils"></i></div>
				</div>
				<div class="about-text-container">
					<h2>Eat</h2>
					<p>If you fancy eating in, you can use the private, fully equiped kitchen</p>
				</div>
			</div>
		</div>
		<div class="about-image two" style="background-image:url('<?php echo get_theme_file_uri('/img/brook-house-cover.jpg'); ?>');"></div>
		<div class="about-desc one">
			<div class="about-inner">
				<div class="about-icon-container">
					<div class="about-icon"><i class="fa fa-utensils"></i></div>
				</div>
				<div class="about-text-container">
					<h2>Eat</h2>
					<p>If you fancy eating in, you can use the private, fully equiped kitchen</p>
				</div>
			</div>
		</div>
	</div>


<?php
	get_footer();
	?>