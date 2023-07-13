<?php 
/* Template Name: About */
get_header(); 
?>

<!-- begin content -->
<div id="content" role="main" <?php post_class(); ?>>
    <div class="container-fluid">

        <div id="about-intro" class="container container-1170">
            <h2>
                <?php the_field('introduction_content'); ?>
            </h2>
        </div>

        <?php 
        if ( have_rows('what_to_expect_section') ) : while( have_rows('what_to_expect_section') ) : the_row();
            echo generateTwoPhotosContentRow(get_sub_field('top_image'), get_sub_field('bottom_image'), get_sub_field('content'));
        endwhile; 
        endif; 
        ?>

        <div id="leadership-container" class="container container-1170">
            <h1>Leadership</h1>
            <div class="leadership">
                <?php 
                if ( have_rows('leadership') ) : while( have_rows('leadership') ) : the_row();
                ?>
                    <div class="leader">
                        <div class="portrait-img-container">
                            <img class="background-image" alt="" src="<?php the_sub_field('staff_image') ?>" />
                        </div>
                        <h4 class="leader-name"><?php the_sub_field('first_and_lastname') ?></h4>
                        <p class="leader-position"><?php the_sub_field('position') ?></p>
                    </div>
                <?php
                endwhile; 
                endif; 
                ?>
            </div>
        </div>

    </div>				
</div> <!-- end #content -->

<?php get_footer(); ?>