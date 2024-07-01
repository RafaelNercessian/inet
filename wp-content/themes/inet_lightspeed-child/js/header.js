jQuery(document).ready(function($) {
    var masthead = $('#masthead');
    var logo = $('.logo img');
    var initialLogoWidth = logo.width();

    $(window).scroll(function() {
        if ($(window).scrollTop() > 50) {
            masthead.addClass('scrolled');
            logo.css('width', '120px');
        } else {
            masthead.removeClass('scrolled');
            logo.css('width', initialLogoWidth + 'px');
        }
    });
});