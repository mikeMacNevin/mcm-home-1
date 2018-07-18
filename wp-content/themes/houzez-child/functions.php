<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:


if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array( 'bootstrap.min','font-awesome.min','houzez-all', 'houzez-main') );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );


add_action( 'wp_enqueue_scripts', 'enqueue_child_theme_styles', PHP_INT_MAX);
function enqueue_child_theme_styles() {
    wp_enqueue_style( 'about-us', get_stylesheet_directory_uri() . '/css/about-us.css');
    wp_enqueue_style( 'home-nav', get_stylesheet_directory_uri() . '/css/home-nav.css');
    wp_enqueue_style( 'footer', get_stylesheet_directory_uri() . '/css/footer.css');
    wp_enqueue_style( 'home-carousel', get_stylesheet_directory_uri() . '/css/home-carousel.css');

}



add_action( 'wp_enqueue_scripts', 'enqueue_load_fa' );
function enqueue_load_fa() {
 
    wp_enqueue_style( 'load-fa', 'https://use.fontawesome.com/releases/v5.1.0/css/all.css');

}

add_filter('tiny_mce_before_init', 'override_mce_options');    
function remove_empty_p( $content ) {
    $content = force_balance_tags( $content );
    $content = preg_replace( '#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content );
    $content = preg_replace( '~\s?<p>(\s|&nbsp;)+</p>\s?~', '', $content );
    return $content;
}
add_filter('the_content', 'remove_empty_p', 20, 1); 

remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );


function my_own_scripts() {
    wp_enqueue_script( 'mikes-footer', get_template_directory_uri() . '/js/mikes-footer.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'my_own_scripts' );





// END ENQUEUE PARENT ACTION

// function enqueue_my_scripts () 
// {

// }


?>
