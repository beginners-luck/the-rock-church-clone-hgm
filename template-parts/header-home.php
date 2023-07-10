<div id="hero-container">
    <img class="background-image lazy" alt="" src="<?php echo getImageUrl(get_the_id(), ''); ?>" />
    <div class="wp-content">
        <?php the_field( 'hero_content' ) ; ?>
    </div>
</div>