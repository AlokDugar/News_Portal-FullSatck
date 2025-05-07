(function($) {
    'use strict';

        function dynamicCurrentMenuClass(selector) {
            // Get the current file name and query parameters from the URL
            let url = new URL(window.location.href);
            let fileName = url.pathname.split("/").pop();
            let queryParams = url.search;
        
            // Clear any previously set "current" class
            selector.find("li").removeClass("active");
        
            // Iterate through the list items to add the "current" class based on URL match
            selector.find("li").each(function () {
                let anchor = $(this).find("a");
                let anchorHref = $(anchor).attr("href");
                
                // Parse the href of the anchor to separate the file and query string
                let anchorUrl = new URL(anchorHref, window.location.origin);
                let anchorFile = anchorUrl.pathname.split("/").pop();
                let anchorQuery = anchorUrl.search;
        
                // Compare both filename and query string to mark current
                if (anchorFile === fileName && anchorQuery === queryParams) {
                    $(this).addClass("active");
                }
            });
            
            // Check if any list item contains "current" in its descendants, and if so, add "current" to the parent <li>
            selector.children("li").each(function () {
                if ($(this).find(".active").length) {
                    $(this).addClass("active");
                }
            });
        
            // If no specific file name is present, default to the first <li> (homepage)
            if (fileName === "" && queryParams === "") {
                selector.find("li").eq(0).addClass("active");
            }
        }
        
        $(document).ready(function () {
            if ($(".menu-list").length) {
                let mainNavUL = $(".menu-list");
                dynamicCurrentMenuClass(mainNavUL);
            }
        });

        // mobile-menu
        $('.mobile-menu-btn').on("click", function () {
            $('.main-menu').addClass('show-menu');
        });

        $('.menu-close-btn').on("click", function () {
            $('.main-menu').removeClass('show-menu');
        });

        // mobile-drop-down
        $(".main-menu .bi").on('click', function (event) {
            var $fl = $(this);
            $(this).parent().siblings().find('.sub-menu, .mega-menu').slideUp();
            $(this).parent().siblings().find('.bi').addClass('bi-chevron-down');
            if ($fl.hasClass('bi-chevron-down')) {
                $fl.removeClass('bi-chevron-down').addClass('bi-chevron-up');
            } else {
                $fl.removeClass('bi-chevron-up').addClass('bi-chevron-down');
            }
            $fl.next(".sub-menu, .mega-menu").slideToggle();
        });

        // Menu Toggle button sidebar
        var toggleIcon = document.querySelectorAll('.sidebar-button')
        var closeIcon = document.querySelectorAll('.cross-icon')
        var searchWrap = document.querySelectorAll('.sidebar-area')

        toggleIcon.forEach((element) => {
            element.addEventListener('click', () => {
                document.querySelectorAll('.sidebar-area').forEach((el) => {
                    console.log(el);
                    el.classList.add('show-sidebar')
                })
            })
        })
        closeIcon.forEach((element) => {
            element.addEventListener('click', () => {
                document.querySelectorAll('.sidebar-area').forEach((el) => {
                    el.classList.remove('show-sidebar')
                })
            })
        })

        
        // Slick slider
        var customSlickSlider = function() {

            // featured slider 2
            $('.featured-slider-2-items').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                dots: false,
                fade: true,
                asNavFor: '.featured-slider-2-nav',
            });

            $('.featured-slider-2-nav').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                vertical: true,
                asNavFor: '.featured-slider-2-items',
                dots: false,
                arrows: false,
                focusOnSelect: true,
                verticalSwiping: true
            });
        
        };

    
        //Load functions
        $(document).ready(function() {
        
            customSlickSlider();
        
        });

        $("body").bind("cut copy paste", function (e) {
            e.preventDefault();
          });
        
          $("body").on("contextmenu",function(e){
              // return false;
          });
        

        

    })(jQuery);