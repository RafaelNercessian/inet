<?php
$titleHero = esc_html(get_field('title'));
$subtitle = esc_html(get_field('subtitle'));
$wineImageId = esc_html(get_field('wine')['id']);
$backgroundHeroId = esc_html(get_field('background_hero')['id']);
?>
<section id="main" class="container row center-container hero__container">
    <section class="col-lg-8 hero__containertext">
        <h1 class="hero__title"><?= $titleHero ?></h1>
        <h4 class="hero__subtitle"><?= $subtitle ?></h4>
    </section>
    <section class="col-lg-4 hero__containerimage">
        <section class="row">
            <div class="hero__imagebackground">
                <?= wp_get_attachment_image($backgroundHeroId, 'large') ?>
            </div>
            <?= wp_get_attachment_image($wineImageId, 'large') ?>
        </section>
    </section>
</section>
