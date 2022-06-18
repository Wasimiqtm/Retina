$('#toggleModal').on('focus', function() {
    $(this).siblings('.input-modal').addClass('d-block');
});
$('.input-modal .btn-cancel').on('click', function(){
    $(this).closest('.input-modal').toggleClass('d-block');
    $('.input-modal li button').removeClass('fw-bold');
});
$('.input-modal li button').on('click', function() {
    $(this).toggleClass('fw-bold');
    $(this).closest('.input-modal').removeClass('d-block');
});
$('.input-modal .btn-ok').on('click', function() {
    $(this).closest('.input-modal').siblings('input').val( $('.input-modal li button.fw-bold').val() );
    $(this).closest('.input-modal').toggleClass('d-block');
});

$(document).ready(function() {
    $('.adspots-carousel').owlCarousel({
        loop: false,
        margin: 30,
        nav: true,
        dots: false,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    });

    $('.hero-carousel').owlCarousel({
        loop: true,
        margin: 0,
        dots: false,
        autoplay:true,
        autoplayHoverPause:true,
        slideTransition: 'linear',
        autoplayTimeout: 5000,
        autoplaySpeed: 700,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            }
        }
    });
});

$('.tabs-search-box ul li button').on('shown.bs.tabs', function (event) {
    $(this).parent().prev().addClass('complete');
});

$(window).on('load',function() {
   $('.preloader').fadeOut('slow');
});

$('.form-image-check').on('click', function() {
    $(this).closest('.modal').find('.btn-close').removeClass('d-none');
});