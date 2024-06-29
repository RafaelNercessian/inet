<?php
$titleHero = esc_html(get_field('title'));
$subtitle = esc_html(get_field('subtitle'));
$wineImageId = esc_html(get_field('wine')['id']);
$backgroundHeroId = esc_html(get_field('background_hero')['id']);
?>
<section id="main" class="container row m-auto d-flex align-items-center vh-100">
    <section class="col-lg-8 hero__containertext">
        <h1 class="hero__title"><?= $titleHero ?></h1>
        <h4 class="hero__subtitle fw-normal"><?= $subtitle ?></h4>
        <div class="d-flex align-items-center justify-content-start my-lg-3 gap-5">
            <a href="#" class="d-flex gap-1 align-items-center fw-bold text-uppercase hero__anchorlink">Our products<i
                            class="icon-long-arrow-right"></i></a>
            <a href="#" class="d-flex gap-1 align-items-center fw-bold text-uppercase hero__anchorlink">Contact Us<i
                            class="icon-long-arrow-right"></i></a>
        </div>
    </section>
    <section class="col-lg-4 hero__containerimage">
        <section class="hero__imagebackground vh-100 position-absolute pe-none ">
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