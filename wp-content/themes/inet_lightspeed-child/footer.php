<?php
/**
 * The template for displaying the footer
 */
?>

<footer id="primary-footer" class="container-fluid px-0 pt-3 footer">
    <section class="row container mx-auto px-0">
        <div class="col-lg-12">
            <?= wp_get_attachment_image('112', 'large') ?>
        </div>
        <div class="col-lg-11">

        </div>
        <div class="row footer__linkscontainer">
            <div class="col-lg-4">
                <h4 class="footer__title text-uppercase">Our products</h4>
                <nav class="footer-navigation">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer-menu',
                        'menu_class' => 'footer-menu',
                        'container' => false,
                    ));
                    ?>
                </nav>
            </div>
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