angular.module('categoriesApp').controller('categoriesMainCtrl', [function ($scope)
{

}]);

angular.module('categoriesApp').controller('categoriesListCtrl', ['$scope', 'GLOBAL_CONFIG', 'createDialog', '$rootScope', 'categoriesFact', '$cachedResource', function ($scope, GLOBAL_CONFIG, createDialogService, $rootScope, categoriesFact, $cachedResource)
{
  $scope.GLOBAL_CONFIG = GLOBAL_CONFIG;

  var offset = -20;
  var limit = 20;
  $scope.busy = false;

  $scope.categories = [];

  $scope.reload = function ()
  {
    // $scope.categories = category.list();
    $scope.categories.$promise.then(function ()
    {
      console.log('From cache:', $scope.categories);
    });
    //console.log($scope.categories);
  }

  $scope.clone = function (category)
  {
    // $scope.categories = category.list();

    clonecategory = angular.copy(category);
    clonecategory.id = null;

    var error = function (response, args)
    {
      $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'Clone not completed', type: 'danger'});
    }

    var success = function (response, args)
    {
      $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'category saved', type: 'success'});
      $scope.categories.push(response);
    }

    clonecategory.$create({}, success, error);
  }


  $scope.deleteModal = function (index, category)
  {
    $scope.index = index;

    createDialogService(GLOBAL_CONFIG.app.modules.categories.urls.partials + 'categories-delete.html', {
      id: 'complexDialog',
      title: 'category deletion',
      backdrop: true,
      controller: 'categoriesDeleteCtrl',
      success: {label: 'Ok', fn: function ()
      {
        categoriesFact.delete({id: category.id});
        $scope.categories.splice(index, 1);
      }}
    }, {
      categoryModel: category
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
    categoriesFact.all({offset: offset, limit: limit, query: query}, function (data)
    {
      var items = data;

      if (query)
      {
        $scope.categories = data;
      }
      else
      {
        for (var i = 0; i < items.length; i++)
        {
          $scope.categories.push(items[i]);
        }
      }

      if (items.length > 1)
      {
        $scope.busy = false;
      }
    })
  };

//    $scope.search = function(query) {
//        category.all({offset: 0, limit: 20, query: query}, function (data) {
//            $scope.categories = data;
//        })
//    };

  /*
   var Org = $cachedResource('org', globalConfig.api.urls.categories+'/:categoryId.json', {id: "@id"});
   $scope.categories = Org.query();
   $scope.categories.$promise.then(function(data) {
   console.log($scope.categories);
   console.log($scope.categories.length);
   });*/
  //$scope.categories = $cachedResource();
}]);


angular.module('categoriesApp').controller('categoriesNewCtrl', [ '$scope', '$rootScope', '$location', 'categoriesFact', function ($scope, $rootScope, $location, categoriesFact)
{
  $scope.category = new categoriesFact;

  var error = function (response, args)
  {
    $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'the category has not been created', type: 'danger'});
  }

  var success = function (response, args)
  {
    $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'category created', type: 'success'});
    $location.path('/categories/list');
  }

  $scope.create = function (form)
  {
    if (form.$valid)
    {
      $scope.category.$create({}, success, error);
    }
  }
}]);

angular.module('categoriesApp').controller('categoriesEditCtrl', [ '$scope', '$rootScope', '$routeParams', '$location', 'categoriesFact', function ($scope, $rootScope, $routeParams, $location, categoriesFact)
{
  $scope.category = categoriesFact.get({id: $routeParams.categoryId});

  var error = function (response, args)
  {
    $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'the category has not been saved', type: 'danger'});
  }

  var success = function (response, args)
  {
    $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'category saved', type: 'success'});
    $location.path('/categories/list');
  }

  $scope.update = function (form)
  {
    if (form.$valid)
    {
      $scope.category.$update({}, success, error);
    }
  }
}]);

angular.module('categoriesApp').controller('categoriesShowCtrl', [ '$scope', '$routeParams', 'categoriesFact', function ($scope, $routeParams, categoriesFact)
{
  $scope.category = categoriesFact.get({id: $routeParams.categoryId});

}]);

angular.module('categoriesApp').controller('categoriesDeleteCtrl', [ '$scope', 'categoryModel', function ($scope, categoryModel)
{
  $scope.category = categoryModel;
}]);

