
angular.module('authenticationApp').controller('signinCtrl', ['$scope', '$rootScope', '$routeParams', 'GLOBAL_CONFIG', 'userFactory', '$cookieStore', '$location',
function ($scope, $rootScope, $routeParams, GLOBAL_CONFIG, userFactory, $cookieStore, $location) {
    $scope.GLOBAL_CONFIG = GLOBAL_CONFIG;
    $scope.loginAction = function(user){
        userFactory.login({},{"username" : $scope.user.username, "password": $scope.user.password}, function(response, args) {$scope.success(response, args)},  function(response, args) {$scope.error(response, args)});
    }
    $scope.error = function(response, args){
        $rootScope.$broadcast('AlertCtrl:addAlert', {code:'Login_error', type:'error'});
    }
    $scope.success = function(response, args){
        $scope.user = response;
        $rootScope.currentUser = response;
        $cookieStore.put('currentUser',JSON.stringify(response));
        $rootScope.$broadcast('AlertCtrl:addAlert', {code:'Login_success', type:'success'});
        $location.path('/');
    }

}]);



angular.module('authenticationApp').controller('signupCtrl', ['$scope', '$routeParams', 'GLOBAL_CONFIG',
function ($scope, $routeParams, GLOBAL_CONFIG) {
    $scope.GLOBAL_CONFIG = GLOBAL_CONFIG;

    $scope.signupAction = function(){

    }
}]);


angular.module('authenticationApp').controller('signoutCtrl', ['$scope', '$rootScope', '$window', '$routeParams', 'GLOBAL_CONFIG', '$cookieStore', '$location',
function ($scope, $rootScope, $window, $routeParams, GLOBAL_CONFIG, $cookieStore, $location) {
    $scope.GLOBAL_CONFIG = GLOBAL_CONFIG;

    $scope.$on('globalHttpInterceptor:401', $rootScope.logout);

    $rootScope.signout = function(){
        $cookieStore.remove('currentUser');
        $rootScope.currentUser = {};
        $window.history.back();
        $rootScope.$broadcast('AlertCtrl:addAlert', {code:'signout_success', type:'success'});
    }
}]);


angular.module('authenticationApp').controller('globalAuthCtrl', ['$scope', '$rootScope', '$routeParams', 'GLOBAL_CONFIG',
function ($scope, $rootScope, $routeParams, GLOBAL_CONFIG) {
    $scope.GLOBAL_CONFIG = GLOBAL_CONFIG;


}]);