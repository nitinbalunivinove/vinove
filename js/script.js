$(document).ready(function() {
  // header scroll
  $(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if (scroll >= 10) {
      $(".header").addClass("header-bg");
    }
    else {
      $(".header").removeClass("header-bg");
    }
  });

  // menu-toggler
  $("#menu-toggler").click(function() {
    toggleBodyClass("menu-active");
  });
  function toggleBodyClass(className) {
    document.body.classList.toggle(className);
  }
if( $('body').hasClass('desktop-tpl') ){
  // hero-slider
  var owl = $('.hero-slider.owl-carousel');
  owl.owlCarousel({
    items: 1,
    loop: true,
    margin: 0,
    dots: false,
    autoplay: true,
    autoplayTimeout: 10000,
    transitionStyle : "fade",
    autoplayHoverPause: true
  });



// product-award-slider
var owl = $('.award-slider.product-award-slider.owl-carousel');
owl.owlCarousel({
  loop: true,
  margin: 20,
  autoplay: true,
  autoplayTimeout: 10000,
  autoplayHoverPause: true,
  loop: true,
  dots: false,
  nav: true,
  transitionStyle : "fade",
  slideSpeed: 1000,
  paginationSpeed: 1000,
  singleItem: true,
  navText : ["<img width='15' height='25' src='images/left-arrow.webp' alt='Previous' title='Previous'>",
  "<img width='15' height='25' src='images/right-arrow.webp' alt='Next' title='Next'>"
  ],

  responsive : {
    0 : {
      items: 2
    },
    480 : {
      items: 3
    },
    768 : {
      items: 4
    },
    1200 : {
      items: 7,
  dots: true

    },
    1700 : {
      items: 8
    }
}

});
   
  // award-slider
  var owl = $('.award-slider.owl-carousel');
  owl.owlCarousel({
    loop: true,
    margin: 20,
    autoplay: true,
    autoplayTimeout: 10000,
    autoplayHoverPause: true,
    loop: true,
    dots: false,
    nav: true,
    transitionStyle : "fade",
    slideSpeed: 1000,
    paginationSpeed: 1000,
    singleItem: true,
    navText : ["<img width='15' height='25' src='images/left-arrow.webp' alt='Previous' title='Previous'>",
    "<img width='15' height='25' src='images/right-arrow.webp' alt='Next' title='Next'>"
    ],

    responsive : {
      0 : {
        items: 2
      },
      480 : {
        items: 3
      },
      768 : {
        items: 4
      },
      1200 : {
        items: 7
      },
      1700 : {
        items: 8
      }
  }

  });
}
});

