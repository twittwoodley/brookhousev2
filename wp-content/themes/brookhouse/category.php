<?php
  get_header();
  $category_ID = $wp_query->get_queried_object_id(); //Get this ID of current Category
   $args = array(                                   //Filters and conditions
    'category__in' => array(
      'cat' =>$category_ID
      ));
  $categories = get_categories($args); //get all categories
  $cat_desc = array(); //Empty array for description to be pushed

  foreach($categories as $category) {
    if ($category->cat_ID === $category_ID) { //filters the loop to only show current category
      $desc = $category->description; // create a variable to store category description
      array_push($cat_desc, $desc); //Push category description to emty array so it can be used later
    $image = get_field('background_image', 'category_'.$category->term_id); //get the category backgorund
?>
<section class="home-jumbotron" style="background-image: url(<?php echo $image ?>)">
    <div class="jumbo-dark-underlay dark-underlay"></div>
    <div class="inner-jumbo">
      <div class="bar"></div>
      <div class="title-cont"><h2><?php echo $category->name ?></h2></div>
      <div class="bar"></div>
    </div>
    <p><?php echo $category->description ?></p>
</section>
<?php } //close if statement
} //close foreach loop

wp_reset_postdata();

get_template_part('template-parts/content', 'navigation'); // get nav bar


//Args to get all posts within category
//args go here
  function order_by_date( $a, $b )
  {
    return strcmp( $b->post_date, $a->post_date );
  }
  // get the posts for the first query
  $q1_args = array(
    // args for the first query 
    'post_type' => array('exmouth'),
    'posts_per_page' => '-1',
    'category__in' => 
        array(
        'cat' =>$category_ID
      ));

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
?>
    </div>
  </div>

  <div class="about-inner category-panel"> <!-- Start of panel gallery -->
    <?php //wp_reset_postdata();
    foreach($postInformation as $post) {     //get information from above array. The information was pushed from the original WP loop
      if($post[0] === 'Contact') {
        continue;
      }
    ?>
    <div class="panel column-panel" style="background-image:url(<?php echo $post[3] ?>)">
        <div class="dark-underlay"></div>
        <h3><?php echo $post[0] ?></h3>
        <p class="panel-excerpt">
          <!-- <?php echo $post[1] ?><br> -->
          <!-- <br> -->
          <span class="read-more"><a href="<?php echo $post[2] ?>">Read More >></a></span>
        </p>
      </div>
    <?php }
    ?>

</div>

  <?php
  get_footer()
  ?>