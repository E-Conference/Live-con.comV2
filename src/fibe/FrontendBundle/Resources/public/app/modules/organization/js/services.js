angular.module('organizationApp').factory('Organization', ['$resource', '$cachedResource',
    function($cachedResource){
        return $cachedResource(
            globalConfig.api.urls.get_companies,
            {'id': '@id'},
            {
                get: {method:'GET', url: globalConfig.api.urls.get_companies+'/:id', params:{cache: true}, isArray:false},
                create: {method:'POST', params:{}, isArray:false},
                update: {method:'PATCH', url: globalConfig.api.urls.get_companies+'/:id', isArray:false},
                delete: {method:'DELETE', url: globalConfig.api.urls.get_companies+'/:id', isArray:false},
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