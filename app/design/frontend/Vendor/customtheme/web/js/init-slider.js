require(['jquery', 'js/tiny-slider'], function($) {
    $(document).ready(function() {
        $('.hero-slider').tineSlider({
            autoplay: true,
            items: 1,
            nav: true,
            dots: true
        });
    });
});
