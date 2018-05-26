<?php
	get_header();
	get_template_part('template-parts/content', 'navigation');
?>
<section>
	There are so many reasons why you should visit Exmouth.<br>
	It's situalted inside of East Devon, which is an area of outstanding national beauty<br>
	Have a look at our map to see all of the wonderful places nearby

</section>
   <div class="acf-map">
    <?php
      while(have_posts()) {
        the_post();
        $mapLocation = get_field('gmap');
        ?>
        <div class="marker" data-lat="<?php echo $mapLocation['lat']; ?>" data-lng="<?php echo $mapLocation['lng']; ?>">
          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <?php echo $mapLocation['address']; ?><br>
          <a href="<?php the_permalink(); ?>">Read more</a>
        </div>
      <?php } ?>
  </div>