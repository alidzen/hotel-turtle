define('app/popup', ['magnific-popup'], function() {
    'use strict';

    /**
     * Попап
     * @param {Object} $popup - jQuery object - ссылка на попапа
     * @constructor
     */
    var Popup = function($popup) {
        var self = this;
        this.$popup = $popup;
        var type = $popup.data('type');
        this.$closeBtn = $('.b-popup__close');
        this.transitionTime = $popup.data('toggle-time');
        this.fullSize = $popup.data('fullsize');
        this.theme = $popup.data('theme');
        this.mainClass = [];

        this.data = {
            type: type || 'inline',
            showCloseBtn: false,
            fixedContentPos: true,
            callbacks: {
                open: function() {
                    window.history
                        .pushState('forward', null, $popup.attr('href'));

                    if (self.transitionTime) {
                        $('.mfp-bg, .mfp-wrap')
                            .css({
                                'transition-duration' :
                                self.transitionTime + 'ms'
                            });
                    }
                },
                close: function() {
                    history.pushState('',
                        document.title,
                        window.location.pathname);
                }
            }
        };

        this.bindEvents();
        this.transitionPopup();
        this.addedClasses();
        this.initPopup();
    };

    /**
    /**
     * Инициализация попапа, подключение магнифика
     */
    Popup.prototype.initPopup = function() {
        this.$popup.magnificPopup(this.data);
    };

    /**
     * События
      */
    Popup.prototype.bindEvents = function() {
        this.$closeBtn.on('click', this.closePopup);
        $(window).on('popstate', this.closePopup);
    };

    /**
     * Добавления transition на попап
     */
    Popup.prototype.transitionPopup = function() {
        if (!this.transitionTime) {
            return;
        }
        var animateTime = {
            removalDelay: this.transitionTime
        };

        $.extend(this.data, animateTime);
    };

    /**
     * Добавление глобальных кастомных классов для попапа
     */
    Popup.prototype.addedClasses = function() {
        if (this.theme) {
            this.mainClass.push('b-popup_theme_' + this.theme);
        }

        if (this.fullSize) {
            this.mainClass.push('b-popup_full_size');
        }

        if (this.transitionTime) {
            this.mainClass.push('b-popup_theme_toggle');
        }

        this.mainClass = {
            mainClass: this.mainClass.join(' ')
        };

        $.extend(this.data, this.mainClass);
    };

    /**
     * Закрытие попапа
     */
    Popup.prototype.closePopup = function() {
        $.magnificPopup.close();
    };

    /**
     * Открытие попапа
     * @param {Object} $popup - jQuery Object - ссылка открывающася попап
     */
    Popup.prototype.openPopup = function($popup) {
        $popup.magnificPopup('open');
    };

    return Popup;
});
