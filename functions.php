<?php

// Halim Theme Functions
add_action('after_setup_theme', 'halim_theme_setup');
function halim_theme_setup()
{
    add_theme_support('title-tag'); // Enable title tag support
    add_theme_support('post-thumbnails'); // Enable post thumbnails support
    add_theme_support('custom-logo', array(
        'height' => 100,
        'width' => 100,
        'flex-height' => true,
        'flex-width' => true,
    ));

    register_nav_menus(
        array(
            'primary_menu' => __('Primary Menu', 'halim'),
            'quick_links' => __('Quick Links', 'halim')
        )
    );
}


// Halim Enqueue Assets 
add_action('wp_enqueue_scripts', 'halim_enqueue_assets');
function halim_enqueue_assets()
{
    // Enqueue Google Fonts
    wp_enqueue_style('halim-google-fonts', 'https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700', [], null);

    // Enqueue CSS files
    wp_enqueue_style('halim-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', [], '4.0.0');
    wp_enqueue_style('halim-font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', [], '4.7.0');
    wp_enqueue_style('halim-magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css', [], '1.1.0');
    wp_enqueue_style('halim-owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.css', [], '2.3.4');
    wp_enqueue_style('halim-style', get_template_directory_uri() . '/assets/css/style.css', [], '1.0.0');
    wp_enqueue_style('halim-responsive', get_template_directory_uri() . '/assets/css/responsive.css', [], '1.0.0');

    // Enqueue JS files
    wp_enqueue_script('halim-jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', [], '3.6.0', true);
    wp_enqueue_script('halim-popper', get_template_directory_uri() . '/assets/js/popper.min.js', ['jquery'], '1.16.1', true);
    wp_enqueue_script('halim-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', ['jquery'], '4.0.0', true);
    wp_enqueue_script('halim-owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', ['jquery'], '2.3.4', true);
    wp_enqueue_script('halim-magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', ['jquery'], '1.1.0', true);
    wp_enqueue_script('halim-isotope', get_template_directory_uri() . '/assets/js/isotope.min.js', ['jquery'], '3.0.6', true);
    wp_enqueue_script('halim-imageloaded', get_template_directory_uri() . '/assets/js/imageloaded.min.js', ['jquery'], '4.1.4', true);
    wp_enqueue_script('halim-counterup', get_template_directory_uri() . '/assets/js/jquery.counterup.min.js', ['jquery'], '1.0', true);
    wp_enqueue_script('halim-waypoint', get_template_directory_uri() . '/assets/js/waypoint.min.js', ['jquery'], '4.0.1', true);
    wp_enqueue_script('halim-main', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], '1.0.0', true);
}



// Slider Post Type
add_action('init', 'halim_register_slider_post_type');
function halim_register_slider_post_type()
{
    register_post_type('slider', array(
        'labels' => array(
            'name' => 'Sliders',
            'singular_name' => 'Slider',
            'add_new' => 'Add New',
            'add_new_item' => 'Add New Slider',
            'edit_item' => 'Edit Slider',
            'new_item' => 'New Slider',
            'view_item' => 'View Slider',
            'all_items' => 'All Sliders',
        ),
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-images-alt2',
        'supports' => array('title', 'editor', 'thumbnail'),
    ));
}
