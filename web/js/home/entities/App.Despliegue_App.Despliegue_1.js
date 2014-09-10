define(['app','marionette'],

function(App, Marionette){
    'use strict';

    App.module('Entity', function (Entity, App, Backbone) {
        Entity.Despliegue = Backbone.Collection.extend({
            defaults: {
                id: '',
                descripcion: ''
            },
            model: Entity.Entorno
        });

        Entity.DespliegueList = Backbone.Collection.extend({
            model: Entity.Despliegue
        });

    });

});