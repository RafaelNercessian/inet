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
    <section class="row">
        <h2 class="portfolio__title"><?= $title ?></h2>
        <h3 class="portfolio__subtitle"><?= $subtitle ?></h3>
        <p class="portfolio__content"><?= $content ?></p>
    </section>
    <section class="row">
        <section class="col-lg-3 portfolio__drinks">
            <h3 class="portfolio__featuredproductstitle">Featured Products</h3>
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
                            <span role="button" class="category-name fw-bold d-flex align-items-center">
                                <?php if ($hasChildren): ?>
                                    <i class="icon-plus"></i>
                                <?php endif; ?>
                                <?= esc_html($term->name) ?>
                            </span>
                            <?php if ($hasChildren): ?>
                                <ul class="subcategory-list p-0" style="display: none;">
                                    <?php foreach ($children as $child): ?>
                                        <li class="category-child-name"><?= esc_html($child->name) ?></li>
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
                    <div class="owl-carousel didyouknow-carousel">
                        <?php
                        $args = array(
                            'posts_per_page' => 10,
                            'post_type' => 'drink',
                            'post_status' => 'publish',
                        );
                        $featured_query = new WP_Query($args);
                        if ($featured_query->have_posts()) : ?>
                            <?php while ($featured_query->have_posts()) : $featured_query->the_post(); ?>
                                <a class="achorcarousel" href="<?php the_permalink() ?>">
                                    <div class="carousel-item">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <div class="carousel-image-container">
                                                <?php the_post_thumbnail('medium'); ?>
                                                <div class="carousel-overlay"></div>
                                                <h3 class="carousel__title fw-normal"><?php the_title(); ?></h3>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </a>
                            <?php endwhile;
                        endif;
                        wp_reset_postdata();?>
                    </div>
                    <button class="didyouknow-custom-nav custom-nav-prev"><i class="icon-chevron-left"></i></button>
                    <button class="didyouknow-custom-nav custom-nav-next"><i class="icon-chevron-right"></i></button>
                </div>
            </section>
        </section>
    </section>
</section>


