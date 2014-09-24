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
   *  <div get-or-create parent-entity="paper" entity="person" uniq-field="email" parent-field="author"></div>
   *
   *  the template is loaded dynamicaly like :
   *  GLOBAL_CONFIG.app.modules[entity].urls.partials + entity + '-select.html';
   *
   *
   *    @param parent-entity        : the name of the parent entity that owns entities
   *    @param entity string        : the name of the entity that belongs to its parent
   *    @param uniq-field           : (default='label') a unique field identifying the object
   *                                            (mustn't be the id because it's not known til persisted server-side)
   *    @param entity parent-field  : (default=entity) the key of the parent entity refering to the entity
   */
  return {
    template: '<div ng-include="templateUrl"></div>',
    scope:true,
    link: function(scope, element, attrs) {
      if(!attrs.entity || !attrs.parentEntity)return console.error('missing mandatory field for "getOrCreate" directive (see doc above)');

      var entityLbl           = attrs.entity,
          parentEntityLbl     = attrs.parentEntity,
          uniqField           = attrs.uniqField || 'label',
          parentField         = attrs.parentField || entityLbl,

          entitiesLbl         = getPlural(entityLbl),
          entityCamelCaseLbl  = entityLbl.charAt(0).toUpperCase() + entityLbl.slice(1),
          entityFact          = $injector.get(getPlural(entityCamelCaseLbl) + 'Fact'),

          limit               = 10
      ;

      scope.templateUrl = GLOBAL_CONFIG.app.modules[entitiesLbl].urls.partials + entitiesLbl + '-select.html';
      //the entity binded with ng-model to the input
      scope.addedEntity = {};
      scope.addedEntity[uniqField] = "";
      //available entities
      scope.entities = [];
      //the parent resource given by attrs.entity
      scope.resource = scope.$parent[parentEntityLbl];

      scope.parentField = parentField = parentField + 's';

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
          scope.$root.$broadcast('AlertCtrl:addAlert', {code: entityCamelCaseLbl + ' already registered', type: 'info'});
          return;
        }
        if(!scope.resource[parentField])
        {
          scope.resource[parentField] = [];
        }
        var newEntity = {id:$model.id};
        newEntity[uniqField] = $model[uniqField];
        scope.resource[parentField].push(newEntity);
        $model[uniqField] = "";
        scope.entities = [];
      };

      scope.deleteEntity = function(index, entity)
      {
        scope.resource[parentField].splice(index, 1);
      };

      function hasEntity(entity)
      {
        for(var i in scope.resource[parentField])
        {
          if(scope.resource[parentField][i][uniqField] === entity[uniqField])
          {
            return true;
          }
        }
      }

      function getPlural(entityLbl)
      {
        if(entityLbl.slice(-1) === 'y')
        {
          return entityLbl.substring(0,entityLbl.length - 1) + "ies";
        }
        else
        {
          return entityLbl + "s";
        }
      }
    }
  };
}]);