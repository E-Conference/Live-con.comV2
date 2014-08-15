angular.module('eventsApp')
    .config(
        ['$routeProvider',
            function ($routeProvider) {
                $routeProvider
                    .when('/events/list', {
                        templateUrl: globalConfig.app.modules.events.urls.partials+'events-list.html',
                        controller: 'eventsListCtrl'
                    })
                    .when('/events/thumbnail', {
                        templateUrl: globalConfig.app.modules.events.urls.partials+'events-thumbnail.html',
                        controller: 'eventsListCtrl'
                    })
                    .when('/events/new', {
                        templateUrl: globalConfig.app.modules.events.urls.partials+'events-new.html',
                        controller: 'eventsNewCtrl'
                    })
                    .when('/events/edit/:eventId', {
                        templateUrl: globalConfig.app.modules.events.urls.partials+'events-edit.html',
                        controller: 'eventsEditCtrl'
                    })
                    .when('/events/show/:eventId', {
                        templateUrl: globalConfig.app.modules.events.urls.partials+'events-show.html',
                        controller: 'eventsShowCtrl'
                    })
                    .otherwise({
                        redirectTo: '/events/list'
                    });
            }
        ]);