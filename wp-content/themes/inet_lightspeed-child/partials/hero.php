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
        <section class="hero__imagebackground">
            <?= wp_get_attachment_image($backgroundHeroId, 'large') ?>
        </section>
        <section class="row d-flex align-items-end">
            <section class="col-lg-10">
                <?= wp_get_attachment_image($wineImageId, 'large') ?>
            </section>
            <section class="col-lg-2 hero__icon d-flex gap-1">
                <i class="icon-twitter hero__icon--white"></i>
                <i class="icon-instagram hero__icon--white"></i>
                <i class="icon-facebook hero__icon--white"></i>
            </section>
        </section>
    </section>
</section>