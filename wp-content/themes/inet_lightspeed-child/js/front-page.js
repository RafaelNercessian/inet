document.addEventListener('DOMContentLoaded', function() {
    const welcomeSection = document.querySelector('.welcome');

    let lastScrollTop = 0;
    const scrollThreshold = 50;

    window.addEventListener('scroll', function() {
        const st = window.pageYOffset || document.documentElement.scrollTop;
        if (st > lastScrollTop) {
            // Scrolling down
            if (st > scrollThreshold) {
                welcomeSection.classList.add('visible');
            }
        } else {
            if (st < scrollThreshold) {
                welcomeSection.classList.remove('visible');
            }
        }

        lastScrollTop = st <= 0 ? 0 : st; // For Mobile or negative scrolling
    }, false);
});