<?php /* Template Name: I'm New */ 
get_header(); 
?>

<!-- begin content -->
<div id="content" role="main" <?php post_class(); ?>>
    <div class="container-fluid">

        <div id="new-introduction-container">
            <div class="container container-1170">
                <div class="intro-container">
                    <div class="wp-content left-content-container">
                        <?php the_field('introduction_content') ?>
                    </div>
                    <?php echo generateVideo(get_field('introduction_video_image'), get_field('introduction_video_link'), "small") ?>
                </div>
            </div>
        </div>

        <?php
        $pos = 'left';
        if ( have_rows('content_rows') ) : while ( have_rows('content_rows') ) : the_row() ;
            echo generateOnePhotoContentRow(get_sub_field('image'), get_sub_field('content'), $pos); 
            $pos = $pos == 'left' ? 'right' : 'left';
        endwhile; 
        endif; 
        ?>

        <?php echo generateAccordion(); ?>

        <?php get_template_part('template-parts/sermon', 'recent'); ?>

    </div>				
</div> <!-- end #content -->

<?php get_footer(); ?>
