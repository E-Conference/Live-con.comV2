angular.module('authentificationApp')
    .config(
        ['$routeProvider',
            function ($routeProvider) {
                $routeProvider
                    .when('/login', {
                        templateUrl: globalConfig.app.modules.authentification.urls.partials+'login.html',
                        controller: 'loginCtrl'
                    })
                    .when('/register', {
                        templateUrl: globalConfig.app.modules.authentification.urls.partials+'register.html',
                        controller: 'registerCtrl'
                    })
                    .otherwise({
                        redirectTo: '/login'
                    });
            }
        ]);