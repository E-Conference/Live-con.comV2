angular.module('communityApp')
    .config(
        ['$routeProvider',
            function ($routeProvider) {
                $routeProvider
                    .when('/modules/gpio/', {
                        redirectTo: '/modules/gpio/showAll'
                    })
                    .when('/modules/gpio/showAll', {
                        templateUrl: 'modules/gpio/views/showAll.html',
                        controller: 'GpioCtrl',
                        from: 'showAll'
                    })
                    .when('/modules/gpio/add', {
                        templateUrl: 'modules/gpio/views/show.html',
                        controller: 'GpioCtrl',
                        from: 'add'
                    })
                    .when('/modules/gpio/edit/:gpioId', {
                        templateUrl: 'modules/gpio/views/edit.html',
                        controller: 'GpioCtrl',
                        from: 'edit'
                    })
                    .when('/modules/gpio/show/:gpioId', {
                        templateUrl: 'modules/gpio/views/show.html',
                        controller: 'GpioCtrl',
                        from: 'show'
                    })
                    .when('/modules/gpio/nawak', {
                        redirectTo: '/modules/gpio/showAll'
                    })
                    .otherwise({
                        redirectTo: '/modules/gpio/showAll'
                    });
            }
        ]);