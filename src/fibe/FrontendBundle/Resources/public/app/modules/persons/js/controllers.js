/**
 * Persons controllers
 */

/**
 * Main persons controller
 *
 * @type {controller}
 */
angular.module('personsApp').controller('personsMainCtrl', [function ($scope)
{

}]);

/**
 * List persons by event controller
 *
 * @type {controller}
 */
angular.module('personsApp').controller('personsListByEventCtrl', ['$scope', 'GLOBAL_CONFIG', 'createDialog', '$rootScope', 'personsFact', '$cachedResource', function ($scope, GLOBAL_CONFIG, createDialogService, $rootScope, personsFact, $cachedResource)
{
  $scope.GLOBAL_CONFIG = GLOBAL_CONFIG;
  $scope.person = personsFact.get({idEvent: $routeParams.eventId});
}]);

/**
 * List (all) persons controller
 *
 * @type {controller}
 */
angular.module('personsApp').controller('personsListCtrl', ['$scope', 'GLOBAL_CONFIG', 'createDialog', '$rootScope', 'personsFact', '$cachedResource', function ($scope, GLOBAL_CONFIG, createDialogService, $rootScope, personsFact, $cachedResource)
{
  $scope.GLOBAL_CONFIG = GLOBAL_CONFIG;

  var offset = -20;
  var limit = 20;
  $scope.busy = false;

  $scope.persons = [];

  $scope.reload = function ()
  {
    // $scope.persons = Person.list();
    $scope.persons.$promise.then(function ()
    {
      console.log('From cache:', $scope.persons);
    });
    //console.log($scope.persons);
  }

  $scope.clone = function (person)
  {
    // $scope.persons = Person.list();

    clonePerson = angular.copy(person);
    clonePerson.id = null;
    clonePerson.additionalInformation.id = null;

    var error = function (response, args)
    {
      $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'Clone not completed', type: 'danger'});
    }

    var success = function (response, args)
    {
      $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'Person saved', type: 'success'});
      $scope.persons.push(response);
    }

    clonePerson.$create({}, success, error);
  }


  $scope.deleteModal = function (index, person)
  {
    $scope.index = index;

    createDialogService(GLOBAL_CONFIG.app.modules.persons.urls.partials + 'persons-delete.html', {
      id: 'complexDialog',
      title: 'Person deletion',
      backdrop: true,
      controller: 'personsDeleteCtrl',
      success: {label: 'Ok', fn: function ()
      {
        personsFact.delete({id: person.id});
        $scope.persons.splice(index, 1);
      }}
    }, {
      personModel: person
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
    personsFact.all({offset: offset, limit: limit, query: query}, function (data)
    {
      var items = data;

      if (query)
      {
        $scope.persons = data;
      }
      else
      {
        for (var i = 0; i < items.length; i++)
        {
          $scope.persons.push(items[i]);
        }
      }

      if (items.length > 1)
      {
        $scope.busy = false;
      }
    })
  };

//    $scope.search = function(query) {
//        Person.all({offset: 0, limit: 20, query: query}, function (data) {
//            $scope.persons = data;
//        })
//    };

  /*
   var Org = $cachedResource('org', globalConfig.api.urls.persons+'/:personId.json', {id: "@id"});
   $scope.persons = Org.query();
   $scope.persons.$promise.then(function(data) {
   console.log($scope.persons);
   console.log($scope.persons.length);
   });*/
  //$scope.persons = $cachedResource();
}]);

/**
 * New person controller
 *
 * @type {controller}
 */
angular.module('personsApp').controller('personsNewCtrl', [ '$scope', '$rootScope', '$location', 'personsFact', function ($scope, $rootScope, $location, personsFact)
{
  $scope.person = new personsFact;

  var error = function (response, args)
  {
    $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'the person has not been created', type: 'danger'});
  }

  var success = function (response, args)
  {
    $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'person created', type: 'success'});
    $location.path('/persons/list');
  }

  $scope.create = function (form)
  {
    if (form.$valid)
    {
      $scope.person.$create({}, success, error);
    }
  }
}]);

/**
 * Edit person controller
 *
 * @type {controller}
 */
angular.module('personsApp').controller('personsEditCtrl', [ '$scope', '$rootScope', '$routeParams', '$location', 'personsFact', function ($scope, $rootScope, $routeParams, $location, personsFact)
{
  $scope.person = personsFact.get({id: $routeParams.personId});

  var error = function (response, args)
  {
    $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'the person has not been saved', type: 'danger'});
  }

  var success = function (response, args)
  {
    $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'person saved', type: 'success'});
    $location.path('/persons/list');
  }

  $scope.update = function (form)
  {
    if (form.$valid)
    {
      $scope.person.$update({}, success, error);
    }
  }
}]);

/**
 * Show person controller
 *
 * @type {controller}
 */
angular.module('personsApp').controller('personsShowCtrl', [ '$scope', '$routeParams', 'personsFact', function ($scope, $routeParams, personsFact)
{
  $scope.person = personsFact.get({id: $routeParams.personId});

}]);

/**
 * Delete person controller
 *
 * @type {controller}
 */
angular.module('personsApp').controller('personsDeleteCtrl', [ '$scope', 'personModel', function ($scope, personModel)
{
  $scope.person = personModel;
}]);

