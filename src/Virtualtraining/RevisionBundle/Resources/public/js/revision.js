define(['app'
        ,'home/entities/App.Despliegue'
        ,'home/views/App.DespliegueView'
        ,'home/entities/App.Entorno'
        ,'home/views/App.EntornoView'
        ,'home/entities/App.Paquete'
        ,'home/views/App.PaqueteView'
        ,'marionette'
],

function(App, DespliegueEntity, DespliegueView, EntornoEntity, EntornoView, PaqueteEntity, PaqueteView, Marionette){
    'use strict';

    App.module('Revision', function(Revision, App, Backbone){
        Revision.Router = Marionette.AppRouter.extend({
            appRoutes: {

            }
        });

        Revision.Controller = function (){
            this.despliegues = null;//new DespliegueEntity.Collection();
            this.desplieguesV = null;
            this.entradas = null;
            this.entradasV = null;
        }

        _.extend(Revision.Controller.prototype,{
            start: function(init){

                App.vent.bind("getEntradas", this.showEntradas);

                this.despliegues = new DespliegueEntity.Collection(init.despliegues);
                this.desplieguesV = new DespliegueView.CollectionView({
                    collection:this.despliegues
                });


                App.despliegue.show(this.desplieguesV);
            },
            showEntradas: function (model){
                this.entradas = new EntradasEntity.Collection({
                    url: 'api/paquetes/'+model.get('id')+'/entradas'

                });

                $.ajax({
                    context: this,
                    type: 'GET',
                    url: 'api/paquetes/'+model.get('id')+'/entradas',
                    dataType: 'json',
                    success: function(data, textStatus, errorThrown){
                        console.log(data);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        this.model.set($.parseJSON(jqXHR.responseText)); // TODO Handle edge cases of network problem and responseText = null
                    }
                });
            }
        });

        App.on('start', function (init) {
            var controller = new App.Revision.Controller();
            controller.router = new App.Revision.Router({
                controller: controller
            });
            controller.start(init);
        });

    });

    return {
        Controller: App.Revision.Controller
    }

});