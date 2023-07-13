<?php
add_action( 'init', 'register_cpts' );

function register_cpts() 
{
    register_post_type( 'messages', array(
        'labels' => array(
            'name' => 'Messages',
            'singular_name' => 'Message',
            'add_new' => 'Add New Message',
            'add_new_item' => 'Add New Message',
            'edit_item' => 'Edit Message',
            'new_item' => 'New Message',
            'all_items' => 'All Messages',
            'view_item' => 'View Messages',
            'search_items' => 'Search Messages',
            'not_found' =>  'Not found',
            'not_found_in_trash' => 'No Messages found in Trash',
            'parent_item_colon' => '',
            'menu_name' => 'Messages'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'supports' => array( 'title', 'thumbnail'),
        'rewrite' => array( 'slug' => 'messages' ),
        'has_archive' => true,
        'hierarchical' => false,
        'show_in_nav_menus' => true,
        'capability_type' => 'post',
        'query_var' => true,
        'menu_icon' => 'dashicons-book-alt' 
));
}

?>