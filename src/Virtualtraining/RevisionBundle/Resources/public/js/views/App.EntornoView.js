define(['app','home/entities/App.Entorno', 'home/views/App.PaqueteView', 'handlebars', 'marionette'],

    function(App, EntornoEntity, PaqueteView, Handlebars, Marionette){
        'use strict';

        App.module('View', function(View, App, Backbone){
            View.Entorno = Backbone.Marionette.CompositeView.extend({
                //el: "ul.entornos",
                tagName: "li",
                template: Handlebars.compile($("[data-id=entorno]").html()),
                model: EntornoEntity.Model,
                childView: PaqueteView.View,
                childViewContainer: "ul",
                initialize: function () {
                    this.bindUIElements();
                    this.collection = this.model.paquetes;
                },
                ui: {
                    "link": "a"
                }
            });
        });


        App.module('Collection', function(Collection, App, Backbone){
            Collection.Entorno = Backbone.Marionette.CollectionView.extend({
                childView: App.View.Entorno
                ,id: "entornosList"
                ,className: "accordion"
            });
        });

        return {
            View: App.View.Entorno,
            CollectionView: App.Collection.Entorno
        }

    });