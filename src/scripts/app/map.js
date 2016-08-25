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
                lat: 59.9234703,
                lng: 30.346603
            },
            zoom: 12,
            zoomControlOptions: {
                position: google.maps.ControlPosition.RIGHT_CENTER
            },
            streetViewControl: false,
            mapTypeControl: false,
            styles:[
                {
                    "featureType": "landscape",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "hue": "#ff9900"
                        },
                        {
                            "saturation": "22"
                        },
                        {
                            "lightness": "12"
                        },
                        {
                            "gamma": "0.81"
                        },
                        {
                            "weight": "0.76"
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "gamma": "0.32"
                        },
                        {
                            "lightness": "34"
                        },
                        {
                            "weight": "0.33"
                        },
                        {
                            "saturation": "29"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "hue": "#ff9900"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "labels.text",
                    "stylers": [
                        {
                            "hue": "#008fff"
                        },
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                    "featureType": "poi.attraction",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "poi.business",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "poi.business",
                    "elementType": "labels.text",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "poi.government",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "poi.medical",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "poi.place_of_worship",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                    "featureType": "poi.sports_complex",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.text",
                    "stylers": [
                        {
                            "saturation": "-16"
                        },
                        {
                            "lightness": "-38"
                        },
                        {
                            "gamma": "6.81"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#343434"
                        },
                        {
                            "lightness": "8"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "hue": "#ffac00"
                        },
                        {
                            "saturation": "-100"
                        }
                    ]
                },
                {
                    "featureType": "transit",
                    "elementType": "labels.text",
                    "stylers": [
                        {
                            "hue": "#ff7300"
                        },
                        {
                            "gamma": "0.00"
                        },
                        {
                            "lightness": "0"
                        },
                        {
                            "saturation": "-95"
                        }
                    ]
                },
                {
                    "featureType": "transit",
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "weight": "0.01"
                        },
                        {
                            "hue": "#ffb200"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#005870"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "labels.text",
                    "stylers": [
                        {
                            "color": "#ffffff"
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
