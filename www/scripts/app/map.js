define([
    'jquery',
    'infobox',
    'app/google-map',
    'app/tpl/map/tooltip',
    'app/functions'
], function($, InfoBox, google, tpl) {
    'use strict';

    /***
     * Данные карты
     * @param {Object} $map - jQuery объект - карта
     * @constructor
     */
    var Map = function($map) {
        var attributData = $map.data();
        var scriptData = window.map[$map[0].id];
        var data = $.extend(scriptData, attributData);
        this.$el = $map;
        this.data = data || {};
        this.markers = [];
        this.markerOpen = -1;
        this.data.fit = data.fit;
        this.data.minZoom = data.minzoom || 10;
        this.data.maxZoom = data.maxzoom || 18;

        if (data.center) {
            this.data.center = new google.maps.LatLng(
                data.center[0],
                data.center[1]
            );
        }

        this.options = {
            center: {
                lat: 59.923325,
                lng: 30.346303
            },
            zoom: 12,
            zoomControlOptions: {
                position: google.maps.ControlPosition.RIGHT_CENTER
            },
            streetViewControl: false,
            mapTypeControl: false,
            styles:[
                {
                    "featureType": "administrative",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#707070"
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "all",
                    "stylers": [
                        {
                            "hue": "#FFBB00"
                        },
                        {
                            "saturation": 43.400000000000006
                        },
                        {
                            "lightness": 37.599999999999994
                        },
                        {
                            "gamma": 1
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#efe7d7"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "all",
                    "stylers": [
                        {
                            "hue": "#00FF6A"
                        },
                        {
                            "saturation": -1.0989010989011234
                        },
                        {
                            "lightness": 11.200000000000017
                        },
                        {
                            "gamma": 1
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#e8e0d0"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "visibility": "on"
                        },
                        {
                            "color": "#646464"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "all",
                    "stylers": [
                        {
                            "hue": "#FFC200"
                        },
                        {
                            "saturation": -61.8
                        },
                        {
                            "lightness": 45.599999999999994
                        },
                        {
                            "gamma": 1
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#646464"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "labels.text.stroke",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "all",
                    "stylers": [
                        {
                            "hue": "#FF0300"
                        },
                        {
                            "saturation": -100
                        },
                        {
                            "lightness": 51.19999999999999
                        },
                        {
                            "gamma": 1
                        }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "all",
                    "stylers": [
                        {
                            "hue": "#FF0300"
                        },
                        {
                            "saturation": -100
                        },
                        {
                            "lightness": 52
                        },
                        {
                            "gamma": 1
                        }
                    ]
                },
                {
                    "featureType": "transit",
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "hue": "#ff9500"
                        },
                        {
                            "saturation": "-52"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "all",
                    "stylers": [
                        {
                            "hue": "#0078ff"
                        },
                        {
                            "saturation": -13.200000000000003
                        },
                        {
                            "lightness": 2.4000000000000057
                        },
                        {
                            "gamma": 1
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#005870"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#646464"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "labels.text.stroke",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                }
            ]
        };

        this.options = $.extend(this.options, this.data);

        this.initCustomZoomControls($map);
        this.initMap();
        if (this.data.fit) {
            this.initBounds();
        }
        this.initMarkers();
        this.initInfoWindow();
        this.imageBoundsInit();
        this.editor();
    };

    /**
     * Инициализация карты
     */
    Map.prototype.initMap = function() {
        this.map = new google.maps.Map(this.$el[0], this.options);
    };

    /**
     * Сбор данных маркеров
     */
    Map.prototype.initMarkers = function() {
        var that = this;

        if (!this.data.markers) {
            return;
        }

        $.each(this.data.markers, function(index, marker) {
            that.initMarker(index, marker);
        });
    };

    /**
     * Инициализация маркера на карте
     * @param {Number} index - номер маркера
     * @param {Object} data - данные маркера
     */
    Map.prototype.initMarker = function(index, data) {
        var coords = new google.maps.LatLng(data.coords[0], data.coords[1]);

        var options = {
            map      : this.map,
            position : coords,
            animation: google.maps.Animation.DROP,
            icon     : {
                url: data.image,
                size : new google.maps.Size(60, 90),
                anchor: new google.maps.Point(30, 90)
            }
        };

        var marker = new google.maps.Marker(options);
        this.markers.push(marker);
        marker.setMap(this.map);

        if (this.data.fit) {
            this.bounds.extend(coords);
        }

        this.bindMarkerClick(index, marker, data);
    };

    /**
     * Клик по маркеру
     * @param {Number} index - номер маркера
     * @param {Object} marker - google marker
     * @param {Object} data - данные маркера
     */
    Map.prototype.bindMarkerClick = function(index, marker, data) {
        var that = this;

        if (!data.title && !data.text && !data.url) {
            marker.setOptions({
                clickable: false
            });
            return;
        }

        google.maps.event.addListener(marker, 'click', function() {
            if (data.url) {
                that.markerLink(data.url);
                return;
            }

            that.infoWindow.setContent(tpl(data));
            console.log(tpl());
            that.infoWindow.open(that.map, this);
            if (that.markerOpen !== -1) {
                that.markerShow(that.markerOpen);
            }
            that.markerOpen = index;
            that.markerHide(index);
        });
    };

    /**
     * Скрыть маркер
     * @param {Number} index - порядковый номер маркера
     */
    Map.prototype.markerHide = function(index) {
        this.markers[index].setVisible(false);
    };

    /**
     * Показать маркер
     * @param {Number} index - порядковый номер маркера
     */
    Map.prototype.markerShow = function(index) {
        this.markers[index].setVisible(true);
    };

    /**
     * Балун
     */
    Map.prototype.initInfoWindow = function() {
        var that = this;
        this.infoWindow = new InfoBox({
            content: '',
            disableAutoPan: false,
            maxWidth: 0,
            pixelOffset: new google.maps.Size(-55, -83),
            zIndex: null,
            closeBoxMargin: '0px 0px 0px 0px',
            closeBoxURL: '',
            infoBoxClearance: new google.maps.Size(1, 1),
            isHidden: false,
            pane: 'floatPane',
            enableEventPropagation: false,
            boxStyle: {
                width: 'auto'
            }
        });

        google.maps.event.addListener(this.map, 'click', function() {
            that.closeInfoWindow();
        });

        this.infoWindow.addListener('domready', function() {
            var $infoBox = $('.infoBox');
            var $arrow = $infoBox.find('.b-map-tooltip__arrow');
            var $width = $infoBox.width();
            var $height = $infoBox.height() + $arrow.outerHeight();
            that.infoWindow.setOptions({
                pixelOffset: new google.maps.Size(-($width - 4) / 2, -$height)
            });
        });
    };

    /**
     * Закрытие балуна
     */
    Map.prototype.closeInfoWindow = function() {
        if (this.markerOpen !== -1) {
            this.markerShow(this.markerOpen);
        }

        this.markerOpen = -1;
        this.infoWindow.close();
    };

    /**
     * Маркер с ссылкой
     * @param {String} url - ссыллка
     */
    Map.prototype.markerLink = function(url) {
        var isLocalLink = url.indexOf(window.location.origin) + 1;

        if (isLocalLink) {
            window.location.href = url;
        } else {
            window.open(url);
        }
    };

    /**
     * Инициализация картинки на карте
     */
    Map.prototype.imageBoundsInit = function() {
        if (!this.data.imageBounds) {
            return;
        }

        var imageBounds = this.data.imageBounds;

        this.imageBounds = {
            north: imageBounds.north,
            west: imageBounds.west,
            south: imageBounds.south,
            east: imageBounds.east
        };

        this.historicalOverlay = new google.maps.GroundOverlay(
            imageBounds.image,
            this.imageBounds);

        this.historicalOverlay.setMap(this.map);
    };

    /**
     * Режим создания/редактирования карты
     */
    Map.prototype.editor = function() {
        if (!this.data.editor) {
            return;
        }

        google.maps.event.addListener(this.map, 'click', function(e) {
            console.log('[' +
                e.latLng.lat().toFixed(6) + ',' +
                e.latLng.lng().toFixed(6) + ']');
        });
    };

    /**
     * Определение крайних позиций маркеров на карте
     */
    Map.prototype.initBounds = function() {
        this.bounds = new google.maps.LatLngBounds();

        this.fitBounds(this.bounds);
    };

    /**
     * Изменение области отображения карты, так чтобы были видные все маркеры
     */
    Map.prototype.fitBounds = function(bounds) {
        this.map.fitBounds(bounds);
    };

    Map.prototype.initCustomZoomControls = function($map) {
        this.$zoomIn = $map.siblings('.b-map__zoom-in');
        this.$zoomOut = $map.siblings('.b-map__zoom-out');

        if (this.$zoomIn.length && this.$zoomOut.length) {
            this.options.zoomControl = false;
            this.clickCustomZoomControls();
        }
    };

    Map.prototype.clickCustomZoomControls = function() {
        var that = this;
        this.$zoomIn.click(function() {
            that.map.setZoom(that.map.getZoom() + 1);
        });

        this.$zoomOut.click(function() {
            that.map.setZoom(that.map.getZoom() - 1);
        });
    };

    return Map;
});
