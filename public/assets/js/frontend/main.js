(function () {
    "use strict";
    window.addEventListener('load', function () {
        document.querySelector('body').classList.add("loaded")
    });
    // document.addEventListener("DOMContentLoaded", function (event) {
    //     var modal = document.getElementById("newsletter-popup");
    //     setTimeout(function () {
    //         var modalInstance = new bootstrap.Modal(modal, {});
    //         modalInstance.show();
    //     }, 5000);
    // });
    
    function updateClock() {
        // Your updateClock implementation here
        console.log("Clock updated");
    }

    function setupScrollFeatures() {
        const navbar = document.getElementById("navbar");
        const topButton = document.getElementById("back-to-top");

        if (navbar) {
            const height = 150;

            window.addEventListener('scroll', () => {
                const scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
                navbar.classList.toggle('sticky', scrollTop >= height);
                topButton.style.opacity = scrollTop > 200 ? "1" : "0";
            });
        }

        if (topButton) {
            topButton.onclick = () => {
                window.scrollTo({
                    top: 0,
                    behavior: "smooth"
                });
            };
        }
    }

    // Add both functions to the `load` event
    window.addEventListener("load", updateClock);
    window.addEventListener("load", setupScrollFeatures);

    
    /* ---------------------------------------------
	   video player
	--------------------------------------------- */
    document.addEventListener('DOMContentLoaded', function () {
        const stopVideo = document.querySelector('.jsYouTubeVideoStop');

        const lazyLoadYouTube = new LazyLoadYouTube('.jsYouTubeVideoItem', {
            onPlay: (videoElement) => {
                console.log('Play video', videoElement);
            }
        });

        stopVideo.addEventListener('click', lazyLoadYouTube.stopVideoPlay);

    });
    

    /* ---------------------------------------------
	   Mobile-search-area
	--------------------------------------------- */

	$('.search-btn').on("click", function () {
		$('.mobile-search').addClass('slide');
	});

	$('.search-cross-btn').on("click", function () {
		$('.mobile-search').removeClass('slide');
	});

})();
