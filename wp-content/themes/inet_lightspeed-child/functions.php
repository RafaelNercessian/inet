<?php
/**
* LightSpeed Child functions
*
* @package WordPress
* @since 1.0.0
     __    ____________  _____________ ____  ________________
    / /   /  _/ ____/ / / /_  __/ ___// __ \/ ____/ ____/ __ \
   / /    / // / __/ /_/ / / /  \__ \/ /_/ / __/ / __/ / / / /
  / /____/ // /_/ / __  / / /  ___/ / ____/ /___/ /___/ /_/ /
 /_____/___/\____/_/ /_/ /_/  /____/_/   /_____/_____/_____/

*/


#error reporting on Staging+Local
if (strpos($_SERVER['SERVER_NAME'], 'inetpowered') !== false 
    || strpos($_SERVER['SERVER_NAME'], '.local') !== false
    || strpos($_SERVER['SERVER_NAME'], '.dev') !== false) {
    
    ini_set('display_errors', 1);
    error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_WARNING);

}   


/**
 * Enqueue critical-rendering styles.
 *
 * This should only be used to load CSS that appears above the fold, and a few minor global utilities
 * non-critical CSS is loaded per template or module in footer.php
 *
 * global-deferred.scss should only be used for "Global" elements, like the footer, etc...
 *
 */
add_action( 'wp_enqueue_scripts', 'lightspeed_child_styles');
function lightspeed_child_styles() {
	
    
	//Global
    //Usually contains the bootstrap grid + typography + navigation + header + icons
	wp_enqueue_style( 'lightspeed-child', get_stylesheet_directory_uri() . '/css/style.css', array(), '1.0');
	
    
    //Template /CPT Criticals
    global $template;
    $css_handle = str_replace( '.php', '-critical', basename($template) );
    $css_file = str_replace(  '.php', '-critical.css', basename($template) );

    if (file_exists(get_stylesheet_directory()."/css/".$css_file)) {
        wp_enqueue_style( $css_handle, get_stylesheet_directory_uri() . '/css/'.$css_file, array('lightspeed-child'), '1.0');
    }


	
}



/**
 * Enqueue Scripts
 */
add_action( 'wp_enqueue_scripts', 'lightspeed_child_scripts', 9999); //Run late to let inet-core enqueue libraries first
function lightspeed_child_scripts() {
	
	
	wp_enqueue_script( 'bootstrap', get_stylesheet_directory_uri()."/js/bootstrap.bundle.min.js", array('jquery'), '', true );
	
	if (is_front_page() && file_exists(get_stylesheet_directory()."/js/front-page.js")) {
		wp_enqueue_script('front-page', get_stylesheet_directory_uri().'/js/front-page.js', array('jquery'), '', true);
	}

    
	// Template / CPT JS
    global $template;
    $js_handle = str_replace('.php','', basename($template) );
    $js_file = str_replace('.php','.js', basename($template) );

    if (file_exists(get_stylesheet_directory()."/js/".$js_file)) {
        wp_enqueue_script($js_handle, get_stylesheet_directory_uri().'/js/'.$js_file, array('jquery'), '', true);
    }

	 	    
}



add_action('wp_head', 'add_rel_preload', 1);
function add_rel_preload() {

	//Add rel=preload hinting for these handles
	$global_preload_styles = $GLOBALS['INET_PRELOAD_STYLES'];
	$preload_styles = array_merge($global_preload_styles, array());
    
    global $wp_styles;
    foreach($wp_styles->queue as $handle) {

        $style = $wp_styles->registered[$handle];
        $source = $style->src;

		//-- Spit out the tag if it's in our preload array
        if (in_array($handle, $preload_styles)) echo "<link rel='preload' href='{$source}' as='style'/>\n";

	}

}


/**
 * Put your Custom Post Types in this file:
 */
require get_stylesheet_directory() . '/inc/custom-post-types.php';


/**
 * Put your Custom Shortcodes in this file:
 */
require get_stylesheet_directory() . '/inc/shortcodes.php';


/**
 *
 * Descript/Dequeue for performance enhancements
 * Update:  Leave this here - it is needed for Gutenberg destyle if not on Single post, or default template page
 *
 */
require get_stylesheet_directory() . '/inc/dequeue-descript.php';

function register_footer_menu() {
    register_nav_menu('footer-menu', __('Footer Menu'));
}
add_action('after_setup_theme', 'register_footer_menu');

function register_footer_menu_two() {
    register_nav_menu('footer-menu-two', __('Footer Menu Two'));
}
add_action('after_setup_theme', 'register_footer_menu_two');

add_image_size('custom-size', 364, 529, true);