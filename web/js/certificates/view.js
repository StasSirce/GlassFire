$(document).ready(function () {

    $('.item').click(function () {

        $('.item').removeClass('active');
        var currentItem = $(this).addClass('active');
        var url = $(this).attr('data-url');


        var scroll = $(window).scrollTop();
        var modal = $('.modal-window');
        modal.css({
            top: scroll + 'px'
        });

        modal.find('img').attr('src', url);

        modal.show();
        $("html,body").css("overflow", "hidden");

        $('.left').off().on('click', function () {
            var prev = currentItem.parent().prev().find('.item');
            modal.hide();


            if (prev.length) {
                prev.click();
            }
            else {
                prev = $('.item:last').addClass('active');
                prev.click();
            }

        });

        $('.right').off().on('click', function () {
            var next = currentItem.parent().next().find('.item');
            modal.hide();


            if (next.length) {
                next.click();
            }
            else {
                next = $('.item:first').addClass('active');
                next.click();
            }

        });


        modal.off().on('click', function (e) {
            if ($(e.target).hasClass('wrapper')) {
                modal.hide();
                $("html,body").css("overflow", "auto");
            }

        })
    });
});