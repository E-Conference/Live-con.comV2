angular.module('organizationApp').controller('organizationMainCtrl', [function ($scope) {

}]);

angular.module('organizationApp').controller('organizationListCtrl', ['$scope', 'Organization', '$cachedResource', function ($scope, Organization, $cachedResource) {
    $scope.organizations = Organization.all();

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


angular.module('organizationApp').controller('organizationNewCtrl', [ '$scope', '$rootScope', '$location', 'Organization', function ($scope, $rootScope, $location, Organization) {
    $scope.organization = new Organization;

    var error = function(response, args){
        $rootScope.$broadcast('AlertCtrl:addAlert', {code:'the organization has not been created', type:'danger'});
    }

    var success = function(response, args){
        $rootScope.$broadcast('AlertCtrl:addAlert', {code:'organization created', type:'success'});
        $location.path('/organization/list');
    }

    $scope.create = function(form){
        if ( form.$valid ) {
            $scope.organization.$create({}, success, error);
        }
    }
}]);

angular.module('organizationApp').controller('organizationEditCtrl', [ '$scope', '$rootScope', '$routeParams', '$location', 'Organization', function ($scope, $rootScope, $routeParams, $location, Organization) {
    $scope.organization = Organization.get({id:$routeParams.organizationId});

    var error = function(response, args){
        $rootScope.$broadcast('AlertCtrl:addAlert', {code:'the organization has not been saved', type:'danger'});
    }

    var success = function(response, args){
        $rootScope.$broadcast('AlertCtrl:addAlert', {code:'organization saved', type:'success'});
        $location.path('/organization/list');
    }

    $scope.update = function(form){
        if ( form.$valid ) {
            $scope.organization.$update({},success, error);
        }
    }
}]);

angular.module('organizationApp').controller('organizationShowCtrl', [ '$scope', '$routeParams', 'Organization', function ($scope, $routeParams, Organization) {
    $scope.organization = Organization.get({id:$routeParams.organizationId});

}]);

angular.module('organizationApp').controller('organizationDeleteCtrl', [ '$scope', '$rootScope', '$location', '$routeParams', 'Organization', function ($scope, $rootScope, $location, $routeParams, Organization) {
    var error = function(response, args){
        $rootScope.$broadcast('AlertCtrl:addAlert', {code:'the organization has not been deleted', type:'danger'});
    }

    var success = function(response, args){
        $rootScope.$broadcast('AlertCtrl:addAlert', {code:'organization deleted', type:'success'});
        $location.path('/organization/list');
    }

    $scope.organization = Organization.delete({id:$routeParams.organizationId}, success, error);

}]);

