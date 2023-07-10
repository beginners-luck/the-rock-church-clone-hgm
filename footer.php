	<div class="push"></div>
</div> <!-- end .wrap -->

<!-- begin footer -->
<div id="call-to-action" class="container container-1380">
	<div>Words</div>
	<div>Button</div>
</div>

<footer class="container container-1170">
	<div id="top-footer-bar">
		<div class="left-content-container">
			<img class="logo-icon" alt="Site logo icon" src="<?php echo get_template_directory_uri() . "/images/logo-icon.svg" ?>"/>
			<!-- Get field -->
			<?php the_field('address', 'options'); ?>
		</div>
		<div class="right-content-container">
			<!-- Social Icons -->
			<?php if ( get_field('facebook_link', 'options') ) : ?>
				<a href="<?php the_field('facebook_link', 'options'); ?>" target="_blank"><span class="icon-facebook" aria-hidden="true"></span></a>
			<?php endif; ?>
			<?php if ( get_field('youtube_link', 'options') ) : ?>
				<a href="<?php the_field('youtube_link', 'options'); ?>" target="_blank"><span class="icon-youtube" aria-hidden="true"></span></a>
			<?php endif; ?>
			<?php if ( get_field('instagram_link', 'options') ) : ?>
				<a href="<?php the_field('instagram_link', 'options'); ?>" target="_blank"><span class="icon-instagram" aria-hidden="true"></span></a>
			<?php endif; ?>
		</div>
	</div>
	<div id="bottom-footer-bar">
		<div class="left-content-container">
			<p><?php the_field('copyright', 'options'); ?></p>
			<?php wp_nav_menu(array('theme_location' => 'footer_menu')) ?>
		</div>
		<div class="right-content-container">
			<a href="cacpro.com" target="_blank">Handcrafted <span class="icon-cacpro"></span></a>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
