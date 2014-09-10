define(['app','home/entities/App.Entorno', 'marionette'],

function(App, Entorno, Marionette){
    'use strict';

    App.module('Entity', function (Entity, App, Backbone) {
        Entity.Despliegue = Backbone.Model.extend({
            defaults:{
                id: '',
                descripcion: ''
            },
            initialize: function (data){
                this.entornos = new Entorno.Collection(data.entornos, {parentId: this.id});
            }
        });

        Entity.DespliegueList = Backbone.Collection.extend({
            model: Entity.Despliegue
        });

    });

    return {
        Model: App.Entity.Despliegue,
        Collection: App.Entity.DespliegueList
    }

});