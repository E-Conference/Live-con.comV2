/**
 * Topics controllers
 */


/**
 * Main topics controller
 *
 * @type {controller}
 */
angular.module('topicsApp').controller('topicsMainCtrl', [function ($scope)
                                                          {

                                                          }]);

/**
 * List topics by event controller
 *
 * @type {controller}
 */
angular.module('topicsApp').controller('topicsListByEventCtrl', ['$scope', 'GLOBAL_CONFIG', 'createDialog', '$rootScope', 'topicsFact', '$cachedResource', function ($scope, GLOBAL_CONFIG, createDialogService, $rootScope, topicsFact, $cachedResource)
{
    $scope.GLOBAL_CONFIG = GLOBAL_CONFIG;
    $scope.topic = topicsFact.get({idEvent: $routeParams.eventId});
}]);

/**
 * List (all) topics controller
 *
 * @type {controller}
 */
angular.module('topicsApp').controller('topicsListCtrl', ['$scope', 'GLOBAL_CONFIG', 'createDialog', '$rootScope', 'topicsFact', '$cachedResource', function ($scope, GLOBAL_CONFIG, createDialogService, $rootScope, topicsFact, $cachedResource)
{
    $scope.GLOBAL_CONFIG = GLOBAL_CONFIG;

    var offset = -20;
    var limit = 20;
    $scope.busy = false;

    $scope.topics = [];

    $scope.reload = function ()
    {
        // $scope.topics = Topic.list();
        $scope.topics.$promise.then(function ()
        {
            console.log('From cache:', $scope.topics);
        });
        //console.log($scope.topics);
    }

    $scope.clone = function (topic)
    {
        // $scope.topics = Topic.list();

        var cloneTopic = angular.copy(topic);
        delete cloneTopic.id;

        var error = function (response, args)
        {
            $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'Clone not completed', type: 'danger'});
        }

        var success = function (response, args)
        {
            $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'Topic saved', type: 'success'});
            $scope.topics.push(response);
        }

        cloneTopic.$create({}, success, error);
    }


    $scope.deleteModal = function (index, topic)
    {
        $scope.index = index;

        createDialogService(GLOBAL_CONFIG.app.modules.topics.urls.partials + 'topics-delete.html', {
            id        : 'complexDialog',
            title     : 'Topic deletion',
            backdrop  : true,
            controller: 'topicsDeleteCtrl',
            success   : {label: 'Ok', fn: function ()
            {
                topicsFact.delete({id: topic.id});
                $scope.topics.splice(index, 1);
            }}
        }, {
            topicModel: topic
        });
    }


    $scope.load = function (query)
    {
        offset = offset + limit;

        if (query)
        {
            offset = 0;
            limit = 20;
            $scope.busy = false;
        }

        if (this.busy)
        {
            return;
        }

        $scope.busy = true;
        topicsFact.all({offset: offset, limit: limit, query: query}, function (data)
        {
            var items = data;

            if (query)
            {
                $scope.topics = data;
            }
            else
            {
                for (var i = 0; i < items.length; i++)
                {
                    $scope.topics.push(items[i]);
                }
            }

            if (items.length > 1)
            {
                $scope.busy = false;
            }
        })
    };

//    $scope.search = function(query) {
//        Topic.all({offset: 0, limit: 20, query: query}, function (data) {
//            $scope.topics = data;
//        })
//    };

    /*
     var Org = $cachedResource('org', globalConfig.api.urls.topics+'/:topicId.json', {id: "@id"});
     $scope.topics = Org.query();
     $scope.topics.$promise.then(function(data) {
     console.log($scope.topics);
     console.log($scope.topics.length);
     });*/
    //$scope.topics = $cachedResource();
}]);

/**
 * New topic controller
 *
 * @type {controller}
 */
angular.module('topicsApp').controller('topicsNewCtrl', [ '$scope', '$rootScope', '$topic', 'topicsFact', function ($scope, $rootScope, $topic, topicsFact)
{
    $scope.topic = new topicsFact;

    var error = function (response, args)
    {
        $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'the topic has not been created', type: 'danger'});
    }

    var success = function (response, args)
    {
        $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'topic created', type: 'success'});
        $topic.path('/topics/list');
    }

    $scope.create = function (form)
    {
        if (form.$valid)
        {
            $scope.topic.$create({}, success, error);
        }
    }
}]);

/**
 * Edit topic controller
 *
 * @type {controller}
 */
angular.module('topicsApp').controller('topicsEditCtrl', [ '$scope', '$rootScope', '$routeParams', '$topic', 'topicsFact', function ($scope, $rootScope, $routeParams, $topic, topicsFact)
{
    $scope.topic = topicsFact.get({id: $routeParams.topicId});

    var error = function (response, args)
    {
        $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'the topic has not been saved', type: 'danger'});
    }

    var success = function (response, args)
    {
        $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'topic saved', type: 'success'});
        $topic.path('/topics/list');
    }

    $scope.update = function (form)
    {
        if (form.$valid)
        {
            $scope.topic.$update({}, success, error);
        }
    }
}]);

/**
 * Show topic controller
 *
 * @type {controller}
 */
angular.module('topicsApp').controller('topicsShowCtrl', [ '$scope', '$routeParams', 'topicsFact', function ($scope, $routeParams, topicsFact)
{
    $scope.topic = topicsFact.get({id: $routeParams.topicId});

}]);

/**
 * Delete topic controller
 *
 * @type {controller}
 */
angular.module('topicsApp').controller('topicsDeleteCtrl', [ '$scope', 'topicModel', function ($scope, topicModel)
{
    $scope.topic = topicModel;
}]);

