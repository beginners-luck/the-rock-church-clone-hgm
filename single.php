<?php get_header(); ?>

<!-- begin content -->
<div id="content" role="main" <?php post_class(); ?>>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>    				
		<?php the_content(); ?>
    <?php endwhile; else:?>
	<?php endif; ?>					
</div> <!-- end #content -->

<?php get_footer(); ?>