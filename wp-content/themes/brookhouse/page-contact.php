<?php
get_header();
?>
<section class="home-jumbotron" style="background-image: url(<?php echo $image ?>)">
    <div class="jumbo-dark-underlay dark-underlay"></div>
    <div class="inner-jumbo">
      <div class="bar"></div>
      <div class="title-cont"><h2><?php the_title() ?></h2></div>
      <div class="bar"></div>
    </div>
</section>
<?php
        get_template_part('template-parts/content', 'navigation');
?>
<div class="acf-map">
<?php

        while (have_posts()) {
                the_post();
                $mapLocation = get_field('gmap');
?>
        <div class="marker" data-lat="<?php echo $mapLocation['lat']; ?>" data-lng="<?php echo $mapLocation['lng']; ?> ">
          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <?php echo $mapLocation['address']; ?><br>
          <a href="<?php the_permalink(); ?>">Read more</a>
        </div>
    <?php } ?>
</div>
<?php
get_footer();
?>