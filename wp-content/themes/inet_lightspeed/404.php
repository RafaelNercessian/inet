<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>

<section class="error-404 not-found">
    
    <div class="container text-center mt-4">
        <div class="col-12">
            <h3>404</h3>
            <h1><?php _e( 'Oops! That page can&rsquo;t be found.', 'lightspeed' ); ?></h1>
            <p>Please return to the <a href="/"><strong>home page.</strong></a></p>
        </div>
    </div>
    
</section>

<?php
get_footer();
