<?php
/**
 * @
 * @ - Front Page
 * @version:		1.0
 *
 * @author: 		John Starr
 *
*/

get_header(); ?>

<!-- begin content -->
<div id="content" role="main">
	<div class="container-fluid">
		<div id="home-location-times-banner">
			<!-- TODO - Add content -->
		</div>
		<div id="home-recent-sermon-section">
			<!-- TODO - may be able to make a function call/template -->
		</div>
		<div id="home-ways-to-connect-section">
			
		</div>

		<?php if (have_rows('about_us')) : while (have_rows('about_us')) : the_row(); ?>
		<div id="home-about-us-section">
			<img class="background-image lazy" alt="" src="<?php the_sub_field('background_image') ?>" />
			<div class="wp-content">
			<?php the_sub_field('content') ; ?>
			</div>
		</div>
		<?php endwhile; ?>
		<?php endif; ?>

		<div id="home-upcoming-events-section">
			<!-- TODO -->
		</div>
	</div>
</div> <!-- end #content -->

<?php get_footer(); ?>