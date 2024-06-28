<?php
/**
 * The template for displaying generic pages
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

<section id="main" class="container my-3">
    <div class="row">
        <div class="col-12">
            <?php the_content(); ?>
        </div>
    </div>
</section>

<?php

get_footer();