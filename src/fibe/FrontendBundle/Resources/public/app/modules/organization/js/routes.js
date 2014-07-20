angular.module('organizationApp')
    .config(
        ['$routeProvider',
            function ($routeProvider) {
                $routeProvider
                    .when('/organization/list', {
                        templateUrl: globalConfig.app.modules.organization.urls.partials+'organization-list.html',
                        controller: 'organizationListCtrl',
                        from: 'list'
                    })
                    .when('/organization/add', {
                        templateUrl: globalConfig.app.modules.organization.urls.partials+'organization-new.html',
                        controller: 'organizationAddCtrl',
                        from: 'new'
                    })
                    .when('/organization/edit/:organizationId', {
                        templateUrl: globalConfig.app.modules.organization.urls.partials+'organization-edit.html',
                        controller: 'organizationEditCtrl',
                        from: 'edit'
                    })
                    .when('/organization/show/:organizationId', {
                        templateUrl: globalConfig.app.modules.organization.urls.partials+'organization-show.html',
                        controller: 'organizationShowCtrl',
                        from: 'show'
                    })
                    .otherwise({
                        redirectTo: '/organization/list'
                    });
            }
        ]);