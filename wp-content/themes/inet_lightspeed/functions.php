<?php
/**
 * LightSpeed functions and definitions
 *
 * @package WordPress
 * @since 1.0.0
 */

/**
 * Custom Template functions
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom template tags for the theme.
 */
require get_template_directory() . '/inc/template-tags.php';



add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 1920, 9999 );

add_theme_support( 'custom-logo' );
add_theme_support( 'title-tag' );
add_theme_support( 'woocommerce' ); 



add_action('admin_enqueue_scripts', 'admin_theme_style');
function admin_theme_style() {
  wp_enqueue_style( 'admin-theme', get_template_directory_uri() . '/admin.css' );
}



//Remove that stupid width attribute from Caption divs!!
add_filter( 'img_caption_shortcode_width', '__return_false' );


// Decrease the image size threshold to 1920px
// Anything larger than this will be automatically scaled by Wordpress
function inet_big_image_size_threshold( $threshold ) {
    return 1920; 
}
add_filter('big_image_size_threshold', 'inet_big_image_size_threshold', 1, 1);


//Adjust uploaded jpeg quality to 80
function filter_jpeg_quality( $int, $edit_image ) { 
    return 80;
}; 
add_filter( 'jpeg_quality', 'filter_jpeg_quality', 1, 2 ); 


//Remove duotone crap from 5.9 + global styles
remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );



/* Disable the backend editor for pages, because we are using ACF fields now */
add_action('init', 'my_remove_editor_from_post_type');
function my_remove_editor_from_post_type() {
    
    if (is_admin() && isset($_GET['post'])) {
     
        $current_page = $_GET['post'];
        $template = get_page_template_slug($current_page);
        $front_page_id =  get_option('page_on_front');

        if ($template || $current_page == $front_page_id)
        remove_post_type_support( 'page', 'editor' );
        
    }
    
}


add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {

    // Check function exists.
    if( function_exists('acf_add_options_page') ) {

        // Register options page.
        $option_page = acf_add_options_page(array(
            'page_title'    => __('Site Settings'),
            'menu_title'    => __('Site Settings'),
            'menu_slug'     => 'site-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false
        ));
    }
}


/*
 * Switch default core markup for these items
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
        'script',
        'style'
	)
);


/**
 * Allow changing of the canonical URL.
 *
 * @param string $canonical The canonical URL.
 */
add_filter( 'rank_math/frontend/canonical', function( $canonical ) {
	return $canonical;
});


/* Register our menus
 * 
 */
register_nav_menus(
	array(
		'desktop-nav' => __( 'Desktop Menu', 'lightspeed' ),
	)
);
register_nav_menus(
	array(
		'mobile-nav' => __( 'Mobile Menu', 'lightspeed' ),
	)
);


/**
 * Register default widget areas.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function lightspeed_widgets_init() {
    
    //Widgets
    register_widget( 'inet_related_posts_by_tag' );
    
    
    //Sidebars too
	register_sidebar(
		array(
			'name' => __( 'Footer', 'lightspeed' ),
			'id'    => 'footer-widgets',
			'class'   => 'footer-widgets',
			'description' => 'Widgets that appear in the footer',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		)
	);
	
	register_sidebar(
		array(
			'name' => __( 'Posts Sidebar', 'lightspeed' ),
			'id' => 'sidebar-post',
			'class' => 'sidebar-post',
			'description' => 'Sidebar for Posts',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		)
	);
	
	register_sidebar(
		array(
			'name' => __( 'Page Sidebar', 'lightspeed' ),
			'id' => 'sidebar-page',
			'class' => 'sidebar-page',
			'description' => 'Sidebar for Pages',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		)
	);
    
    register_sidebar(
		array(
			'name' => __( 'Archive Sidebar', 'lightspeed' ),
			'id' => 'sidebar-archive',
			'class' => 'sidebar-archive',
			'description' => 'Sidebar for Archives',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		)
	);
    
    
   

}
add_action( 'widgets_init', 'lightspeed_widgets_init' );


/* The related posts by tags widget */
class inet_related_posts_by_tag extends WP_Widget {

    function __construct() {
    parent::__construct(

        'inet_related_posts_by_tag', //base ID
        __('Related Posts by Tag', 'lightspeed') //name

        );
        
    }

    // Creating widget front-end

    public function widget( $args, $instance ) {
        
        $tags = get_the_tags();
        if (!$tags || empty($tags)) return;
        
        
        echo "<h2>Related Posts</h2>";
        
        foreach($tags as $tag) {
            $related_tags .= $tag->slug.",";    
        }
        $related_tags = rtrim($related_tags, ',');
        
        //Get 5 recent + related posts with these tags, ignoring our current post of course
        $current_id = get_the_ID();
        
        $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => $instance['amount'],
            'post__not_in' => array($current_id),
            'orderby' => 'date',
            'order' => 'DESC',
            'fields' => 'ids'
        );
        
        $related_posts = new WP_Query($args);
        if ($related_posts->have_posts()) {
            
            echo "<ul class='related-posts'>";
            foreach($related_posts->posts as $pid) {
                
                $link = get_the_permalink($pid);
                $title = get_the_title($pid);
                $date = get_the_date('', $pid);
                
                
                echo "<li><a href='$link'>$title</a><span class='date'>$date</span></li>";
                
            }
            echo "<ul>";
        }
                
    }

    // Widget Backend 
    public function form( $instance ) {
        
        
        if ( isset( $instance[ 'amount' ] ) ) {
            $amount = $instance[ 'amount' ];
        } else {
            $amount = 5;
        }
        // admin form
        ?>
        <p>
        <label for="<?php echo $this->get_field_id( 'amount' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'amount' ); ?>" name="<?php echo $this->get_field_name( 'amount' ); ?>" type="text" value="<?php echo esc_attr( $amount ); ?>" />
        </p>

        <?php
    }

    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        
        $instance = array();
        $instance['amount'] = ( !empty( $new_instance['amount'] ) ) ? strip_tags( $new_instance['amount'] ) : '';
        
        return $instance;
    
    }

} 

