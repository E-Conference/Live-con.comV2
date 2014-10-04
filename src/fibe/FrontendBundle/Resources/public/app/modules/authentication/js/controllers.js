/**
 * Authentication controllers
 */

/**
 * Sign in controller
 *
 * @type {controller}
 */
angular.module('authenticationApp').controller('signinCtrl', ['$scope', '$rootScope', '$routeParams', 'GLOBAL_CONFIG', 'usersFact', '$location',
  function ($scope, $rootScope, $routeParams, GLOBAL_CONFIG, usersFact, $location)
  {

    $scope.GLOBAL_CONFIG = GLOBAL_CONFIG;
    $rootScope.currentUser = JSON.parse(localStorage.getItem('currentUser'));
    var error = function (response, args)
    {
      $scope.busy = false;
      $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'Login_error', type: 'danger'});
    }
    var success = function (response, args)
    {
      $scope.busy = false;
      $scope.user = response;
      $rootScope.currentUser = response;
      localStorage.setItem('currentUser', JSON.stringify(response));
      $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'Login_success', type: 'success'});
      $location.path('/');
    }
    $scope.signinAction = function (user)
    {
      $scope.busy = true;
      usersFact.signin({}, {"_username": $scope.user.username, "_password": $scope.user.password}, success, error);
    }
  }]);

/**
 * Sign up controller
 *
 * @type {controller}
 */
angular.module('authenticationApp').controller('signupCtrl', ['$scope', '$rootScope', '$location', '$routeParams', 'GLOBAL_CONFIG', 'usersFact',
  function ($scope, $rootScope, $location, $routeParams, GLOBAL_CONFIG, usersFact)
  {
    $scope.GLOBAL_CONFIG = GLOBAL_CONFIG;

    var error = function (response, args)
    {
      $scope.busy = false;
      $rootScope.$broadcast('AlertCtrl:addAlert', {code: response.data.error, type: 'danger'});
    }
    var success = function (response, args)
    {
      $scope.busy = false;
      $scope.user = response;
      $rootScope.currentUser = response;
      $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'Register_success', type: 'success'});
      $location.path('/');
    }
    $scope.signupAction = function (user)
    {
      $scope.busy = true;
      usersFact.signup({}, {fos_user_registration_form:user}, success, error);
    }

  }]);

/**
 * Sign out controller
 *
 * @type {controller}
 */
angular.module('authenticationApp').controller('signoutCtrl', ['$scope', '$rootScope', '$window', '$routeParams', 'GLOBAL_CONFIG', '$cookieStore', '$location',
  function ($scope, $rootScope, $window, $routeParams, GLOBAL_CONFIG, $cookieStore, $location)
  {
    $scope.GLOBAL_CONFIG = GLOBAL_CONFIG;

    $scope.$on('globalHttpInterceptor:401', $rootScope.logout);

    $rootScope.signout = function ()
    {
      localStorage.removeItem('currentUser');
      $rootScope.currentUser = {};
      $window.history.back();
      $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'signout_success', type: 'success'});
    }
  }]);

/**
 * confirm email controller
 *
 * @type {controller}
 */
angular.module('authenticationApp').controller('changePwdCtrl', [ '$scope', '$routeParams', 'usersFact', '$location',
  function ($scope, $routeParams, usersFact, $location)
  {
    var error = function (response, args)
    {
      $scope.busy = false;
      $scope.$root.$broadcast('AlertCtrl:addAlert', {code: response.data.error, type: 'danger'});
    }

    var success = function (response, args)
    {
      $scope.busy = false;
      $scope.$root.$broadcast('AlertCtrl:addAlert', {code: 'Changepwd_success', type: 'success'});
      $scope.$root.currentUser = response;
      localStorage.setItem('currentUser', JSON.stringify(response));
      $location.path('/persons/show/' + $scope.$root.currentUser.id);
    }

    $scope.changePwdAction = function (changePwdForm)
    {
      $scope.busy = true;
      usersFact.changepwd(changePwdForm, success, error);
    }
  }]);

/**
 * confirm email controller
 *
 * @type {controller}
 */
angular.module('authenticationApp').controller('confirmCtrl', [ '$scope', '$rootScope', '$routeParams', 'usersFact', '$location',
  function ($scope, $rootScope, $routeParams, usersFact, $location)
  {
    var error = function (response, args)
    {
      $scope.busy = false;
      $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'Register_confirm_error', type: 'danger'});
    }

    var success = function (response, args)
    {
      $scope.busy = false;
      //login
      $rootScope.currentUser = response;
      localStorage.setItem('currentUser', JSON.stringify(response));
      $scope.user = response;

      $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'Register_confirm_success', type: 'success'});
      if(!$rootScope.currentUser.random_pwd)$location.path('/persons/show/' + $scope.$root.currentUser.id);
    }

    $scope.busy = true;
    var user = usersFact.confirm({token: $routeParams.token}, success, error);
  }]);

/**
 * reset password request controller
 *
 * @type {controller}
 */
angular.module('authenticationApp').controller('resetPwdRequestCtrl', [ '$scope', '$window', '$routeParams', 'usersFact', '$location',
  function ($scope, $window, $routeParams, usersFact, $location)
  {
    var error = function (response, args)
    {
      $scope.busy = false;
      $scope.$root.$broadcast('AlertCtrl:addAlert', {code: response.data.error, type: 'danger'});
    }

    var success = function (response, args)
    {
      $scope.busy = false;
      $scope.$root.$broadcast('AlertCtrl:addAlert', {code: 'ResetPwdRequest_success', type: 'success'});
      $window.history.back();
      $window.history.back();
    }

    $scope.resetPwdRequestAction = function (resetPwdRequestForm)
    {
      if (resetPwdRequestForm.$valid)
      {
        $scope.busy = true;
        usersFact.resetpwdrequest({"username": $scope.user.username}, success, error);
      }
    }
  }]);

/**
 * reset password controller
 *
 * @type {controller}
 */
angular.module('authenticationApp').controller('resetPwdCtrl', [ '$scope', '$routeParams', 'usersFact', '$location',
  function ($scope, $routeParams, usersFact, $location)
  {
    var error = function (response, args)
    {
      $scope.busy = false;
      $scope.$root.$broadcast('AlertCtrl:addAlert', {code: response.data.error, type: 'danger'});
    }

    var success = function (response, args)
    {
      $scope.busy = false;
      $scope.$root.$broadcast('AlertCtrl:addAlert', {code: 'Login_success', type: 'success'});
      $scope.$root.currentUser = response;
      localStorage.setItem('currentUser', JSON.stringify(response));
    }

    $scope.busy = true;
    var user = usersFact.resetpwd({token: $routeParams.token}, success, error);

  }]);

/**
 * confirm email controller
 *
 * @type {controller}
 */
angular.module('authenticationApp').controller('profileCtrl', [ '$scope', '$routeParams', 'usersFact', '$location',
  function ($scope, $routeParams, usersFact, $location)
  {

  }]);

/**
 * Global authentication controller
 *
 * @type {controller}
 */
angular.module('authenticationApp').controller('globalAuthCtrl', ['$scope', '$rootScope', '$routeParams', 'GLOBAL_CONFIG',
  function ($scope, $rootScope, $routeParams, GLOBAL_CONFIG)
  {
    $scope.GLOBAL_CONFIG = GLOBAL_CONFIG;


  }]);