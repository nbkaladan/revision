define(['app','home/entities/App.Paquete', 'handlebars', 'marionette'],

    function(App, PaqueteEntity, Handlebars, Marionette){
        'use strict';

        App.module('View', function(View, App, Backbone){
            View.Paquete = Backbone.Marionette.ItemView.extend({
                tagName: "li",
                template: Handlebars.compile($("[data-id=paquete]").html()),
                model: PaqueteEntity.Model,
                initialize: function () {
                    this.bindUIElements();
                },
                ui: {
                    "link": "a"
                },
                events:{
                    "click @ui.link": "getEntradas"
                },
                getEntradas: function(e){
                    e.preventDefault();
                    App.vent.trigger("getEntradas", this.model);
                }
            });
        });


        App.module('Collection', function(Collection, App, Backbone){
            Collection.Paquete = Backbone.Marionette.CollectionView.extend({
                childView: App.View.Paquete
            });
        });

        return {
            View: App.View.Paquete,
            CollectionView: App.Collection.Paquete
        }

    });