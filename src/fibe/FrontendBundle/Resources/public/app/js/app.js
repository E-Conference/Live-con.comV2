'use strict';

/* sub modules */
angular.module('communityApp', []);
angular.module('organizationApp', []);
angular.module('angularTranslateApp', ['pascalprecht.translate']);
angular.module('authentificationApp',[]);

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
    'organizationApp',
    'pascalprecht.translate',
    'authentificationApp'
]);




// Configuring $translateProvider
liveconApp.config(['$translateProvider', function ($translateProvider) {
    
    // Simply register translation table as object hash
    $translateProvider.translations('en_US',{
        'Home': 'Home',
        'Search_event': 'Search an event',
        'Search_publication': 'Search an publication',
        'Search_person': 'Search a person',
        'Search_organization': 'Search an organization'
    });   

     // Simply register translation table as object hash
    $translateProvider.translations('fr_FR',{
        'Home': 'Accueil',
        'Search_event': 'Rechercher un evenement',
        'Search_publication': 'Rechercher une publication',
        'Search_person': 'Rechercher une personne',
        'Search_organization': 'Rechercher une organization'
    });   

    $translateProvider.preferredLanguage('en_US');
}]);



