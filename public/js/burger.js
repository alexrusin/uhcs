//
// JavaScript functionality for mobile menu
//

$(function () {
    var TRANSITION_END = 'webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend';
    var $overlay = $('.hm-overlay');
    var $container = $('.hm-container');
    var SELECT_EVENT = 'click';

    if ('ontouchstart' in document.documentElement) {
        SELECT_EVENT = 'touchstart'
    }

    function MobileNavigation(opts) {
        var that = this;
        this.opts = opts;

        this._clickCallback = this._clickCallback.bind(this);

        this.el = {};
        this.el.$header = $(opts.header);
        this.el.$desktopHeader = $('.header');

        this.el.$header.removeClass('loading');
        this.close();

        $(document).on(SELECT_EVENT, '.header', function (e) {
            var $target = $(e.target);

            if ($target.hasClass('.nav-brand') || $target.closest('.nav-brand').length > 0) {
            } else if ($('.js-mobile-trigger').is(':visible')) {
                that.toggle.bind(that)();
            }
        });

        // initial state
        return this;
    }

    MobileNavigation.prototype._clickCallback = function () {
        this._removeClick();
        this.close();
    }

    MobileNavigation.prototype._setupClick = function () {
        this.el.$header.find('a').one('click', this._clickCallback);
        this.el.$desktopHeader.find('a').one('click', this._clickCallback);
    }

    MobileNavigation.prototype._removeClick = function () {
        this.el.$header.find('a').off('click', this._clickCallback);
        this.el.$desktopHeader.find('a').off('click', this._clickCallback);
    }

    MobileNavigation.prototype.open = function () {
        this.isOpen = true;

        this._setupClick();

        this.el.$header.css('top', this.el.$desktopHeader.outerHeight());
        this.el.$header.addClass('mobile-header--open');
        this.el.$desktopHeader.addClass('mobile-is-open');
    };

    MobileNavigation.prototype.close = function () {
        this.isOpen = false;

        this._removeClick();

        this.el.$header.css('top', '');
        this.el.$header.removeClass('mobile-header--open');
        this.el.$desktopHeader.removeClass('mobile-is-open');
    };

    MobileNavigation.prototype.toggle = function () {
        if (this.isOpen === true) {
            this.close();
        } else {
            this.open();
        }
    };

    var nav = new MobileNavigation({
        header: '.mobile-header'
    });

    /* override the default hash link behavior */
    $(document).on('click', "a[href^='/#']:not(.manual-optin-trigger)", function (e) {
        const hash = e.currentTarget.hash;
        const isHomePage = window.location.pathname === "/";
        const $page = $("html, body");

        if (!isHomePage) {
            return;
        }

        e.preventDefault();
        $('.hm-container').removeClass('hm-is-open');
        $page.one("scroll mousedown wheel DOMMouseScroll mousewheel keyup touchmove", function () {
          $page.stop()
        });


        setTimeout(function () {
            var scrollTo = $(hash);
            var margin = parseInt(scrollTo.css('margin-top'), 10);

            if (scrollTo.length === 1) {
                $page.animate({
                    scrollTop: scrollTo.offset().top - margin - parseInt($('.header').css('height'), 10)
                }, 1000);
            }
        }, 0);
    });
});
