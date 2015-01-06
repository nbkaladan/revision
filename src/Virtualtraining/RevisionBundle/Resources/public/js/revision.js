define(['app'
        ,'home/entities/App.Despliegue'
        ,'home/views/App.DespliegueView'
        ,'home/entities/App.Entorno'
        ,'home/views/App.EntornoView'
        ,'home/entities/App.Paquete'
        ,'home/views/App.PaqueteView'
        ,'home/entities/App.Entrada'
        ,'home/views/App.EntradaView'
        ,'marionette'
],

function(App, DespliegueEntity, DespliegueView, EntornoEntity, EntornoView, PaqueteEntity, PaqueteView, EntradaEntity, EntradaView, Marionette){
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
                this.entradas = new EntradaEntity.Collection();
                this.entradas.fetch({
                        url: 'api/paquetes/'+model.get('id')+'/entradas.json'
                    },{
                        parse: true
                    }
                );
                this.entradasV = new EntradaView.CollectionView({
                   collection: this.entradas
                });
                App.entradas.show(this.entradasV);
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