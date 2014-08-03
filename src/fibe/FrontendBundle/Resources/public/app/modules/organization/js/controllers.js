angular.module('organizationApp').controller('organizationMainCtrl', [function ($scope) {

}]);

angular.module('organizationApp').controller('organizationListCtrl', ['$scope', 'Organization', '$cachedResource', function ($scope, Organization, $cachedResource) {
    $scope.organizations = Organization.list();

    $scope.reload = function(){
       // $scope.organizations = Organization.list();
        $scope.organizations.$promise.then(function() {
            console.log('From cache:', $scope.organizations);
        });
        //console.log($scope.organizations);
    }
    /*
    var Org = $cachedResource('org', globalConfig.api.urls.organizations+'/:organizationId.json', {id: "@id"});
    $scope.organizations = Org.query();
    $scope.organizations.$promise.then(function(data) {
        console.log($scope.organizations);
       console.log($scope.organizations.length);
    });*/
    //$scope.organizations = $cachedResource();
}]);


angular.module('organizationApp').controller('organizationNewCtrl', [ '$scope', 'Organization', function ($scope, Organization) {
    $scope.organization = new Organization;

    $scope.create = function(form){
        if ( form.$valid ) {
            $scope.organization.$create();
        }
    }

}]);