'use strict';

App.module('Entity', function(Entity, App, Backbone){
    Entity.Paquete = Backbone.Marionette.Model.extend({
        defaults:{
            id: '',
            descripcion: ''
        }
    });

    Entity.PaqueteList = Backbone.Collection.extend({
        model: Entity.Paquete
    });

});