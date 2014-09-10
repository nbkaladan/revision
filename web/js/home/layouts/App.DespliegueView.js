'use strict';

App.module('View', function(View, App, Backbone){
    View.Despliegue = Backbone.Marionette.CompositeView.extend({
        el: ".despliegue",
        model: App.Entity.Despliegue,
        initialize: function () {
            this.bindUIElements();
        },
        ui: {
            "link": "a"
        }
    });
});


App.module('Collection', function(Collection, App, Backbone){
    Collection.Despliegue = Backbone.Marionette.CollectionView.extend({
        childView: App.View.Despliegue
    });
});