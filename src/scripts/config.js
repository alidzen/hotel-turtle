/* jshint ignore:start */
require.config({
    baseUrl: '/scripts/lib',

    paths : {
        app             : '../app',
        tpl             : '../tpl',

        jquery          : 'jquery/dist/jquery.min',
        'jquery.cookie' : 'jquery.cookie',
        fastclick       : 'fastclick/lib/fastclick',
        modernizr       : 'modernizr/modernizr',
        handlebars      : 'handlebars/handlebars.runtime.min',
        polyfiller       : 'webshim/js-webshim/dev/polyfiller',
        fotorama        : 'fotorama/fotorama',
        'masked-inputs'  : 'jquery.maskedinput/dist/jquery.maskedinput.min',
        'magnific-popup' : 'magnific-popup/dist/jquery.magnific-popup.min',
        select           : 'jquery-selectric/public/jquery.selectric.min',
        'jquery-ui'     : 'jquery.ui/ui',

        'google-maps'    : 'async!https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=geometry&signed_in=true',
        infobox          : 'google-infobox/google-infobox',
        async            : 'requirejs-plugins/src/async',

        CanvasLoader            : 'CanvasLoader/js/heartcode-canvasloader-min',
        videojs                 : 'videojs/dist/video-js/video',
        sammy                   : 'sammy/lib/min/sammy-latest.min',
        scaleraphael            : 'scaleraphael/scaleraphael',
        eve                     : 'eve-adobe/eve.min',
        raphael                 : 'raphael/raphael-min'
    },
    shim : {
        'jquery.cookie' : {
            deps   : ['jquery']
        },
        fastclick : {
            exports: 'FastClick'
        },
        modernizr: {
            exports: 'Modernizr'
        },
        handlebars: {
            exports: 'Handlebars'
        },
        'magnific-popup': {
            exports: '$.magnificPopup',
            deps: ['jquery']
        },
        infobox: {
            exports: 'InfoBox',
            deps   : ['app/google-map']
        },
        select: {
            exports: 'selectric',
            deps: ['jquery']
        }
    },
    /* Launch app.js after config */
    deps: ['app']
});
