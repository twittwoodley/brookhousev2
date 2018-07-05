<?php
	$reviews = new WP_Query(array(
	    'posts_per_page' => 15,
	    'post_type' => 'review',
	    'orderby' => 'date',
	    'order' => 'ASC',
	));
?>

<div class="reviews-cont">
	<h2>Reviews</h2>
	<div class="autoplay" style="max-width:1100px;">
	<?php
	while($reviews->have_posts()) {
	    $reviews->the_post();
?>
	<div class="review">
				<h3><?php the_title(); ?></h3>
				<p>
					<?php the_content(); ?>
				</p>
				<div class="star-cont star-<?php echo get_field('star_rating') ?>">
					<i class="far fa-star"></i>
					<i class="far fa-star"></i>
					<i class="far fa-star"></i>
					<i class="far fa-star"></i>
					<i class="far fa-star"></i>
				</div>
			</div>	
<?php } wp_reset_postdata();
?>

		
	</div>
</div>