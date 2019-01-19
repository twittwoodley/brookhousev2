<?php
	get_header();
?>

  <section class="home-jumbotron" style="background-image: url(<?php echo get_theme_file_uri('/img/exmouth-cover.jpg'); ?>)">
    <div class="jumbo-dark-underlay dark-underlay"></div>
     <div class="inner-jumbo">
      <div class="bar"></div>
      <div class="title-cont"><h2>About Exmouth</h2></div>
      <div class="bar"></div>
    </div>
    <p>
      There are so many reasons why you should visit Exmouth.<br>
  It's situalted inside of East Devon, which is an area of outstanding national beauty<br>
  Have a look at our map to see all of the wonderful places nearby
    </p>
  </section>
<?php
  get_template_part('template-parts/content', 'navigation');

  function order_by_date( $a, $b )
  {
    return strcmp( $b->post_date, $a->post_date );
  }
  // get the posts for the first query
  $q1_args = array(
    // args for the first query 
    'post_type' => array('exmouth'),
    'posts_per_page' => '-1',
  );

  $q1_posts = get_posts( $q1_args );
  // get the posts for the second query
  $q2_args = array(
    // args for the second query
    'post_type' => 'page',
    'pagename' => 'contact'
  );
  $q2_posts= get_posts( $q2_args );
  // Merge the post arrays together, and sort by date using the order_by_date function
  $final_posts = array_merge( $q1_posts, $q2_posts );
  usort( $final_posts, 'order_by_date' );
  // Loop over the posts and use setup_postdata to format for template tag usage

  ?>
  <div class="about-inner category-panel"> <!-- Start of panel gallery -->
<div class="acf-map">
      <?php
      $postInformation = array();   //Empty array for post information to be pushed to so it can be used outsice of the loop
      foreach ( $final_posts as $key => $post ) {
        setup_postdata( $post ); 
        print_r($post);
        // Now we can use template tags as if this was in a normal WP loop
          $mapLocation = get_field('gmap');
          $marker_image = get_field('marker_logo');
          $info = array(               //variable to store post information
            get_the_title(),
            get_the_excerpt(),
            get_the_permalink(),
            get_field('background_image')
          );
          array_push($postInformation, $info); //push information to the array
        ?>
      <div class="marker" 
      data-lat="<?php echo $mapLocation['lat']; ?>" 
      data-lng="<?php echo $mapLocation['lng'];?>" 
      data-icon="<?php echo $marker_image;?>">
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <?php echo $mapLocation['address']; ?><br>
        <a href="<?php the_permalink(); ?>">Read more</a>
      </div>    

<?php }
  wp_reset_postdata();?>      

?>
    </div>
  </div>

<!-- Panel Section -->
<?php get_template_part('template-parts/content', 'flex-panel-gallery');
  get_footer();
?>