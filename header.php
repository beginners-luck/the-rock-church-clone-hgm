<?php
/**
 * @
 * @ - Header
 * @version:		1.0
 *
 * @author: 		John Starr
 * @website:		cacpro.com
 *
*/
?>
<!DOCTYPE html>
<head>
<?php
	if(is_front_page())
	{
?>
		<title><?php echo get_bloginfo('name'); ?></title>
<?php
	}
	else
	{
?>
		<title><?php wp_title('', true, 'right'); echo ' | ' . get_bloginfo('name'); ?></title>
<?php
	}
?>
<meta name="MobileOptimized" content="width" />
<meta name="HandheldFriendly" content="True"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0" />

<link rel="index" title="<?php bloginfo( 'name' ); ?>" href="<?php echo get_option('home'); ?>/" />
<?php wp_head(); ?>
</head>
<body id="preload" <?php body_class('animistion'); ?>>

<div class="wrap">

<!-- Begin header -->
<header class="container-fluid">
	
	<?php if ( get_field('show_alert', 'options') == 1 ) : ?>
		<!-- Only display alert bar if user selects it in site options -->
		<?php if ( get_field('alert_link', 'options') ) : ?>
			<a id="alert-bar" href="<?php the_field('alert_link', 'options'); ?>">
				<p>
				<?php the_field('alert_content', 'options'); ?><span class="icon-arrow-white" aria-hidden="true"></span>
				</p>
			</a>
		<?php else : ?>
			<div id="alert-bar">
				<p>
				<?php the_field('alert_content', 'options'); ?>
				</p>
			</div>
		<?php endif; ?>
	<?php endif; ?>
	
	<?php get_template_part('/template-parts/navigation'); ?>
	
	<?php 
	// Get the correct header for the page type/template
	if (is_front_page()) {
		get_template_part('template-parts/header', 'home'); 
	} else if ( is_page_template('template-pages/rios-template.php') ) {
		get_template_part('template-parts/header', 'rios'); 
	} else if ( is_singular( 'message' ) ) { // message cpt
		get_template_part('template-parts/header', 'message-single'); 
	} else if ( is_singular( 'event' ) ) { // event cpt
		get_template_part('template-parts/header', 'event-single'); 
	} else { /* I'm New, Messages, Ways to Connect, About, Events, Contact, Give, Default Template */ 
		get_template_part('template-parts/header', 'default'); 
	}
	?>
	
</header>
<!-- End header -->
