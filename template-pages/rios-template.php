<?php 
/* Template Name: Rios */
get_header(); 
?>

<!-- begin content -->
<div id="content" role="main" <?php post_class(); ?>>
    <div class="container-fluid">
        <div id="rios-introduction" class="container container-970">
            <?php the_field('introduction_content'); ?>
        </div>

        <?php 
        if (have_rows('meeting_times_section')) : while (have_rows('meeting_times_section')) : the_row() ;
            $top_image = get_sub_field('top_image');
            $bottom_image = get_sub_field('bottom_image');
            $content = get_sub_field('content');
        endwhile; 
        endif; 

        echo generateTwoPhotosContentRow($top_image, $bottom_image, $content); 
        ?>

        <?php 
        if (have_rows('where_to_start_section')) : while (have_rows('where_to_start_section')) : the_row() ;
            $image = get_sub_field('image');
            $content = get_sub_field('content');
        endwhile; 
        endif; 

        echo generateOnePhotoContentRow($image, $content); 
        ?>

        <div id="rios-callout" class="wp-content container container-1030">
            <?php the_field('callout') ?>
        </div>
    </div>				
</div> <!-- end #content -->

<?php get_footer(); ?>