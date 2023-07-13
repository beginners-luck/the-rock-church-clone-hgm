<?php get_header(); ?>

<div id="content" role="main" <?php post_class(); ?>>
  <div class="container-fluid">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>    				
    
    <div id="messages-content" class="container container-770">
      <h2 class="post-title"><?php the_title(); ?></h2>
      <p class="post-date"><?php the_date(); ?></p>

      <div class="wp-content">
        <?php the_field('description'); ?>
      </div>

      <?php 
      if ( get_field('audio_download') ) { 
      ?>
        <div class="file-download">
          <h5>Audio Download</h5>
          <a href="<?php the_field('audio_download'); ?>" download><span class="icon-download"></span></a>
        </div>
      <?php 
      }
      ?>
      <?php 
      if ( get_field('pdf_download') ) { 
      ?>
        <div class="file-download">
          <h5>PDF Download</h5>
          <a href="<?php the_field('pdf_download'); ?>" download><span class="icon-download"></span></a>
        </div>
      <?php 
      }
      ?>
    </div>

    <div id="return-to-sermons-bar" class="blue-background">
      <a class="button black-border" href="/messages">All Sermons</a>
    </div>
  </div>
  <?php endwhile; else:?>
	<?php endif; ?>					
</div> <!-- end #content -->

<?php get_footer(); ?>
