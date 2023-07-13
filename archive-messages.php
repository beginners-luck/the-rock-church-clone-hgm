<?php
get_header();
?>
<div id="content" role="main">
    <div class="container-fluid">
    
    <?php 
        // Retreiving the most recent sermon to feature it at the top
        $recentSermon = wp_get_recent_posts(array(
            'numberposts' => 1,
            'post_status' => 'publish',
            'post_type' => 'messages'
        ));

        /* Using offset with pagination: https://stackoverflow.com/questions/41786703/pagination-doesnt-work-when-offset-is-set-in-wordpress */
        $paged = ( get_query_var('paged') ) ? absint( get_query_var('paged') ) : 1;
        $currentPage = get_query_var('paged');
        $currentPage = max( 1, $currentPage );
        ?>


        <?php if ( $currentPage == 1 ) : ?>
            <?php foreach ( $recentSermon as $sermon ) : ?>
                <div class="introduction-video-container">
                    <div class="container container-1170">
                        <div class="intro-video-container">
                            <div class="wp-content left-content-container">
                                <h2><?php echo $sermon['post_title']; ?></h2>
                                <p><?php echo date('F j, Y', strtotime($sermon['post_date'])); ?></p>
                            </div>
                            <?php echo generateVideo(get_the_post_thumbnail_url($sermon['ID'], "full"), get_permalink($sermon['ID']), "big", false); ?>
                        </div>
                    </div>
                </div>
            <?php 
            endforeach; 
            wp_reset_postdata();
            ?>
        <?php else : ?>
            <div class="no-recent-sermon">
                
            </div>
        <?php endif; ?>


        <?php 
        /* (continued) Using offset with pagination: https://stackoverflow.com/questions/41786703/pagination-doesnt-work-when-offset-is-set-in-wordpress */
        $perPage = get_option('posts_per_page');
        $offsetStart = 1; 
        $offset = ( $currentPage - 1 ) * $perPage + $offsetStart;

        // Retrieving the sermons after the featured sermon
        $sermons = new WP_Query( array(
            'post_type' => 'messages',
            'post_status' => 'publish',
            'posts_per_page' => $perPage, 
            'offset' => $offset,
            'paged' => $currentPage // protects against arbitrary paged values
        ));

        $totalRows = max( 0, $sermons->found_posts - $offsetStart );
        $totalPages = ceil( $totalRows/ $perPage );
        ?>
        <?php if ( $sermons->have_posts() ) : ?>
            <div id="archived-messages" class="container container-1170">
                <div>
                <?php while ( $sermons->have_posts() ) : $sermons->the_post(); ?>
                    <div class="message">
                        <a class="message-link" href="<?php the_permalink(); ?>">
                            <div class="photo-container">
                                <img class="background-image lazy" alt="" src="<?php the_post_thumbnail_url(''); ?>" />
                            </div>
                            <h4 class="message-title"><?php the_title(); ?></h4>
                            <p class="message-date"><?php the_time('F j, Y'); ?></p>
                        </a>
                    </div>
                    <?php 
                endwhile; 
                wp_reset_postdata();
                ?>
                </div>
            </div>

            <?php
                if ($totalPages > 1) {
                    $big = 999999999; // need an unlikely integer
                    
                    echo '<div id="pagination" class="blue-background">';
                        echo paginate_links( array(
                            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                            'format' => '?paged=%#%',
                            'current' => $currentPage,
                            'prev_next' => true,
                            'total' => $totalPages,
                            'prev_text' => '<span class="icon-arrow-blue"></span>',
                            'next_text' => '<span class="icon-arrow-blue"></span>'
                        ));
                    echo '</div>';
                }
            ?>
        <?php else : ?>
            <div id="alert-message">
                <p>No messages available at this time.</p>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php
get_footer(); ?>