define(['app', 'handlebars', 'marionette'],

    function(App, Handlebars, Marionette){
        'use strict';

        App.module('View', function(View, App, Backbone){
            View.Entrada = Backbone.Marionette.ItemView.extend({
                template: Handlebars.compile($("[data-id=entrada]").html()),
                className: "panel panel-default",
                initialize: function () {
                    _.bindAll(this, "save");
                    this.bindUIElements();
                },
                onRender: function(){
                    this.stickit();
                },
                ui:{
                    "autor": "#autor",
                    "error": "#error",
                    "descripcion": "#descripcion",
                    "afecta": "#afecta",
                    "guardar": "button"
                },
                bindings:{
                    "#autor": "autor",
                    "#error": "error",
                    "#descripcion": "descripcion",
                    "#afecta": "afecta"
                },
                events:{
                    "click @ui.guardar": "save"
                },
                save: function(e){
                    e.preventDefault();
                    this.model.save(
                        {},
                        {
                        url: 'api/entradas/'+this.model.get('id')
                    });
                }
            });
        });


        App.module('Collection', function(Collection, App, Backbone){
            Collection.Entrada = Backbone.Marionette.CollectionView.extend({
                childView: App.View.Entrada
            });
        });

        return {
            View: App.View.Entrada,
            CollectionView: App.Collection.Entrada
        }

    });