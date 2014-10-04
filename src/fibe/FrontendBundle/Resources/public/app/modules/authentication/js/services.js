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
        changepwd: {method: 'POST', url: globalConfig.api.urls.changepwd, isArray: false},
        show: {method: 'GET', isArray: false},
        list: {method: 'GET', url: globalConfig.api.urls.organizations + '.json', params: {}, isArray: true}
      }
    );
  }]);




