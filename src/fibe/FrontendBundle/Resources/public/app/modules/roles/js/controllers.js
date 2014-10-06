/**
 * Roles controllers
 *
 * Contains controllers for both roles and rolelabels
 */

/**
 * Main roles controller
 *
 * @type {controller}
 */
angular.module('rolesApp').controller('rolesMainCtrl', [function ($scope)
{

}]);

angular.module('roleLabelsApp').controller('roleLabelsMainCtrl', [function ($scope)
{

}]);

/** Roles labels controllers **/

/**
 * List roles labels controller
 *
 * @type {controller}
 */
angular.module('roleLabelsApp').controller('roleLabelsListCtrl', ['$scope', 'GLOBAL_CONFIG', 'createDialog', '$rootScope', 'roleLabelsFact', '$cachedResource', function ($scope, GLOBAL_CONFIG, createDialogService, $rootScope, roleLabelsFact, $cachedResource)
{
    $scope.GLOBAL_CONFIG = GLOBAL_CONFIG;

    $scope.entities = [];

    $scope.fetch = function(filters, success, error){
        roleLabelsFact.all(filters, success, error);
    }

    $scope.reload = function ()
    {
        $scope.entities.$promise.then(function ()
        {
            console.log('From cache:', $scope.entities);
        });
    }

    $scope.clone = function (roleLabel)
    {
        cloneroleLabel = angular.copy(roleLabel);
        cloneroleLabel.id = null;

        var error = function (response, args)
        {
            $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'Clone not completed', type: 'danger'});
        }

        var success = function (response, args)
        {
            $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'roleLabel saved', type: 'success'});
            $scope.entities.push(response);
        }

        cloneroleLabel.$create({}, success, error);
    }


    $scope.deleteModal = function (index, roleLabel)
    {
        $scope.index = index;

        createDialogService(GLOBAL_CONFIG.app.modules.roleLabels.urls.partials + 'roleLabels-delete.html', {
            id: 'complexDialog',
            title: 'roleLabel deletion',
            backdrop: true,
            controller: 'roleLabelsDeleteCtrl',
            success: {label: 'Ok', fn: function ()
            {
                roleLabelsFact.delete({id: roleLabel.id});
                $scope.entities.splice(index, 1);
            }}
        }, {
            roleLabelModel: roleLabel
        });
    }

}]);

/**
 * New label role controller
 *
 * @type {controller}
 */
angular.module('roleLabelsApp').controller('roleLabelsNewCtrl', [ '$scope', '$rootScope', '$location', 'roleLabelsFact', function ($scope, $rootScope, $location, roleLabelsFact)
{
    $scope.roleLabel = new roleLabelsFact;

    var error = function (response, args)
    {
        $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'the roleLabel has not been created', type: 'danger'});
    }

    var success = function (response, args)
    {
        $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'roleLabel created', type: 'success'});
        $location.path('/roleLabels/list');
    }

    $scope.create = function (form)
    {
        if (form.$valid)
        {
            $scope.roleLabel.$create({}, success, error);
        }
    }
}]);

/**
 * Edit label role controller
 *
 * @type {controller}
 */
angular.module('roleLabelsApp').controller('roleLabelsEditCtrl', [ '$scope', '$rootScope', '$routeParams', '$location', 'roleLabelsFact', function ($scope, $rootScope, $routeParams, $location, roleLabelsFact)
{
    $scope.roleLabel = roleLabelsFact.get({id: $routeParams.roleLabelId});

    var error = function (response, args)
    {
        $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'the roleLabel has not been saved', type: 'danger'});
    }

    var success = function (response, args)
    {
        $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'roleLabel saved', type: 'success'});
        $location.path('/roleLabels/list');
    }

    $scope.update = function (form)
    {
        if (form.$valid)
        {
            $scope.roleLabel.$update({}, success, error);
        }
    }
}]);

/**
 * Show label role controller
 *
 * @type {controller}
 */
angular.module('roleLabelsApp').controller('roleLabelsShowCtrl', [ '$scope', '$routeParams', 'roleLabelsFact', function ($scope, $routeParams, roleLabelsFact)
{
    $scope.roleLabel = roleLabelsFact.get({id: $routeParams.roleLabelId});

}]);

/**
 * Delete label role controller
 *
 * @type {controller}
 */
angular.module('roleLabelsApp').controller('roleLabelsDeleteCtrl', [ '$scope', 'roleLabelModel', function ($scope, roleLabelModel)
{
    $scope.roleLabel = roleLabelModel;
}]);

/** Roles controllers **/

/**
 * List roles controller
 *
 * @type {controller}
 */
angular.module('rolesApp').controller('rolesListCtrl', ['$scope', 'GLOBAL_CONFIG', 'createDialog', '$rootScope', 'rolesFact', '$cachedResource', function ($scope, GLOBAL_CONFIG, createDialogService, $rootScope, rolesFact, $cachedResource)
{
    $scope.GLOBAL_CONFIG = GLOBAL_CONFIG;

    $scope.entities = [];

    $scope.fetch = function(filters, success, error){
        rolesFact.all(filters, success, error);
    }

    $scope.reload = function ()
    {
        $scope.entities.$promise.then(function ()
        {
            console.log('From cache:', $scope.entities);
        });
    }

    $scope.clone = function (role)
    {
        clonerole = angular.copy(role);
        clonerole.id = null;

        var error = function (response, args)
        {
            $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'Clone not completed', type: 'danger'});
        }

        var success = function (response, args)
        {
            $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'role saved', type: 'success'});
            $scope.entities.push(response);
        }

        clonerole.$create({}, success, error);
    }


    $scope.deleteModal = function (index, role)
    {
        $scope.index = index;

        createDialogService(GLOBAL_CONFIG.app.modules.roles.urls.partials + 'roles-delete.html', {
            id: 'complexDialog',
            title: 'role deletion',
            backdrop: true,
            controller: 'rolesDeleteCtrl',
            success: {label: 'Ok', fn: function ()
            {
                rolesFact.delete({id: role.id});
                $scope.entities.splice(index, 1);
            }}
        }, {
            roleModel: role
        });
    }

}]);

/**
 * New role controller
 *
 * @type {controller}
 */
angular.module('rolesApp').controller('rolesNewCtrl', [ '$scope', '$rootScope', '$location', 'rolesFact', function ($scope, $rootScope, $location, rolesFact)
{
    $scope.role = new rolesFact;
    $scope.role.mainEvent = $rootScope.currentConference.id;

    var error = function (response, args)
    {
        $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'the role has not been created', type: 'danger'});
    }

    var success = function (response, args)
    {
        $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'role created', type: 'success'});
        $location.path('/roles/list');
    }

    $scope.create = function (form)
    {
        if (form.$valid)
        {
            $scope.role.$create({}, success, error);
        }
    }
}]);

/**
 * Edit role controller
 *
 * @type {controller}
 */
angular.module('rolesApp').controller('rolesEditCtrl', [ '$scope', '$rootScope', '$routeParams', '$location', 'rolesFact', function ($scope, $rootScope, $routeParams, $location, rolesFact)
{
    $scope.role = rolesFact.get({id: $routeParams.roleId});

    var error = function (response, args)
    {
        $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'the role has not been saved', type: 'danger'});
    }

    var success = function (response, args)
    {
        $rootScope.$broadcast('AlertCtrl:addAlert', {code: 'role saved', type: 'success'});
        $location.path('/roles/list');
    }

    $scope.update = function (form)
    {
        if (form.$valid)
        {
            $scope.role.$update({}, success, error);
        }
    }
}]);

/**
 * Show role controller
 *
 * @type {controller}
 */
angular.module('rolesApp').controller('rolesShowCtrl', [ '$scope', '$routeParams', 'rolesFact', function ($scope, $routeParams, rolesFact)
{
    $scope.role = rolesFact.get({id: $routeParams.roleId});

}]);

/**
 * Delete role controller
 *
 * @type {controller}
 */
angular.module('rolesApp').controller('rolesDeleteCtrl', [ '$scope', 'roleModel', function ($scope, roleModel)
{
    $scope.role = roleModel;
}]);

