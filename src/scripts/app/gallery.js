define('app/gallery', [
    'jquery',
    'fotorama',
    'app/tpl/gallery/labels'
], function(
    $,
    fotorama,
    tplLabels
) {
    'use strict';

    /**
     * Галерея
     * @param {Object} $galleryWrap - jQery object
     * @constructor
     */
    var Gallery = function($galleryWrap) {
        this.$galleryWrap = $galleryWrap;
        this.$gallery = $galleryWrap.find('.b-gallery__base');
        this.$prev = $galleryWrap.find('.j-gallery__prev');
        this.$next = $galleryWrap.find('.j-gallery__next');
        this.isLoop = this.$gallery.data('loop');
        this.labels = this.$gallery.data('labels');
        this.disabled = 'is-disabled';

        this.eventShow();
        this.eventReady();
        this.initGallery();
    };

    /**
     * Инициализация галереи, подключение фоторамы
     */
    Gallery.prototype.initGallery = function() {
        this.$gallery.fotorama();
    };

    /**
     * Кастомное событие фоторамы - show - срабатывает при каждом показе слайда
     */
    Gallery.prototype.eventShow = function() {
        var self = this;

        this.$gallery.on('fotorama:show', function(e, fotorama) {
            self.toggleArrowView(fotorama);
        });
    };

    /**
     * Кастомное событие фоторамы - ready - срабатывает, когда фоторама
     * полностью загружена
     */
    Gallery.prototype.eventReady = function() {
        var self = this;
        var cntHeight = self.$galleryWrap.closest('.j-gallery-container').outerHeight();

        this.$gallery.on('fotorama:ready', function(e, fotorama) {
            self.bindArrowClick(fotorama);
            self.arrowView(fotorama);
            self.labelsCreate(fotorama);
            
            if (matchMedia('only screen and (min-width: 1024px)').matches && cntHeight !== null) {
                fotorama.resize({
                    height: cntHeight
                });
            }
        });
    };

    /**
     * Обработка клика по стрелкам
     * @param {Object} fotorama
     */
    Gallery.prototype.bindArrowClick = function(fotorama) {
        this.$prev.click(function() {
            fotorama.show('<');
        });

        this.$next.click(function() {
            fotorama.show('>');
        });
    };

    /**
     * Показ стрелок, только когда есть слайды и их больше одного
     * @param {Object} fotorama
     */
    Gallery.prototype.arrowView = function(fotorama) {
        if (fotorama.size === 1) {
            this.$prev.addClass(this.disabled);
            this.$next.addClass(this.disabled);
        }
    };

    /**
     * Смена вида у стрелок, у первого и последнего слайда
     * @param {Object} fotorama
     */
    Gallery.prototype.toggleArrowView = function(fotorama) {
        var prevMethod = fotorama.activeIndex === 0 ?
            'addClass' :
            'removeClass';

        var nextMethod = fotorama.size -
        fotorama.activeIndex === 1 ?
            'addClass' :
            'removeClass';

        if (!this.isLoop) {
            this.$prev[prevMethod](this.disabled);
            this.$next[nextMethod](this.disabled);
        }
    };

    /**
     * Создание леблов у тумбочек
     */
    Gallery.prototype.labelsCreate = function() {
        if (this.labels && typeof this.labels === 'object') {
            var $container = this.$gallery.find('.fotorama__nav__shaft');
            var $thumbWidth = this.$gallery.data('thumbwidth');
            var thumbMargin = this.$gallery.data('thumbmargin') || 2;
            var data = {
                elements: []
            };

            $.each(this.labels, function(item, text) {
                data.elements.push(
                    {
                        position: (parseInt($thumbWidth) + thumbMargin) * item,
                        text: text
                    }
                );
            });

            $container.append(tplLabels(data));
        }
    };

    return Gallery;
});
