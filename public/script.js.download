/*=================================
Website Name: SportStream
Website URL: sportstream.designhouse.rs
Author: Tamara @ designhouse
=================================

LEGEND:

01 - Preloader
02 - Back To Top Button
03 - WOW
04 - Smooth Scroll
05 - Owl Carousel

=================================*/

$(document).ready(function() {
      "use strict";

    /* 01- Preloader */

    $(".loader-wrapper").delay(1500).fadeOut(1000);

    /* 02 - Back To Top */
    var amountScrolled = 300;
    var backBtn = $("a.scrollToTop");
    $(window).on("scroll", function() {
      "use strict";
        if ($(window).scrollTop() > amountScrolled) {
            backBtn.fadeIn("slow");
        } else {
            backBtn.fadeOut("slow");
        }
    });
    backBtn.on("click", function() {
      "use strict";
        $("html, body").animate({
            scrollTop: 0
        }, 300);
        return false;
    });

    /* 03 - WOW */
    if ($(window).width() > 767) {
        new WOW().init();
    }

    /* 04 - Smooth Scroll */

    // Add smooth scrolling to all links
    // Select all links with hashes
    $('a[href*="#"]')
        // Remove links that don't actually link to anything
        .not('[href="#"]')
        .not('[href="#0"]')
        .on( "click" , function(event) {
            // On-page links
            if (
                location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') &&
                location.hostname === this.hostname
            ) {
                // Figure out element to scroll to
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                // Does a scroll target exist?
                if (target.length) {
                    // Only prevent default if animation is actually gonna happen
                    event.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 1000, function() {
                        // Callback after animation
                        // Must change focus!
                        var $target = $(target);
                        $target.focus();
                        if ($target.is(":focus")) { // Checking if the target was focused
                            return false;
                        } else {
                            $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                            $target.focus(); // Set focus again
                        };
                    });
                }
            }
        });

    /* 05 - Owl Carousel */

    $("#live-match").owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
        autoplayTimeout: 6000,
        autoplayHoverPause: false,
        mouseDrag: true,
        center: true,
        smartSpeed: 1000,
        responsiveClass: true,
        responsive: {
            0: {
                margin: 0,
                stagePadding: 0
            },
            992: {
                margin: 10,
                stagePadding: 250
            },
            1200: {
                margin: 10,
                stagePadding: 300
            }
        }
    });
    $("#results").owlCarousel({
        loop: true,
        margin: 15,
        autoplay: true,
        autoplayTimeout: 6000,
        autoplayHoverPause: false,
        mouseDrag: true,
        smartSpeed: 1000,
        responsiveClass: true,
        responsive: {
            100: {
                items: 1,
                nav: true,
            },
            1200: {
                items: 2,
                nav: false,
            }
        }
    });


});
