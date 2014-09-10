require(['app'],

    function(App) {
        // DOM ready
        $(document).ready(function(){
            'use strict';

            App.addRegions({
                despliegue: '#left'
            });

            App.on('start', function () {
                Backbone.history.start();
            });
        });
    });