<?php
/*
*  Let's you unload all the script + style handles that plugins enqueue globally.
*
*/


#Show enqueued scripts/styles for dequeuing if needed
#add_action( 'wp_footer', 'show_enqueued_scripts_styles', 99999);
function show_enqueued_scripts_styles() {
    
    global $wp_scripts, $wp_styles;
    
    echo "<div style='border:1px solid blue; background:#D7EBFF; padding:2em; color:black;'>";
    
        echo 'SCRIPT Handles:'. "<br><br>";
           foreach($wp_scripts->queue as $handle) echo $handle . "<br>";

        echo 'STYLE Handles:'. "<br><br>";
           foreach($wp_styles->queue as $handle) echo $handle . "<br>";

    echo "</div>";
    
}


add_action( 'wp_enqueue_scripts', 'inet_dequeue_descript', 99999 );
function inet_dequeue_descript() {
	
	
	global $wp_scripts, $wp_styles;
    
    
	/* Globals */	
	$descript = array();
	$destyle = array();
    
 
    /**
     * Check if WooCommerce is active
     */
    if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

        //Dequeue/Descript everything WooCom if 
        if(!is_shop() && !is_product() && !is_product_category() && !is_cart() && !is_checkout() && !is_account_page()){

            $destyle = array_merge($destyle, array('woocommerce-layout',
                                                   'woocommerce-smallscreen',
                                                   'woocommerce-general',
                                                   'woocommerce-inline',
                                                   'wc-gift-cards-blocks-integration',
                                                   'wc-gc-css',
                                                   'wc-blocks-style'));

            $descript = array_merge($descript, array(
                'woocommerce',
                'wc-add-to-cart',
                'sourcebuster-js',
                'woo-tracks',
                'wc-order-attribution',
                'wc-order-attribution-blocks'
            ));

        }
        
    }//End if woocommerce is active
    
    
    //No Gutenberg style on pages, unless it's using the default template
    //Or is a single post (blog post)
    global $template;    
    if (basename($template) != "page.php" && !is_singular('post')) {
 
        $destyle = array_merge($destyle, array(
            'rank-math-toc-block-style',
            'classic-theme-styles',	    // Gutenberg Wordpress core
            'wp-block-library',		    // Gutenberg Wordpress core
            'wp-block-library-theme', 	// Gutenberg Wordpress core
            'global-styles',             // Gutenberg Global block garbage
        ));
        
    }
    
		
    if (!empty($descript))
    foreach($descript as $src) {
        wp_deregister_script($src);
        wp_dequeue_script($src);
    }
    
    if (!empty($destyle))
    foreach($destyle as $src) {
        wp_deregister_style($src);
        wp_dequeue_style($src) ;
    }
    	
}

