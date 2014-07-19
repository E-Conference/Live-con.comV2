'use strict';

liveconApp.config(['$routeProvider',
    function($routeProvider) {
        $routeProvider.
            when('/dashboard/overview', {
                templateUrl: globalConfig.app.partials+'dashboards/dashboard-overview.html',
                controller: 'dashboardCtrl'
            }).
            when('/dashboard/schedule', {
                templateUrl: globalConfig.app.partials+'dashboards/dashboard-schedule.html',
                controller: 'dashboardCtrl'
            }).
            when('/dashboard/widget', {
                templateUrl: globalConfig.app.partials+'dashboards/dashboard-widget.html',
                controller: 'dashboardCtrl'
            }).
            when('/publications', {
                templateUrl: globalConfig.app.partials+'publication/publication-list.html',
                controller: 'publicationsCtrl'
            }).
            when('/publication/:publicationId', {
                templateUrl: globalConfig.app.partials+'publication/publication-detail.html',
                controller: 'publicationCtrl'
            }).
            when('/speakers', {
                templateUrl: globalConfig.app.partials+'person/persons-list.html',
                controller: 'personsCtrl'
            }).
            when('/speaker/:personId', {
                templateUrl: globalConfig.app.partials+'person/person-detail.html',
                controller: 'personCtrl'
            }).
            when('/organizations', {
                templateUrl: globalConfig.app.partials+'organization/organization-list.html',
                controller: 'organizationsCtrl'
            }).
            when('/organization/show/:organizationId', {
                templateUrl: globalConfig.app.partials+'organization/organization-show.html',
                controller: 'organizationCtrl'
            }).
            when('/organization/edit/:organizationId', {
                templateUrl: globalConfig.app.partials+'organization/organization-edit.html',
                controller: 'organizationCtrl'
            }).
            when('/organization/new', {
                templateUrl: globalConfig.app.partials+'organization/organization-new.html',
                controller: 'organizationCtrl'
            }).
            when('/widget/hightlight', {
                templateUrl: globalConfig.app.partials+'widget/hightlight.html',
                controller: 'widgetCtrl'
            }).
            when('/widget/app', {
                templateUrl: globalConfig.app.partials+'widget/mobileApp.html',
                controller: 'widgetCtrl'
            }).
            when('/widget/ticketPage', {
                templateUrl: globalConfig.app.partials+'widget/ticketPage.html',
                controller: 'widgetCtrl'
            }).
            when('/widget/calendar', {
                templateUrl: globalConfig.app.partials+'widget/eCalendar.html',
                controller: 'widgetCtrl'
            }).
            when('/schedule/calendar', {
                templateUrl: globalConfig.app.partials+'schedule/schedule-calendar.html',
                controller: 'scheduleCtrl'
            }).
            when('/schedule/list', {
                templateUrl: globalConfig.app.partials+'schedule/schedule-list.html',
                controller: 'scheduleCtrl'
            }).
            when('/schedule/thumbnail', {
                templateUrl: globalConfig.app.partials+'schedule/schedule-thumbnail.html',
                controller: 'scheduleCtrl'
            }).
            when('/schedule/tree', {
                templateUrl: globalConfig.app.partials+'schedule/schedule-tree.html',
                controller: 'scheduleCtrl'
            }).
            when('/search/event', {
                templateUrl: globalConfig.app.partials+'home/searchEvent.html',
                controller: 'scheduleCtrl'
            }).
            when('/search/organization', {
                templateUrl: globalConfig.app.partials+'home/searchOrganization.html',
                controller: 'scheduleCtrl'
            }).
            when('/search/person', {
                templateUrl: globalConfig.app.partials+'home/searchPerson.html',
                controller: 'scheduleCtrl'
            }).
            when('/', {
                templateUrl: globalConfig.app.partials+'home/home.html',
                controller: 'conferenceCtrl'
            }).
            otherwise({
                redirectTo: '/'
            });
    }
]);
