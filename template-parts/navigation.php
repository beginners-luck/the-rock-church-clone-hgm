<nav id="navigation-menu">
    <a id="home-logo-link" href="<?php echo get_home_url(); ?>">
        <img class="logo" alt="Site logo" src="<?php echo get_template_directory_uri( ) . "/images/logo.svg" ?>" />
    </a>

    <?php wp_nav_menu(array('theme_location' => 'main_menu')); ?>
</nav>

<!-- <nav id="mobile-navigation-menu" class="toggle-hidden">

</nav> -->
