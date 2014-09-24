/**
 * Conference (mainEvent) controllers
 */

/**
 * Main conference controller
 *
 * @type {controller}
 */
angular.module('conferencesApp').controller('conferencesMainCtrl', [function ($scope)
{

}]);

/**
 * List conference controller
 *
 * @type {controller}
 */
angular.module('conferencesApp').controller('conferencesListCtrl', ['$scope', '$routeParams', 'GLOBAL_CONFIG', 'createDialog', '$rootScope', 'ConferencesFact', '$cachedResource', function ($scope, $routeParams, GLOBAL_CONFIG, createDialogService, $rootScope, ConferencesFact, $cachedResource)
{
  $scope.GLOBAL_CONFIG = GLOBAL_CONFIG;


  var offset = -20;
  var limit = 20;
  $scope.busy = false;

  $scope.query = "";
  $scope.orderBy = "label";
  $scope.orderSide = "ASC";

  $scope.conferences = [];

  $scope.clone = function (conference, index)
  {
    // $scope.conferences = Conference.list();

    cloneConference = angular.copy(conference);
    cloneConference.id = null;

    var error = function (response, args)
    {
      $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'Clone not completed', type: 'danger'});
    }

    var success = function (response, args)
    {
      $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'Conference saved', type: 'success'});
      // $scope.conferences.push(response);
      $scope.conferences.splice(index + 1, 0, response);
    }

    cloneConference.$create({}, success, error);
  }


  $scope.deleteModal = function (index, conference)
  {
    $scope.index = index;

    createDialogService(GLOBAL_CONFIG.app.modules.conferences.urls.partials + 'conferences-delete.html', {
      id: 'complexDialog',
      title: 'Conference deletion',
      backdrop: true,
      controller: 'conferencesDeleteCtrl',
      success: {label: 'Ok', fn: function ()
      {
        ConferencesFact.delete({id: conference.id});
        $scope.conferences.splice(index, 1);
      }}
    }, {
      conferenceModel: conference
    });
  }

  var initialize = function ()
  {
    offset = -20;
    limit = 20;
    $scope.busy = false;
    $scope.conferences = [];
  }

  $scope.search = function ()
  {
    initialize();
    $scope.load($scope.query);
  }

  $scope.order = function (orderBy, orderSide)
  {
    initialize();
    $scope.orderBy = orderBy;
    $scope.orderSide = orderSide;
    $scope.load();
  }

  $scope.load = function ()
  {
    offset = offset + limit;

    filters = {offset: offset, limit: limit};
    if (this.busy)
    {
      return;
    }
    if ($scope.query)
    {
      filters.query = $scope.query;
    }
    if ($scope.orderBy)
    {
      filters["order[" + $scope.orderBy + "]"] = $scope.orderSide;
    }

    $scope.busy = true;
    ConferencesFact.all(filters, function (data)
    {
      var items = data;

      for (var i = 0; i < items.length; i++)
      {
        $scope.conferences.push(items[i]);
      }

      if (items.length > 1)
      {
        $scope.busy = false;
      }
    })
  };

}]);

/**
 * New conference controller
 *
 * @type {controller}
 */
angular.module('conferencesApp').controller('conferencesNewCtrl', [ '$scope', '$rootScope', '$location', 'ConferencesFact', function ($scope, $rootScope, $location, ConferencesFact)
{
  $scope.conference = new ConferencesFact;

  var error = function (response, args)
  {
    $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'the conference has not been created', type: 'danger'});
  }

  var success = function (response, args)
  {
    $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'conference created', type: 'success'});
    $location.path('/conferences/list');
  }

  $scope.create = function (form)
  {
    if (form.$valid)
    {
      $scope.conference.$create({}, success, error);
    }
  }
}]);

/**
 * Edit conference controller
 *
 * @type {controller}
 */
angular.module('conferencesApp').controller('conferencesEditCtrl', [ '$scope', '$rootScope', '$routeParams', '$location', 'ConferencesFact', function ($scope, $rootScope, $routeParams, $location, ConferencesFact)
{
  $scope.conference = ConferencesFact.get({id: $routeParams.confId});

  var error = function (response, args)
  {
    $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'the conference has not been saved', type: 'danger'});
  }

  //Get geolocalization of the user
//    $.get("http://ipinfo.io", function(response) {
//
//        var lat = response.loc.split(",")[0];
//        var lng = response.loc.split(",")[1];
//        var latlng = L.latLng(lat, lng);
//        map.setView(latlng, 4, {animate: true});
//    }, "jsonp");


  var success = function (response, args)
  {
    $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'conference saved', type: 'success'});
    $location.path('/conferences/list');
  }

  $scope.update = function (form)
  {
    if (form.$valid)
    {
      $scope.conference.$update({}, success, error);
    }
  }

  $scope.markers = new Array();

  $scope.$on("leafletDirectiveMap.click", function (event, args)
  {
    var leafEvent = args.leafletEvent;

    $scope.markers.push({
      lat: leafEvent.latlng.lat,
      lng: leafEvent.latlng.lng,
      message: "My Added Marker"
    });

    $scope.conference.latitude = leafEvent.latlng.lat;
    $scope.conference.latitude = leafEvent.latlng.longitude;

  });

  //Context change
  $rootScope.$broadcast('contextCtrl:changeContext', {confId: $routeParams.confId});


}]);

/**
 * Show conference controller
 *
 * @type {controller}
 */
angular.module('conferencesApp').controller('conferencesShowCtrl', [ '$scope', '$rootScope', '$routeParams', 'ConferencesFact', function ($scope, $rootScope, $routeParams, ConferencesFact)
{
  $scope.conference = ConferencesFact.get({id: $routeParams.confId});

  //Context change
  $rootScope.$broadcast('contextCtrl:changeContext', {confId: $routeParams.confId});

}]);

/**
 * Delete conference controller
 *
 * @type {controller}
 */
angular.module('conferencesApp').controller('conferencesDeleteCtrl', [ '$scope', '$rootScope', 'conferenceModel', function ($scope, $rootScope, conferenceModel)
{
  $scope.conference = conferenceModel;
}]);

