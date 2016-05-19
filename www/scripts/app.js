define('app', [
    'jquery',
    'fastclick',
    'jquery-ui/i18n/datepicker-ru',
    'select'
], function(
    $,
    FastClick
) {
    'use strict';

    FastClick.attach(document.body);

    // Глобальные переменные
    var ACTIVE = ('is-active');
    var mobileWidth = ($(window).width() < 641);
    var touchWidth = ($(window).width() < 1024);
    var $loader = $('.j-loader');

    // MENU
    var $menu = $('.j-menu');
    var $menuCnt = $('.j-menu__cnt');
    var $navMenu = $('.j-menu-nav');
    var $burgerBtn = $('.j-menu-btn');
    var $container = $('body, html');
    var $header = $('.j-header');
    var $bookingPopup = $('.j-booking-popup');
    var $bookingPopupCnt = $('.j-booking-popup__cnt');
    var $bookBtn = $('.j-booking-btn');

    // inputs in for booking
    var $datepickerMenu = $navMenu.find('.j-date-inp');
    var $selectMenu = $navMenu.find('select');
    var $datepickerHeader = $header.find('.j-date-inp');
    var $selectHeader = $header.find('select');

    var pos;
    // animated link after loading
    var $activeLink = $header.find('.b-nav__link.is-active');

    $burgerBtn.click(function() {
        var $self = $(this);
        var isActive = $self.hasClass(ACTIVE);

        if (isActive) {
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
            // first remove booking popup
            if ($bookBtn.hasClass(ACTIVE)) {
                $bookBtn.removeClass(ACTIVE);
                $bookBtn.text('Выбрать номер');
                $bookingPopupCnt.fadeOut();

                setTimeout(function() {
                    $bookingPopup.removeClass(ACTIVE);
                }, 300);

                setTimeout(function() {
                    $self.addClass(ACTIVE);
                    $menu.addClass(ACTIVE);
                    $menuCnt.fadeIn();
                }, 600);
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
        }
    });

    $bookBtn.click(function() {
        var $self = $(this);
        var isActive = $self.hasClass(ACTIVE);
        var text = isActive ? 'Выбрать номер' : 'Закрыть';

        if (isActive) {
            $bookingPopupCnt.fadeOut();
            setTimeout(function() {
                $self.removeClass(ACTIVE);
                $self.text(text);
                $bookingPopup.removeClass(ACTIVE);
                $container.removeClass(ACTIVE);
                $navMenu.removeClass('add-padding');
                $('body').removeClass('add-padding')
                    .css({
                        top : ''
                    });
                $(window).scrollTop(pos);
            }, 300);
        } else {
            // first remove booking popup
            if ($burgerBtn.hasClass(ACTIVE)) {
                $burgerBtn.removeClass(ACTIVE);
                $menuCnt.fadeOut();

                setTimeout(function() {
                    $menu.removeClass(ACTIVE);
                }, 300);

                setTimeout(function() {
                    $self.addClass(ACTIVE);
                    $self.text(text);
                    $bookingPopup.addClass(ACTIVE);
                    $bookingPopupCnt.fadeIn();
                }, 600);
            } else {
                pos = $(window).scrollTop();
                $self.addClass(ACTIVE);
                $self.text(text);
                $bookingPopup.addClass(ACTIVE);
                $container.addClass(ACTIVE);
                $bookingPopupCnt.fadeIn();
                $navMenu.addClass('add-padding');
                $('body').addClass('add-padding')
                    .css({
                        top : -pos
                    });
            }
        }
    });

    // smooth hide preloader, show link
    var hidePreloader = function() {
        // calculate animated line after loading page
        var bulgingPart = 80;
        var linkWidth = $activeLink.width();
        var insidePart = ($('.j-header-menu').outerWidth() - linkWidth) / 2;
        var fullLinkWidth = linkWidth + insidePart + bulgingPart;
        var $activeLine = $activeLink.children('.b-nav__link-line');
        // hide loader
        setTimeout(function() {
            $loader.addClass('is-hide');
        }, 300);
        setTimeout(function() {
            $loader.hide();
        }, 600);
        setTimeout(function() {
            $activeLine.css({
                width: fullLinkWidth
            });
            // создать кастомное событие.
            $(window).triggerHandler('scrollTotMap');
        }, 600);
    };

    //Sticky nav
    var cntHeight = $(window).height(); // высота блока
    // меняется в зависимотси от высоты экрана

    $(window).resize(function() {
        cntHeight = $(window).height();
    });

    // show/hide sticky nav
    $(window).scroll(function() {
        if (touchWidth) {
            return;
        }

        var scrollPosition = $(window).scrollTop();

        if (scrollPosition >= cntHeight) {
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
                    popup.showPopup($(this));
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

    // Стилизация селекта
    (function($selects) {
        if (!$selects.length) {
            return;
        }

        $selects.each(function() {
            var $select = $(this);
            $select.selectric({
                disableOnMobile: false,
                maxHeight: 260
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
        if (!$maps.length || window.location.hash === '#map-target') {
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
                minDate: '+1d',
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

    // resize header-menu
    (function($headerMenu) {
        if (!$headerMenu.length || mobileWidth) {
            return;
        }

        var transformMenu = function() {
            var cntHeight = $headerMenu.outerHeight(true);
            var screenHeight = $(window).height();
            var $reviewsBlock = $headerMenu.find('.j-reviews');
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
        hidePreloader();

        $(window).on('resize', function() {
            transformMenu();
        });

    })($('.j-header-menu'));

    // Change gallery param
    (function($gallery) {
        if (!$gallery.length) {
            return;
        }

        var $param = $gallery.children('.b-gallery__base');

        if (matchMedia('only screen and (max-width: 640px)').matches) {
            // calculate height for block

            $param.data('height', 400);
        }
    })($('.j-gallery_theme_mobile'));

    // Плавный скроллинг
    (function($slowScroll) {
        if (!$slowScroll.length) {
            return;
        }

        $slowScroll.click(function() {
            $('body, html').animate({scrollTop: cntHeight}, 'slow');
        });
    })($('.j-scroll-down'));

    // to top right away
    if (window.location.hash) scroll(0,0);
    // void some browsers issue
    setTimeout( function() { scroll(0,0); }, 1);



    // Плавный скролл к карте, если приходим по ссылке
    if(window.location.hash === '#map-target') {
        $(window).one('scrollTotMap', function() {

            $('html, body').animate({
                scrollTop: $('#map-content').offset().top - 80
            }, 500, 'swing');

            // Загрузка карты после скролла к ней (уменьшаем нагрузку)
            setTimeout(function() {
                $(window).triggerHandler('mapInitiate');
            }, 300);
        });

        $(window).one('mapInitiate', function() {

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
        });
    }

    // плавный скролл у якорей
    $('a[href^="#"]').bind('click.smoothscroll', function(e) {
        e.preventDefault();

        var target = this.hash;
        var $target = $(target);

        $('html, body').stop().animate({scrollTop: $target.offset().top - 80
        }, 500, 'swing', function() {
            window.location.hash = target;
        });
    });

    return {};
});
