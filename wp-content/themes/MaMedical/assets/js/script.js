/***************************************************************************
 *
 * SCRIPT JS
 *
 ***************************************************************************/
$(document).ready(function() {
    getMobileOperatingSystem();
    // DETECH ANDROID OR IOS
    function getMobileOperatingSystem() {
        var userAgent = navigator.userAgent || navigator.vendor || window.opera;
        // Windows Phone must come first because its UA also contains "Android"
        if (/windows phone/i.test(userAgent)) {
            return "Windows Phone";
        }
        if (/android/i.test(userAgent)) {
            return "Android";
        }
        // iOS detection from: http://stackoverflow.com/a/9039885/177710
        if (/iPad|iPhone|iPod|Mac/.test(userAgent) && !window.MSStream) {
            return "iOS";
        }
        return "unknown";
    }
    $('body').addClass(getMobileOperatingSystem());
    //Click event to scroll to top
    $('.scrollToTop').click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 800);
        return false;
    });
    // HAMBEGER BUTTON MENU SP CLICK
    $('.hamburger').click(function() {
        if ($(this).hasClass("open")) {
            $(this).removeClass('open');
            $(this).addClass('close');
        } else {
            $(this).removeClass('close');
            $(this).addClass('open');
        }
        if ($(window).width() <= 768) {
            $('#header .mainMenu').stop().slideToggle();
            $('body').toggleClass('fixed');
        } else {}
    });
    // open menu fixed body
    var disableScroll = false;
    var scrollPos = 0;

    function stopScroll() {
        disableScroll = true;
        scrollPos = $(window).scrollTop();
    }

    function enableScroll() {
        disableScroll = false;
    }
    $(function() {
        $(window).bind('scroll', function() {
            if (disableScroll) $(window).scrollTop(scrollPos);
        });
        $(window).bind('touchmove', function() {
            $(window).trigger('scroll');
        });
    });
    // body fixed
    $('.hamburger.close').click(function() {
        stopScroll();
    });
    $('.hamburger.open').click(function() {
        enableScroll();
    });
    // open menu fixed body
    // FIX HEIGHT HEADER SP
    function fixedHeader() {
        var hHead = $('#header').outerHeight();
        $('#fixH').css('height', hHead);
    }
    $(window).resize(function(event) {
        fixedHeader();
    });
    $(window).load(function(event) {
        fixedHeader();
    });
    //SCROLL TO TOP 
    $(window).scroll(function() {
        if ($(this).scrollTop() > 80) {
            $('#fixedSection').addClass('scrolling');
        } else {
            $('#fixedSection').removeClass('scrolling');
        }
    });
    // SCROLL ANCHOR
    $('.anchor a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                var target_offset = 0;
                if (target.attr('data-offset')) {
                    target_offset = target.attr('data-offset');
                    target_offset = parseInt(target_offset);
                }
                $('html,body').animate({
                    scrollTop: target.offset().top - 90 + target_offset
                }, 1000);
                return false;
            }
        }
    });
    // OBJECTFIT IMAGE ON IE
    var userAgent, ieReg, ie;
    userAgent = window.navigator.userAgent;
    ieReg = /msie|Trident.*rv[ :]*11\./gi;
    ie = ieReg.test(userAgent);
    if (ie) {
        $(".objfitIE").each(function() {
            var $container = $(this),
                imgUrl = $container.find("img").prop("src");
            if (imgUrl) {
                $container.css("backgroundImage", 'url(' + imgUrl + ')').addClass("custom-object-fit");
            }
        });
    }
});