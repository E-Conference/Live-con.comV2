angular.module('organizationApp').controller('organizationMainCtrl', [function ($scope) {

}]);

angular.module('organizationApp').controller('organizationListCtrl', ['$scope', 'Organization', function ($scope, Organization) {
    $scope.organizations = Organization.list();
}]);