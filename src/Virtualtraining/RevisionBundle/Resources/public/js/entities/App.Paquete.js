define(['app', 'marionette'],

function(App, Marionette){
    'use strict';

    App.module('Entity', function(Entity, App, Backbone){
        Entity.Paquete = Backbone.Model.extend({
            defaults:{
                id: '',
                descripcion: '',
                id_entorno: ''
            },
            initialize: function (data, options){
                this.set("id_entorno", options.parentId);
            }
        });

        Entity.PaqueteList = Backbone.Collection.extend({
            model: Entity.Paquete
        });

    });

    return {
        Model: App.Entity.Paquete,
        Collection: App.Entity.PaqueteList
    }

});