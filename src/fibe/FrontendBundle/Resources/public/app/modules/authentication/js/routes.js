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
        .when('/profile', {
          templateUrl: globalConfig.app.modules.authentication.urls.partials + 'profile.html',
          controller: 'profileCtrl'
        })
        .when('/confirm/:token', {
          templateUrl: globalConfig.app.modules.authentication.urls.partials + 'confirm.html',
          controller: 'confirmCtrl'
        })
        .when('/forgotten_password', {
          templateUrl: globalConfig.app.modules.authentication.urls.partials + 'resetpwdrequest.html',
          controller: 'resetPwdRequestCtrl'
        })
        .when('/reset/:token', {
          templateUrl: globalConfig.app.modules.authentication.urls.partials + 'confirm.html',
          controller: 'resetPwdCtrl'
        })
        .otherwise({
          redirectTo: '/login'
        });
    }
  ]);