
angular.module('authenticationApp').controller('signinCtrl', ['$scope', '$rootScope', '$routeParams', 'GLOBAL_CONFIG', 'userFactory', '$location',
function ($scope, $rootScope, $routeParams, GLOBAL_CONFIG, userFactory, $location) {

    $scope.GLOBAL_CONFIG = GLOBAL_CONFIG;
    $rootScope.currentUser = JSON.parse(localStorage.getItem('currentUser'));
    var error = function(response, args){
        $rootScope.$broadcast('AlertCtrl:addAlert', {code:'Login_error', type:'danger'});
    }
    var success = function(response, args){
        $scope.user = response;
        $rootScope.currentUser = response;
        localStorage.setItem('currentUser', JSON.stringify(response));
        $rootScope.$broadcast('AlertCtrl:addAlert', {code:'Login_success', type:'success'});
        $location.path('/');
    }
    $scope.signinAction = function(user){
        userFactory.signin({},{"_username" : $scope.user.username, "_password": $scope.user.password},success, error);
    }
}]);



angular.module('authenticationApp').controller('signupCtrl', ['$scope', '$rootScope', '$location', '$routeParams', 'GLOBAL_CONFIG', 'userFactory',
function ($scope, $rootScope, $location, $routeParams, GLOBAL_CONFIG, userFactory) {
    $scope.GLOBAL_CONFIG = GLOBAL_CONFIG;

    var error = function(response, args){
        $rootScope.$broadcast('AlertCtrl:addAlert', {code:'Register_error', type:'danger'});
    }
    var success = function(response, args){
        $scope.user = response;
        $rootScope.currentUser = response;
        $rootScope.$broadcast('AlertCtrl:addAlert', {code:'Register_success', type:'success'});
        $location.path('/');
    }
    $scope.signupAction = function(){
        userFactory.signup({},{"_username" : $scope.user.username, "_password": $scope.user.password},success, error);
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