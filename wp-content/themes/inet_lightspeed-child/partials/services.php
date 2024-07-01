<?php
$title = esc_html(get_sub_field('title'));
$subtitle = esc_html(get_sub_field('subtitle'));
$content = esc_html(get_sub_field('content'));
$mainImageId = esc_html(get_sub_field('main_image')['id']);
?>
<section class="services d-flex align-items-center">
    <section class="container">
        <section class="row">
            <section class="content d-flex flex-column justify-content-center align-items-start col-md-6 col-12 px-2">
                <h2 class="services__title"><?= $title ?></h2>
                <h3 class="services__subtitle"><?= $subtitle ?></h3>
                <p class="services__content mb-1"><?= $content ?></p>
                <div class="row w-100 mb-3 mb-md-0">
                    <div class="col-12 col-lg-6">
                        <a href="#" class="d-flex gap-1 align-items-center fw-bold text-uppercase services__anchorlink">Our
                            Services<i class="icon-long-arrow-right"></i></a>
                    </div>
                    <div class="col-12 col-lg-6">
                        <a href="#" class="d-flex gap-1 align-items-center fw-bold text-uppercase services__anchorlink">Contact
                            Us<i class="icon-long-arrow-right"></i></a>
                    </div>
                </div>
            </section>
            <section class="col-10 col-md-5 position-relative offset-md-1 mx-auto px-0 services__image">
                <div class="services__containerimage--absolute">
                    <?= wp_get_attachment_image($mainImageId, 'large') ?>
                </div>
            </section>
        </section>
    </section>
</section>
