<?php
get_header(); ?>
    <div id="main-content" class="main-content">
        <div id="primary" class="content-area">
            <div id="content" class="site-content" role="main">

                <?php
                // Start the Loop.
                if (have_rows('homepage')):
                    while (have_rows('homepage')) : the_row();
                        $layout = get_row_layout();
                        if ($layout == 'hero') {
                            get_template_part('partials/hero', $layout);
                        } elseif ($layout == 'welcome_cork_vine') {
                            get_template_part('partials/welcome_cork_vine', $layout);
                        } elseif ($layout == 'features_brands') {
                            get_template_part('partials/features-brands', $layout);
                        } elseif ($layout == 'upcoming_events') {
                            get_template_part('partials/upcoming-events', $layout);
                        } elseif ($layout == 'services') {
                            get_template_part('partials/services', $layout);
                        }
                    endwhile;
                endif;
                ?>
            </div><!-- #content -->
        </div><!-- #primary -->
    </div><!-- #main-content -->
<?php
get_footer();