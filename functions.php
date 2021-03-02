<?php 

function neuron_themes_file() {
    
    wp_enqueue_style( 'animate', get_template_directory_uri( ) .'/assets/css/animate.min.css' , [], '1.0', 'all' );
    wp_enqueue_style( 'font-awesome', get_template_directory_uri( ) .'/assets/fonts/font-awesome/css/font-awesome.min.css' , [], '1.0', 'all' );
    wp_enqueue_style( 'owl-carousel', get_template_directory_uri( ) .'/assets/css/owl.carousel.min.css' , [], '1.0', 'all' );
    wp_enqueue_style( 'bootsnav-menu', get_template_directory_uri( ) .'/assets/css/bootsnav.css' , [], '1.0', 'all' );
    wp_enqueue_style( 'bootstrap-menu', get_template_directory_uri( ) .'/assets/bootstrap/css/bootstrap.min.css' , [], '1.0', 'all' );

    wp_enqueue_style( 'neuron-css', get_stylesheet_uri() );


    wp_enqueue_script( 'bootstrap', get_template_directory_uri(  ) .'/assets/bootstrap/js/bootstrap.min.js', array('jquery'), '1.0', true );
    wp_enqueue_script( 'bootsnav', get_template_directory_uri(  ) .'/assets/js/bootsnav.js', array('jquery'), '1.0', true );
    wp_enqueue_script( 'owl-carousel-min', get_template_directory_uri(  ) .'/assets/js/owl.carousel.min.js', array('jquery'), '1.0', true );
    wp_enqueue_script( 'wow-min', get_template_directory_uri(  ) .'/assets/js/wow.min.js', array('jquery'), '1.0', true );
    wp_enqueue_script( 'ajaxchimp', get_template_directory_uri(  ) .'/assets/js/ajaxchimp.js', array('jquery'), '1.0', true );
    wp_enqueue_script( 'ajaxchimp-config', get_template_directory_uri(  ) .'/assets/js/ajaxchimp-config.js', array('jquery'), '1.0', true );
    wp_enqueue_script( 'neuron-script', get_template_directory_uri(  ) .'/assets/js/script.js', array('jquery'), '1.0', true );

}

add_action('wp_enqueue_scripts', 'neuron_themes_file' );


function neuron_theme_supports () {
    // loading textdomain
    load_theme_textdomain( 'neuron', get_template_directory() . '/languages');

    //Generated automated feed link on head 
    add_theme_support( 'automatic-feed-links' );

    // adding automatic title tag 
    add_theme_support( 'title-tag' );

    // Enabling post thumbnails
    add_theme_support( 'post-thumbnails' );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        array(
            'menu-1' => esc_html__( 'Primary', 'neuron' ),
        )
    );

    /*
        * Switch default core markup for search form, comment form, and comments
        * to output valid HTML5.
        */
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    // add custom logo support
    add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);


}
add_action('after_setup_theme', 'neuron_theme_supports');

// Registering custom post
add_action('init', 'neuron_custom_post');

function neuron_custom_post() {
    register_post_type('slide',
    array(
        'labels' => array(
            'name' => __('Slides'),
            'singular_name' => __('Slide')
        ),
        'supports' => array('title', 'editor', 'custom-fields', 'thumbnail', 'page-attributes'),
        'public' => false,
        'show_ui' => true
    )
);
    register_post_type('feature',
    array(
        'labels' => array(
            'name' => __('Features'),
            'singular_name' => __('Feature')
        ),
        'supports' => array('title', 'editor', 'custom-fields', 'thumbnail', 'page-attributes'),
        'public' => false,
        'show_ui' => true
    )
);
    register_post_type('service',
    array(
        'labels' => array(
            'name' => __('Services'),
            'singular_name' => __('Service')
        ),
        'supports' => array('title', 'editor', 'custom-fields', 'thumbnail', 'page-attributes'),
        'public' => false,
        'show_ui' => true
    )
);
}

