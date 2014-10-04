'use strict';

/**
 * Main services
 *
 * @type {module}
 */
var sympozerServices = angular.module('sympozerServices', ['ngResource']);


/**
 * Global http interceptor
 *
 * @TODO Florian : Comment
 *
 */
angular.module('sympozerApp').factory('globalHttpInterceptor', ['$q', '$rootScope',
    function ($q, $rootScope)
    {
        //Function used to keep only IDs of the POSTED entities
        var cleanEntity = function(entity){

            for(var property in entity) {
                switch (typeof entity[property]) {
                    case "object":
                        if((entity[property])instanceof Array){
                            for(var object in entity[property]) {
                                entity[property][object] = replaceObjectById(entity[property][object]);
                            }
                        }else{
                            entity[property] = replaceObjectById(entity[property]);
                        }
                    break;
                }
            }
            return entity;
        }

        var replaceObjectById = function(object) {
            if (object.hasOwnProperty('id')) {
                return object.id;
            }
            return object;
        }


        return {

            'request': function (config)
            {
                if(["POST","PUT"].indexOf(config.method) >= 0){
                  config.data = cleanEntity(config.data);
                }
                return config;
            },

            'response': function (response)
            {
                return response || $q.when(response);
            },

            'responseError': function (rejection)
            {
                if (rejection.status == "401")
                {
                    $rootScope.$broadcast('globalHttpInterceptor:401', {});
                    $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'You need to signin to have access to this page', type: 'danger'});
                }
                $rootScope.$broadcast('AlertCtrl:addAlert', {code: rejection.status + ' ' + rejection.statusText, type: 'danger'});
                return $q.reject(rejection);
            }
        };
    }


]);

