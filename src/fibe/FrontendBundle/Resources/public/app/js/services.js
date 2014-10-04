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
                switch (typeof property) {
                    case "Object":
                        if(property instanceof Array){
                            for(var object in property) {
                                entity[property][object] = $scope.replaceObjectById(object);
                            }
                        }else{
                            entity[property] = $scope.replaceObjectById(property);
                        }
                }
            }
            return entity;
        }

        var replaceObjectById = function(object) {
            if (property.hasOwnProperty(id)) {
                return object.id;
            }
            return object;
        }


        return {

            'request': function (config)
            {
                debugger;
                if(config.method === "POST"){
                    cleanEntity();
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

