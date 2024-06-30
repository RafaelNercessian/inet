<?php
$titleHero = esc_html(get_sub_field('title'));
$subtitle = esc_html(get_sub_field('subtitle'));
$wineImageId = esc_html(get_sub_field('wine')['id']);
?>
<section class="container row m-auto d-flex align-items-center vh-100 hero">
    <section class="col-lg-6 hero__containertext">
        <h1 class="hero__title"><?= $titleHero ?></h1>
        <h4 class="hero__subtitle fw-normal"><?= $subtitle ?></h4>
        <div class="d-flex align-items-center justify-content-start my-lg-3 gap-5">
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <a href="#" class="d-flex gap-1 align-items-center fw-bold text-uppercase hero__anchorlink">Our products<i
                                class="icon-long-arrow-right"></i></a>
                </div>
                <div class="col-md-12 col-lg-6">
                    <a href="#" class="d-flex gap-1 align-items-center fw-bold text-uppercase hero__anchorlink">Contact Us<i
                                class="icon-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>
    <section class="col-lg-5 offset-lg-1 hero__containerimage">
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