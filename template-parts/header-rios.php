<div id="rios-header-container">
    <img class="background-image lazy" alt="" src="<?php echo getImageUrl(get_the_id(), ''); ?>" />
    <h1 class="header-content"><?php the_field('header_content'); ?></h1>
    
    <?php  echo generateVideo(get_field('header_video_image'), get_field('header_video_link'), "big")?>
</div>