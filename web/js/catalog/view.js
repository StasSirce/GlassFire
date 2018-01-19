$(document).ready(function () {
    var owl = $('#carousel');
    owl.owlCarousel({
        items:3,
        dots: true,
        margin: 15,
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