<?php 
/* Template Name: Give */
get_header(); 
?>

<!-- begin content -->
<div id="content" role="main" <?php post_class(); ?>>
    <div class="container-fluid">
        <div id="give-content" class="container container-970">
            <?php the_field('content'); ?>
        </div>
        <div id="give-form" class="container container-770">
            <?php the_field('form'); ?>
        </div>
    </div>				
</div> <!-- end #content -->

<?php get_footer(); ?>
