<?php
$title = esc_html(get_sub_field('title'));
$subtitle = esc_html(get_sub_field('subtitle'));
$content = esc_html(get_sub_field('content'));
$mainImageId = esc_html(get_sub_field('main_image')['id']);
?>
<section class="services d-flex align-items-center">
    <section class="container">
        <section class="row">
            <section
                    class="content d-flex flex-column justify-content-center align-items-start col-md-7 col-xl-6">
                <h2 class="services__title"><?= $title ?></h2>
                <h3 class="services__subtitle"><?= $subtitle ?></h3>
                <p class="h6 services__content"><?= $content ?></p>
                <div class="d-flex align-items-center justify-content-start my-lg-3 gap-5">
                    <a href="#" class="d-flex gap-1 align-items-center fw-bold text-uppercase services__anchorlink">Our
                        Services<i
                                class="icon-long-arrow-right"></i></a>
                    <a href="#" class="d-flex gap-1 align-items-center fw-bold text-uppercase services__anchorlink">Contact
                        Us<i
                                class="icon-long-arrow-right"></i></a>
                </div>
            </section>

            <section class="col-md-5 col-lg-5 col-xl-5 position-relative offset-xl-1">
                <div class="services__containerimage--absolute">
                    <?= wp_get_attachment_image($mainImageId, 'large') ?>
                </div>
            </section>
        </section>
    </section>
</section>
