<div class="panels-cont">
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