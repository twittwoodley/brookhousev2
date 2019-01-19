<footer>
		<div> <!-- 1st -->
			<a href="<?php echo site_url() ?>"><img src="<?php echo get_theme_file_uri('/img/little-brook-logo.png'); ?>"></a>
		</div>
		<div> <!-- 2nd -->
			<ul class="footer-list">
				<li><a href="Tel: 01395223903">01395 223903</a></li>
				<li><a href="mailto:bwooestimating@hotmail.co.uk?subject=Brook House Enquiry">holiday@brookhouse.co.uk</a></li>
				<li><a href="<?php echo site_url('/contact') ?>">Contact</a></li>
			</ul>				
		</div>
		<div><!-- 3rd -->
			<ul class="footer-list">
				<li>Content by The Brook House Team</li>
				<li>Designed by Tom Woodley</li>
				<li>&copy Brook House <?php echo date("Y");?> </li>
			</ul>			
		</div>
</footer>
</div> <!-- Site Wrap closing div -->
<?php wp_footer(); ?>
<div class="dark-body-overlay"></div>
<div class="hamburger-container" id="hamburger" onclick="toggleNav(this)">
    <div class="bar1"></div>
    <div class="bar2"></div>
    <div class="bar3"></div>
	</div>
	<script>
		
		function toggleNav(e) {
			document.querySelector('body').classList.toggle('mobile-nav-open')
		}
	</script>
</body>
</html>