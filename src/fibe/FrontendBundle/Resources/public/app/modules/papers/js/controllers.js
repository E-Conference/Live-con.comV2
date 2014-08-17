angular.module('papersApp').controller('papersMainCtrl', [function ($scope) {

}]);

angular.module('papersApp').controller('papersListCtrl', ['$scope', 'GLOBAL_CONFIG', 'createDialog', '$rootScope', 'papersFact', '$cachedResource', function ($scope, GLOBAL_CONFIG, createDialogService, $rootScope, papersFact, $cachedResource) {
    $scope.GLOBAL_CONFIG = GLOBAL_CONFIG;

    var offset = -20;
    var limit = 20;
    $scope.busy = false;

    $scope.papers = [];

    $scope.reload = function(){
       // $scope.papers = paper.list();
        $scope.papers.$promise.then(function() {
            console.log('From cache:', $scope.papers);
        });
        //console.log($scope.papers);
    }

    $scope.clone = function(paper){
        // $scope.papers = paper.list();

        clonePaper = angular.copy(paper);
        clonepaper.id = null;

        var error = function(response, args){
            $rootScope.$broadcast('AlertCtrl:addAlert', {code:'Clone not completed', type:'danger'});
        }

        var success = function(response, args){
            $rootScope.$broadcast('AlertCtrl:addAlert', {code:'paper saved', type:'success'});
            $scope.papers.push(response);
        }

        clonepaper.$create({}, success, error);
    }


    $scope.deleteModal = function(index, paper) {
        $scope.index = index;

        createDialogService(GLOBAL_CONFIG.app.modules.papers.urls.partials+'papers-delete.html', {
            id: 'complexDialog',
            title: 'paper deletion',
            backdrop: true,
            controller: 'papersDeleteCtrl',
            success: {label: 'Ok', fn: function() {
                papersFact.delete({id:paper.id});
                $scope.papers.splice(index,1);
            }}
            }, {
            paperModel: paper
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
        papersFact.all({offset : offset, limit:limit, query: query}, function(data) {
            var items = data;

            if (query) {
                $scope.papers = data;
            }else {
                for (var i = 0; i < items.length; i++) {
                    $scope.papers.push(items[i]);
                }
            }

            if (items.length > 1){
                $scope.busy = false;
            }
        })
    };

//    $scope.search = function(query) {
//        paper.all({offset: 0, limit: 20, query: query}, function (data) {
//            $scope.papers = data;
//        })
//    };

    /*
    var Org = $cachedResource('org', globalConfig.api.urls.papers+'/:paperId.json', {id: "@id"});
    $scope.papers = Org.query();
    $scope.papers.$promise.then(function(data) {
        console.log($scope.papers);
       console.log($scope.papers.length);
    });*/
    //$scope.papers = $cachedResource();
}]);


angular.module('papersApp').controller('papersNewCtrl', [ '$scope', '$rootScope', '$location', 'papersFact', function ($scope, $rootScope, $location, papersFact) {
    $scope.paper = new papersFact;

    var error = function(response, args){
        $rootScope.$broadcast('AlertCtrl:addAlert', {code:'the paper has not been created', type:'danger'});
    }

    var success = function(response, args){
        $rootScope.$broadcast('AlertCtrl:addAlert', {code:'paper created', type:'success'});
        $location.path('/papers/list');
    }

    $scope.create = function(form){
        if ( form.$valid ) {
            $scope.paper.$create({}, success, error);
        }
    }
}]);

angular.module('papersApp').controller('papersEditCtrl', [ '$scope', '$rootScope', '$routeParams', '$location', 'papersFact', function ($scope, $rootScope, $routeParams, $location, papersFact) {
    $scope.paper = papersFact.get({id:$routeParams.paperId});

    var error = function(response, args){
        $rootScope.$broadcast('AlertCtrl:addAlert', {code:'the paper has not been saved', type:'danger'});
    }

    var success = function(response, args){
        $rootScope.$broadcast('AlertCtrl:addAlert', {code:'paper saved', type:'success'});
        $location.path('/papers/list');
    }

    $scope.update = function(form){
        if ( form.$valid ) {
            $scope.paper.$update({},success, error);
        }
    }
}]);

angular.module('papersApp').controller('papersShowCtrl', [ '$scope', '$routeParams', 'papersFact', function ($scope, $routeParams, papersFact) {
    $scope.paper = papersFact.get({id:$routeParams.paperId});

}]);

angular.module('papersApp').controller('papersDeleteCtrl', [ '$scope', 'paperModel', function ($scope, paperModel) {
       $scope.paper = paperModel;
}]);

