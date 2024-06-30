jQuery(document).ready(function ($) {
    var didyouknow = $('.didyouknow-carousel');
    var owl = $('.featured-carousel');
    owl.owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        autoplay: true,
        autoplayTimeout: 5000,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    });

    didyouknow.owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    });

    $('.didyouknow-custom-nav.custom-nav-prev').click(function() {
        didyouknow.trigger('prev.owl.carousel');
    });
    $('.didyouknow-custom-nav.custom-nav-next').click(function() {
        didyouknow.trigger('next.owl.carousel');
    });
});