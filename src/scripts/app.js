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

    // MENU
    var $menu = $('.j-menu');
    var $navMenu = $('.j-menu-nav');
    var $burgerBtn = $('.j-menu-btn');
    var $container = $('body, html');

    //find out page param
    var windowHeight = $(window).height();
    var body = document.body;
    var html = document.documentElement;
    var height = Math.max(body.scrollHeight, body.offsetHeight,
        html.clientHeight, html.scrollHeight, html.offsetHeight);
    var longPage = (windowHeight >= height);
    var pos;

    $burgerBtn.click(function() {
        var $self = $(this);
        var isActive = $self.hasClass(ACTIVE);

        if (isActive) {
            // move cnt only on desktop
            $self.removeClass(ACTIVE);
            $container.removeClass(ACTIVE);
            $menu.removeClass(ACTIVE);
            $('body').css({
                top : ''
            });
            $(window).scrollTop(pos);

            if (!longPage) {
                $('body').removeClass('add-padding');
                $navMenu.removeClass('add-padding');
            }

        } else {
            pos = $(window).scrollTop();
            $self.addClass(ACTIVE);
            $menu.addClass(ACTIVE);
            $container.addClass(ACTIVE);
            $('body').css({
                top : -pos
            });

            // if page height less than viewport disable padding for menu
            if (!longPage) {
                $('body').addClass('add-padding');
                $navMenu.addClass('add-padding');
            }
        }
    });

    //Sticky nav
    var $cntHeight = $(window).height(); // высота блока
    // меняется в зависимотси от высоты экрана

    $(window).resize( function() {
        $cntHeight = $(window).height();
    });

    // show/hide sticky nav
    $(window).scroll(function() {
        var scrollPosition = $(window).scrollTop();

        if (scrollPosition >= $cntHeight) {
            if ($navMenu.hasClass(ACTIVE) === false) {
                $navMenu.addClass(ACTIVE);
            }
        } else {
            if ($burgerBtn.hasClass(ACTIVE)) {
                return;
            } else {
                $navMenu.removeClass(ACTIVE);
            }

        }
    });

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

    return {};
});
