angular.module('eventsApp').controller('eventsMainCtrl', [function ($scope)
{

}]);


angular.module('eventsApp').controller('eventsListByConferenceCtrl', ['$scope', '$routeParams', 'GLOBAL_CONFIG', 'createDialog', '$rootScope', 'EventsFact', '$cachedResource', function ($scope, $routeParams, GLOBAL_CONFIG, createDialogService, $rootScope, EventsFact, $cachedResource)
{
  $scope.GLOBAL_CONFIG = GLOBAL_CONFIG;

  //Changement de contexte
  $rootScope.$broadcast('contextCtrl:changeContext', {confId: $routeParams.confId});

  var offset = -20;
  var limit = 20;
  $scope.busy = false;

  $scope.query = "";
  $scope.orderBy = "label";
  $scope.orderSide = "ASC";

  $scope.events = [];

  $scope.reload = function ()
  {
    // $scope.events = Event.list();
    $scope.events.$promise.then(function ()
    {
      console.log('From cache:', $scope.events);
    });
    //console.log($scope.events);
  }

  $scope.clone = function (event, index)
  {
    // $scope.events = Event.list();

    cloneEvent = angular.copy(event);
    cloneEvent.id = null;

    var error = function (response, args)
    {
      $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'Clone not completed', type: 'danger'});
    }

    var success = function (response, args)
    {
      $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'Event saved', type: 'success'});
      // $scope.events.push(response);
      $scope.events.splice(index + 1, 0, response);
    }

    cloneEvent.$create({}, success, error);
  }


  $scope.deleteModal = function (index, event)
  {
    $scope.index = index;

    createDialogService(GLOBAL_CONFIG.app.modules.events.urls.partials + 'events-delete.html', {
      id: 'complexDialog',
      title: 'Event deletion',
      backdrop: true,
      controller: 'eventsDeleteCtrl',
      success: {label: 'Ok', fn: function ()
      {
        EventsFact.delete({id: event.id});
        $scope.events.splice(index, 1);
      }}
    }, {
      eventModel: event
    });
  }

  $scope.createCategoryModal = function (index)
  {
    $scope.index = index;

    createDialogService(GLOBAL_CONFIG.app.modules.categories.urls.partials + 'categories-new.html', {
      id: 'complexDialog',
      title: 'category creation',
      backdrop: true,
      controller: 'categoriesNewCtrl',
      success: {label: 'Ok', fn: function ()
      {
        GLOBAL_CONFIG.app.modules.categories.urls.js.categoriesFact.create();
        $scope.categories.splice(index, 1);
      }}
    });
  }

  var initialize = function ()
  {
    offset = -20;
    limit = 20;
    $scope.busy = false;
    $scope.events = [];
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
    EventsFact.all(filters, function (data)
    {
      var items = data;

      for (var i = 0; i < items.length; i++)
      {
        $scope.events.push(items[i]);
      }

      if (items.length > 1)
      {
        $scope.busy = false;
      }
    })
  };

//    $scope.search = function(query) {
//        Event.all({offset: 0, limit: 20, query: query}, function (data) {
//            $scope.events = data;
//        })
//    };

  /*
   var Org = $cachedResource('org', globalConfig.api.urls.events+'/:eventId.json', {id: "@id"});
   $scope.events = Org.query();
   $scope.events.$promise.then(function(data) {
   console.log($scope.events);
   console.log($scope.events.length);
   });*/
  //$scope.events = $cachedResource();
}]);


angular.module('eventsApp').controller('eventsNewCtrl', [ '$scope', '$rootScope', '$location', 'EventsFact', function ($scope, $rootScope, $location, EventsFact)
{
  $scope.event = new EventsFact;

  var error = function (response, args)
  {
    $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'the event has not been created', type: 'danger'});
  }

  var success = function (response, args)
  {
    $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'event created', type: 'success'});
    $location.path('/events/list');
  }

  $scope.create = function (form)
  {
    if (form.$valid)
    {
      $scope.event.$create({}, success, error);
    }
  }
}]);

angular.module('eventsApp').controller('eventsEditCtrl', [ '$scope', '$rootScope', 'GLOBAL_CONFIG', '$routeParams', '$location', 'EventsFact', 'createDialog', function ($scope, $rootScope, GLOBAL_CONFIG, $routeParams, $location, EventsFact, createDialogService)
{
  $scope.event = EventsFact.get({id: $routeParams.eventId});

  var error = function (response, args)
  {
    $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'the event has not been saved', type: 'danger'});
  }

  var success = function (response, args)
  {
    $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'event saved', type: 'success'});
    $location.path('/events/list');
  }

  $scope.update = function (form)
  {
    if (form.$valid)
    {
      $scope.event.$update({}, success, error);
    }
  }

  $scope.createLocationModal = function ()
  {
    createDialogService(GLOBAL_CONFIG.app.modules.locations.urls.partials + 'locations-new.html', {
      id: 'complexDialog',
      title: 'New location',
      backdrop: true,
      controller: 'locationsNewCtrl',
      success: {label: 'Save', fn: function ()
      {
      }}
    }, {
    });
  }

  $scope.addLocation = function (index, location)
  {
    $scope.event.locations.push(location);
  }

  $scope.deleteLocation = function (index)
  {
    $scope.event.locations.slice(index, 1);
  }

}]);

angular.module('eventsApp').controller('eventsShowCtrl', [ '$scope', '$routeParams', 'EventsFact', function ($scope, $routeParams, EventsFact)
{
  $scope.event = EventsFact.get({id: $routeParams.eventId});

}]);

angular.module('eventsApp').controller('eventsDeleteCtrl', [ '$scope', 'eventModel', function ($scope, eventModel)
{
  $scope.event = eventModel;
}]);

