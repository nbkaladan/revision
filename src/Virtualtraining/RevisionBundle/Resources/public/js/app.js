/**
 * Created by kaladan on 20/07/14.
 */

// File: /js/app.js

// 'jquery' returns the jQuery object into '$'
//
// 'bootstrap' does not return an object. Must appear at the end

require(['thorax','bootstrap'], function(Thorax){

    // DOM ready
    $(document).ready(function(){

        // Twitter Bootstrap 3 carousel plugin
        $(".entorno").carousel();
    });
});