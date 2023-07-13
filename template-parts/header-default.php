<div id="default-header-container">
    <?php
    if ( is_archive('messages') ) {
        $imageUrl = get_field('messages_image', 'options');;
    } else {
        $imageUrl = getImageUrl(get_the_id(), '');
    }
    
    ?>
    <img class="background-image lazy" alt="" src="<?php echo $imageUrl; ?>" />
    <h1>
        <?php wp_title(''); ?>
    </h1>
</div>