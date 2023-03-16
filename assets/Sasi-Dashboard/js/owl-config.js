$(document).ready(function () {
    $(".carousel").owlCarousel({
        startPosition: 0,
        items: 3,
        loop: false,
        autoplay: false,
        responsiveClass: true,
        // nav: true,
        // navText: ["<img src='assets/img/arrow-prev.png'>", "<img src='assets/img/arrow-next.png'>"],
        // navContainer: '.owl-nav',
        responsive: {
            300: {
                items: 2
            },
            700: {
                items: 3
            },
            1000: {
                items: 3
            },
        }
    });
    // $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    //     e.target // newly activated tab
    //     e.relatedTarget // previous active tab
    //     $(".carousel").trigger('refresh.owl.carousel');
    // });
});