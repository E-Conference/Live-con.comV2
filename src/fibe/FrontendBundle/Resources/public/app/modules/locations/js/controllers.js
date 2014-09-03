angular.module('locationsApp').controller('locationsMainCtrl', [function ($scope)
{

}]);

angular.module('locationsApp').controller('locationsListCtrl', ['$scope', 'GLOBAL_CONFIG', 'createDialog', '$rootScope', 'locationsFact', '$cachedResource', function ($scope, GLOBAL_CONFIG, createDialogService, $rootScope, locationsFact, $cachedResource)
{
  $scope.GLOBAL_CONFIG = GLOBAL_CONFIG;

  var offset = -20;
  var limit = 20;
  $scope.busy = false;

  $scope.locations = [];

  $scope.reload = function ()
  {
    // $scope.locations = location.list();
    $scope.locations.$promise.then(function ()
    {
      console.log('From cache:', $scope.locations);
    });
    //console.log($scope.locations);
  }

  $scope.clone = function (location)
  {
    // $scope.locations = location.list();

    clonelocation = angular.copy(location);
    clonelocation.id = null;

    var error = function (response, args)
    {
      $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'Clone not completed', type: 'danger'});
    }

    var success = function (response, args)
    {
      $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'location saved', type: 'success'});
      $scope.locations.push(response);
    }

    clonelocation.$create({}, success, error);
  }


  $scope.deleteModal = function (index, location)
  {
    $scope.index = index;

    createDialogService(GLOBAL_CONFIG.app.modules.locations.urls.partials + 'locations-delete.html', {
      id: 'complexDialog',
      title: 'location deletion',
      backdrop: true,
      controller: 'locationsDeleteCtrl',
      success: {label: 'Ok', fn: function ()
      {
        locationsFact.delete({id: location.id});
        $scope.locations.splice(index, 1);
      }}
    }, {
      locationModel: location
    });
  }


  $scope.load = function (query)
  {
    offset = offset + limit;

    if (query)
    {
      offset = 0;
      limit = 20;
      $scope.busy = false;
    }

    if (this.busy)
    {
      return;
    }

    $scope.busy = true;
    locationsFact.all({offset: offset, limit: limit, query: query}, function (data)
    {
      var items = data;

      if (query)
      {
        $scope.locations = data;
      }
      else
      {
        for (var i = 0; i < items.length; i++)
        {
          $scope.locations.push(items[i]);
        }
      }

      if (items.length > 1)
      {
        $scope.busy = false;
      }
    })
  };

//    $scope.search = function(query) {
//        location.all({offset: 0, limit: 20, query: query}, function (data) {
//            $scope.locations = data;
//        })
//    };

  /*
   var Org = $cachedResource('org', globalConfig.api.urls.locations+'/:locationId.json', {id: "@id"});
   $scope.locations = Org.query();
   $scope.locations.$promise.then(function(data) {
   console.log($scope.locations);
   console.log($scope.locations.length);
   });*/
  //$scope.locations = $cachedResource();
}]);


angular.module('locationsApp').controller('locationsNewCtrl', [ '$scope', '$rootScope', '$location', 'locationsFact', function ($scope, $rootScope, $location, locationsFact)
{
  $scope.location = new locationsFact;

  var error = function (response, args)
  {
    $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'the location has not been created', type: 'danger'});
  }

  var success = function (response, args)
  {
    $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'location created', type: 'success'});
    $location.path('/locations/list');
  }

  $scope.create = function (form)
  {
    if (form.$valid)
    {
      $scope.location.$create({}, success, error);
    }
  }
}]);

angular.module('locationsApp').controller('locationsEditCtrl', [ '$scope', '$rootScope', '$routeParams', '$location', 'locationsFact', function ($scope, $rootScope, $routeParams, $location, locationsFact)
{
  $scope.location = locationsFact.get({id: $routeParams.locationId});

  var error = function (response, args)
  {
    $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'the location has not been saved', type: 'danger'});
  }

  var success = function (response, args)
  {
    $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'location saved', type: 'success'});
    $location.path('/locations/list');
  }

  $scope.update = function (form)
  {
    if (form.$valid)
    {
      $scope.location.$update({}, success, error);
    }
  }
}]);

angular.module('locationsApp').controller('locationsShowCtrl', [ '$scope', '$routeParams', 'locationsFact', function ($scope, $routeParams, locationsFact)
{
  $scope.location = locationsFact.get({id: $routeParams.locationId});

}]);

angular.module('locationsApp').controller('locationsDeleteCtrl', [ '$scope', 'locationModel', function ($scope, locationModel)
{
  $scope.location = locationModel;
}]);

