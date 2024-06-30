jQuery(document).ready(function ($) {
    var didyouknow = $('.didyouknow-carousel');
    var portfoliocarousel = $('.portfolio-carousel');
    var featuredbrandscarousel = $('.featuredbrands-carousel');
    featuredbrandscarousel.owlCarousel({
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

    $('.featuredbrands-custom-nav.custom-nav-prev').click(function () {
        featuredbrandscarousel.trigger('prev.owl.carousel');
    });
    $('.featuredbrands-custom-nav.custom-nav-next').click(function () {
        featuredbrandscarousel.trigger('next.owl.carousel');
    });

    portfoliocarousel.owlCarousel({
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

    $('.portfolio-custom-nav.custom-nav-prev').click(function () {
        portfoliocarousel.trigger('prev.owl.carousel');
    });
    $('.portfolio-custom-nav.custom-nav-next').click(function () {
        portfoliocarousel.trigger('next.owl.carousel');
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

    $('.didyouknow-custom-nav.custom-nav-prev').click(function () {
        didyouknow.trigger('prev.owl.carousel');
    });
    $('.didyouknow-custom-nav.custom-nav-next').click(function () {
        didyouknow.trigger('next.owl.carousel');
    });

    $('.category-item.has-children').each(function () {
        var $item = $(this);
        var $categoryName = $item.find('.category-name');
        var $subcategoryList = $item.find('.subcategory-list');
        var $icon = $item.find('.icon-plus');

        $categoryName.on('click', function () {
            $subcategoryList.slideToggle(300);
            $icon.toggleClass('icon-plus icon-minus');
        });
    });
});