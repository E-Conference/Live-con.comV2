angular.module('conferencesApp').factory('ConferencesFact', ['$resource', '$cachedResource',
    function($cachedResource){
        return $cachedResource(
            globalConfig.api.urls.get_conferences,
            {},
            {
                get: {method:'GET', url: globalConfig.api.urls.get_conferences+'/:id', params:{'id': '@id', cache: true}, isArray:false},
                create: {method:'POST', params:{}, isArray:false},
                update: {method:'PUT', url: globalConfig.api.urls.get_conferences+'/:id', params:{'id': '@id'}, isArray:false},
                delete: {method:'DELETE', url: globalConfig.api.urls.get_conferences+'/:id', params:{'id': '@id'}, isArray:false},
                all: {method:'GET', params:{}, isArray:true}
            }
        );
    }]);
