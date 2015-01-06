define(['app', 'marionette'],

    function(App, Marionette){
        'use strict';

        App.module('Entity', function(Entity, App, Backbone){
            Entity.Entrada = Backbone.Model.extend({
                defaults:{
                    id: '',
                    descripcion: '',
                    autor: '',
                    afecta: '',
                    error: '',
                    id_paquete: ''
                },
                initialize: function (data, options){
                    //this.set("id_paquete", options.parentId);
                },
                parse: function(data){
                    var j = _.clone(data);
                    if (data && data.id_paquete && data.id_paquete.id){
                        j.id_paquete = data.id_paquete.id;
                    }
                    return j;
                }
            });

            Entity.EntradaList = Backbone.Collection.extend({
                model: Entity.Entrada
            });

        });

        return {
            Model: App.Entity.Entrada,
            Collection: App.Entity.EntradaList
        }

    });