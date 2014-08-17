angular.module('roleLabelsApp')
    .config(
        ['$routeProvider',
            function ($routeProvider) {
                $routeProvider
                    .when('/roleLabels/list', {
                        templateUrl: globalConfig.app.modules.roleLabels.urls.partials+'roleLabels-list.html',
                        controller: 'roleLabelsListCtrl'
                    })
                    .when('/roleLabels/thumbnail', {
                        templateUrl: globalConfig.app.modules.roleLabels.urls.partials+'roleLabels-thumbnail.html',
                        controller: 'roleLabelsListCtrl'
                    })
                    .when('/roleLabels/new', {
                        templateUrl: globalConfig.app.modules.roleLabels.urls.partials+'roleLabels-new.html',
                        controller: 'roleLabelsNewCtrl'
                    })
                    .when('/roleLabels/edit/:roleLabelId', {
                        templateUrl: globalConfig.app.modules.roleLabels.urls.partials+'roleLabels-edit.html',
                        controller: 'roleLabelsEditCtrl'
                    })
                    .when('/roleLabels/show/:roleLabelId', {
                        templateUrl: globalConfig.app.modules.roleLabels.urls.partials+'roleLabels-show.html',
                        controller: 'roleLabelsShowCtrl'
                    })
                    .otherwise({
                        redirectTo: '/roleLabels/list'
                    });
            }
        ]);