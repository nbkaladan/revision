define(['app','home/entities/App.Paquete', 'marionette'],

    function(App, Paquete, Marionette){
        'use strict';

        App.module('Entity', function(Entity, App, Backbone){
            Entity.Entorno = Backbone.Model.extend({
                defaults:{
                    id: '',
                    descripcion: '',
                    id_despliegue: ''
                },
                initialize: function (data, options){
                    this.set("id_despliegue", options.parentId);
                    this.paquetes = new Paquete.Collection(data.paquetes, {parentId: this.id});
                }
            });

            Entity.EntornoList = Backbone.Collection.extend({
                model: Entity.Entorno
            });

        });

        return {
            Model: App.Entity.Entorno,
            Collection: App.Entity.EntornoList
        }

    });