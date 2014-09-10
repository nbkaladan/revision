define(['app', 'home/revision'],

function(App, RevisionController) {
        'use strict';

        App.addRegions({
            despliegue: '#left .despliegues'
        });

        App.on('start', function (init) {
            Backbone.history.start();
        });

    return this;

});