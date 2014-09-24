/**
 * Organizations controllers
 */

/**
 * Main organizations controller
 *
 * @type {controller}
 */
angular.module('organizationsApp').controller('organizationsMainCtrl', [function ($scope)
{

}]);

/**
 * List organization controller
 *
 * @type {controller}
 */
angular.module('organizationsApp').controller('organizationsListCtrl', ['$scope', 'GLOBAL_CONFIG', 'createDialog', '$rootScope', 'organizationsFact', '$cachedResource', function ($scope, GLOBAL_CONFIG, createDialogService, $rootScope, organizationsFact, $cachedResource)
{
  $scope.GLOBAL_CONFIG = GLOBAL_CONFIG;

  var offset = -20;
  var limit = 20;
  $scope.busy = false;

  $scope.query = "";
  $scope.orderBy = "label";
  $scope.orderSide = "ASC";

  $scope.organizations = [];

  $scope.reload = function ()
  {
    // $scope.organizations = Organization.list();
    $scope.organizations.$promise.then(function ()
    {
      console.log('From cache:', $scope.organizations);
    });
    //console.log($scope.organizations);
  }

  $scope.clone = function (organization, index)
  {
    // $scope.organizations = Organization.list();

    cloneOrganization = angular.copy(organization);
    cloneOrganization.id = null;

    var error = function (response, args)
    {
      $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'Clone not completed', type: 'danger'});
    }

    var success = function (response, args)
    {
      $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'Organization saved', type: 'success'});
      // $scope.organizations.push(response);
      $scope.organizations.splice(index + 1, 0, response);
    }

    cloneOrganization.$create({}, success, error);
  }


  $scope.deleteModal = function (index, organization)
  {
    $scope.index = index;

    createDialogService(GLOBAL_CONFIG.app.modules.organizations.urls.partials + 'organizations-delete.html', {
      id: 'complexDialog',
      title: 'Organization deletion',
      backdrop: true,
      controller: 'organizationsDeleteCtrl',
      success: {label: 'Ok', fn: function ()
      {
        organizationsFact.delete({id: organization.id});
        $scope.organizations.splice(index, 1);
      }}
    }, {
      organizationModel: organization
    });
  }

  var initialize = function ()
  {
    offset = -20;
    limit = 20;
    $scope.busy = false;
    $scope.organizations = [];
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
    organizationsFact.all(filters, function (data)
    {
      var items = data;

      for (var i = 0; i < items.length; i++)
      {
        $scope.organizations.push(items[i]);
      }

      if (items.length > 1)
      {
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

/**
 * New organization controller
 *
 * @type {controller}
 */
angular.module('organizationsApp').controller('organizationsNewCtrl', [ '$scope', '$rootScope', '$location', 'organizationsFact', function ($scope, $rootScope, $location, organizationsFact)
{
  $scope.organization = new organizationsFact;

  var error = function (response, args)
  {
    $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'the organization has not been created', type: 'danger'});
  }

  var success = function (response, args)
  {
    $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'organization created', type: 'success'});
    $location.path('/organizations/list');
  }

  $scope.create = function (form)
  {
    if (form.$valid)
    {
      $scope.organization.$create({}, success, error);
    }
  }
}]);

/**
 * Edit organization controller
 *
 * @type {controller}
 */
angular.module('organizationsApp').controller('organizationsEditCtrl', [ '$scope', '$rootScope', '$routeParams', '$location', 'organizationsFact', function ($scope, $rootScope, $routeParams, $location, organizationsFact)
{
  $scope.organization = organizationsFact.get({id: $routeParams.organizationId});

  var error = function (response, args)
  {
    $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'the organization has not been saved', type: 'danger'});
  }

  var success = function (response, args)
  {
    $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'organization saved', type: 'success'});
    $location.path('/organizations/list');
  }

  $scope.update = function (form)
  {
    if (form.$valid)
    {
      $scope.organization.$update({}, success, error);
    }
  }
}]);

/**
 * Show organization controller
 *
 * @type {controller}
 */
angular.module('organizationsApp').controller('organizationsShowCtrl', [ '$scope', '$routeParams', 'organizationsFact', function ($scope, $routeParams, organizationsFact)
{
  $scope.organization = organizationsFact.get({id: $routeParams.organizationId});

}]);

/**
 * Delete organization controller
 *
 * @type {controller}
 */
angular.module('organizationsApp').controller('organizationsDeleteCtrl', [ '$scope', 'organizationModel', function ($scope, organizationModel)
{
  $scope.organization = organizationModel;
}]);