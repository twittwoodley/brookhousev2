<?php 
get_header();

get_template_part('template-parts/content', 'navigation');

//days until wedding
$wedding = strtotime('2019-08-17') - time();
$remaining = floor($wedding / 86400);
$remArray = str_split(strval($remaining));

$username = wp_get_current_user()->display_name;
?>

	<div class="content-wrapper">
		<h1 class="main-headline">Hey <?php echo $username ?>!<br>Tom and Lori Are Getting Hitched!</h1>
		<div class="flex-cont-x profile-pic-cont">
			<div class="front-page-profile">
				<div class="outer-frame rotate-left">
					<div class="inner-frame rotate-right">
						<div class="kid-photo kid-photo-lori" style="background-image: url(<?php echo get_theme_file_uri('images/lori-photo.jpg') ?>)"></div>
					</div>
				</div>	
			</div>
			<div class="day-count-container" style="background-image: url(<?php echo get_theme_file_uri('images/heart.svg'); ?>)">
				<!-- <i class="far fa-heart heart-background"></i> -->
				<div style="display:flex; flex-direction: column;">
						<h2><?php echo $remaining; ?><br><span>days to go</span></h2>
				</div>
			</div>
			<div class="front-page-profile">
			
			
				<div class="outer-frame rotate-right">
					<div class="inner-frame rotate-left">
						<div class="kid-photo kid-photo-tom rotate-left" style="background-image: url(<?php echo get_theme_file_uri('images/tom-kid-photo.jpg') ?>)"></div>
					</div>
				</div>
			</div>
		</div>
		<img class="fancy-section-break" src="<?php echo get_theme_file_uri('/images/section-break.png'); ?>">
		<div class="title-with-lines">
			<div class="line"></div>
			<h2>Popular Photos</h2>
			<div class="line"></div>
		</div>
<?php
	//get_template_part('template-parts/content', 'gallery');
$query_images_args = array(
    'post_type'      => 'attachment',
    'post_mime_type' => 'image',
    'post_status'    => 'inherit',
    'posts_per_page' => -1,
);

$query_images = new WP_Query( $query_images_args ); ?>
<!-- include(locate_template('template-parts/content-gallery.php')); -->
<div class="gallery-container">
<!-- Get gallery images URL -->

<?php
$images = array();
foreach ( $query_images->posts as $image ) {
	//$author = get_the_author($image->ID);
	$imagelike = new WP_Query(array(
			'post_type' => 'like',
			'meta_query' => array(
                  array(
                  'key' => 'liked_photo_id',
                  'compare' => '=',
                  'value' => $image->ID
                  )
                )
		));

    array_push($images, array(wp_get_attachment_image_src( $image->ID, 'galleryThumb')[0], $image->ID, get_the_author_meta('display_name' ,$image->post_author), wp_get_attachment_image_src( $image->ID, 'full')[0], $imagelike->found_posts));
}

//Like count is added to $images!!!!! That took a long time to figure out! It can be accessed by $image[4]. 
//I need to work out how to use it in array_sort before the below foreach loop. 

function cmp($imagesB, $images) {
      if ($images[4]== $imagesB[4]) {
            return 0;
        }
        return ($images[4] < $imagesB[4]) ? -1 : 1;
    }
    usort($images, "cmp");

foreach ($images as $image){ 
	$i;
	$i++;
	?>
		<div class="gallery-image-thumb" style="background-image: url(<?php echo $image[0]; ?>)">
			<div class="gallery-thumb-overlay">
				<div class="overlay-info-top">
					<h4 class="photographer-name">Uploaded by <?php echo $image[2]; ?></h4>
					<a title="Enlarge" class="image-enlarge-link" href="<?php echo $image[3]; ?>" data-lightbox="roadtrip"><img src="<?php echo get_theme_file_uri('images/enlarge.png'); ?>"></a>
				</div>
				<?php 
					$likeCount = new WP_Query (array(
						'post_type' => 'like',
						 'meta_query' => array(
						 	array(
						 		'key' => 'liked_photo_id',
						 		'compare' => '=',
						 		'value' => $image[1]
						 		)
						 	)
					));

					$existStatus = 'no';

					if(is_user_logged_in()) {
						$existQuery = new WP_Query (array(
						'author' => get_current_user_id(),
						'post_type' => 'like',
						 'meta_query' => array(
						 	array(
						 		'key' => 'liked_photo_id',
						 		'compare' => '=',
						 		'value' => $image[1]
						 		)
						 	)
					));

					if ($existQuery->found_posts) {
						$existStatus = 'yes';
					}
					}

					
				?>
				<div class="overlay-info-bottom">
					<div class="like-box" data-like="<?php echo $existQuery->posts[0]->ID; ?>" data-photoID="<?php echo $image[1]; ?>" data-exists="<?php echo $existStatus ?>">
						<i title="Like" class="far fa-heart heart-empty" aria-hidden="true"></i>
						<i title="Unlike" class="fas fa-heart heart-filled" aria-hidden="true"></i>
						<span class="like-count"><?php echo $likeCount->found_posts ?></span>
					</div>
					<a class="image-download-link" title="Download" href="<?php echo $image[3]?>" download><i class="fa fa-download"></i></a>
				</div>
			</div>
		</div>
	<?php
	if ($i == 7) break;
	} ?> 
	<div class="gallery-image-thumb more-images">
		<a href="<?php echo site_url('/gallery'); ?>">More Images<br>
			<span>+</span>
		</a>
	</div>
	<?php
	echo posts_nav_link();
	wp_reset_postdata();
	//print_r($images);
	?>

</div>
<img class="fancy-section-break" src="<?php echo get_theme_file_uri('/images/section-break.png'); ?>">
<div class="questions-container">
	<div class="title-with-lines">
		<div class="line"></div>
		<h2>Popular Songs</h2>
		<div class="line"></div>
	</div>
<?php
    $songsWithLikes = array();

    $songPosts = new WP_Query(array(
    		'post_type' => 'song',
    		'posts_per_page' => 5
    	));

	while($songPosts->have_posts()) {
		$songPosts->the_post();
		$songLike = new WP_Query(array(
			'post_type' => 'like',
			'meta_query' => array(
                  array(
                  'key' => 'liked_photo_id',
                  'compare' => '=',
                  'value' => get_the_ID()
                  )
                )
		));
		//1234 in array push is where the like count will go
		array_push($songsWithLikes, array(get_the_title(), get_the_content(), $songLike->found_posts, get_the_ID()));
		

		}

	function cmpSongs($songsWithLikesB, $songsWithLikes) {
			if ($songsWithLikes[2]== $songsWithLikesB[2]) {
        		return 0;
    		}
    		return ($songsWithLikes[2] < $songsWithLikesB[2]) ? -1 : 1;
		}
		usort($songsWithLikes, "cmpSongs");
	//print_r($songsWithLikes);
	?>
	<ul class="song-list-cont">
	<?php
	foreach($songsWithLikes as $song) {
		$existStatus = 'no';

					if(is_user_logged_in()) {
						$existQuery = new WP_Query (array(
						'author' => get_current_user_id(),
						'post_type' => 'like',
						 'meta_query' => array(
						 	array(
						 		'key' => 'liked_photo_id',
						 		'compare' => '=',
						 		'value' => $song[3]
						 		)
						 	)
					));

					if ($existQuery->found_posts) {
						$existStatus = 'yes';
					}
					}

	?>
		<li class="song" data-id="<?php echo $song[3]; ?>">
			<h4><?php echo $song[0]; ?> <span style="font-size: 0.5em">by</span> <?php echo $song[1]; ?></h4>	
			<div class="cong-btn-cont">	
				<div class="like-box" data-like="<?php echo $existQuery->posts[0]->ID; ?>" data-photoID="<?php echo $song[3]; ?>" data-exists="<?php echo $existStatus ?>">
					<i title="Like" class="far fa-heart heart-empty" aria-hidden="true"></i>
					<i title="Unlike" class="fas fa-heart heart-filled" aria-hidden="true"></i>
					<span class="like-count"><?php echo $song[2] ?></span>
				</div>
				<?php 
				if(get_current_user_id() == get_the_author_meta('ID')) {
				?>
				<div>
					<div class="delete-button-cont">
						<span class="delete-question"><i class="fa fa-trash-alt" aria-hidden="true"></i></span>
					</div>
				</div>
			</div>

					<?php }
					?>
		</li>
	<?php }
	?>
	</ul>
</div>
<?php 
get_footer(); ?>