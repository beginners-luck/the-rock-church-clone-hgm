<?php 
/* Template Name: Contact */
get_header(); 
?>

<!-- begin content -->
<div id="content" role="main" <?php post_class(); ?>>
    <div class="container-fluid">
        <div id="contact-content-container">
            <div class="container container-1190">
                <div>
                    <div class="wp-content">
                        <?php the_field('content'); ?>
                    </div>
                    <div class="form"><?php the_field('form'); ?></div>
                </div>
            </div>
        </div>
    </div>				
</div> <!-- end #content -->

<?php get_footer(); ?>