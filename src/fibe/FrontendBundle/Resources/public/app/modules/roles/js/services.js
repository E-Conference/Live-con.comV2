/**
 * Roles Factories
 */

/**
 * Roles labels Factory
 *
 * Service calls for CRUD actions
 *
 * @type {factory}
 */
angular.module('roleLabelsApp').factory('roleLabelsFact',
    ['$resource', '$cachedResource',
     function ($resource, $cachedResource)
     {
         return $resource(
             globalConfig.api.urls.get_roleLabel_verions,
             {},
             {
                 get   : {method: 'GET', url: globalConfig.api.urls.get_roleLabel_verions + '/:id', params: {'id': '@id', cache: true}, isArray: false},
                 create: {method: 'POST', params: {}, isArray: false},
                 update: {method: 'PUT', url: globalConfig.api.urls.get_roleLabel_verions + '/:id', params: {id: '@id'}, isArray: false},
                 delete: {method: 'DELETE', url: globalConfig.api.urls.get_roleLabel_verions + '/:id', params: {id: '@id'}, isArray: false},
                 all   : {method: 'GET', url: globalConfig.api.urls.get_roleLabel_verions, params: {}, isArray: true}
             }
         );
     }]);

/**
 * Roles Factory
 *
 * Service calls for CRUD actions
 *
 * @type {factory}
 */
angular.module('rolesApp').factory('rolesFact',
    ['$resource', '$cachedResource',
     function ($resource, $cachedResource)
     {
         return $resource(
             globalConfig.api.urls.get_roles,
             {},
             {
                 get   : {method: 'GET', url: globalConfig.api.urls.get_roles + '/:id', params: {'id': '@id', cache: true}, isArray: false},
                 create: {method: 'POST', params: {}, isArray: false},
                 update: {method: 'PUT', url: globalConfig.api.urls.get_roles + '/:id', params: {id: '@id'}, isArray: false},
                 delete: {method: 'DELETE', url: globalConfig.api.urls.get_roles + '/:id', params: {id: '@id'}, isArray: false},
                 all   : {method: 'GET', params: {}, isArray: true}
             }
         );
     }]);
