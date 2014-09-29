/**
 * equipment controllers
 */

/**
 * Main equipment controller
 *
 * @type {controller}
 */
angular.module('equipmentsApp').controller('equipmentsMainCtrl', [function ($scope)
{

}]);

/**
 * List equipment controller
 *
 * @type {controller}
 */
angular.module('equipmentsApp').controller('equipmentsListCtrl', ['$scope', 'GLOBAL_CONFIG', 'createDialog', '$rootScope', 'equipmentsFact', '$cachedResource', function ($scope, GLOBAL_CONFIG, createDialogService, $rootScope, equipmentsFact, $cachedResource)
{
  $scope.GLOBAL_CONFIG = GLOBAL_CONFIG;

  var offset = -20;
  var limit = 20;
  $scope.busy = false;

  $scope.equipments = [];

  $scope.reload = function ()
  {
    // $scope.equipments = equipment.list();
    $scope.equipments.$promise.then(function ()
    {
      console.log('From cache:', $scope.equipments);
    });
    //console.log($scope.equipments);
  }

  $scope.clone = function (equipment)
  {
    // $scope.equipments = equipment.list();

    cloneequipment = angular.copy(equipment);
    cloneequipment.id = null;

    var error = function (response, args)
    {
      $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'Clone not completed', type: 'danger'});
    }

    var success = function (response, args)
    {
      $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'equipment saved', type: 'success'});
      $scope.equipments.push(response);
    }

    cloneequipment.$create({}, success, error);
  }


  $scope.deleteModal = function (index, equipment)
  {
    $scope.index = index;

    createDialogService(GLOBAL_CONFIG.app.modules.equipments.urls.partials + 'equipments-delete.html', {
      id: 'complexDialog',
      title: 'equipment deletion',
      backdrop: true,
      controller: 'equipmentsDeleteCtrl',
      success: {label: 'Ok', fn: function ()
      {
        equipmentsFact.delete({id: equipment.id});
        $scope.equipments.splice(index, 1);
      }}
    }, {
      equipmentModel: equipment
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
    equipmentsFact.all({offset: offset, limit: limit, query: query}, function (data)
    {
      var items = data;

      if (query)
      {
        $scope.equipments = data;
      }
      else
      {
        for (var i = 0; i < items.length; i++)
        {
          $scope.equipments.push(items[i]);
        }
      }

      if (items.length > 1)
      {
        $scope.busy = false;
      }
    })
  };

//    $scope.search = function(query) {
//        equipment.all({offset: 0, limit: 20, query: query}, function (data) {
//            $scope.equipments = data;
//        })
//    };

  /*
   var Org = $cachedResource('org', globalConfig.api.urls.equipments+'/:equipmentId.json', {id: "@id"});
   $scope.equipments = Org.query();
   $scope.equipments.$promise.then(function(data) {
   console.log($scope.equipments);
   console.log($scope.equipments.length);
   });*/
  //$scope.equipments = $cachedResource();
}]);


/**
 * New equipment controller
 *
 * @type {controller}
 */
angular.module('equipmentsApp').controller('equipmentsNewCtrl', [ '$scope', '$rootScope', '$location', 'equipmentsFact', function ($scope, $rootScope, $location, equipmentsFact)
{
  $scope.equipment = new equipmentsFact;

  var error = function (response, args)
  {
    $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'the equipment has not been created', type: 'danger'});
  }

  var success = function (response, args)
  {
    $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'equipment created', type: 'success'});
  }

  $scope.create = function (form)
  {
    if (form.$valid)
    {
      $scope.equipment.$create({}, success, error);
    }
  }
}]);

/**
 * Edit equipment controller
 *
 * @type {controller}
 */
angular.module('equipmentsApp').controller('equipmentsEditCtrl', [ '$scope', '$rootScope', '$routeParams', '$location', 'equipmentsFact', function ($scope, $rootScope, $routeParams, $location, equipmentsFact)
{
  $scope.equipment = equipmentsFact.get({id: $routeParams.equipmentId});

  var error = function (response, args)
  {
    $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'the equipment has not been saved', type: 'danger'});
  }

  var success = function (response, args)
  {
    $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'equipment saved', type: 'success'});
    $location.path('/equipments/list');
  }

  $scope.update = function (form)
  {
    if (form.$valid)
    {
      $scope.equipment.$update({}, success, error);
    }
  }
}]);

/**
 * Show equipment controller
 *
 * @type {controller}
 */
angular.module('equipmentsApp').controller('equipmentsShowCtrl', [ '$scope', '$routeParams', 'equipmentsFact', function ($scope, $routeParams, equipmentsFact)
{
  $scope.equipment = equipmentsFact.get({id: $routeParams.equipmentId});

}]);

/**
 * Delete equipment controller
 *
 * @type {controller}
 */
angular.module('equipmentsApp').controller('equipmentsDeleteCtrl', [ '$scope', 'equipmentModel', function ($scope, equipmentModel)
{
  $scope.equipment = equipmentModel;
}]);

