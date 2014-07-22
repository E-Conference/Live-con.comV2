
angular.module('authentificationApp').controller('loginCtrl', ['$scope', '$routeParams', 'GLOBAL_CONFIG', 'userFactory',
function ($scope, $routeParams, GLOBAL_CONFIG, userFactory) {
    $scope.GLOBAL_CONFIG = GLOBAL_CONFIG;
    $scope.user = {'login' : '', 'password' : ''};
    $scope.loginAction = function(user){
    	debugger;
    	userFactory.login({}, {username: user.login, password: user.password},function (user) {
    		debugger;
            $scope.user = user;
           
        });
    }
}]);



angular.module('authentificationApp').controller('registerCtrl', ['$scope', '$routeParams', 'GLOBAL_CONFIG',
function ($scope, $routeParams, GLOBAL_CONFIG) {
    $scope.GLOBAL_CONFIG = GLOBAL_CONFIG;

}]);