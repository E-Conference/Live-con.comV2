/**
 * Authentication module configuration
 * route <--> template <--> controller
 *
 * @type {config}
 */
angular.module('authenticationApp')
  .config(
  ['$routeProvider',
    function ($routeProvider)
    {
      $routeProvider
        .when('/signin', {
          templateUrl: globalConfig.app.modules.authentication.urls.partials + 'signin.html',
          controller: 'signinCtrl'
        })
        .when('/signup', {
          templateUrl: globalConfig.app.modules.authentication.urls.partials + 'signup.html',
          controller: 'signupCtrl'
        })
        .when('/signout', {
          templateUrl: globalConfig.app.modules.authentication.urls.partials + 'signout.html',
          controller: 'signoutCtrl'
        })
        .otherwise({
          redirectTo: '/login'
        });
    }
  ]);