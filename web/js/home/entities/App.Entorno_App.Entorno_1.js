'use strict';

App.module('Entity', function(Entity, App, Backbone){
    Entity.Entorno = Backbone.Marionette.Model.extend({
        defaults:{
            id: '',
            descripcion: ''
        }
    });

    Entity.EntornoList = Backbone.Collection.extend({
        model: Entity.Entorno
    });

});