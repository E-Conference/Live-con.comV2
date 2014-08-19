
angular.module('contextualizationApp').controller('contextCtrl', ['$scope', '$rootScope', '$routeParams', 'GLOBAL_CONFIG', 'userFactory', '$location',
function ($scope, $rootScope, $routeParams, GLOBAL_CONFIG, userFactory, $location) {

    $scope.GLOBAL_CONFIG = GLOBAL_CONFIG;

    var changeContext = function(conferenceId){
        $rootScope.$broadcast('AlertCtrl:addAlert', {code:'you changed of conference', type:'success'});
    }

    $scope.$on('contextCtrl:changeContext', changeContext);

}]);
