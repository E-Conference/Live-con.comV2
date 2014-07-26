
angular.module('authentificationApp').controller('loginCtrl', ['$scope', '$rootScope', '$routeParams', 'GLOBAL_CONFIG', 'userFactory',
function ($scope, $rootScope, $routeParams, GLOBAL_CONFIG, userFactory) {
    $scope.GLOBAL_CONFIG = GLOBAL_CONFIG;
    $scope.user = {login: '', password:''};
    $scope.loginAction = function(user){
        userFactory.login({},{"username" : $scope.user.login, "password": $scope.user.password}, function(error, args) {$scope.success(error, args)},  function(success, args) {$scope.error(success, args)});
    }
    $scope.error = function(error, args){
        $rootScope.$broadcast('AlertCtrl:addAlert', {code:'Login_error', type:'error'});
    }
    $scope.success = function(success){
        $scope.$broadcast('AlertCtrl:addAlert', {code:'Login_success', type:'success'});
    }
}]);



angular.module('authentificationApp').controller('registerCtrl', ['$scope', '$routeParams', 'GLOBAL_CONFIG',
function ($scope, $routeParams, GLOBAL_CONFIG) {
    $scope.GLOBAL_CONFIG = GLOBAL_CONFIG;

}]);