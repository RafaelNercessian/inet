<?php
$title = esc_html(get_sub_field('title'));
$subtitle = esc_html(get_sub_field('subtitle'));
$content = esc_html(get_sub_field('content'));
$terms = get_terms(array(
    'taxonomy' => 'category_drink',
    'hide_empty' => false,
    'parent' => 0
)); ?>
<section class="container portfolio">
    <section class="row mx-auto">
        <h2 class="portfolio__title"><?= $title ?></h2>
        <h3 class="portfolio__subtitle"><?= $subtitle ?></h3>
        <p class="portfolio__content"><?= $content ?></p>
    </section>
    <section class="row mx-auto px-0">
        <section class="col-lg-3 portfolio__drinks">
            <h3 class="portfolio__featuredproductstitle text-uppercase">Featured Products</h3>
            <?php if (!empty($terms) && !is_wp_error($terms)): ?>
                <ul class="drink-categories p-0">
                    <?php foreach ($terms as $term):
                        $children = get_terms(array(
                            'taxonomy' => 'category_drink',
                            'hide_empty' => false,
                            'parent' => $term->term_id
                        ));
                        $hasChildren = !empty($children) && !is_wp_error($children);
                        ?>
                        <li class="category-item <?= $hasChildren ? 'has-children' : '' ?>">
                            <span role="button" class="category-name fw-bold d-flex align-items-center text-uppercase">
                                <?php if ($hasChildren): ?>
                                    <i class="icon-plus"></i>
                                <?php endif; ?>
                                <?= esc_html($term->name) ?>
                            </span>
                            <?php if ($hasChildren): ?>
                                <ul class="subcategory-list p-0" style="display: none;">
                                    <?php foreach ($children as $child): ?>
                                        <li class="category-child-name text-uppercase"><?= esc_html($child->name) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </section>
        <section class="col-lg-9">
            <section class="owl-carousel-container">
                <div class="container position-relative">
                    <div class="owl-carousel portfolio-carousel mt-3 mt-lg-0">
                        <?php
                        $args = array(
                            'posts_per_page' => 10, //Let's limit as 10 for now
                            'post_type' => 'drink',
                            'post_status' => 'publish',
                        );
                        $portfolioQuery = new WP_Query($args);
                        if ($portfolioQuery->have_posts()) : ?>
                            <?php while ($portfolioQuery->have_posts()) : $portfolioQuery->the_post(); ?>
                                <a class="achorcarousel" href="<?php the_permalink() ?>">
                                    <div class="carousel-item">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <div class="carousel-image-container image-wrapper">
                                                <?php the_post_thumbnail('large'); ?>
                                                <div class="carousel__titlewrapper">
                                                    <h3 class="carousel__title fw-normal"><?php the_title(); ?></h3>
                                                    <p class="carousel__subtitle fw-normal"><?= esc_html(get_post_meta(get_the_ID(), 'bottle_name', true)) ?></p>
                                                </div>
                                                <div class="carousel-overlay d-flex flex-column justify-content-start">
                                                    <h3 class="carousel__titleoverlay fw-normal"><?php the_title(); ?></h3>
                                                    <p class="carousel__subtitleoverlay fw-normal"><?= esc_html(get_post_meta(get_the_ID(), 'bottle_name', true)) ?></p>
                                                    <?php
                                                    $child_terms = get_terms(array(
                                                        'taxonomy' => 'category_drink',
                                                        'hide_empty' => false,
                                                        'parent' => 0,
                                                    ));

                                                    $all_child_terms = array();
                                                    if (!empty($child_terms) && !is_wp_error($child_terms)) {
                                                        foreach ($child_terms as $parent_term) {
                                                            $children = get_terms(array(
                                                                'taxonomy' => 'category_drink',
                                                                'hide_empty' => true,
                                                                'parent' => $parent_term->term_id
                                                            ));

                                                            if (!empty($children) && !is_wp_error($children)) {
                                                                $all_child_terms = array_merge($all_child_terms, $children);
                                                            }
                                                        }
                                                    }

                                                    if (!empty($all_child_terms)): ?>
                                                        <ul class="carousel__categoryitem p-0">
                                                            <?php foreach ($all_child_terms as $term): ?>
                                                                <li class="carousel__categoryitemlist"><?= esc_html($term->name) ?></li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                    <p class="carousel__region"><?= esc_html(get_post_meta(get_the_ID(), 'region', true)) ?></p>
                                                    <p class="carousel__viewproduct">View product</p>
                                                    <i class="icon-long-arrow-right"></i>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </a>
                            <?php endwhile;
                        endif;
                        wp_reset_postdata(); ?>
                    </div>
                    <button class="portfolio-custom-nav custom-nav-prev"><i class="icon-chevron-left"></i></button>
                    <button class="portfolio-custom-nav custom-nav-next"><i class="icon-chevron-right"></i></button>
                </div>
            </section>
        </section>
    </section>
</section>


