define('app', [
    'jquery',
    'fastclick'
], function(
    $,
    FastClick
) {
    'use strict';

    // Глобальные переменные
    var ACTIVE = ('is-active');
    var WIDTH = ($(window).width < 1025);

    FastClick.attach(document.body);

    (function($forms) {
        if (!$forms.length) {
            return;
        }

        var initForms = function initForms(Form) {
            $forms.each(function() {
                var form = new Form($(this));
                form.init();
            });
        };

        require(['app/form'], initForms);
    })($('form').filter(':not([data-noinit])'));

    //Подключение попапа
    (function($popupLinks) {
        if (!$popupLinks.length) {
            return;
        }

        var hash = window.location.hash;

        require(['app/popup'], function(Popup) {
            $popupLinks.each(function() {
                var popup = new Popup($(this));
                popup.initPopup();

                if ($(this).attr('href') === hash) {
                    popup.openPopup($(this));
                }
            });
        });
    })($('.j-popup'));

    // Подключение галерей
    (function($gallerys) {
        if (!$gallerys.length) {
            return;
        }

        require(['app/gallery'], function(Gallery) {
            $gallerys.each(function() {
                return new Gallery($(this));
            });
        });
    })($('.j-gallery'));

    //Анимированный label
    (function($animLabels) {
        if (!$animLabels.length) {
            return;
        }

        require(['app/animated-label'], function(AnimatedLabel) {
            $animLabels.each(function() {
                var label = new AnimatedLabel($(this));
                label.init();
            });
        });
    })($('.j-anim-label'));

    // Стилизация селекта
    (function($selects) {
        if (!$selects.length) {
            return;
        }

        require(['select'], function() {
            $selects.each(function() {
                var $select = $(this);
                $select.selectric({
                    disableOnMobile: false
                });
            });
        });
    })($('select'));

    // Табы
    (function($tabContainer) {
        if (!$tabContainer.length) {
            return;
        }

        require(['app/tabs'], function(Tabs) {
            return new Tabs($tabContainer);
        });
    })($('.j-tabs'));

    //Инициализация карты
    (function($maps) {
        if (!$maps.length) {
            return;
        }

        require(['app/map'], function(Map) {
            $maps.each(function() {
                var $map = $(this);
                return new Map($map);
            });
        });
    })($('.j-map'));

    // подключаем datepicker для бронирования
    // example: http://jsfiddle.net/SirDerpington/h3wGx/4/
    (function($datepicker) {
        if (!$datepicker.length) {
            return;
        }

        var $startDate = $('#booking-from');
        var $endDate = $('#booking-to');

        require(['jquery-ui/i18n/datepicker-ru'], function() {
            $startDate.datepicker({
                defaultDate: '+1w',
                minDate: 0,
                firstDay: 0,
                dateFormat: 'dd-mm-yy',
                numberOfMonths: 1,
                onClose: function() {
                    var minDate = $(this).datepicker('getDate');
                    if (minDate === null) {
                        return;
                    }
                    var newMin = new Date(minDate.setDate(minDate
                            .getDate() + 1));
                    $endDate.datepicker('option', 'minDate', newMin);
                }
            });

            $endDate.datepicker({
                defaultDate: '+1w',
                minDate: '+2d',
                firstDay: 0,
                dateFormat: 'dd-mm-yy',
                numberOfMonths: 1,
                onClose: function() {
                    var maxDate = $(this).datepicker('getDate');
                    if (maxDate === null) {
                        return;
                    }
                    var newMax  = new Date(maxDate.setDate(maxDate
                            .getDate() - 1));
                    $startDate.datepicker('option', 'maxDate',  newMax);
                }
            });
        });
    })($('.j-date-booking'));

    //Sticky nav
    (function($nav) {
        if (!$nav.length || WIDTH) {
            return;
        }

        var $cntHeight = $(window).height(); // высота блока
        // меняется в зависимотси от высоты экрана

        // show/hide sticky nav
        $(window).scroll(function() {
            var scrollPosition = $(window).scrollTop();

            if (scrollPosition >= $cntHeight) {
                if ($nav.hasClass(ACTIVE) === false) {
                    $nav.addClass(ACTIVE);
                }
            } else {
                $nav.removeClass(ACTIVE);
            }
        });

        // smooth scroll
        $('.b-object-nav a[href^="#"]').bind('click.smoothscroll', function(e) {
            e.preventDefault();

            var target = this.hash;
            var $target = $(target);

            $('html, body').stop().animate({
                    scrollTop: $target.offset().top - $nav.height()}, 500, 'swing',
                function() {
                    window.location.hash = target;
                });
        });
    })($('.j-stick-menu'));

    return {};
});
