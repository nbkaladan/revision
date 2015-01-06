/**
 * Created by kaladan on 20/07/14.
 */

// File: /js/app.js

// 'jquery' returns the jQuery object into '$'
//
// 'bootstrap' does not return an object. Must appear at the end

define(['jquery', 'backbone', 'marionette', 'bootstrap'],

function($, Backbone, Marionette, Bootstrap){

    'use strict';

    window.App = window.App || new Backbone.Marionette.Application();

    return window.App;
});