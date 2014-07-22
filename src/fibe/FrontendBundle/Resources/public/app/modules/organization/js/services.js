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