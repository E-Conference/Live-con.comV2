'use strict';

/* Controllers */

var liveconControllers = angular.module('liveconControllers', []);

/*********************************** NAVS **********************************************/
liveconControllers.controller('AlertCtrl', ['$scope', '$routeParams', 'GLOBAL_CONFIG',
    function ($scope, $routeParams, GLOBAL_CONFIG) {
        $scope.alerts = [];

        $scope.$on('AlertCtrl:addAlert',function(event, args) {$scope.addAlert(args)});

        $scope.addAlert = function(alert) {
            debugger;
            $scope.alerts.push(alert);
        };

        $scope.closeAlert = function(index) {
            $scope.alerts.splice(index, 1);
        };
    }]);

/*********************************** NAVS **********************************************/
liveconControllers.controller('mainCtrl', ['$scope', '$routeParams', 'GLOBAL_CONFIG',
    function ($scope, $routeParams, GLOBAL_CONFIG) {
        $scope.GLOBAL_CONFIG = GLOBAL_CONFIG;
    }]);


/*********************************** NAVS **********************************************/
liveconControllers.controller('navLeftCtrl', ['$scope', '$routeParams', 'GLOBAL_CONFIG',
    function ($scope, $routeParams, GLOBAL_CONFIG) {
        $scope.liveconLogoPath = GLOBAL_CONFIG.liveconLogoPath;
    }]);

liveconControllers.controller('navRightCtrl', ['$scope', '$routeParams',
    function ($scope, $routeParams) {
    }]);

liveconControllers.controller('navTopCtrl', ['$translate','$scope', '$routeParams', 'GLOBAL_CONFIG',
    function ($translate, $scope, $routeParams, GLOBAL_CONFIG) {
        $scope.GLOBAL_CONFIG = GLOBAL_CONFIG;
        $scope.toggleNavLeft = function () {
            $("#wrapper").removeClass("active-right");
            $("#wrapper").toggleClass("active-left");
        };

        $scope.locals = [{ label : 'EN', code : 'en_US', src: GLOBAL_CONFIG.app.urls.img+'/english-flag.png'},{ label : 'FR', code : 'fr_FR',  src: GLOBAL_CONFIG.app.urls.img+'/french-flag.png'}]
        $scope.changeLocal = function(local) {
            $translate.use(local.code);
            return local;
        };

    }]);

/*********************************** PUBLICATIONS **********************************************/
liveconControllers.controller('publicationsCtrl', ['$scope', '$rootScope', 'publicationFactory', 'GLOBAL_CONFIG',
    function ($scope, $rootScope, publicationFactory, GLOBAL_CONFIG) {
        $scope.publications = publicationFactory.list({conferenceId: GLOBAL_CONFIG.conferenceId});
        $scope.orderProp = 'age';
        $rootScope.title = "Publications";
    }]);


liveconControllers.controller('publicationCtrl', ['$scope', '$rootScope', '$routeParams', 'publicationFactory',
    function ($scope, $rootScope, $routeParams, publicationFactory) {
        publicationFactory.show({publicationId: $routeParams.publicationId}, function (publication) {
            $scope.publication = publication[0];
            $rootScope.title = publication[0].title;
        });
    }]);


/*********************************** PERSONS **********************************************/
liveconControllers.controller('personsCtrl', ['$scope', '$rootScope', '$routeParams', 'personFactory', 'GLOBAL_CONFIG',
    function ($scope, $rootScope, $routeParams, personFactory, GLOBAL_CONFIG) {
        personFactory.list({conferenceId: GLOBAL_CONFIG.conferenceId}, function (persons) {
            $scope.persons = persons;
            $rootScope.title = "Speakers";
        });
    }]);

liveconControllers.controller('personCtrl', ['$scope', '$rootScope', '$routeParams', 'personFactory',
    function ($scope, $rootScope, $routeParams, personFactory) {
        personFactory.show({personId: $routeParams.personId}, function (person) {
            $scope.person = person[0];
            $rootScope.title = person[0].name;
        });
    }]);


/*********************************** CONFERENCE **********************************************/
liveconControllers.controller('conferenceCtrl', ['$scope', '$rootScope', '$routeParams', 'conferenceFactory', 'GLOBAL_CONFIG',
    function ($scope, $rootScope, $routeParams, conferenceFactory, GLOBAL_CONFIG) {
        $scope.phone = conferenceFactory.show({conferenceId: GLOBAL_CONFIG.conferenceEventId}, function (conference) {
            $scope.conference = conference[0];
            $rootScope.title = conference[0].name;
        });
    }]);


/*********************************** ORGANIZATIONS **********************************************/
/*
liveconControllers.controller('organizationsCtrl', ['$scope', '$rootScope', '$routeParams', 'organizationFactory', 'GLOBAL_CONFIG',
    function ($scope, $rootScope, $routeParams, organizationFactory, GLOBAL_CONFIG) {
        $scope.organizations = organizationFactory.list();
    }]);

liveconControllers.controller('organizationCtrl', ['$scope', '$rootScope', '$routeParams', 'organizationFactory',
    function ($scope, $rootScope, $routeParams, organizationFactory) {

        $scope.organization = organizationFactory.query({organizationId: $routeParams.organizationId});
        $scope.create = function () {
            $scope.organization.$create()
        };
    }]);
*/
/*********************************** DASHBOARDS **********************************************/
liveconControllers.controller('dashboardCtrl', ['$scope', '$rootScope', '$routeParams', 'organizationFactory', 'GLOBAL_CONFIG',
    function ($scope, $rootScope, $routeParams, organizationFactory, GLOBAL_CONFIG) {

    }]);

/*********************************** WIDGETS **********************************************/
liveconControllers.controller('widgetCtrl', ['$scope', '$rootScope', '$routeParams', 'organizationFactory', 'GLOBAL_CONFIG',
    function ($scope, $rootScope, $routeParams, organizationFactory, GLOBAL_CONFIG) {

    }]);


/*********************************** SCHEDULE **********************************************/
liveconControllers.controller('scheduleCtrl', ['$scope', '$rootScope', '$routeParams', 'organizationFactory', 'GLOBAL_CONFIG',
    function ($scope, $rootScope, $routeParams, organizationFactory, GLOBAL_CONFIG) {

    }]);

