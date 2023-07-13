<?php
// wp_get_attachment_thumb_url(); 

function getImageUrl($id, $size="full") {
    $url = wp_get_attachment_image_url( get_post_thumbnail_id( $id ), $size );
    return $url; 
}

/**
 * Generates the html for the content row, with two images on the left on 
 * blue background and content on the right. 
 * 
 * top_image The topmost image url
 * bottom_image The bottommost image url
 * content The content to the right of the images
 * 
 * returns html string
 */
function generateTwoPhotosContentRow($top_image, $bottom_image, $content) {
    $html = '
    <div class="two-photos-content-row">
        <div class="left-content-container">
            <div class="top-image">
                <img class="background-image lazy" alt="" src="' . $top_image . '" />
            </div>
            <div class="bottom-image">
                <img class="background-image lazy" alt="" src="' . $bottom_image . '" />
            </div>
        </div>
        <div class="right-content-container">
            <div class="wp-content container container-500">' . $content . '</div>
        </div>
    </div>
    ';

    return $html; 
}

/**
 * Generates the html for the content row with one image and content. 
 * 
 * image The image url in the row
 * content The content for the row
 * position The position of the image (left or right)
 * background The background color
 * 
 * returns html string
 */
function generateOnePhotoContentRow($image, $content, $position = "right", $background = "white") {
    $img_pos = "photo-right";
    $bkg_color = "white-background";
    if ($position == "left") {
        $img_pos = "photo-left";
    }
    if ($background == "blue") {
        $bkg_color = "blue-background"; 
    }
    
    $html = '
    <div class="' . $bkg_color . '">
        <div class="container container-1170">
            <!-- Add photo-left to switch photo side -->
            <div class="one-photo-content-row ' . $img_pos . '">
                <div class="content-container">
                    <div class="wp-content">' . $content . '</div>
                </div>
                <div class="photo-container">
                    <img class="background-image lazy" alt="" src="' . $image . '"/>
                </div>
            </div>
        </div>
    </div>
    ';

    return $html; 
}


/**
 * Generates the html for a video element.
 * 
 * image The image to be displayed for the video
 * link The link that the play button goes to
 * size The size of the video (small or big)
 * modal True if the video opens in a popup, false if not
 * 
 * Returns html string
 */
function generateVideo($image, $link, $size = "small", $modal = true) {
    $vid_size = "";
    if ($size == "big") {
        $vid_size = "big-video"; 
    }

    $open_to_popup = "wplightbox"; 
    if (!$modal) {
        $open_to_popup = "";
    }

    $html = '
        <div class="video-container">
            <div class="video ' . $vid_size . '">
                <img class="background-image lazy" alt="" src="' . $image . '" />
                <a href="' . $link . '" class="play-container ' . $open_to_popup . '">
                    <span class="icon-play">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </span>
                </a> 
            </div>
        </div>
    ';

    return $html; 
}

/**
 * Generates the html for an accordion content block.
 * 
 * titles An array of the titles for each accordion item
 * contents An array of the contents for each accordion item
 * 
 * returns The html string
 */
function generateAccordion($titles = array(), $contents = array()) {
    $html = '
        <div class="blue-background">
            <div class="accordion container container-970">
                <h2 class="main-title">$title</h2>
                <div class="accordion-item-container">
                    <div class="title-container">
                        <h4 class="title">Title #1</h4>
                        <span class="icon-arrow-blue"></span>
                    </div>
                    <div class="content wp-content">
                        Content #1
                    </div>
                </div>
                <div class="accordion-item-container active">
                    <div class="title-container">
                        <h4 class="title">Title #2</h4>
                        <span class="icon-arrow-blue"></span>
                    </div>
                    <div class="content wp-content">
                        Content #2
                    </div>
                </div>
                <div class="accordion-item-container">
                    <div class="title-container">
                        <h4 class="title">Title #3</h4>
                        <span class="icon-arrow-blue"></span>
                    </div>
                    <div class="content wp-content">
                        Content #3
                    </div>
                </div>
            </div>
        </div>
    ';

    return $html; 
}

?>
