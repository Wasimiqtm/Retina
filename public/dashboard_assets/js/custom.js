$('.sidebar-toggle').on('click', function() {

	$(this).toggleClass('active');

	$('body').toggleClass('sidebar-active');

});
$('#dropdownMenu02, #dropdownMenu01, .dropdown-act, #dropdownMenu03').on('click', function() {
    $(this).siblings('.input-modal').toggleClass('d-block');
});

$('.dropdownMenu02 li button').on('click', function() {
    $('.dropdownMenu02').toggleClass('d-block');
    $('#dropdownMenu02').val($(this).text());
});

$('.dropdownMenu03 li button').on('click', function() {
    $('.dropdownMenu03').toggleClass('d-block');
    $('#dropdownMenu03').val($(this).text());
});

$('.adspot-act-dropdown-menu li button').on('click', function() {
    $(this).closest('.adspot-act-dropdown-menu').toggleClass('d-block');
});

$('#compaigns_wrapper').on('show.bs.collapse','.collapse', function() {
    $('#compaigns_wrapper').find('.collapse.show').collapse('hide');
    $('#compaigns_wrapper').addClass('active');

    $(this).closest('.compaigns-detail').prev().addClass('complete');

    $('.create-compaigns:not(.mange-compaigns) ul li:not(.save-btn-link)').hide();
    $('.create-compaigns:not(.mange-compaigns) ul .save-btn-link').show();
});
$('#compaigns_wrapper').on('hide.bs.collapse','.collapse', function() {
    $('#compaigns_wrapper').removeClass('active');
    $('.create-compaigns:not(.mange-compaigns) ul li:not(.save-btn-link)').show();
    $('.create-compaigns:not(.mange-compaigns) ul .save-btn-link').hide();
});

var loadFile = function (event) {
  var image = document.getElementById("output");
  image.src = URL.createObjectURL(event.target.files[0]);
};

$('.form-select-wrapper .form-select').on('change', function() {
    $(this).siblings('p').show();
    $(this).closest('.collapse').find('button').show();
});

function readUrl(input) {

    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = (e) => {
          let imgData = e.target.result;
          let imgName = input.files[0].name;
          input.setAttribute("data-title", imgName);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$(document).ready(function() {
    $('.adspots-carousel').owlCarousel({
        loop: false,
        margin: 30,
        nav: true,
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

    $('.billing-info-carousel').owlCarousel({
        loop: false,
        margin: 0,
        nav: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            }
        }
    })
});

$('.select-media-type label').on('click',function() {
    $('.select-media-type input').not(this).prop('checked', false);
});

$('.bi-nav-pills > button').on('click', function() {
    $('.bi-nav-pills > button').removeClass('active');
    $(this).addClass('active');
    $(".billing-info-carousel").trigger('to.owl.carousel', $(this).index());
});

$(".billing-info-carousel").on('translated.owl.carousel', function(event) {
    $('.bi-nav-pills > button').removeClass('active');
    $('.bi-nav-pills > button[data-pill="'+ $(this).find('.owl-item.active .item').data('pill_content') +'"]').addClass('active');
})

$(window).on('load', function() {
   $('.preloader').fadeOut('slow');
});

$('.campaign-duration-date input').on('change', function() {
    if( $(this).siblings('input').val() && $(this).val() ) {
        $('.campaign-price').removeClass('hidden');
    }
});

$('.form-image-check').on('click', function() {
    $(this).closest('.modal').find('.btn-close').removeClass('d-none');
});

// $(document).on('click', '.pagination a', function(e) {
//     e.preventDefault();
//     let page = $(this).attr('href').split('page=')[1];
//     let query = $(".opt").find("option:selected").val();
//     fetch_sort_list(page, query);
// });
// $(document).on('click', '.opt', function() {
//     $('.opt').removeClass('selected');
//     var dateType = $(this).val();
//     let page = $('#hidden_page').val();
//     $(this).addClass('selected');
//     fetch_sort_list(page, dateType)
// });
// function fetch_sort_list(page, dateType) {
//     $.ajax({
//         url: 'campaign/sort-campaign',
//         data: {
//             page: page,
//             date: dateType,
//         },
//         success:function(data) {
//             console.log(data);
//             $('.compaigns-notific').html('');
//             $('.compaigns-notific').html(data);
//             let page = $('#hidden_page').val();
//             $('.pagination a li').parent().addClass('active');
//         }
//     });
// }
