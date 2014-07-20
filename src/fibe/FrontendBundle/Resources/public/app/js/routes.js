'use strict';

liveconApp.config(['$routeProvider',
    function($routeProvider) {
        $routeProvider.
            when('/dashboard/overview', {
                templateUrl: globalConfig.app.urls.partials+'dashboards/dashboard-overview.html',
                controller: 'dashboardCtrl'
            }).
            when('/dashboard/schedule', {
                templateUrl: globalConfig.app.urls.partials+'dashboards/dashboard-schedule.html',
                controller: 'dashboardCtrl'
            }).
            when('/dashboard/widget', {
                templateUrl: globalConfig.app.urls.partials+'dashboards/dashboard-widget.html',
                controller: 'dashboardCtrl'
            }).
            when('/publications', {
                templateUrl: globalConfig.app.urls.partials+'publication/publication-list.html',
                controller: 'publicationsCtrl'
            }).
            when('/publication/:publicationId', {
                templateUrl: globalConfig.app.urls.partials+'publication/publication-detail.html',
                controller: 'publicationCtrl'
            }).
            when('/speakers', {
                templateUrl: globalConfig.app.urls.partials+'person/persons-list.html',
                controller: 'personsCtrl'
            }).
            when('/speaker/:personId', {
                templateUrl: globalConfig.app.urls.partials+'person/person-detail.html',
                controller: 'personCtrl'
            })

            .when('/organization/', {
                redirectTo: '/organization/list'
                //templateUrl: globalConfig.app.modules.organization.urls.partials+'organization-list.html'
                //, controller: 'organizationMainCtrl'
            })
            /*
            .when('/organization/show/:organizationId', {
                templateUrl: globalConfig.app.urls.partials+'organization/organization-show.html',
                controller: 'organizationCtrl'
            })
            .when('/organization/edit/:organizationId', {
                templateUrl: globalConfig.app.urls.partials+'organization/organization-edit.html',
                controller: 'organizationCtrl'
            })
            .when('/organization/new', {
                templateUrl: globalConfig.app.urls.partials+'organization/organization-new.html',
                controller: 'organizationCtrl'
            })
            */
            .when('/widget/hightlight', {
                templateUrl: globalConfig.app.urls.partials+'widget/hightlight.html',
                controller: 'widgetCtrl'
            }).
            when('/widget/app', {
                templateUrl: globalConfig.app.urls.partials+'widget/mobileApp.html',
                controller: 'widgetCtrl'
            }).
            when('/widget/ticketPage', {
                templateUrl: globalConfig.app.urls.partials+'widget/ticketPage.html',
                controller: 'widgetCtrl'
            }).
            when('/widget/calendar', {
                templateUrl: globalConfig.app.urls.partials+'widget/eCalendar.html',
                controller: 'widgetCtrl'
            }).
            when('/schedule/calendar', {
                templateUrl: globalConfig.app.urls.partials+'schedule/schedule-calendar.html',
                controller: 'scheduleCtrl'
            }).
            when('/schedule/list', {
                templateUrl: globalConfig.app.urls.partials+'schedule/schedule-list.html',
                controller: 'scheduleCtrl'
            }).
            when('/schedule/thumbnail', {
                templateUrl: globalConfig.app.urls.partials+'schedule/schedule-thumbnail.html',
                controller: 'scheduleCtrl'
            }).
            when('/schedule/tree', {
                templateUrl: globalConfig.app.urls.partials+'schedule/schedule-tree.html',
                controller: 'scheduleCtrl'
            }).
            when('/search/event', {
                templateUrl: globalConfig.app.urls.partials+'home/searchEvent.html',
                controller: 'scheduleCtrl'
            }).
            when('/search/organization', {
                templateUrl: globalConfig.app.urls.partials+'home/searchOrganization.html',
                controller: 'scheduleCtrl'
            }).
            when('/search/person', {
                templateUrl: globalConfig.app.urls.partials+'home/searchPerson.html',
                controller: 'scheduleCtrl'
            }).
            when('/', {
                templateUrl: globalConfig.app.urls.partials+'home/home.html',
                controller: 'conferenceCtrl'
            }).
            otherwise({
                redirectTo: '/'
            });
    }
]);
