<?php
    register_nav_menus(
        array("primary-menu"=>'Top Menu')
    );

    add_theme_support('custom-header');
    add_theme_support('post-thumbnails');

    function wp_blank_setup() {
        // Support programmable title tag.
        add_theme_support( 'title-tag' );
    
        // Support custom logo.
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'custom-logo' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
        add_theme_support( 'customize-selective-refresh-widgets' );
        add_theme_support( 'post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) ); 
        load_theme_textdomain( 'wp-blank', get_template_directory() . '/languages' );
    
    }
    add_action( 'after_setup_theme', 'wp_blank_setup' );


    function get_taxonomy_field($field_name, $term_id, $taxonomy) {
        // Ensure the taxonomy prefix for ACF
        $term_key = $taxonomy . '_' . $term_id;
        return get_field($field_name, $term_key);
    }

    function remove_posts_menu() {
        remove_menu_page('edit.php'); // This removes the Posts menu item
        remove_menu_page('edit-comments.php'); // This removes the Posts menu item
    }
    add_action('admin_menu', 'remove_posts_menu', 999);

?>