angular.module('organizationApp').controller('organizationMainCtrl', [function ($scope) {

}]);

angular.module('organizationApp').controller('organizationListCtrl', ['$scope', 'GLOBAL_CONFIG', 'createDialog', '$rootScope', 'Organization', '$cachedResource', function ($scope, GLOBAL_CONFIG, createDialogService, $rootScope, Organization, $cachedResource) {
    $scope.GLOBAL_CONFIG = GLOBAL_CONFIG;

    var offset = 0;
    var limit = 20;
    $scope.busy = false;

    $scope.organizations = Organization.all({offset : offset, limit:limit});

    $scope.reload = function(){
       // $scope.organizations = Organization.list();
        $scope.organizations.$promise.then(function() {
            console.log('From cache:', $scope.organizations);
        });
        //console.log($scope.organizations);
    }

    $scope.clone = function(organization){
        // $scope.organizations = Organization.list();

        cloneOrganization = angular.copy(organization);
        cloneOrganization.id = null;
        cloneOrganization.additional_information.id = null;

        var error = function(response, args){
            $rootScope.$broadcast('AlertCtrl:addAlert', {code:'Clone not completed', type:'danger'});
        }

        var success = function(response, args){
            $rootScope.$broadcast('AlertCtrl:addAlert', {code:'Organization saved', type:'success'});
            $scope.organizations.push(response);
        }

        cloneOrganization.$create({}, success, error);
    }


    $scope.deleteModal = function(index, organization) {
        $scope.index = index;

        createDialogService(GLOBAL_CONFIG.app.modules.organization.urls.partials+'organization-delete.html', {
            id: 'complexDialog',
            title: 'Person deletion',
            backdrop: true,
            controller: 'organizationDeleteCtrl',
            success: {label: 'Ok', fn: function() {
                Organization.delete({id:organization.id});
                $scope.organizations.splice(index,1);
            }}
            }, {
            organizationModel: organization
        });
    }

    $scope.scroll = function() {
        offset = offset + limit;

        if (this.busy) return;

        $scope.busy = true;
        Organization.all({offset : offset, limit:limit}, function(data) {
            var items = data;
            for (var i = 0; i < items.length; i++) {
                $scope.organizations.push(items[i]);
            }

            if (items.length > 1){
                $scope.busy = false;
            }
        })
    };

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

angular.module('organizationApp').controller('organizationDeleteCtrl', [ '$scope', 'organizationModel', function ($scope, organizationModel) {
       $scope.organization = organizationModel;
}]);

