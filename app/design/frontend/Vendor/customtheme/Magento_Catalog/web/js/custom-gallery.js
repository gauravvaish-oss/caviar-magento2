require(['jquery'], function ($) {
    $(document).ready(function () {
        $('.product-images .images img').on('click', function () {
            var fullImg = $(this).attr('data-full');
            $('#current').attr('src', fullImg);
            $('.product-images .images img').css('opacity', '1');
            $(this).css('opacity', '0.6');
        });
    });
});
