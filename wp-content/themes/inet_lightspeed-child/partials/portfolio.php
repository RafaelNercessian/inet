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
        <section class="col-lg-3">
            <h3>Featured Products</h3>
            <?php if (!empty($terms) && !is_wp_error($terms)): ?>
                <ul class="drink-categories">
                    <?php foreach ($terms as $term): ?>
                        <li><?= esc_html($term->name) ?>
                            <?php
                            $children = get_terms(array(
                                'taxonomy' => 'category_drink',
                                'hide_empty' => false,
                                'parent' => $term->term_id
                            ));

                            if (!empty($children) && !is_wp_error($children)): ?>
                                <ul>
                                    <?php
                                    foreach ($children as $child):?>
                                        <li><?= esc_html($child->name) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </section>
    </section>
</section>


