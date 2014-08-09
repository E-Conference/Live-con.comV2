angular.module('organizationApp').factory('Organization', ['$resource', '$cachedResource',
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

/*
angular.module('organizationApp').factory('Organization', ['$resource',
    function($resource){
        return $resource(
            globalConfig.api.urls.organizations+'/:organizationId.json',
            {'id': '@id'},
            {
                query: {method:'GET',  isArray:false},
                create: {method:'POST', url: globalConfig.api.urls.organizations+'.json', params:{}, isArray:false}, //{'id': '@id'}
                show: {method:'GET', isArray:false},
                list: {method:'GET', url: globalConfig.api.urls.organizations+'.json', params:{}, isArray:true}
            }
        );
    }]);
*/