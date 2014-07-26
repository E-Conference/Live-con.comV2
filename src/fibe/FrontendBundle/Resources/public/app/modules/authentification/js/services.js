angular.module('authentificationApp').factory('userFactory', ['$resource',
    function($resource){
        return $resource(
            globalConfig.api.urls.login,
            {'id': '@id'},
            {
                get: {method:'GET',  params: {}, isArray:false},
                login: {method:'POST', url: globalConfig.api.urls.login, isArray:false},
                show: {method:'GET', isArray:false},
                list: {method:'GET', url: globalConfig.api.urls.organizations+'.json', params:{}, isArray:true}
            }
        );
    }]);