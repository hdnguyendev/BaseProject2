$('#banner-slick').slick({
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    adaptiveHeight: true,
    slidesToScroll: 1,
    // autoplay: true,
    // autoplaySpeed: 2000
  })


$('#top-movie-banner').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '#top-movies',

  });
  $('#top-movies').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '#top-movie-banner',
    centerMode: true,
    focusOnSelect: true,
    vertical:true,
    centerPadding: 0,
    prevArrow: '<button class="slide-arrow-h prev-arrow-t"><i class="fa-solid fa-caret-up"></i></button>',
    nextArrow: '<button class="slide-arrow-h next-arrow-b"><i class="fa-solid fa-caret-down"></i></button>',
    responsive: [
        {
          breakpoint: 768,
            settings:{
                slidesToShow: 1,
                slidesToScroll: 1,
                vertical: false,
                centerMode:false,
                prevArrow: '<button class="slide-arrow -left-4"><i class="fa-solid fa-caret-left"></i></button>',
                nextArrow: '<button class="slide-arrow -right-4"><i class="fa-solid fa-caret-right"></i></button>'
              },
        }
    ]
  }); 