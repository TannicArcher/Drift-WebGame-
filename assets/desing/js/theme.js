'use strict';
$(document).on('ready', function () {
    initMasonry();
});

function initMasonry() {
    $('.masonry').masonry({itemSelector: '.item', columnWidth: '.item'});
}

function collision($div1, $div2) {
    var x1 = $div1.offset().left;
    var w1 = 40;
    var r1 = x1 + w1;
    var x2 = $div2.offset().left;
    var w2 = 40;
    var r2 = x2 + w2;
    if (r1 < x2 || x1 > r2)
        return false;
    return true;
}

$(function ($) {
    $('.menu-toggle').on('click', function (e) {
        $(".mega-dropdown-menu").toggleClass('open');
        e.preventDefault();
    });
    var responsive_toggle = $('.responsive-toggle');
    responsive_toggle.on('click', function (e) {
        $("body").toggleClass('off-canvas-body');
        responsive_toggle.toggleClass("fa-bars fa-close");
        e.preventDefault();
    });
    var scroll_js = $('.scroll-js');
    var $window = $(window);
    if ($window.width() < 1200) {
        if (scroll_js.length > 0) {
            scroll_js.mCustomScrollbar({theme: "dark-2", scrollButtons: {enable: false}});
        }
    }
    if ($().countdown) {
        var newYear = new Date();
        newYear = new Date(newYear.getFullYear() + 1, 1 - 1, 1);
        $('#defaultCountdown').countdown({since: new Date(2020, 3, 6, 12)});
    }
    $('.to-top').on('click', function () {
        $('html, body').animate({scrollTop: 0}, 800);
        return false;
    });
    $("#testimonial-slider").owlCarousel({
        dots: false,
        loop: true,
        autoplay: false,
        autoplayHoverPause: true,
        smartSpeed: 100,
        nav: true,
        margin: 30,
        navText: ["<i class='fa fa-long-arrow-left'></i>", "<i class='fa fa-long-arrow-right'></i>"],
        responsive: {0: {items: 1}, 1500: {items: 2}, 1200: {items: 2}, 992: {items: 2}, 600: {items: 2}}
    });
    $("#naturix-slider").owlCarousel({
        animateIn: 'fadeInDown',
        animateOut: 'slideOutUp',
        margin: 30,
        mouseDrag: false,
        items: 1,
        navText: ["<i class='fa fa-long-arrow-left'></i>", "<i class='fa fa-long-arrow-right'></i>"],
        responsive: {0: {items: 1}, 1024: {items: 1}}
    });
    $(document).on('shown.bs.modal', function () {
        $(this).find('.sync1, .sync2').each(function () {
            $(this).data('owlCarousel') ? $(this).data('owlCarousel').onResize() : null;
        });
    });
    var sync1 = $(".sync1");
    var sync2 = $(".sync2");
    var navSpeedThumbs = 500;
    sync2.owlCarousel({
        rtl: false,
        items: 3,
        nav: true,
        navSpeed: navSpeedThumbs,
        responsive: {0: {items: 1}, 480: {items: 3}},
        responsiveRefreshRate: 200,
        navText: ["<i class='fa fa-long-arrow-left'></i> PREV", "NEXT <i class='fa fa-long-arrow-right'></i>"]
    });
    sync1.owlCarousel({
        rtl: false,
        items: 1,
        navSpeed: 1000,
        nav: false,
        onChanged: syncPosition,
        responsiveRefreshRate: 200
    });

    function syncPosition(el) {
        var current = this._current;
        sync2.find(".owl-item").removeClass("synced").eq(current).addClass("synced");
        center(current);
    }

    sync2.on("click", ".owl-item", function (e) {
        e.preventDefault();
        var number = $(this).index();
        sync1.trigger("to.owl.carousel", [number, 1000]);
    });

    function center(num) {
        var sync2visible = sync2.find('.owl-item.active').map(function () {
            return $(this).index();
        });
        if ($.inArray(num, sync2visible) === -1) {
            if (num > sync2visible[sync2visible.length - 1]) {
                sync2.trigger("to.owl.carousel", [num - sync2visible.length + 2, navSpeedThumbs, true]);
            } else {
                sync2.trigger("to.owl.carousel", Math.max(0, num - 1));
            }
        } else if (num === sync2visible[sync2visible.length - 1]) {
            sync2.trigger("to.owl.carousel", [sync2visible[1], navSpeedThumbs, true]);
        } else if (num === sync2visible[0]) {
            sync2.trigger("to.owl.carousel", [Math.max(0, num - 1), navSpeedThumbs, true]);
        }
    }
});
$(window).on('load', function () {
    setTimeout(function () {
        $("#loading").fadeOut(0);
    }, 100);
});
$(window).scroll(function () {
    var to_top_mb = $('.to-top.mb');
    if ($(this).scrollTop() > 100) {
        to_top_mb.fadeIn();
    } else {
        to_top_mb.fadeOut();
    }
    var $window = $(window);
    if ($window.scrollTop() + $window.height() > $(document).height() - 200) {
        to_top_mb.fadeOut();
    }
});