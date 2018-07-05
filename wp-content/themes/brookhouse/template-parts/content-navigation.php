<?php $category_ID = $wp_query->get_queried_object_id(); //Get this ID of current Category
  ?>

<nav id="main" class="nav-container">
	<ul>
      <li class="logo"><a href="<?php echo site_url() ?>"><img src="<?php echo get_theme_file_uri('/img/carly-logo-white.png'); ?>"></a></li>
      <li <?php if (is_page('home')) echo 'class="current-menu-item"'?>><a href="<?php echo site_url() ?>">Home</a></li>
      <li <?php if (is_page('about')) echo 'class="current-menu-item"'?>><a href="<?php echo site_url('/about') ?>">About</a></li>
      <li <?php if (is_page('gallery')) echo 'class="current-menu-item"'?>><a href="<?php echo site_url('/gallery') ?>">Gallery</a></li>
      <li <?php if (get_post_type() === 'exmouth' or (is_category() and $category_ID)) echo 'class="current-menu-item"'?>><a href="<?php echo site_url('/exmouth') ?>">Exmouth</a></li>
      <li <?php if (is_page('book-now')) echo 'class="current-menu-item"'?>><a href="#">Book Now</a></li>
    </ul>
</nav>