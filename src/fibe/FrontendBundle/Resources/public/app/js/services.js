'use strict';

/**
 * Main services
 *
 * @type {module}
 */
var liveconServices = angular.module('liveconServices', ['ngResource']);

/**
 * Publication factory
 *
 * @type {factory}
 */
liveconServices.factory('publicationFactory', ['$resource',
  function ($resource)
  {
    return $resource('/livecon.com/web/app_dev.php/api/schedule_paper.json?id=:publicationId', {}, {
      query: {method: 'GET', params: {}, isArray: true},
      create: {method: 'GET', params: {}, isArray: true},
      show: {method: 'GET', params: {}, isArray: true},
      list: {method: 'GET', params: {'url': '/livecon.com/web/app_dev.php/api/schedule_paper.json?conference_id=:conferenceId'}, isArray: true}
    });
  }]);

/**
 * Person factory
 *
 * @type {factory}
 */
liveconServices.factory('personFactory', ['$resource',
  function ($resource)
  {
    return $resource('/livecon.com/web/app_dev.php/api/schedule_person.json?id=:personId', {}, {
      query: {method: 'GET', isArray: true},
      create: {method: 'GET', params: {}, isArray: true},
      show: {method: 'GET', params: {}, isArray: true},
      list: {method: 'GET', url: '/livecon.com/web/app_dev.php/api/schedule_person.json?conference_id=:conferenceId', params: {}, isArray: true}
    });
  }]);

/**
 * Conference factory
 *
 * @type {factory}
 */
liveconServices.factory('conferenceFactory', ['$resource',
  function ($resource)
  {
    return $resource('/livecon.com/web/app_dev.php/api/schedule_event.json?id=:conferenceId', {}, {
      query: {method: 'GET', isArray: true},
      create: {method: 'GET', params: {}, isArray: true},
      show: {method: 'GET', params: {}, isArray: true},
      list: {method: 'GET', url: '/livecon.com/web/app_dev.php/api/schedule_event.json?id=:conferenceId', params: {}, isArray: true}
    });
  }]);




