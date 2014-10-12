/**
 * Events Factory
 *
 * Service calls for CRUD actions
 *
 * @type {factory}
 */
angular.module('eventsApp').factory('eventsFact',
    ['$resource', '$cachedResource', '$rootScope', function ($resource, $cachedResource, $rootScope)
    {
        return $resource(
            globalConfig.api.urls.get_events,
            {},
            {
                get            : {method: 'GET', url: globalConfig.api.urls.get_events + '/:id', params: {'id': '@id', cache: true}, isArray: false},
                create         : {method: 'POST', params: {}, isArray: false},
                update         : {method: 'PUT', url: globalConfig.api.urls.get_events + '/:id', params: {id: '@id'}, isArray: false},
                delete         : {method: 'DELETE', url: globalConfig.api.urls.get_events + '/:id', params: {id: '@id'}, isArray: false},
                all            : {method: 'GET', params: {}, isArray: true},
                allByConference: {method: 'GET', url: globalConfig.api.urls.get_conferences + '/:confId/events', params: {'confId': '@confId'}, isArray: true}
            }
        );
    }]);
