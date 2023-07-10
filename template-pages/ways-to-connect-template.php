<?php 
/* Template Name: Ways to Connect */
get_header(); 
?>

<!-- begin content -->
<div id="content" role="main" <?php post_class(); ?>>
    <div class="container-fluid">
        <?php
        $pos = 'left';
        $bkg = 'white'; 
        if ( have_rows('opportunities') ) : while( have_rows('opportunities') ) : the_row();
            if (get_sub_field('anchor')) {
                echo '<span id="' . get_sub_field('anchor') . '"></span>';
            }
            echo generateOnePhotoContentRow(get_sub_field('image'), get_sub_field('content'), $pos, $bkg);
            $pos = $pos == 'left' ? 'right' : 'left';
            $bkg = $bkg == 'white' ? 'blue' : 'white';
        endwhile; 
        endif; 
        ?>
    </div>				
</div> <!-- end #content -->

<?php get_footer(); ?>