<?php
$titleHero = esc_html(get_sub_field('title'));
$subtitle = esc_html(get_sub_field('subtitle'));
$wineImageId = esc_html(get_sub_field('wine')['id']);
?>
<div class="hero position-relative">
    <section class="container">
        <div class="row d-flex align-items-center">
            <section class="col-md-6 col-12 hero__containertext">
                <h1 class="hero__title"><?= $titleHero ?></h1>
                <h4 class="hero__subtitle fw-normal"><?= $subtitle ?></h4>
                <div class="d-flex align-items-center justify-content-start my-lg-3 gap-5">
                    <div class="row w-100">
                        <div class="col-md-12 col-lg-6">
                            <a href="#" class="d-flex gap-1 align-items-center fw-bold text-uppercase hero__anchorlink">Our
                                products<i
                                        class="icon-long-arrow-right"></i></a>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <a href="#" class="d-flex gap-1 align-items-center fw-bold text-uppercase hero__anchorlink">Contact
                                Us<i
                                        class="icon-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </section>
            <section class="col-md-5 offset-md-1 col-12 hero__containerimage p-0">
                <section class="row d-flex align-items-end">
                    <section class="col-md-10 offset-md-0 col-6 offset-7 mt-n4 mt-md-0 p-0 hero__contentimage">
                        <?= wp_get_attachment_image($wineImageId, 'large') ?>
                    </section>
                    <section class="d-none d-lg-block col-2 hero__icon d-flex gap-1">
                        <i class="icon-twitter hero__icon--white"></i>
                        <i class="icon-instagram hero__icon--white"></i>
                        <i class="icon-facebook hero__icon--white"></i>
                    </section>
                </section>
            </section>
        </div>
    </section>
</div>