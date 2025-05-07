(function($) {
    'use strict';

        function dynamicCurrentMenuClass(selector) {
            // Get the current file name from the URL, if any
            let fileName = window.location.pathname.split("/").pop();
            
            // Clear any previously set "current" class
            selector.find("li").removeClass("active");
        
            // Iterate through the list items and add the "current" class based on the URL match
            selector.find("li").each(function () {
                let anchor = $(this).find("a");
                if ($(anchor).attr("href") === fileName || (fileName === "" && $(anchor).attr("href") === "index.html")) {
                    $(this).addClass("active");
                }
            });
            
            // Check if any list item contains "current" in its descendants, and if so, add "current" to the parent <li>
            selector.children("li").each(function () {
                if ($(this).find(".current").length) {
                    $(this).addClass("current");
                }
            });
        }
        
        $(document).ready(function () {
            if ($(".menu-list").length) {
                let mainNavUL = $(".menu-list");
                dynamicCurrentMenuClass(mainNavUL);
            }
        });

       
    

        
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

            // $('.carausel-categories').slick({
            //     dots: false,
            //     infinite: true,
            //     speed: 1000,
            //     arrows: false,
            //     autoplay: true,
            //     slidesToShow: 3,
            //     slidesToScroll: 1,
            //     loop: true,
            //     adaptiveHeight: true,
            //     responsive: [{
            //             breakpoint: 1024,
            //             settings: {
            //                 slidesToShow: 3,
            //                 slidesToScroll: 3,
            //             }
            //         },
            //         {
            //             breakpoint: 480,
            //             settings: {
            //                 slidesToShow: 1,
            //                 slidesToScroll: 1
            //             }
            //         }
            //     ]
            // });
        
        };

    
        //Load functions
        $(document).ready(function() {
        
            customSlickSlider();
        
        });

         /*--------------------------------
        // Date
        -------------------------------*/
        const currentYear = document.querySelectorAll(".currentYear");
        if (currentYear.length > 0) {
            const date = new Date();
            const currYear = date.getFullYear();
            currentYear.forEach((ele) => {
            ele.innerText = currYear;
            });
        }

        const currentDate = document.querySelectorAll(".currentDate");
        if (currentDate.length > 0) {
            const date = new Date().toLocaleDateString("en-us", {
            weekday: "long",
            year: "numeric",
            month: "short",
            day: "numeric",
            });
            currentDate.forEach((ele) => {
            ele.innerText = date;
            });
        }

        /*--------------------------------
        // IFrame Lazy Load
        -------------------------------*/
        class DelayedIframeLoader {
            constructor(iframeSelector, delay = 0) {
                this.iframes = document.querySelectorAll(iframeSelector);
                this.delay = delay;
                this.init();
            }

            init() {
                window.addEventListener('load', () => {
                    this.iframes.forEach((iframe) => {
                        setTimeout(() => {
                            iframe.src = iframe.getAttribute('data-src');
                        }, this.delay);
                    });
                });
            }
        }

        // Usage
        new DelayedIframeLoader('.wigdet-video', 2000); // 2000 ms delay

    })(jQuery);