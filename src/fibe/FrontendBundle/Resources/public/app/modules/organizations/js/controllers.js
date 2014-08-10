angular.module('organizationsApp').controller('organizationsMainCtrl', [function ($scope) {

}]);

angular.module('organizationsApp').controller('organizationsListCtrl', ['$scope', 'GLOBAL_CONFIG', 'createDialog', '$rootScope', 'OrganizationsFact', '$cachedResource', function ($scope, GLOBAL_CONFIG, createDialogService, $rootScope, OrganizationsFact, $cachedResource) {
    $scope.GLOBAL_CONFIG = GLOBAL_CONFIG;

    var offset = -20;
    var limit = 20;
    $scope.busy = false;

    $scope.organizations = [];

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

        createDialogService(GLOBAL_CONFIG.app.modules.organizations.urls.partials+'organizations-delete.html', {
            id: 'complexDialog',
            title: 'Organization deletion',
            backdrop: true,
            controller: 'organizationsDeleteCtrl',
            success: {label: 'Ok', fn: function() {
                OrganizationsFact.delete({id:organization.id});
                $scope.organizations.splice(index,1);
            }}
            }, {
            organizationModel: organization
        });
    }


    $scope.load = function(query) {
        offset = offset + limit;

        if (query) {
            offset = 0;
            limit = 20;
            $scope.busy = false;
        }

        if (this.busy) return;

        $scope.busy = true;
        OrganizationsFact.all({offset : offset, limit:limit, query: query}, function(data) {
            var items = data;

            if (query) {
                $scope.organizations = data;
            }else {
                for (var i = 0; i < items.length; i++) {
                    $scope.organizations.push(items[i]);
                }
            }

            if (items.length > 1){
                $scope.busy = false;
            }
        })
    };

//    $scope.search = function(query) {
//        Organization.all({offset: 0, limit: 20, query: query}, function (data) {
//            $scope.organizations = data;
//        })
//    };

    /*
    var Org = $cachedResource('org', globalConfig.api.urls.organizations+'/:organizationId.json', {id: "@id"});
    $scope.organizations = Org.query();
    $scope.organizations.$promise.then(function(data) {
        console.log($scope.organizations);
       console.log($scope.organizations.length);
    });*/
    //$scope.organizations = $cachedResource();
}]);


angular.module('organizationsApp').controller('organizationsNewCtrl', [ '$scope', '$rootScope', '$location', 'OrganizationsFact', function ($scope, $rootScope, $location, OrganizationsFact) {
    $scope.organization = new OrganizationsFact;

    var error = function(response, args){
        $rootScope.$broadcast('AlertCtrl:addAlert', {code:'the organization has not been created', type:'danger'});
    }

    var success = function(response, args){
        $rootScope.$broadcast('AlertCtrl:addAlert', {code:'organization created', type:'success'});
        $location.path('/organizations/list');
    }

    $scope.create = function(form){
        if ( form.$valid ) {
            $scope.organization.$create({}, success, error);
        }
    }
}]);

angular.module('organizationsApp').controller('organizationsEditCtrl', [ '$scope', '$rootScope', '$routeParams', '$location', 'OrganizationsFact', function ($scope, $rootScope, $routeParams, $location, OrganizationsFact) {
    $scope.organization = OrganizationsFact.get({id:$routeParams.organizationId});

    var error = function(response, args){
        $rootScope.$broadcast('AlertCtrl:addAlert', {code:'the organization has not been saved', type:'danger'});
    }

    var success = function(response, args){
        $rootScope.$broadcast('AlertCtrl:addAlert', {code:'organization saved', type:'success'});
        $location.path('/organizations/list');
    }

    $scope.update = function(form){
        if ( form.$valid ) {
            $scope.organization.$update({},success, error);
        }
    }
}]);

angular.module('organizationsApp').controller('organizationsShowCtrl', [ '$scope', '$routeParams', 'OrganizationsFact', function ($scope, $routeParams, OrganizationsFact) {
    $scope.organization = OrganizationsFact.get({id:$routeParams.organizationId});

}]);

angular.module('organizationsApp').controller('organizationsDeleteCtrl', [ '$scope', 'organizationModel', function ($scope, organizationModel) {
       $scope.organization = organizationModel;
}]);

