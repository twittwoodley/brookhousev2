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
$args = array(  
       'post_type' => 'exmouth',
       'post_status' => 'publish',
       'posts_per_page' => 8,
       ‘orderby’ => ‘title’,
       ‘order’ => ‘ASC’,
       'category__in' => array(
            'cat' =>$category_ID
            )
        );
?>
  <div class="about-inner category-panel"> <!-- Start of panel gallery -->
    <?php
      $loop = new WP_Query( $args); //New QP loop with above args
      while ( $loop->have_posts() ) : $loop->the_post();
      $image = get_field('background_image'); //get post (not category) backgorund image
    ?>

      <div class="panel" style="background-image:url(<?php echo $image ?>)">
        <div class="dark-underlay"></div>
        <h3><?php the_title() ?></h3>
        <p class="panel-excerpt">
          <?php the_excerpt() ?>
          <br>
          <span class="read-more"><a href="<?php echo the_permalink(); ?>">Read More >></a></span>
        </p>
      </div>
      
      <?php
      endwhile;
      wp_reset_postdata();
      ?>
    </div>
</div>

  <?php
  get_footer()
  ?>