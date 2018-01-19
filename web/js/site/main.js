$(document).ready(function () {
    //menu
    $(window).on("load resize", function() {
        var width = $(window).width();

        if(width < 992){
            $('.title').click(function () {
                $('.menu-drop').hide();
                $(this).next('.menu-drop').toggle();
            });
        }
    });


    //menu


    $("#contact-form,#callback-form, .calculate-price").submit(function (e) {
        e.preventDefault();

        var form = $(this);

        var data = form.serialize();
        $.ajax({
            data: data,
            url: "/mail",
            success: function () {
                form.find('.send').val("Отправлено").attr('disabled','disabled');
            }
        });
        return false;
    });



    $('.order-call').click(function () {
        var modal =  $('.modal-call');
        modal.show();
        $("html,body").css("overflow","hidden");

        modal.off().on('click', function (e) {
            if($(e.target).hasClass('wrapper')){
                modal.hide();
                $("html,body").css("overflow","auto");
            }

        })
    });


    $('.documents .item').click(function () {

        $('.item').removeClass('active');
        var currentItem = $(this).addClass('active');
        var url = $(this).attr('data-url');


        var scroll = $(window).scrollTop();
        var modal = $('.modal-window');
        modal.css({
            top: scroll+'px'
        });

        modal.find('img').attr('src', url);

        modal.show();
        $("html,body").css("overflow","hidden");

        $('.left').off().on('click',function () {
            var prev = currentItem.parent().prev().find('.item');
            modal.hide();


            if(prev.length){
                prev.click();
            }
            else{
                prev = $('.item:last').addClass('active');
                prev.click();
            }

        });

        $('.right').off().on('click',function () {
            var next = currentItem.parent().next().find('.item');
            modal.hide();


            if(next.length){
                next.click();
            }
            else{
                next = $('.item:first').addClass('active');
                next.click();
            }

        });




        modal.off().on('click', function (e) {
            if($(e.target).hasClass('wrapper')){
                modal.hide();
                $("html,body").css("overflow","auto");
            }

        })
    });


    $('.cross').click(function () {
        $(this).hide();
        $('.menu').css({'paddingBottom':'50px'});
        $('.bars').show();
        $('.row-mobile').hide();
    });
    $('.bars').click(function () {
        $(this).hide();
        $('.menu').css({'paddingBottom':'10px'});
        $('.cross').show();
        $('.row-mobile').show();
    });


    var owl3 = $('#carousel_clients');
    owl3.owlCarousel({
        items:3,
        nav: true,
        navText:["<div class='owl-prev'> <i class='fa fa-angle-left'></i></div>","<div class='owl-next'> <i class='fa fa-angle-right'></i></div>"],
        loop: true,
        responsive: {
            0: {items: 1},
            993: {items: 2},
            1200: {items: 3},
        }
    });

    var owl = $('#carousel');
    owl.owlCarousel({
        items:1,
        dots: true,
        dotClass: "owl-dot",
        dotsClass: "owl-dots",
        activeClass: "active",
        dotData: false,
        nav: true,
        navText:["<div class='owl-prev'> <i class='fa fa-angle-left'></i></div>","<div class='owl-next'> <i class='fa fa-angle-right'></i></div>"],
        loop: true,

    });

 /*   $('.owl-dot').click(function () {
        owl.trigger('to.owl.carousel.active', [$(this).index(), 300]);
    });*/

    var owl2 = $('#carousel_doc');
    owl2.owlCarousel({
        items:6,
        nav: true,
        navText:["<div class='owl-prev'> <i class='fa fa-angle-left'></i></div>","<div class='owl-next'> <i class='fa fa-angle-right'></i></div>"],
        loop: true,
        responsive: {
            0: {items: 1},

            600:{items:2},

            993: {items: 6},
        }
    });

});

