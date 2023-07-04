<?php

//Disable the Wordpress Admin Bar.
show_admin_bar(false);

/** include js scripts */
function add_scripts() 
{ 
	if (!is_admin()) 
	{
		wp_deregister_script( 'jquery' );		
		wp_register_script( 'jquery', ( 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js' ), false, null, true );
		wp_enqueue_script( 'jquery' );	
		
		wp_enqueue_script('bootstrap', get_bloginfo('stylesheet_directory').'/js/bootstrap.min.js', '', '3.3.2', true);
		wp_enqueue_script('fastclick', get_bloginfo('stylesheet_directory').'/js/fastclick.js', '', '1.0', true);
		wp_enqueue_script('smoothScroll', get_bloginfo('stylesheet_directory').'/js/smoothScroll.min.js', '', '1.4.4', true);
		wp_enqueue_script('css3-animate-it', get_bloginfo('stylesheet_directory').'/js/css3-animate-it.js', '', '1.0.0', true);		
		wp_enqueue_script('jquery-animsition', get_bloginfo('stylesheet_directory').'/js/animsition.min.js', '', '1.0.0', true);
		wp_enqueue_script('lazy-load', get_bloginfo('stylesheet_directory').'/js/lazyload.min.js', '', '10.19.0', true);
		wp_enqueue_script('jquery-custom', get_bloginfo('stylesheet_directory').'/js/jquery.site.js', '', '1.0', true);	
		
		wp_enqueue_style('reset-style', get_bloginfo('stylesheet_directory').'/css/reset.css');	
		wp_enqueue_style('animsition-style', get_bloginfo('stylesheet_directory').'/css/animsition.min.css');
		wp_enqueue_style('css3-animate-it-style', get_bloginfo('stylesheet_directory').'/css/animations.css');
		wp_enqueue_style('bootstrap-style', get_bloginfo('stylesheet_directory').'/css/bootstrap.min.css');
		wp_enqueue_style('site-style', get_bloginfo('stylesheet_directory').'/css/style.css');			
	}
}
add_action('wp_enqueue_scripts', 'add_scripts');


/* Add a ACF Option menu */
if( function_exists('acf_add_options_page') ) 
{	
	acf_add_options_page();
	acf_set_options_page_title('Site Options');	
}		

/* Add Support for Menus */
add_theme_support( 'menus' );

if ( function_exists( 'register_nav_menus' ) ) 
{
  	register_nav_menus(
  		array(
  		  'main_menu' => 'Main Menu'
  		)
  	); 	
}

function custom_remove_editor_init() 
{
    // if post not set, just return 
    // fix when post not set, throws PHP's undefined index warning
    if (isset($_GET['post'])) {
        $post_id = $_GET['post'];
    } else if (isset($_POST['post_ID'])) {
        $post_id = $_POST['post_ID'];
    } else {
        return;
    }
    
    $pageName = get_the_title($post_id);
    $template_file = get_post_meta($post_id, '_wp_page_template', TRUE);
    $templates = array();

    if (in_array($template_file, $templates) || strtolower($pageName) == 'home') {
        remove_post_type_support('page', 'editor');
    }
}	
add_action('init', 'custom_remove_editor_init');

//Remove script version...
function custom_remove_script_version( $src )
{
    $parts = explode( '?', $src );
    return $parts[0];
}
add_filter( 'script_loader_src', 'custom_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', 'custom_remove_script_version', 15, 1 );

//Allow SVGS
function custom_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'custom_mime_types');

add_filter( 'wp_check_filetype_and_ext', function($filetype_ext_data, $file, $filename, $mimes) {
	if ( substr($filename, -4) === '.svg' ) {
		$filetype_ext_data['ext'] = 'svg';
		$filetype_ext_data['type'] = 'image/svg+xml';
	}
	return $filetype_ext_data;
}, 100, 4 );

//Remove links from images
function custom_imagelink_setup() 
{
    $image_set = get_option( 'image_default_link_type' );
    if ($image_set !== 'none') 
    {
        update_option('image_default_link_type', 'none');
    }
}

add_action('admin_init', 'custom_imagelink_setup', 10);		

function custom_login_logo() { ?>
    <style type="text/css">    		    
        body.login div#login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/site-login-logo.svg);
            padding-bottom: 30px;
            width: 280px;
            background-size: contain;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'custom_login_logo' );

function custom_login_logo_url() {
    return get_bloginfo('url');
}
add_filter( 'login_headerurl', 'custom_login_logo_url' );

// pull in helpers
require_once('include/helper.php');	
// pull in shortcodes
require_once('include/shortcodes.php');	
// pull in ajax calls
require_once('include/ajaxcalls.php');	
// pull in ajax calls
require_once('include/cpt.php');
?>