/**
 * Roles module configuration
 * route <--> template <--> controller
 *
 * @type {config}
 */
angular.module('rolesApp')
  .config(
  ['$routeProvider',
    function ($routeProvider)
    {
      $routeProvider
        .when('/roles/list', {
          templateUrl: globalConfig.app.modules.roles.urls.partials + 'roles-list.html',
          controller: 'rolesListCtrl'
        })
        .when('/roles/thumbnail', {
          templateUrl: globalConfig.app.modules.roles.urls.partials + 'roles-thumbnail.html',
          controller: 'rolesListCtrl'
        })
        .when('/roles/new', {
          templateUrl: globalConfig.app.modules.roles.urls.partials + 'roles-new.html',
          controller: 'rolesNewCtrl'
        })
        .when('/roles/edit/:roleId', {
          templateUrl: globalConfig.app.modules.roles.urls.partials + 'roles-edit.html',
          controller: 'rolesEditCtrl'
        })
        .when('/roles/show/:roleId', {
          templateUrl: globalConfig.app.modules.roles.urls.partials + 'roles-show.html',
          controller: 'rolesShowCtrl'
        })
        .otherwise({
          redirectTo: '/roles/list'
        });
    }
  ]);

angular.module('roleLabelsApp')
    .config(
    ['$routeProvider',
        function ($routeProvider)
        {
            $routeProvider
                .when('/roleLabels/list', {
                    templateUrl: globalConfig.app.modules.roleLabels.urls.partials + 'roleLabels-list.html',
                    controller: 'roleLabelsListCtrl'
                })
                .when('/roleLabels/thumbnail', {
                    templateUrl: globalConfig.app.modules.roleLabels.urls.partials + 'roleLabels-thumbnail.html',
                    controller: 'roleLabelsListCtrl'
                })
                .when('/roleLabels/new', {
                    templateUrl: globalConfig.app.modules.roleLabels.urls.partials + 'roleLabels-new.html',
                    controller: 'roleLabelsNewCtrl'
                })
                .when('/roleLabels/edit/:roleLabelId', {
                    templateUrl: globalConfig.app.modules.roleLabels.urls.partials + 'roleLabels-edit.html',
                    controller: 'roleLabelsEditCtrl'
                })
                .when('/roleLabels/show/:roleLabelId', {
                    templateUrl: globalConfig.app.modules.roleLabels.urls.partials + 'roleLabels-show.html',
                    controller: 'roleLabelsShowCtrl'
                })
                .otherwise({
                    redirectTo: '/roleLabels/list'
                });
        }
    ]);