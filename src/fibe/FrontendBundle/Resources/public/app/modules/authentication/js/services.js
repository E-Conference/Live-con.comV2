angular.module('authenticationApp').factory('userFactory', ['$resource',
    function($resource){
        return $resource(
            globalConfig.api.urls.login,
            {'id': '@id'},
            {
                get: {method:'GET',  params: {}, isArray:false},
                signin: {method:'POST', url: globalConfig.api.urls.login, isArray:false},
                signup: {method:'POST', url: globalConfig.api.urls.login, isArray:false},
                show: {method:'GET', isArray:false},
                list: {method:'GET', url: globalConfig.api.urls.organizations+'.json', params:{}, isArray:true}
            }
        );
    }]);


angular.module('authenticationApp').factory('globalHttpInterceptor', ['$q',
    function($q) {
        return {
            'request' : function(config){
                return config;
            },
            'response': function(response) {
                return response || $q.when(response);
            },

            'responseError': function(rejection) {
                if (rejection.status == "401") {
                    $rootScope.$broadcast('globalHttpInterceptor:401', {});
                }
                return $q.reject(rejection);
            }
        };
}]);



