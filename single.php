<?php get_header(); ?>

<div id="content" role="main" <?php post_class(); ?>>
  <h1>Single.php</h1>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>    				
    <?php 
      if ( has_post_thumbnail() ) {
        $featured_image_url = getImageUrl( get_the_ID() );
        echo '<img alt="" src="' . $featured_image_url . '" />';
      }
    ?>
    <h2><?php the_title(); ?></h2>

    <?php $categories = get_the_category(); ?>
    <?php 
    if ( ! empty( $categories ) ) {
      echo '<h4>' . _e( 'Posted In', 'nd_dosth' ) . '</h4>';
      the_category();
    } 
    ?>

    <h4><?php _e( 'Publish On', 'nd_dosth' ); ?></h4>
    <?php the_date(); ?>
    
    <h4><?php _e( 'Author', 'nd_dosth' ); ?></h4>
    <a class="author-archive" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
      <?php the_author(); ?>
    </a>
    <?php echo get_avatar( get_the_author_meta('ID')  , 100 ); ?>

    <?php the_content(); ?>
  <?php endwhile; else:?>
	<?php endif; ?>					
</div> <!-- end #content -->

<?php get_footer(); ?>
