var $j = jQuery.noConflict();

$j(document).ready(function(){
    $j('.slick-carousel').slick({
        lazyLoad: 'ondemand',
        //centerMode: true,
        centerPadding: '60px',
        dots: true,
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 3,
       // autoplay: true,
        autoplaySpeed: 2000,
        responsive: [
            {
                breakpoint: 800,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
});
});