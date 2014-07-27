angular.module('authenticationApp').config(['$provide', '$httpProvider',
    function ($provide, $httpProvider) {
        $httpProvider.interceptors.push('globalHttpInterceptor');
}]);
