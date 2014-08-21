angular.module('rolesApp').controller('rolesMainCtrl', [function ($scope) {

}]);

angular.module('rolesApp').controller('rolesListCtrl', ['$scope', 'GLOBAL_CONFIG', 'createDialog', '$rootScope', 'roleLabelsFact', '$cachedResource', function ($scope, GLOBAL_CONFIG, createDialogService, $rootScope, roleLabelsFact, $cachedResource) {
    $scope.GLOBAL_CONFIG = GLOBAL_CONFIG;

    var offset = -20;
    var limit = 20;
    $scope.busy = false;

    $scope.roleLabels = [];

    $scope.reload = function(){
       // $scope.roleLabels = roleLabel.list();
        $scope.roleLabels.$promise.then(function() {
            console.log('From cache:', $scope.roleLabels);
        });
        //console.log($scope.roleLabels);
    }

    $scope.clone = function(roleLabel){
        // $scope.roleLabels = roleLabel.list();

        cloneroleLabel = angular.copy(roleLabel);
        cloneroleLabel.id = null;

        var error = function(response, args){
            $rootScope.$broadcast('AlertCtrl:addAlert', {code:'Clone not completed', type:'danger'});
        }

        var success = function(response, args){
            $rootScope.$broadcast('AlertCtrl:addAlert', {code:'roleLabel saved', type:'success'});
            $scope.roleLabels.push(response);
        }

        cloneroleLabel.$create({}, success, error);
    }


    $scope.deleteModal = function(index, roleLabel) {
        $scope.index = index;

        createDialogService(GLOBAL_CONFIG.app.modules.roleLabels.urls.partials+'roleLabels-delete.html', {
            id: 'complexDialog',
            title: 'roleLabel deletion',
            backdrop: true,
            controller: 'roleLabelsDeleteCtrl',
            success: {label: 'Ok', fn: function() {
                roleLabelsFact.delete({id:roleLabel.id});
                $scope.roleLabels.splice(index,1);
            }}
            }, {
            roleLabelModel: roleLabel
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
        roleLabelsFact.all({offset : offset, limit:limit, query: query}, function(data) {
            var items = data;

            if (query) {
                $scope.roleLabels = data;
            }else {
                for (var i = 0; i < items.length; i++) {
                    $scope.roleLabels.push(items[i]);
                }
            }

            if (items.length > 1){
                $scope.busy = false;
            }
        })
    };

//    $scope.search = function(query) {
//        roleLabel.all({offset: 0, limit: 20, query: query}, function (data) {
//            $scope.roleLabels = data;
//        })
//    };

    /*
    var Org = $cachedResource('org', globalConfig.api.urls.roleLabels+'/:roleLabelId.json', {id: "@id"});
    $scope.roleLabels = Org.query();
    $scope.roleLabels.$promise.then(function(data) {
        console.log($scope.roleLabels);
       console.log($scope.roleLabels.length);
    });*/
    //$scope.roleLabels = $cachedResource();
}]);


angular.module('roleLabelsApp').controller('roleLabelsNewCtrl', [ '$scope', '$rootScope', '$location', 'roleLabelsFact', function ($scope, $rootScope, $location, roleLabelsFact) {
    $scope.roleLabel = new roleLabelsFact;

    var error = function(response, args){
        $rootScope.$broadcast('AlertCtrl:addAlert', {code:'the roleLabel has not been created', type:'danger'});
    }

    var success = function(response, args){
        $rootScope.$broadcast('AlertCtrl:addAlert', {code:'roleLabel created', type:'success'});
        $location.path('/roleLabels/list');
    }

    $scope.create = function(form){
        if ( form.$valid ) {
            $scope.roleLabel.$create({}, success, error);
        }
    }
}]);

angular.module('roleLabelsApp').controller('roleLabelsEditCtrl', [ '$scope', '$rootScope', '$routeParams', '$location', 'roleLabelsFact', function ($scope, $rootScope, $routeParams, $location, roleLabelsFact) {
    $scope.roleLabel = roleLabelsFact.get({id:$routeParams.roleLabelId});

    var error = function(response, args){
        $rootScope.$broadcast('AlertCtrl:addAlert', {code:'the roleLabel has not been saved', type:'danger'});
    }

    var success = function(response, args){
        $rootScope.$broadcast('AlertCtrl:addAlert', {code:'roleLabel saved', type:'success'});
        $location.path('/roleLabels/list');
    }

    $scope.update = function(form){
        if ( form.$valid ) {
            $scope.roleLabel.$update({},success, error);
        }
    }
}]);

angular.module('roleLabelsApp').controller('roleLabelsShowCtrl', [ '$scope', '$routeParams', 'roleLabelsFact', function ($scope, $routeParams, roleLabelsFact) {
    $scope.roleLabel = roleLabelsFact.get({id:$routeParams.roleLabelId});

}]);

angular.module('roleLabelsApp').controller('roleLabelsDeleteCtrl', [ '$scope', 'roleLabelModel', function ($scope, roleLabelModel) {
       $scope.roleLabel = roleLabelModel;
}]);
