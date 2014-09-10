define(['app','home/entities/App.Despliegue', 'home/views/App.EntornoView', 'handlebars', 'marionette'],

    function(App, DespliegueEntity, EntornoView, Handlebars, Marionette){
    'use strict';



    App.module('View', function(View, App, Backbone){
        View.Despliegue = Backbone.Marionette.CompositeView.extend({
            className: "accordion-group",
            template: Handlebars.compile($("[data-id=despliegue]").html()),
            model: DespliegueEntity.Model,
            //collection: DespliegueEntity.Model,
            childView: EntornoView.View,
            childViewContainer: "ul",
            initialize: function () {
                this.bindUIElements();
                this.collection = this.model.entornos;
            },
            ui: {
                "link": "a"
            }
        });
    });


    App.module('Collection', function(Collection, App, Backbone){
        Collection.Despliegue = Backbone.Marionette.CollectionView.extend({
            childView: App.View.Despliegue
            ,id: "desplieguesList"
            ,className: "accordion"
        });
    });

    return {
        View: App.View.Despliegue,
        CollectionView: App.Collection.Despliegue
    }

});