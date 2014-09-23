'use strict';

/**
 * Global directives
 */

/**
 * ng-infinite-scroll - v1.0.0 - 2013-02-23
 *
 * Description :
 * Directive which permit to dinamically load content on a page, as the user scroll down/up
 *
 * @type {directive}
 */
angular.module('liveconApp').directive('infiniteScroll', [
  '$rootScope', '$window', '$timeout', function ($rootScope, $window, $timeout)
  {
    return {
      link: function (scope, elem, attrs)
      {
        var checkWhenEnabled, handler, scrollDistance, scrollEnabled;
        $window = angular.element($window);
        scrollDistance = 0;
        if (attrs.infiniteScrollDistance != null)
        {
          scope.$watch(attrs.infiniteScrollDistance, function (value)
          {
            return scrollDistance = parseInt(value, 10);
          });
        }
        scrollEnabled = true;
        checkWhenEnabled = false;
        if (attrs.infiniteScrollDisabled != null)
        {
          scope.$watch(attrs.infiniteScrollDisabled, function (value)
          {
            scrollEnabled = !value;
            if (scrollEnabled && checkWhenEnabled)
            {
              checkWhenEnabled = false;
              return handler();
            }
          });
        }
        handler = function ()
        {
          var elementBottom, remaining, shouldScroll, windowBottom;
          windowBottom = $window.height() + $window.scrollTop();
          elementBottom = elem.offset().top + elem.height();
          remaining = elementBottom - windowBottom;
          shouldScroll = remaining <= $window.height() * scrollDistance;
          if (shouldScroll && scrollEnabled)
          {
            if ($rootScope.$$phase)
            {
              return scope.$eval(attrs.infiniteScroll);
            }
            else
            {
              return scope.$apply(attrs.infiniteScroll);
            }
          }
          else if (shouldScroll)
          {
            return checkWhenEnabled = true;
          }
        };
        $window.on('scroll', handler);
        scope.$on('$destroy', function ()
        {
          return $window.off('scroll', handler);
        });
        return $timeout((function ()
        {
          if (attrs.infiniteScrollImmediateCheck)
          {
            if (scope.$eval(attrs.infiniteScrollImmediateCheck))
            {
              return handler();
            }
          }
          else
          {
            return handler();
          }
        }), 0);
      }
    };
  }
]).directive('getOrCreate', ['GLOBAL_CONFIG', '$injector', function(GLOBAL_CONFIG, $injector) {
  /**
   * angular directive used to show a form inside a parent form for a collection of global entities such as topics
   *
   * use it like :
   *  <div get-or-create parent-entity="paper" entity="topic" uniq-field="label"></div>
   *
   *
   *
   *    @param parent-entity string   : the name of the parent entity that owns entities
   *    @param entity string          : the name of the entity that belongs to its parent
   *    @param entity uniq-field      : (default='label') a uniq field identifying the object
   *                                            (mustn't be the id because it's not known til persisted server-side)
   */
  return {
    template: '<div ng-include="templateUrl"></div>',
    scope:true,
    link: function(scope, element, attrs) {
      if(!attrs.entity || !attrs.parentEntity)return console.error('missing mandatory field for "getOrCreate" directive (see doc above)');

      var entityLbl           = attrs.entity,
          parentEntityLbl     = attrs.parentEntity,
          uniqField           = attrs.uniqField || 'label',

          entitiesLbl         = entityLbl+'s',
          entityCamelCaseLbl  = entityLbl.charAt(0).toUpperCase() + entityLbl.slice(1),
          entityFact          = $injector.get(entityCamelCaseLbl + 'sFact'),

          limit               = 10
      ;

      scope.templateUrl = GLOBAL_CONFIG.app.modules[entitiesLbl].urls.partials + entitiesLbl + '-select.html';
      //the entity binded with ng-model to the input
      scope.addedEntity = {label:""};
      //available entitiess
      scope.entities = [];
      //the parent resource given by attrs.entity
      scope.resource = scope.$parent[parentEntityLbl];
      if(!scope.resource[entitiesLbl]) scope.resource[entitiesLbl] = [];

      //view label
      scope.entityLbl = entityLbl;
      scope.entitiesLbl = entitiesLbl;
      scope.entityCamelCaseLbl = entityCamelCaseLbl;

      scope.keyup = function($event)
      {
        if($event.target.value == scope.addedEntity[uniqField])
        {
          return;
        }

        if($event.target.value === "")
        {
          scope.entities = [];
          return;
        }

        scope.addedEntity[uniqField] = $event.target.value;

        scope.busy = true;
        entityFact.all({limit: limit, query: scope.addedEntity[uniqField]}, function (data)
        {
          scope.entities = [scope.addedEntity];
          for (var i = 0; i < data.length; i++)
          {
            if(data[i][uniqField] === scope.addedEntity[uniqField] || hasEntity(data[i]))continue;
            scope.entities.push(data[i]);
          }
          scope.busy = false;
        });
      };

      scope.change = function($model)
      {
        if(!$model[uniqField])return;
        if(hasEntity($model))
        {
          scope.$root.$broadcast('AlertCtrl:addAlert', {code: entityCamelCaseLbl + ' already registered', type: 'warning'});
          return;
        }
        scope.resource[entitiesLbl].push({id:$model.id, label:$model[uniqField]});
        $model[uniqField] = "";
        scope.entities = [];
      };

      scope.deleteEntity = function(index, entity)
      {
        scope.resource[entitiesLbl].splice(index, 1);
      };
      var hasEntity = function(entity)
      {
        for(var i in scope.resource[entitiesLbl])
        {
          if(scope.resource[entitiesLbl][i][uniqField] === entity[uniqField])
          {
            return true;
          }
        }
      };
    }
  };
}]);