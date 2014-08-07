angular.module('organizationApp')
    .config(
        ['$routeProvider',
            function ($routeProvider) {
                $routeProvider
                    .when('/organization/list', {
                        templateUrl: globalConfig.app.modules.organization.urls.partials+'organization-list.html',
                        controller: 'organizationListCtrl'
                    })
                    .when('/organization/new', {
                        templateUrl: globalConfig.app.modules.organization.urls.partials+'organization-new.html',
                        controller: 'organizationNewCtrl'
                    })
                    .when('/organization/edit/:organizationId', {
                        templateUrl: globalConfig.app.modules.organization.urls.partials+'organization-edit.html',
                        controller: 'organizationEditCtrl'
                    })
                    .when('/organization/show/:organizationId', {
                        templateUrl: globalConfig.app.modules.organization.urls.partials+'organization-show.html',
                        controller: 'organizationShowCtrl'
                    })
                    .when('/organization/delete/:organizationId', {
                        templateUrl: globalConfig.app.modules.organization.urls.partials+'organization-show.html',
                        controller: 'organizationDeleteCtrl'
                    })
                    .otherwise({
                        redirectTo: '/organization/list'
                    });
            }
        ]);