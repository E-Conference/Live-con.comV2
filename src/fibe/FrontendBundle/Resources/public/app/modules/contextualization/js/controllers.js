
angular.module('contextualizationApp').controller('contextCtrl', ['$scope', '$rootScope', '$routeParams', 'GLOBAL_CONFIG', 'ConferencesFact', '$location',
function ($scope, $rootScope, $routeParams, GLOBAL_CONFIG, conferencesFact, $location) {

    $scope.GLOBAL_CONFIG = GLOBAL_CONFIG;
    $rootScope.currentConference = JSON.parse(localStorage.getItem('currentConference')) || "";

    var changeContext = function(conference){

        if (conference.confId != $rootScope.currentConference.id) {
            $rootScope.currentConference = conferencesFact.get({id: conference.confId});
            $('#collapseMySpace').collapse('hide');
            $('#collapseCommunity').collapse('hide');
            $('#collapseConference').collapse('show');
            localStorage.setItem('currentConference', JSON.stringify(conference));
            $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'Welcome to ' + $rootScope.currentConference.slug, type: 'success'});
        }

    }

    $scope.$on('contextCtrl:changeContext', function(event, conferenceId) { changeContext(conferenceId)});

}]);
