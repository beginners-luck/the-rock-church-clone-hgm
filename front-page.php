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
		<!-- Begin Top Banner -->
		<div id="home-location-times-banner">
		<?php the_field( 'location_times_banner' ); ?>
		</div>
		<!-- End Top Banner -->

		<!-- Begin Recent Sermons Section -->
		<?php get_template_part('template-parts/sermon', 'recent'); ?>
		<!-- End Recent Sermons Section -->

		<!-- Begin Ways to Connect Section -->
		<div id="home-ways-to-connect-section">
			<div class="left-content-container">
				<?php if (have_rows('ways-to-connect')) : while (have_rows('ways-to-connect')) : the_row(); ?>
					<?php 
					$connect_slug_field = get_sub_field('page_slug'); 
					if ($connect_slug_field) {
					?>
						<a class="connect-link" href=" <?php echo get_home_url() . $connect_slug_field ?>">
							<img class="connect-image lazy background-image" alt="" src="<?php the_sub_field('image') ?>" />
							<p class="connect-text"><?php the_sub_field('title') ; ?></p>
						</a>
					<?php
					} else {
					?>
						<div class="connect-link">
							<img class="connect-image lazy background-image" alt="" src="<?php the_sub_field('image') ?>" />
							<p class="connect-text"><?php the_sub_field('title') ; ?></p>
						</div>
					<?php
					}
					?>
				<?php endwhile ; ?>
				<?php endif ; ?>
				
			</div>
			<div class="right-content-container">
				<div class="wp-content">
					<?php the_field('ways_to_connect_content'); ?>
				</div>
			</div>
		</div>
		<!-- End Ways to Connect Seciton -->

		<!-- Begin About Us Section -->
		<?php if (have_rows('about_us')) : while (have_rows('about_us')) : the_row(); ?>
		<div id="home-about-us-section" class="container container-1380">
			<img class="background-image lazy" alt="" src="<?php the_sub_field('background_image') ?>" />
			<div class="wp-content">
			<?php the_sub_field('content') ; ?>
			</div>
		</div>
		<?php endwhile; ?>
		<?php endif; ?>
		<!-- End About Us Section -->

		<div id="home-upcoming-events-section">
			<!-- TODO -->
		</div>
	</div>
</div> <!-- end #content -->

<?php get_footer(); ?>