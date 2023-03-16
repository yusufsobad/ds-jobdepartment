$(document).ready(function () {
    setInterval(function () {
        $('.list').animate({ scrollTop: 80 }, 400, 'swing', function () {
            $(this).find('.scroll:last-child').after($('.scroll:first-child', this));
        });
    }, 30000);
});