'use strict';

App.module('Layout', function(Layout, App, Backbone){
    Layout.Left = Backbone.Marionette.ItemView.extend({
        el: ".despliegues"
    });
});