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
<body id="preload" <?php body_class(); ?>>

<div class="wrap">

<!-- begin header -->
<header>
	<!-- Add navigation menu, etc. -->
</header>
