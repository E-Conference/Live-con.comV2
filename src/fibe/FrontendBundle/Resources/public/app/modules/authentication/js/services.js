/**
 * User Factory
 *
 * Service calls for following actions :
 * - get
 * - signin
 * - signup
 * - show
 * - list
 *
 * @type {factory}
 */
angular.module('authenticationApp').factory('usersFact', ['$resource',
  function ($resource)
  {
    return $resource(
      globalConfig.api.urls.login,
      {'id': '@id'},
      {
        get: {method: 'GET', params: {}, isArray: false},
        signin: {method: 'POST', params: {}, isArray: false},
        signup: {method: 'POST', url: globalConfig.api.urls.registration, isArray: false},
        confirm: {method: 'POST', url: globalConfig.api.urls.confirm, isArray: false},
        show: {method: 'GET', isArray: false},
        list: {method: 'GET', url: globalConfig.api.urls.organizations + '.json', params: {}, isArray: true}
      }
    );
  }]);

/**
 * Interceptor factory
 *
 * @TODO Florian : Comment
 *
 * @type
 */
angular.module('authenticationApp').factory('globalHttpInterceptor', ['$q', '$rootScope',
  function ($q, $rootScope)
  {
    return {
      'request': function (config)
      {
        return config;
      },
      'response': function (response)
      {
        return response || $q.when(response);
      },

      'responseError': function (rejection)
      {
        if (rejection.status == "401")
        {
          $rootScope.$broadcast('globalHttpInterceptor:401', {});
          $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'You need to signin to have access to this page', type: 'danger'});
        }
        $rootScope.$broadcast('AlertCtrl:addAlert', {code: rejection.status + ' ' + rejection.statusText, type: 'danger'});
        return $q.reject(rejection);
      }
    };
  }]);



