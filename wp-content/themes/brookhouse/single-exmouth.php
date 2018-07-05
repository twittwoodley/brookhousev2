<?php
	get_header();
	?>
<section class="home-jumbotron" style="background-image: url(<?php echo get_field('background_image') ?>)">	
	<div class="inner-jumbo">
		<div class="bar"></div>
		<div class="title-cont" ">
			<h2><?php echo the_title()?></h2>
		</div>
		<div class="bar"></div>
	</div>
</section>
<?php
	get_template_part('template-parts/content', 'navigation');
?>
<div class="content-wrap">
	<?php while(have_posts()) {
		the_post(); 
		the_content();	  
} ?>
</div>

<?php 
	get_footer();
?>