angular.module('organizationApp').factory('Organization', ['$resource', '$cachedResource',
    function($cachedResource){
        return $cachedResource(
            globalConfig.api.urls.organizations+'/:organizationId.json',
            {'id': '@id'},
            {
                query: {method:'GET',  params:{cache: true}, isArray:false},
                create: {method:'POST', url: globalConfig.api.urls.post_organization+'.json', params:{}, isArray:false}, //{'id': '@id'}
                show: {method:'GET', url: globalConfig.api.urls.get_organization+'.json', isArray:false},
                list: {method:'GET', url: globalConfig.api.urls.get_organizations+'.json', params:{}, isArray:true}
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