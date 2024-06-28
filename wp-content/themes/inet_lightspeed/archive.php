<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */


get_header();

get_template_part('partials/breadcrumb');




global $wp_query;

$total = $wp_query->found_posts;
$per_page = $wp_query->query_vars['posts_per_page'];
$current = max(1, $wp_query->query_vars['paged']);

?>  
<section class="container">
<div id="primary" class="row py-2">
    
    
    <?php if ( is_active_sidebar( 'sidebar-archive' ) ) : ?>
        <div class="col-md-12 col-lg-8">
    <? else: ?>
        <div class="col-md-12">
    <? endif; ?>
    
    <?php if (!is_paged()): ?>
        <h1>Welcome to our blog!</h1>
        <hr>
    <?php else : ?>
        <h1>Blog - Page <?php echo $current; ?></h1>
    <?php endif; ?>
    
    <?php if ( have_posts() ) : ?>
    
        <h5>
            <?php 

                if ( 1 === $total ) {
                    _e( 'Showing the result.', 'lightspeed' );
                } elseif ( $total <= $per_page || -1 === $per_page ) {
                    /* translators: %d: total results */
                    printf( _n( 'Showing %d article.', 'Showing %d articles.', $total, 'lightspeed' ), $total );
                } else {
                    $first = ( $per_page * $current ) - $per_page + 1;
                    $last  = min( $total, $per_page * $current );
                    /* translators: 1: first result 2: last result 3: total results */
                    printf( _nx( 'Showing %1$d&ndash;%2$d of %3$d article.', 'Showing %1$d&ndash;%2$d of %3$d articles ', $total, 'with first and last result.', 'lightspeed' ), $first, $last, $total );
                }

            ?>
        </h5>

        <?php
        // Start the Loop.
        echo "<div class='row'>";
            while ( have_posts() ) :

                the_post();

                /*
                 * Include the Post-Format-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                 */
                echo "<div class='col-sm-12 col-md-6 d-flex align-items-stretch'>";
                    get_template_part( 'template-parts/content/content', 'excerpt' );
                echo "</div>";
                // End the loop.


            endwhile;

        echo "</div>";

        // If no content, include the "No posts found" template.
    else :
        get_template_part( 'template-parts/content/content', 'none' );

    endif;
    ?>
    </div>
            
            
    <?php
    //Display the Widgets
    if ( is_active_sidebar( 'sidebar-archive' ) ) : 
    ?>
    <aside class="widget-area col-md-12 col-lg-4" role="complementary" aria-label="<?php esc_attr_e( 'Sidebar', 'lightspeed' ); ?>">
        <?php dynamic_sidebar( 'sidebar-archive' ); ?>
    </aside>
    <?php endif; ?>
    
</div><!-- #primary -->
<div class="row" id="post-navigation">
    <div class="col-12 pb-2">
     <?php
        // Previous/next page navigation.
        lightspeed_the_posts_navigation();
     ?>
    </div>
</div>


</section>

<?php
get_footer();
