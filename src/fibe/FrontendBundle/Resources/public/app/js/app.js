'use strict';

/* sub modules */
angular.module('communityApp', []);
angular.module('organizationApp', []);
angular.module('angularTranslateApp', ['pascalprecht.translate']);
angular.module('authenticationApp',['ngCookies']);

/* App Module */
var liveconApp = angular.module('liveconApp', [
    'ngRoute',
    'ngAnimate',
    'ngResource',
    'ngCookies',
    'ui.bootstrap',
    'ngDragDrop',
    'angular-loading-bar',
    'ngCachedResource',
    'liveconControllers',
    'liveconFilters',
    'liveconServices',
    'organizationApp',
    'pascalprecht.translate',
    'authenticationApp',
    'angularMoment'
]);




// Configuring $translateProvider
liveconApp.config(['$translateProvider', function ($translateProvider) {
    
    // Simply register translation table as object hash
    $translateProvider.translations('en_US',{
        'Home': 'Home',
        'Search_event': 'Search an event',
        'Search_publication': 'Search an publication',
        'Search_person': 'Search a person',
        'Search_organization': 'Search an organization',
        'Login_success': 'Welcome to live-con.com',
        'Login_error': 'Bad credentials',
        'signout_success' : 'Thanks for coming, see you soon'
    });   

     // Simply register translation table as object hash
    $translateProvider.translations('fr_FR',{
        'Home': 'Accueil',
        'Search_event': 'Rechercher un evenement',
        'Search_publication': 'Rechercher une publication',
        'Search_person': 'Rechercher une personne',
        'Search_organization': 'Rechercher une organization',
        'Login_success': 'Bienvenue sur live-con.com',
        'Login_error': 'Login impossible',
        'signout_success' : 'Merci d\'utiliser Live-con.com, à bientôt'
    });   

    $translateProvider.preferredLanguage('en_US');
}]);


liveconApp.run(function(amMoment) {
    amMoment.changeLanguage('de');
});