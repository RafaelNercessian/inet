<?php
$title = esc_html(get_sub_field('title'));
$subtitle = esc_html(get_sub_field('subtitle'));
$content = esc_html(get_sub_field('content'));
$mainImageId = esc_html(get_sub_field('main_image')['id']);
?>
<section class="container d-flex align-items-start vh-100 row mx-auto justify-content-between my-5">
    <section class="col-lg-6 my-6">
        <h2 class="welcome__title"><?= $title ?></h2>
        <h3 class="welcome__subtitle fw-normal"><?= $subtitle ?></h3>
        <p class="h6 welcome__content my-1"><?= $content ?></p>
        <a href="#" class="d-flex gap-1 align-items-center fw-bold text-uppercase welcome__anchorlink">Our story<i
                    class="icon-long-arrow-right"></i></a>
    </section>
    <section class="col-lg-5">
        <?= wp_get_attachment_image($mainImageId, 'large') ?>
    </section>
</section>
