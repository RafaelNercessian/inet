jQuery(document).ready(function ($) {
    var carousels = {
        didyouknow: $('.didyouknow-carousel'),
        portfolio: $('.portfolio-carousel'),
        featuredbrands: $('.featuredbrands-carousel')
    };

    function initCarousel(carousel, options) {
        carousel.owlCarousel(options);
    }

    function setupNavigation(carousel, prevSelector, nextSelector) {
        $(prevSelector).click(function () {
            carousel.trigger('prev.owl.carousel');
        });
        $(nextSelector).click(function () {
            carousel.trigger('next.owl.carousel');
        });
    }

    var carouselOptions = {
        featuredbrands: {
            loop: true,
            margin: 10,
            nav: false,
            autoHeight: true,
            responsive: {
                0: { items: 1 },
                600: { items: 2 },
                1000: { items: 3 }
            }
        },
        portfolio: {
            loop: true,
            margin: 10,
            autoHeight: true,
            nav: false,
            responsive: {
                0: { items: 1 },
                600: { items: 2 },
                1440: { items: 3 }
            }
        },
        didyouknow: {
            loop: true,
            margin: 10,
            autoHeight: true,
            nav: false,
            responsive: {
                0: { items: 1 },
                600: { items: 2 },
                1000: { items: 3 }
            }
        }
    };

    // Initialize carousels
    Object.keys(carousels).forEach(function(key) {
        initCarousel(carousels[key], carouselOptions[key]);
    });

    // Setup navigation
    setupNavigation(carousels.featuredbrands, '.featuredbrandscarousel-custom-nav.custom-nav-prev', '.featuredbrandscarousel-custom-nav.custom-nav-next');
    setupNavigation(carousels.portfolio, '.portfolio-custom-nav.custom-nav-prev', '.portfolio-custom-nav.custom-nav-next');
    setupNavigation(carousels.didyouknow, '.didyouknow-custom-nav.custom-nav-prev', '.didyouknow-custom-nav.custom-nav-next');

    // Category item toggle
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

    // Refresh carousels after window resize
    $(window).on('resize', function() {
        Object.values(carousels).forEach(function(carousel) {
            carousel.trigger('refresh.owl.carousel');
        });
    });

    // Refresh carousels after all images are loaded
    $(window).on('load', function() {
        Object.values(carousels).forEach(function(carousel) {
            carousel.trigger('refresh.owl.carousel');
        });
    });
});