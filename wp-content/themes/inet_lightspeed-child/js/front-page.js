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
        autoHeight: true,
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

    $('.category-item.has-children').each(function() {
        var $item = $(this);
        var $categoryName = $item.find('.category-name');
        var $subcategoryList = $item.find('.subcategory-list');
        var $icon = $item.find('.icon-plus');

        $categoryName.on('click', function() {
            $subcategoryList.slideToggle(300);
            $icon.toggleClass('icon-plus icon-minus');
        });
    });
});