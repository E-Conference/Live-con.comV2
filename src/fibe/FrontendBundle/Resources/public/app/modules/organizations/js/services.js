angular.module('organizationsApp').factory('OrganizationsFact', ['$resource', '$cachedResource',
    function($cachedResource){
        return $cachedResource(
            globalConfig.api.urls.get_companies,
            {},
            {
                get: {method:'GET', url: globalConfig.api.urls.get_companies+'/:id', params:{'id': '@id', cache: true}, isArray:false},
                create: {method:'POST', params:{}, isArray:false},
                update: {method:'PUT', url: globalConfig.api.urls.get_companies+'/:id', params:{'id': '@id'}, isArray:false},
                delete: {method:'DELETE', url: globalConfig.api.urls.get_companies+'/:id', params:{'id': '@id'}, isArray:false},
                all: {method:'GET', params:{}, isArray:true}
            }
        );
    }]);
