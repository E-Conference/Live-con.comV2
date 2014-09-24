'use strict';

/**
 * Main and global controllers
 */

/**
 * Main app controllers
 *
 * @type {module}
 */
var liveconControllers = angular.module('liveconControllers', []);

/**
 * Main controller
 *
 * @type {controller}
 */
liveconControllers.controller('mainCtrl', ['$scope', '$routeParams', 'GLOBAL_CONFIG',
  function ($scope, $routeParams, GLOBAL_CONFIG)
  {
    $scope.GLOBAL_CONFIG = GLOBAL_CONFIG;

    $scope.scrollTop = function ()
    {
      $('html, body').animate({scrollTop: 0}, 'slow');
    }
  }]);


/**
 * Global alert controller
 *
 * @type {controller}
 */
liveconControllers.controller('AlertCtrl', ['$scope', '$routeParams', 'GLOBAL_CONFIG', '$timeout',
  function ($scope, $routeParams, GLOBAL_CONFIG, $timeout)
  {
    $scope.alerts = [];

    $scope.$on('AlertCtrl:addAlert', function (event, args)
    {
      $scope.addAlert(args)
    });

    $scope.addAlert = function (alert)
    {
      $scope.alerts.push(alert);
      $scope.resetAlertTimeout();
    };

    $scope.closeAlert = function (index)
    {
      $scope.alerts.splice(index, 1);
    };


    $scope.clearAlert = function ()
    {
      $("#alertBox").children().first("span").fadeOut('500');
      $scope.closeAlert(0);
      $scope.alertTimeout = $timeout($scope.clearAlert, 3000);
    }

    $scope.resetAlertTimeout = function ()
    {
      $timeout.cancel($scope.alertTimeout);
      $scope.alertTimeout = $timeout($scope.clearAlert, 3000);
    }


  }]);

/*********************************** NAVS **********************************************/

/**
 * Nav left controller (left panel controller)
 *
 * @type {controller}
 */
liveconControllers.controller('navLeftCtrl', ['$scope', '$routeParams', 'GLOBAL_CONFIG',
  function ($scope, $routeParams, GLOBAL_CONFIG)
  {
    $scope.liveconLogoPath = GLOBAL_CONFIG.liveconLogoPath;
    $scope.status = {
      isFirstOpen: true,
      isFirstDisabled: false
    };
  }]);

/**
 * Nav right controller (right panel controller)
 *
 * @type {controller}
 */
liveconControllers.controller('navRightCtrl', ['$scope', '$routeParams',
  function ($scope, $routeParams)
  {
  }]);

/**
 * Nav top controller (top panel controller)
 *
 * @type {controller}
 */
liveconControllers.controller('navTopCtrl', ['$translate', '$scope', '$routeParams', 'GLOBAL_CONFIG',
  function ($translate, $scope, $routeParams, GLOBAL_CONFIG)
  {
    $scope.GLOBAL_CONFIG = GLOBAL_CONFIG;
    $scope.toggleNavLeft = function ()
    {
      var localWrapper = $("#wrapper");
      localWrapper.removeClass("active-right");
      localWrapper.toggleClass("active-left");
    };

    $scope.locals = [
      { label: 'EN', code: 'en_US', src: GLOBAL_CONFIG.app.urls.img + '/english-flag.png'},
      { label: 'FR', code: 'fr_FR', src: GLOBAL_CONFIG.app.urls.img + '/french-flag.png'}
    ]

    $scope.changeLocal = function (local)
    {
      $translate.use(local.code);
      return local;
    };

  }]);

/**
 * Dashboard controller
 *
 * @type {controller}
 */
liveconControllers.controller('dashboardCtrl', ['$scope', '$rootScope', '$routeParams', 'GLOBAL_CONFIG',
  function ($scope, $rootScope, $routeParams, GLOBAL_CONFIG)
  {

  }]);

/**
 * Main event controller (conference controller)
 */
liveconControllers.controller('conferenceCtrl', ['$scope', '$rootScope', '$routeParams', 'GLOBAL_CONFIG', 'ConferencesFact',
  function ($scope, $rootScope, $routeParams, GLOBAL_CONFIG, ConferencesFact)
  {
    $scope.conferences = ConferencesFact.all({offset: 0, limit: 20});

  }]);
