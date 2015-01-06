define(['app', 'home/revision'],

function(App, RevisionController) {
        'use strict';

        window.App = window.App || new Backbone.Marionette.Application();

        App.addRegions({
            despliegue: '#left .despliegues',
            entradas: '#entradas'
        });

        App.on('start', function (init) {
            Backbone.history.start();
        });

    return this;

});