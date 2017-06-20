<?php
 
// BOOTTRAP  + JQUERY loading <====================================================== 
function load_bootstrap() {
 
               // Bootstrap stylesheet.
 
               wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . 
               '/libs/bootstrap/css/bootstrap.min.css', array(), ' ' );
 
               //Mytheme stylesheet.
 
               // wp_enqueue_style( 'mytheme-style', get_template_directory_uri() . 
               // '/css/style.css', array(), ' ' );
 
                //Bootstrap js

               
 
               wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . 
               '/libs/bootstrap/js/bootstrap.min.js', array('jquery'), ' ' );
            
}
add_action('wp_enqueue_scripts', 'load_bootstrap');



// ADDING MENU SUPPORT <====================================================== 
function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );



// ADDING SIDEBAR SUPPORT <====================================================== 
add_action( 'widgets_init', 'theme_slug_widgets_init' );
function theme_slug_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Main Sidebar', 'theme-slug' ),
        'id' => 'sidebar-1',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>',
    ) );
}

// ADDING POST THUMBNAILS SUPPORT <====================================================== 
add_theme_support( 'post-thumbnails' ); 


// END <=========================================================================
?>



