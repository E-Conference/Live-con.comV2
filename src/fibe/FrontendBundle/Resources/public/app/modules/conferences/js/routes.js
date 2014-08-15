angular.module('conferencesApp')
    .config(
        ['$routeProvider',
            function ($routeProvider) {
                $routeProvider
                    .when('/conferences/list', {
                        templateUrl: globalConfig.app.modules.conferences.urls.partials+'conferences-list.html',
                        controller: 'conferencesListCtrl'
                    })
                    .when('/conferences/thumbnail', {
                        templateUrl: globalConfig.app.modules.conferences.urls.partials+'conferences-thumbnail.html',
                        controller: 'conferencesListCtrl'
                    })
                    .when('/conferences/new', {
                        templateUrl: globalConfig.app.modules.conferences.urls.partials+'conferences-new.html',
                        controller: 'conferencesNewCtrl'
                    })
                    .when('/conferences/edit/:conferenceId', {
                        templateUrl: globalConfig.app.modules.conferences.urls.partials+'conferences-edit.html',
                        controller: 'conferencesEditCtrl'
                    })
                    .when('/conferences/show/:conferenceId', {
                        templateUrl: globalConfig.app.modules.conferences.urls.partials+'conferences-show.html',
                        controller: 'conferencesShowCtrl'
                    })
                    .otherwise({
                        redirectTo: '/conferences/list'
                    });
            }
        ]);