<?php
$title = esc_html(get_sub_field('title'));
$subtitle = esc_html(get_sub_field('subtitle'));
?>
<section class="featuredbrands my-5">
    <section class="container row mx-auto featuredbrands__container">
        <section>
            <h2 class="featuredbrands__title"><?= $title ?></h2>
            <h3 class="featuredbrands__subtitle fw-normal"><?= $subtitle ?></h3>
        </section>
        <section class="owl-carousel-container">
            <div class="container position-relative">
                <div class="owl-carousel featuredbrands-carousel">
                    <?php
                    $args = array(
                        'posts_per_page' => 10,
                        'post_type' => 'featured_product',
                        'post_status' => 'publish',
                    );
                    $featured_query = new WP_Query($args);
                    if ($featured_query->have_posts()) : ?>
                        <?php while ($featured_query->have_posts()) : $featured_query->the_post(); ?>
                            <a class="achorcarousel" href="<?php the_permalink() ?>">
                                <div class="carousel-item">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="carousel-image-container">
                                            <?php the_post_thumbnail('large', array('class' => 'background-image')); ?>
                                            <?php
                                            $imageId = get_field('image_bottle', get_the_ID());
                                            echo wp_get_attachment_image($imageId['ID'], 'large', false, array('class' => 'featured-product-image'));
                                            ?>
                                        </div>fw-bol
                                    <?php endif; ?>
                                    <h3 class="carousel__title text-uppercase"><?php the_title(); ?></h3>
                                </div>
                            </a>
                        <?php endwhile;
                    endif;
                    wp_reset_postdata(); ?>
                </div>
                <button class="featuredbrandscarousel-custom-nav custom-nav-prev"><i class="icon-chevron-left"></i>
                </button>
                <button class="featuredbrandscarousel-custom-nav custom-nav-next"><i class="icon-chevron-right"></i>
                </button>
            </div>
        </section>
    </section>
    <a class="d-flex mx-auto carousel__viewbrands justify-content-center align-items-center text-uppercase" href="#">View all
        brands</a>
</section>