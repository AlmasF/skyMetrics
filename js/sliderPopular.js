$(document).ready(function(){
    $('.popular-slider').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        variableWidth: true,
        arrows: true,
        nextArrow: '<button class="slick-arrow slick-next"><img src="img/popular/next.svg"></button>',
        prevArrow: '<button class="slick-arrow slick-prev"><img src="img/popular/prev.svg"></button>'
    });
});