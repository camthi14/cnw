//slick

$(document).ready(function () {
    //top_page
    $(window).scroll(function () {
        if ($(this).scrollTop()) $(".top_page").fadeIn();
        else $(".top_page").fadeOut();
    });
    $(".top_page").click(function () {
        $("body,html").animate({ scrollTop: 0 }, "slow");
    });
    
    $('.warpper_slider').slick({
        infinite: false,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        arrows: false,
        autoplay: true,
        autoplaySpeed: 2000,
    });
    $('.main_content-slick').slick({
        infinite: false,
        arrows: true,
        prevArrow: "<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
        nextArrow: "<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>"
    });
    
});

