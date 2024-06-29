<?php
$title = esc_html(get_sub_field('title'));
$subtitle = esc_html(get_sub_field('subtitle'));
?>
<section class="featuredbrands my-5">
    <section class="container row mx-auto featuredbrands__container">
        <section>
            <h2 class="featuredbrands__title"><?= $title ?></h2>
            <h3 class="featuredbrands__subtitle fw-normal my-1"><?= $subtitle ?></h3>
        </section>
        <section>
            <?php
            $args = array(
                'post_type' => 'wine',
                'posts_per_page' => 10,
            );
            $featured_query = new WP_Query($args);
            if ($featured_query->have_posts()) : ?>
                <div class="owl-carousel featured-carousel">
                    <?php while ($featured_query->have_posts()) : $featured_query->the_post(); ?>
                        <div class="carousel-item">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('large'); ?>
                            <?php endif; ?>
                            <h6 class="carousel__title text-uppercase fw-normal my-2"><?php the_title(); ?></h6>
                        </div>
                    <?php endwhile; ?>
                </div>
                <?php wp_reset_postdata();
            endif; ?>
            <a class="d-flex mx-auto carousel__viewbrands justify-content-center align-items-center" href="#">View all brands</a>
        </section>
    </section>
</section>