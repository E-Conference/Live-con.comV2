angular.module('conferencesApp').controller('conferencesMainCtrl', [function ($scope) {

}]);

angular.module('conferencesApp').controller('conferencesListCtrl', ['$scope', 'GLOBAL_CONFIG', 'createDialog', '$rootScope', 'ConferencesFact', '$cachedResource', function ($scope, GLOBAL_CONFIG, createDialogService, $rootScope, ConferencesFact, $cachedResource) {
    $scope.GLOBAL_CONFIG = GLOBAL_CONFIG;

    var offset = -20;
    var limit = 20;
    $scope.busy = false;

    $scope.query = "";
    $scope.orderBy = "label";
    $scope.orderSide = "ASC";

    $scope.conferences = [];

    $scope.reload = function(){
       // $scope.conferences = Conference.list();
        $scope.conferences.$promise.then(function() {
            console.log('From cache:', $scope.conferences);
        });
        //console.log($scope.conferences);
    }

    $scope.clone = function(conference, index){
        // $scope.conferences = Conference.list();

        cloneConference = angular.copy(conference);
        cloneConference.id = null;

        var error = function(response, args){
            $rootScope.$broadcast('AlertCtrl:addAlert', {code:'Clone not completed', type:'danger'});
        }

        var success = function(response, args){
            $rootScope.$broadcast('AlertCtrl:addAlert', {code:'Conference saved', type:'success'});
           // $scope.conferences.push(response);
            $scope.conferences.splice(index+1, 0, response);
        }

        cloneConference.$create({}, success, error);
    }


    $scope.deleteModal = function(index, conference) {
        $scope.index = index;

        createDialogService(GLOBAL_CONFIG.app.modules.conferences.urls.partials+'conferences-delete.html', {
            id: 'complexDialog',
            title: 'Conference deletion',
            backdrop: true,
            controller: 'conferencesDeleteCtrl',
            success: {label: 'Ok', fn: function() {
                ConferencesFact.delete({id:conference.id});
                $scope.conferences.splice(index,1);
            }}
            }, {
            conferenceModel: conference
        });
    }

    var initialize = function(){
        offset = -20;
        limit = 20;
        $scope.busy = false;
        $scope.conferences = [];
    }

    $scope.search = function(){
        initialize();
        $scope.load($scope.query);
    }

    $scope.order = function(orderBy, orderSide){
        initialize();
        $scope.orderBy = orderBy;
        $scope.orderSide = orderSide;
        $scope.load();
    }

    $scope.load = function() {
        offset = offset + limit;

        filters = {offset : offset, limit:limit};
        if (this.busy) return;
        if($scope.query) filters.query = $scope.query;
        if($scope.orderBy) filters["order["+$scope.orderBy+"]"] = $scope.orderSide;

        $scope.busy = true;
        ConferencesFact.all(filters, function(data) {
            var items = data;

            for (var i = 0; i < items.length; i++) {
                $scope.conferences.push(items[i]);
            }

            if (items.length > 1){
                $scope.busy = false;
            }
        })
    };

//    $scope.search = function(query) {
//        Conference.all({offset: 0, limit: 20, query: query}, function (data) {
//            $scope.conferences = data;
//        })
//    };

    /*
    var Org = $cachedResource('org', globalConfig.api.urls.conferences+'/:conferenceId.json', {id: "@id"});
    $scope.conferences = Org.query();
    $scope.conferences.$promise.then(function(data) {
        console.log($scope.conferences);
       console.log($scope.conferences.length);
    });*/
    //$scope.conferences = $cachedResource();
}]);


angular.module('conferencesApp').controller('conferencesNewCtrl', [ '$scope', '$rootScope', '$location', 'ConferencesFact', function ($scope, $rootScope, $location, ConferencesFact) {
    $scope.conference = new ConferencesFact;

    var error = function(response, args){
        $rootScope.$broadcast('AlertCtrl:addAlert', {code:'the conference has not been created', type:'danger'});
    }

    var success = function(response, args){
        $rootScope.$broadcast('AlertCtrl:addAlert', {code:'conference created', type:'success'});
        $location.path('/conferences/list');
    }

    $scope.create = function(form){
        if ( form.$valid ) {
            $scope.conference.$create({}, success, error);
        }
    }
}]);

angular.module('conferencesApp').controller('conferencesEditCtrl', [ '$scope', '$rootScope', '$routeParams', '$location', 'ConferencesFact', function ($scope, $rootScope, $routeParams, $location, ConferencesFact) {
    $scope.conference = ConferencesFact.get({id:$routeParams.conferenceId});

    var error = function(response, args){
        $rootScope.$broadcast('AlertCtrl:addAlert', {code:'the conference has not been saved', type:'danger'});
    }

    var success = function(response, args){
        $rootScope.$broadcast('AlertCtrl:addAlert', {code:'conference saved', type:'success'});
        $location.path('/conferences/list');
    }

    $scope.update = function(form){
        if ( form.$valid ) {
            $scope.conference.$update({},success, error);
        }
    }
}]);

angular.module('conferencesApp').controller('conferencesShowCtrl', [ '$scope', '$routeParams', 'ConferencesFact', function ($scope, $routeParams, ConferencesFact) {
    $scope.conference = ConferencesFact.get({id:$routeParams.conferenceId});

}]);

angular.module('conferencesApp').controller('conferencesDeleteCtrl', [ '$scope', 'conferenceModel', function ($scope, conferenceModel) {
       $scope.conference = conferenceModel;
}]);

