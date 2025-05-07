(function ($) {
    "use strict";

    // loader
    $('.loader-wrapper').fadeOut('slow', function () {
        $(this).remove();
    });
    /*=========================================================================
    When window load finish, loader will fadeout / hide
    =========================================================================*/
    $(window).on('load', function() {
        $('.un-loader').fadeOut(); // loader will fadeout after page load finish
    });
    // tap top
    $('.tap-top').on('click', function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

    $(window).on('scroll', function () {
        if ($(this).scrollTop() > 600) {
            $('.tap-top').fadeIn();
        } else {
            $('.tap-top').fadeOut();
        }
    });
    $(document).on('click', function (e) {
        var outside_space = $(".outside");
        if (!outside_space.is(e.target) &&
            outside_space.has(e.target).length === 0) {
            $(".menu-to-be-close").removeClass("d-block");
            $('.menu-to-be-close').css('display', 'none');
        }
    })

    $('.prooduct-details-box .close').on('click', function (e) {
        var order_details = $(this).closest('[class*=" col-"]').addClass('d-none');
    })

    // if ($(".page-wrapper").hasClass("horizontal-wrapper")) {
    //     $(".sidebar-list").hover(
    //       function () {
    //         $(this).addClass("hoverd");
    //       },
    //       function () {
    //         $(this).removeClass("hoverd");
    //       }
    //     );
    //     $(window).on("scroll", function () {
    //       if ($(this).scrollTop() < 600) {
    //         $(".sidebar-list").removeClass("hoverd");
    //       }
    //     });
    //   }

    /*----------------------------------------
     passward show hide
     ----------------------------------------*/
    $('.show-hide').show();
    $('.show-hide span').addClass('show');

    $('.show-hide span').on('click', function () {
        if ($(this).hasClass('show')) {
            $('input[name="password"]').attr('type', 'text');
            $(this).removeClass('show');
        } else {
            $('input[name="password"]').attr('type', 'password');
            $(this).addClass('show');
        }
    });
    $('form button[type="submit"]').on('click', function () {
        $('.show-hide span').addClass('show');
        $('.show-hide').parent().find('input[name="password"]').attr('type', 'password');
    });

    /*=====================
      02. Background Image js
      ==========================*/
    $(".bg-center").parent().addClass('b-center');
    $(".bg-img-cover").parent().addClass('bg-size');
    $('.bg-img-cover').each(function () {
        var el = $(this),
            src = el.attr('src'),
            parent = el.parent();
        parent.css({
            'background-image': 'url(' + src + ')',
            'background-size': 'cover',
            'background-position': 'center',
            'display': 'block'
        });
        el.hide();
    });

    $(".mega-menu-container").css("display", "none");
    $(".header-search").on('click', function () {
        $(".search-full").addClass("open");
    });
    $(".close-search").on('click', function () {
        $(".search-full").removeClass("open");
        $("body").removeClass("offcanvas");
    });
    $(".mobile-toggle").on('click', function () {
        $(".nav-menus").toggleClass("open");
    });
    $(".mobile-toggle-left").on('click', function () {
        $(".left-header").toggleClass("open");
    });
    $(".bookmark-search").on('click', function () {
        $(".form-control-search").toggleClass("open");
    })
    $(".filter-toggle").on('click', function () {
        $(".product-sidebar").toggleClass("open");
    });
    $(".toggle-data").on('click', function () {
        $(".product-wrapper").toggleClass("sidebaron");
    });

    $(".mobile-search").on('click', function () {
        $(".form-control").toggleClass("open");
    });

    $(".form-control-search input").keyup(function (e) {
        if (e.target.value) {
            $(".page-wrapper").addClass("offcanvas-bookmark");
        } else {
            $(".page-wrapper").removeClass("offcanvas-bookmark");
        }
    });
    $(".search-full input").keyup(function (e) {
        if (e.target.value) {
            $("body").addClass("offcanvas");
        } else {
            $("body").removeClass("offcanvas");
        }
    });

    $('body').keydown(function (e) {
        if (e.keyCode == 27) {
            $('.search-full input').val('');
            $('.form-control-search input').val('');
            $('.page-wrapper').removeClass('offcanvas-bookmark');
            $('.search-full').removeClass('open');
            $('.search-form .form-control-search').removeClass('open');
            $("body").removeClass("offcanvas");
        }
    });
    // $('.mode').on('click', function() {
    //     $('.mode i').toggleClass('fa-moon').toggleClass('fa-lightbulb');
    //     $('body').toggleClass('dark-only');
    //     if ($('body').hasClass('dark-only')) {
    //       $('body').removeClass('light-style');
    //       localStorage.setItem('body', 'dark-only');
    //     } else {
    //       $('body').addClass('light-style');
    //       localStorage.setItem('body', 'light-style');
    //     }
    // });
    // if (localStorage.getItem('body') === 'dark-only') {
    //     $('body').addClass('dark-only');
    //     $('.mode i').addClass('fa-lightbulb');
    // } else {
    //     $('body').addClass('light-style');
    //     $('.mode i').addClass('fa-moon');
    // }

    // active link

    $(".chat-menu-icons .toogle-bar").on('click', function () {
        $(".chat-menu").toggleClass("show");
    });

    $(".mobile-title svg").on('click', function (){
        $(".header-mega").toggleClass("d-block");
    });

    // Shows header dropdown while hiding others
    $(".onhover-dropdown > div").on("click", function (e) {
        e.preventDefault();
        $(this).parent().toggleClass("show");
        $(this).parent().siblings().removeClass("show");
    });

    // this will hide dropdown menu from open in mobile
    // $(".dropdown-menu").on("click", function (e) {
    //     e.preventDefault();
    //     $(this).closest(".onhover-dropdown").removeClass("show");
    // });

    // Close dropdown menu of header menu
    $(document).on("click touchstart", function (e) {
        e.stopPropagation();
        // closing of dropdown menu in header when clicking outside of it
        var dropTarg = $(e.target).closest(".onhover-dropdown").length;
        if (!dropTarg) {
        $(".onhover-dropdown").removeClass("show");
        }

    })

    // search input
    $(".serchbox").on("click", function (e) {
        $(".search-form").toggleClass("open");
        e.preventDefault();
    });

    //landing header //
    $(".toggle-menu").on('click', function (){
        $('.landing-menu').toggleClass('open');
    });
    $(".menu-back").on('click', function (){
        $('.landing-menu').toggleClass('open');
    });

    $(".md-sidebar-toggle").on('click', function (){
        $('.md-sidebar-aside').toggleClass('open');
    });

    // color selector
    $('.color-selector ul li ').on('click', function(e) {
        $(".color-selector ul li").removeClass("active");
        $(this).addClass("active");
    });

    //extra
    $(document).ready(function() {
        // $('body').addClass('box-layout');
    });



    (function ($, window, document, undefined) {
        "use strict";
        var $ripple = $(".js-ripple");
        $ripple.on("click.ui.ripple", function (e) {
            var $this = $(this);
            var $offset = $this.parent().offset();
            var $circle = $this.find(".c-ripple__circle");
            var x = e.pageX - $offset.left;
            var y = e.pageY - $offset.top;
            $circle.css({
                top: y + "px",
                left: x + "px"
            });
            $this.addClass("is-active");
        });
        $ripple.on(
            "animationend webkitAnimationEnd oanimationend MSAnimationEnd",
            function (e) {
                $(this).removeClass("is-active");
            });

    })(jQuery, window, document);



})(jQuery);

$(function () {
    // Loading button
    $('.addListData').on('click', function() {

    $el = $(this);
    $el.html('Loading<span>.</span><span>.</span><span>.</span>');
    $el.addClass('load-more');
    setTimeout(onLoaded, 5000);

    function onLoaded() {
      $el.removeClass('load-more');
      $el.html('Load more');
      $el.blur();
    }
    });
});

$(document).ready(function() {
    $('#loadingList').showMoreItems({
      startNum:6,
      afterNum:6
    });
})

    $(document).ready(function() {
        if (localStorage.getItem('body') === 'dark-only') {
        $('body').addClass('dark-only');
        $('.mode i').removeClass('fa-moon').addClass('fa-lightbulb');
        } else {
        $('body').addClass('light-style');
        $('.mode i').removeClass('fa-lightbulb').addClass('fa-moon');
        }

        $('.mode').on('click', function() {
        $('.mode i').toggleClass('fa-moon fa-lightbulb');
        $('body').toggleClass('dark-only');
        if ($('body').hasClass('dark-only')) {
            $('body').removeClass('light-style');
            localStorage.setItem('body', 'dark-only');
        } else {
            $('body').addClass('light-style');
            localStorage.setItem('body', 'light-style');
        }
        });
    });



function toggleFullScreen() {
    if ((document.fullScreenElement && document.fullScreenElement !== null) ||
        (!document.mozFullScreen && !document.webkitIsFullScreen)) {
        if (document.documentElement.requestFullScreen) {
            document.documentElement.requestFullScreen();
        } else if (document.documentElement.mozRequestFullScreen) {
            document.documentElement.mozRequestFullScreen();
        } else if (document.documentElement.webkitRequestFullScreen) {
            document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
        }
    } else {
        if (document.cancelFullScreen) {
            document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
            document.webkitCancelFullScreen();
        }
    }
}
