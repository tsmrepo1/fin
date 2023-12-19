$(document).ready(function () {
  const siteHeader = $(".site-header");
  $(window).scroll(function () {
    if ($(document).scrollTop() > 30) {
      siteHeader.addClass("site-header--shrinked");
    } else {
      siteHeader.removeClass("site-header--shrinked");
    }

    // Scroll Top fade in out
    if ($(document).scrollTop() > 300) {
      $(".btn--scroll-to-top").addClass("show");
    } else {
      $(".btn--scroll-to-top").removeClass("show");
    }
  });

  $(".btn--scroll-to-top").on("click", function () {
    scrollToTop(0, 500);
  });

  function scrollToTop(offset, duration) {
    $("html, body").animate({ scrollTop: offset }, duration);
    return false;
  }

  // ---> Test Overflowing Element
  // var docWidth = document.documentElement.offsetWidth;

  // [].forEach.call(document.querySelectorAll("*"), function (el) {
  //   if (el.offsetWidth > docWidth) {
  //     console.log(el);
  //   }
  // });

  // ---> Products Carousel
  $(".products-carousel").owlCarousel({
    loop: true,
    autoplay: true,
    autoplayHoverPause: true,
    smartSpeed: 1000,
    margin: 10,
    nav: false,
    navText: ["<i class='fa-solid fa-chevron-left'></i>", "<i class='fa-solid fa-chevron-right'></i>"],
    dots: true,
    responsive: {
      0: {
        items: 2,
        margin: 12,
      },
      576: {
        items: 3,
        margin: 14,
      },
      768: {
        margin: 16,
      },
      992: {
        items: 3,
        margin: 24,
      },
      1200: {
        items: 4,
        margin: 24,
      },
      1400: {
        items: 4,
        margin: 28,
      },
      1700: {
        items: 4,
        margin: 32,
      },
    },
  });

  // ---> Accordion
  $(".set > a").on("click", function (e) {
    e.preventDefault();

    if ($(this).hasClass("active")) {
      $(this).removeClass("active");
      $(this).siblings(".content").slideUp(200);
      $(".set > a i").removeClass("fa-chevron-up").addClass("fa-chevron-down");
    } else {
      $(".set > a i").removeClass("fa-chevron-down").addClass("fa-chevron-down");
      $(this).find("i").removeClass("fa-chevron-down").addClass("fa-chevron-up");
      $(".set > a").removeClass("active");
      $(this).addClass("active");
      $(".content").slideUp(200);
      $(this).siblings(".content").slideDown(200);
    }
  });

  $(".new-course-wrap-section aside .block ul li a").on("click", function (e) {
    e.preventDefault();
    var getTarget = $(this).attr("data-target");
    // console.log(getTarget);
    $(".new-course-wrap-section aside .block ul li").removeClass("active");
    $(this).parent().addClass("active");

    $(".new-course-wrap-section .tab-pane").removeClass("active");
    $(".new-course-wrap-section .tab-pane[data-id='" + getTarget + "']").addClass("active");
  });



  //---> Copy text from input - ref link
  function copyToClipboard() {
    var inputElement = $(".ref-link-wrap input");
    inputElement.select();
    document.execCommand("copy");
    alert("Copied to clipboard");
  }

  $(".ref-link-wrap .btn--copy-text").on("click", copyToClipboard);

  // ---> Custom Dropdown
  $(".custom-dropdown-wrap__btn--trigger").on("click", function(e) {
    e.preventDefault();
    $(this).next().toggleClass("active");
  })

  $("html").click(function (event) {
    if ($(event.target).closest(".custom-dropdown-wrap__btn--trigger, .custom-dropdown-wrap__body").length === 0) {
      $(".custom-dropdown-wrap__body").removeClass("active");
    }
  });

  // ---> Add Payment Form
  $(".add-payment-form-wrap .main-options input").on("change", function () {
    $(".add-payment-form-wrap form fieldset").addClass("d-none");
    $(".add-payment-form-wrap form fieldset[data-category='" + $(this).val() + "']").removeClass("d-none");

    $(".add-payment-form-wrap .submit-btn-container").removeClass("d-none");
  })

});
