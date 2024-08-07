<?php
/**
 * The template for displaying the footer
 */
?>

<footer id="primary-footer" class="container-fluid pt-3 footer">
    <section class="container mx-auto footer__wrapper">
        <div class="footer_test row">
            <div class="d-flex align-items-center flex-column flex-xxl-row">
                <div class="">
                    <?php the_custom_logo() ?>
                </div>
                <div class="">
                    <p class="footer__companyname ms-0 ms-xxl-1 col-12 col-xxl-2 mt-1 mt-xxl-0">Cork+Vine Cellars</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="row footer__linkscontainer">
                <div class="col-12 col-lg-4 col-xxl-2 text-center text-lg-start">
                    <h4 class="footer__title fw-bold text-uppercase">Our products</h4>
                    <nav class="footer-navigation text-uppercase text-center text-lg-start">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer-menu',
                            'menu_class' => 'footer-menu',
                            'container' => false,
                        ));
                        ?>
                    </nav>
                </div>
                <div class="col-12 col-lg-4 col-xxl-2">
                    <h4 class="footer__title text-uppercase fw-bold text-center text-lg-start mt-2 mt-lg-0">Our
                        company</h4>
                    <nav class="footer-navigation text-uppercase text-center text-lg-start">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer-menu-two',
                            'menu_class' => 'footer-menu-two',
                            'container' => false,
                        ));
                        ?>
                    </nav>
                </div>
                <div class="col-12 col-lg-4 col-xxl-2 text-center text-lg-start">
                    <h4 class="footer__title text-uppercase fw-bold mt-2 mt-lg-0">Get in touch</h4>
                    <a class="footer__phone d-block text-center text-lg-start" href="tel:+14034661288">403-466-1288</a>
                    <a class="footer__email d-block text-center text-lg-start" href="mailto:email@fccellars.com">email@fccellars.com</a>
                    <div class="footer__socials mt-2 d-flex justify-content-center justify-content-lg-start">
                        <i class="icon-twitter"></i>
                        <i class="icon-instagram ms-1"></i>
                        <i class="icon-facebook ms-1"></i>
                    </div>
                </div>
                <div class="col-12 col-lg-12 col-xxl-4 mt-4 mt-xxl-0 text-center text-lg-start ps-xxl-4">
                    <h4 class="footer__title text-uppercase fw-bold ">Join Our Team</h4>
                    <p class="footer__jointeam">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus
                        porttitor
                        non dolor a placerat.</p>
                    <a href="#"
                       class="d-flex gap-1 align-items-center fw-bold text-uppercase footer__anchorlink mt-2 mt-xxl-1 justify-content-center justify-content-lg-start">
                        Contact Us<i
                                class="icon-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>
    <section class="container px-md-0 d-flex flex-column align-items-center flex-lg-row justify-content-lg-between footer__disclaimer">
        <div>
            <p class="footer__copyright mb-0 text-center text-xxl-start">&copy; <?= date('Y') ?> Cork + Vine Cellars | Web design & development by
                iNet
                Media Ltd.
            <p></p>
        </div>
        <div class="mt-2 mt-lg-0">
            <a class="footer__privacy" href="#">Privacy Policy</a>
        </div>
    </section>
</footer>


<?php
//outputs jQuery.js, and other enqueued scripts
wp_footer();
?>
<script type='text/javascript' src='<?php echo get_stylesheet_directory_uri() . "/js/global.js"; ?>'></script>
<script>
    jQuery(function ($) {

        <?php

        /*
        *
        * Deferred CSS, add more paths to the deferred array below if needed!
        *
        */
        $deferred_styles = array();

        #Google Fonts go here to help with LCP!
        $deferred_styles[] = "https://fonts.googleapis.com/css2?family=Tiro+Devanagari+Hindi:ital@0;1&display=swap";
        $deferred_styles[] = "https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap";


        #Main Deferred Global
        $deferred_styles[] = get_stylesheet_directory_uri() . "/css/deferred-global.css";


        # Deferred Page Template CSS
        # Takes the template's filename eg: page-contact.php, and enqueues /css/page-contact.css if it exists
        global $template;
        $template_css_file = str_replace('.php', '.css', basename($template));
        if (file_exists(get_stylesheet_directory() . "/css/" . $template_css_file)) {
            $deferred_styles[] = get_stylesheet_directory_uri() . "/css/" . $template_css_file;
        }


        # Finally...
        # Deferred Library Styles (owl, fancybox, etc...)
        $deferred_styles = array_merge($GLOBALS['INET_DEFER_STYLES'], $deferred_styles);

        ?>

        deferred = <?php echo json_encode($deferred_styles);?>;

        $(deferred).each(function (index, element) {
            var doc = document.createElement('link');
            doc.rel = 'stylesheet';
            doc.href = element;
            doc.type = 'text/css';
            var godefer = document.getElementsByTagName('link')[0];
            godefer.parentNode.insertBefore(doc, godefer);
        });

    });
</script>
</body>
</html>