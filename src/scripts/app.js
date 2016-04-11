define('app', [
    'jquery',
    'fastclick',
    'jquery-ui/i18n/datepicker-ru',
    'select',
    'slimScroll'
], function(
    $,
    FastClick
) {
    'use strict';

    FastClick.attach(document.body);

    // Глобальные переменные
    var ACTIVE = ('is-active');
    var touchWIDTH = ($(window).width() < 1025);

    // MENU
    var $menu = $('.j-menu');
    var $menuCnt = $('.j-menu__cnt');
    var $navMenu = $('.j-menu-nav');
    var $burgerBtn = $('.j-menu-btn');
    var $container = $('body, html');
    var $header = $('.j-header');

    // inputs in for booking
    var $datepickerMenu = $navMenu.find('.j-date-inp');
    var $selectMenu = $navMenu.find('select');
    var $datepickerHeader = $header.find('.j-date-inp');
    var $selectHeader = $header.find('select');

    var pos;

    $burgerBtn.click(function() {
        var $self = $(this);
        var isActive = $self.hasClass(ACTIVE);

        if (isActive) {
            // move cnt only on desktop
            $menuCnt.fadeOut();
            setTimeout(function() {
                $self.removeClass(ACTIVE);
                $menu.removeClass(ACTIVE);
                $container.removeClass(ACTIVE);
                $navMenu.removeClass('add-padding');
                $('body').removeClass('add-padding')
                    .css({
                        top : ''
                    });
                $(window).scrollTop(pos);
            }, 300);
        } else {
            pos = $(window).scrollTop();
            $self.addClass(ACTIVE);
            $menu.addClass(ACTIVE);
            $container.addClass(ACTIVE);
            $menuCnt.fadeIn();
            $navMenu.addClass('add-padding');
            $('body').addClass('add-padding')
                .css({
                    top : -pos
                });


        }
    });

    //Sticky nav
    var $cntHeight = $(window).height(); // высота блока
    // меняется в зависимотси от высоты экрана

    $(window).resize(function() {
        $cntHeight = $(window).height();
    });

    // show/hide sticky nav
    $(window).scroll(function() {
        var scrollPosition = $(window).scrollTop();

        if (scrollPosition >= $cntHeight) {
            if ($navMenu.hasClass(ACTIVE) === false) {
                $navMenu.addClass(ACTIVE);
                $datepickerHeader.datepicker('hide');
                $selectHeader.selectric('close');
            }
        } else {
            if ($burgerBtn.hasClass(ACTIVE)) {
                return;
            } else {
                $navMenu.removeClass(ACTIVE);
                $datepickerMenu.datepicker('hide');
                $selectMenu.selectric('close');
            }
        }
    });

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

        $selects.each(function() {
            var $select = $(this);
            $select.selectric({
                disableOnMobile: false,
                maxHeight: 240
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

        $datepicker.each(function() {
            var $self = $(this);
            var $startDate = $self.find('.j-date-from');
            var $endDate = $self.find('.j-date-to');

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

    (function($headerMenu) {
        if (!$headerMenu.length || touchWIDTH) {
            return;
        }

        var transformMenu = function() {
            var cntHeight = $headerMenu.outerHeight(true);
            var screenHeight = $(window).height();
            var $reviewsBlock = $headerMenu.find('.l-home-menu__reviews');
            // Помещается все меню
            var isFullHeightCnt = screenHeight >= 800;

            if (isFullHeightCnt) {
                $reviewsBlock.show();
                $headerMenu.removeClass('is-smaller');
            } else {
                // del block, resize cnt
                if (cntHeight > screenHeight) {
                    $reviewsBlock.hide();
                    $headerMenu.addClass('is-smaller');
                // del block
                } else {
                    $reviewsBlock.hide();
                    $headerMenu.removeClass('is-smaller');
                }
            }

            // set opacity to 1, after show / hide  block
            $headerMenu.addClass('is-transformed');
        };

        transformMenu();

        $(window).on('resize', function() {
            transformMenu();
        })

    })($('.j-header-menu'));

    // Стилизация селекта
    (function($selects) {
        if (!$selects.length) {
            return;
        }

        require(['select'], function() {
            $selects.each(function() {
                $(this).selectric({
                    disableOnMobile: false
                });
            });
        });
    })($('select'));
    
    (function($fullPage) {
        if (!$fullPage.length || touchWIDTH) {
            return;
        }
            
        require(['fullPage'], function() {
            $fullPage.fullpage({
                navigation: false,
                scrollOverflow: true
            });
        })
    })($('.j-full-page'));

    return {};
});
