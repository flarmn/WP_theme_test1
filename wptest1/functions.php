<?php
 
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
?>