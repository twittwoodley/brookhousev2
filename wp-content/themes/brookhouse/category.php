<!-- This is the category template
 -->
<?php
	$args = array ('category' => 2, 'posts_per_page' => 5);
	$myposts = get_posts( $args );
	foreach( $myposts as $post ) :	setup_postdata($post);
		the_title();
	 ?>

	<?php endforeach; 
	print_r($myposts);
	?>
