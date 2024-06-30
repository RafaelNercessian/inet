<?php
$title = esc_html(get_sub_field('title'));
$subtitle = esc_html(get_sub_field('subtitle'));
$content = esc_html(get_sub_field('content'));
?>
<section class="didyouknow">
    <section class="row container mx-auto">
        <section class="col-12 mb-4">
            <h2 class="didyouknow__title"><?= $title ?></h2>
            <h3 class="didyouknow__subtitle"><?= $subtitle ?></h3>
            <p class="didyouknow__content h6"><?= $content ?></p>
        </section>
    </section>
    <section class="owl-carousel-container">
        <div class="container position-relative">
            <div class="owl-carousel didyouknow-carousel">
                <?php
                $args = array(
                    'posts_per_page' => 10,
                    'post_type' => 'post',
                    'post_status' => 'publish',
                );
                $featured_query = new WP_Query($args);
                if ($featured_query->have_posts()) : ?>
                    <?php while ($featured_query->have_posts()) : $featured_query->the_post(); ?>
                        <a class="achorcarousel" href="<?php the_permalink() ?>">
                            <div class="carousel-item">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="carousel-image-container">
                                        <?php the_post_thumbnail('large'); ?>
                                        <div class="carousel-overlay"></div>
                                        <h3 class="carousel__title fw-normal"><?php the_title(); ?></h3>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </a>
                    <?php endwhile;
                endif; ?>
            </div>
            <button class="didyouknow-custom-nav custom-nav-prev"><i class="icon-chevron-left"></i></button>
            <button class="didyouknow-custom-nav custom-nav-next"><i class="icon-chevron-right"></i></button>
        </div>
    </section>
</section>

