<?php
	get_header();
	get_template_part('template-parts/content', 'navigation');
	$gallery = get_post_gallery_images_with_info();
	$galleryImageNo	= round((count($gallery)/3));
	//print_r($gallery);
?>
<div class="row">
<div class="column">
	<?php
		$counter = 0;
		foreach ($gallery as $galleryImage) {
			if($counter == $galleryImageNo) {
				echo '</div><div class="column">';
				$counter = 0;
			}
			?>
				<img src="<?php echo $galleryImage['src'] ?>">
			<?php
			$counter++;
		}
	?>
</div>
</div>


<?php
echo $i;
	get_footer();
?>	