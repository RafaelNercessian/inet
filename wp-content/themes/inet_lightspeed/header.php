<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    
    <?php
    //Add GTM if not on staging or local dev
    if (strpos($_SERVER['SERVER_NAME'], '.inetpowered') === false && strpos($_SERVER['SERVER_NAME'], '.local') === false) :
    ?>
    <!-- Put GTM HEAD SNIPPET HERE -->
    <?php endif; ?>
    
    <!-- Preconnect common scripts & fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preconnect" href="https://www.googletagmanager.com">
    <link rel="preconnect" href="https://www.google-analytics.com">
    <link rel="preconnect" href="https://cdn.calltrk.com">
    <link rel="preconnect" href="https://js.calltrk.com">
   
    <!-- dns-prefetch fallbacks for common scripts -->
    <link rel="dns-prefetch" href="https://fonts.googleapis.com" crossorigin />
    <link rel="dns-prefetch" href="https://fonts.gstatic.com" crossorigin />
    <link rel="dns-prefetch" href="https://www.googletagmanager.com">
    <link rel="dns-prefetch" href="https://www.google-analytics.com">
    <link rel="dns-prefetch" href="https://cdn.calltrk.com">
    <link rel="dns-prefetch" href="https://js.calltrk.com">
        
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
    <link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/css/fonts/standard-icons/icomoon.ttf" as="font" type="font/ttf" crossorigin="">
    <?php wp_head(); ?>
    
    <?php
    //custom ld+json schema
	if (function_exists('get_field')) {
        if (get_field('inet_json_ld_schema') != "")
		echo '<script type="application/ld+json">'. wp_kses_post(get_field('inet_json_ld_schema')) . '</script>' . "\r\n";
	}
	?>
</head>

<body <?php body_class(); ?>>
<?php
//Add GTM if not on staging or local dev
if (strpos($_SERVER['SERVER_NAME'], '.inetpowered') === false && strpos($_SERVER['SERVER_NAME'], '.local') === false) :
?>
<!-- Put GTM BODY SNIPPET HERE -->
<?php endif; ?>
<?php do_action( 'wp_body_open' ); ?>

<header id="masthead" class="container">

  <div class="row">

	  <div class="col-9 col-sm-4 logo">
			<?php echo inet_custom_logo(); ?>
	  </div>

	  <div class="col-3 col-sm-8 d-flex justify-content-end align-items-center">
			<?php if ( has_nav_menu( 'mobile-nav') ) : ?>
				<div class="mobile-nav-toggle"><img src="<?php _e(get_stylesheet_directory_uri()); ?>/img/nav-burger.svg" width="45" height="45" alt="nav-toggle"></div>
				<div class="mobile-nav-container">
					<div class="close" style="padding: 10px 15px 10px 0; text-align:right">
						<span>Close <i class="icon-x" style="cursor:pointer;"></i></span>
					</div>
					<nav id="mobile-nav">
					 <?php
						wp_nav_menu(
							array(
								'theme_location' => 'mobile-nav',
								'menu_class'   => 'mobile-nav',
								'items_wrap'   => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                'item_spacing'   => 'discard',
								'container'    => false
							)
						);
					 ?>
					</nav>
				</div>
			<?php endif; ?>
	  </div>
 </div>
</header>

<?php if ( has_nav_menu( 'desktop-nav' ) ) : ?>
<nav class="container navigation" aria-label="<?php esc_attr_e( 'Menu', 'lightspeed' ); ?>">
	  <?php
	  wp_nav_menu(
		  array(
			  'theme_location' => 'desktop-nav',
			  'menu_class'     => 'main-menu',
			  'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
              'item_spacing'   => 'discard',
			  'container' 	 => false
		  )
	  );
	  ?>
</nav>
<?php endif; ?>