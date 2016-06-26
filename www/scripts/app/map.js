'use strict';

define(['jquery', 'infobox', 'app/google-map', 'app/tpl/map/tooltip', 'app/functions'], function ($, InfoBox, google, tpl) {
    'use strict';

    /***
     * Данные карты
     * @param {Object} $map - jQuery объект - карта
     * @constructor
     */

    var Map = function Map($map) {
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
            this.data.center = new google.maps.LatLng(data.center[0], data.center[1]);
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
            styles: [{
                "featureType": "administrative.land_parcel",
                "elementType": "all",
                "stylers": [{
                    "visibility": "on"
                }]
            }, {
                "featureType": "landscape.man_made",
                "elementType": "geometry",
                "stylers": [{
                    "visibility": "on"
                }, {
                    "hue": "#caff00"
                }, {
                    "lightness": "80"
                }, {
                    "saturation": "30"
                }, {
                    "weight": "5.39"
                }, {
                    "gamma": "0.30"
                }]
            }, {
                "featureType": "landscape.natural",
                "elementType": "geometry",
                "stylers": [{
                    "visibility": "on"
                }]
            }, {
                "featureType": "landscape.natural",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#eeeeee"
                }]
            }, {
                "featureType": "landscape.natural",
                "elementType": "geometry.stroke",
                "stylers": [{
                    "visibility": "on"
                }]
            }, {
                "featureType": "poi",
                "elementType": "geometry",
                "stylers": [{
                    "visibility": "on"
                }]
            }, {
                "featureType": "poi",
                "elementType": "geometry.fill",
                "stylers": [{
                    "visibility": "on"
                }, {
                    "color": "#ded1b4"
                }]
            }, {
                "featureType": "poi",
                "elementType": "geometry.stroke",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "poi.attraction",
                "elementType": "all",
                "stylers": [{
                    "visibility": "on"
                }]
            }, {
                "featureType": "poi.business",
                "elementType": "all",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "poi.government",
                "elementType": "all",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "poi.medical",
                "elementType": "all",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "poi.park",
                "elementType": "all",
                "stylers": [{
                    "visibility": "on"
                }]
            }, {
                "featureType": "poi.park",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#ded1b4"
                }]
            }, {
                "featureType": "poi.place_of_worship",
                "elementType": "all",
                "stylers": [{
                    "visibility": "on"
                }]
            }, {
                "featureType": "poi.place_of_worship",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#ded1b4"
                }]
            }, {
                "featureType": "poi.place_of_worship",
                "elementType": "labels.text.stroke",
                "stylers": [{
                    "visibility": "on"
                }]
            }, {
                "featureType": "poi.school",
                "elementType": "all",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "poi.sports_complex",
                "elementType": "all",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "road",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#fefefd"
                }]
            }, {
                "featureType": "road",
                "elementType": "geometry.stroke",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "transit.station",
                "elementType": "labels.text.fill",
                "stylers": [{
                    "color": "#1e1e1f"
                }]
            }, {
                "featureType": "transit.station",
                "elementType": "labels.icon",
                "stylers": [{
                    "lightness": "16"
                }, {
                    "saturation": "93"
                }, {
                    "hue": "#009cff"
                }, {
                    "gamma": "0.54"
                }, {
                    "weight": "9.43"
                }]
            }, {
                "featureType": "water",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#005870"
                }]
            }, {
                "featureType": "water",
                "elementType": "labels.text.fill",
                "stylers": [{
                    "color": "#ffffff"
                }]
            }, {
                "featureType": "water",
                "elementType": "labels.text.stroke",
                "stylers": [{
                    "color": "#ff0000"
                }, {
                    "visibility": "off"
                }]
            }]
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
    Map.prototype.initMap = function () {
        this.map = new google.maps.Map(this.$el[0], this.options);
    };

    /**
     * Сбор данных маркеров
     */
    Map.prototype.initMarkers = function () {
        var that = this;

        if (!this.data.markers) {
            return;
        }

        $.each(this.data.markers, function (index, marker) {
            that.initMarker(index, marker);
        });
    };

    /**
     * Инициализация маркера на карте
     * @param {Number} index - номер маркера
     * @param {Object} data - данные маркера
     */
    Map.prototype.initMarker = function (index, data) {
        var coords = new google.maps.LatLng(data.coords[0], data.coords[1]);

        var options = {
            map: this.map,
            position: coords,
            animation: google.maps.Animation.DROP,
            icon: {
                url: data.image,
                size: new google.maps.Size(60, 90),
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
    Map.prototype.bindMarkerClick = function (index, marker, data) {
        var that = this;

        if (!data.title && !data.text && !data.url) {
            marker.setOptions({
                clickable: false
            });
            return;
        }

        google.maps.event.addListener(marker, 'click', function () {
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
    Map.prototype.markerHide = function (index) {
        this.markers[index].setVisible(false);
    };

    /**
     * Показать маркер
     * @param {Number} index - порядковый номер маркера
     */
    Map.prototype.markerShow = function (index) {
        this.markers[index].setVisible(true);
    };

    /**
     * Балун
     */
    Map.prototype.initInfoWindow = function () {
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

        google.maps.event.addListener(this.map, 'click', function () {
            that.closeInfoWindow();
        });

        this.infoWindow.addListener('domready', function () {
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
    Map.prototype.closeInfoWindow = function () {
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
    Map.prototype.markerLink = function (url) {
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
    Map.prototype.imageBoundsInit = function () {
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

        this.historicalOverlay = new google.maps.GroundOverlay(imageBounds.image, this.imageBounds);

        this.historicalOverlay.setMap(this.map);
    };

    /**
     * Режим создания/редактирования карты
     */
    Map.prototype.editor = function () {
        if (!this.data.editor) {
            return;
        }

        google.maps.event.addListener(this.map, 'click', function (e) {
            console.log('[' + e.latLng.lat().toFixed(6) + ',' + e.latLng.lng().toFixed(6) + ']');
        });
    };

    /**
     * Определение крайних позиций маркеров на карте
     */
    Map.prototype.initBounds = function () {
        this.bounds = new google.maps.LatLngBounds();

        this.fitBounds(this.bounds);
    };

    /**
     * Изменение области отображения карты, так чтобы были видные все маркеры
     */
    Map.prototype.fitBounds = function (bounds) {
        this.map.fitBounds(bounds);
    };

    Map.prototype.initCustomZoomControls = function ($map) {
        this.$zoomIn = $map.siblings('.b-map__zoom-in');
        this.$zoomOut = $map.siblings('.b-map__zoom-out');

        if (this.$zoomIn.length && this.$zoomOut.length) {
            this.options.zoomControl = false;
            this.clickCustomZoomControls();
        }
    };

    Map.prototype.clickCustomZoomControls = function () {
        var that = this;
        this.$zoomIn.click(function () {
            that.map.setZoom(that.map.getZoom() + 1);
        });

        this.$zoomOut.click(function () {
            that.map.setZoom(that.map.getZoom() - 1);
        });
    };

    return Map;
});