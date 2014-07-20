'use strict';

/* sub modules */
angular.module('communityApp', []);
angular.module('organizationApp', []);

/* App Module */
var liveconApp = angular.module('liveconApp', [
    'ngRoute',
    'ngAnimate',
    'ngResource',
    'ui.bootstrap',
    'ngDragDrop',
    'angular-loading-bar',
    'liveconControllers',
    'liveconFilters',
    'liveconServices',
    'organizationApp'
]);


