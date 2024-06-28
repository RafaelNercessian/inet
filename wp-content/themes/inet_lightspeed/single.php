<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();

get_template_part('partials/breadcrumb');

?>

<div class="container">
	<div class="row">
		
		<div class="col-md-12 col-lg-8">
		    
            <article id="primary" class="content-area">

				<?php if ( is_singular()): ?>   
					<?php get_template_part( 'template-parts/header/entry', 'header' ); ?>
					<?php rewind_posts(); ?>       
				<?php endif; ?>

				<?php

				/* Start the Loop */
				while ( have_posts() ) :

					the_post();
					get_template_part( 'template-parts/content/content', 'single' );

				endwhile; // End of the loop.
				?>

			</article>
            
            <?php get_template_part('partials/social-sharing'); ?>
            
		</div>

		<aside class="widget-area col-md-12 col-lg-3" role="complementary" aria-label="<?php esc_attr_e( 'Sidebar', 'lightspeed' ); ?>">
			<?php dynamic_sidebar( 'sidebar-post' ); ?>
		</aside>
		
	</div>	
</div>
   
<?php
get_footer();