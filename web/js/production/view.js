$(document).ready(function () {

    $('.images').owlCarousel({
        items:3,
        margin: 15,
        dots: true,
        loop: true,
        responsive: {
            0: {
                items: 1
            },
            550: {
                items: 2
            },
            800: {
                items: 3
            }
        }
    });

});