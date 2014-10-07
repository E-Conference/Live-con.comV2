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
angular.module('sympozerApp').directive('infiniteScroll', [
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
])



/**
 * angular directive used to show a form inside a parent form for a collection of global entities such as topics
 *
 * use it like :
 *  <div get-or-create="person" parent-entity="paper" parent-field="author" uniq-field="email" new-politic="modal"></div>
 *
 *  the template is loaded dynamicaly like :
 *  GLOBAL_CONFIG.app.modules[entity].urls.partials + entity + '-select.html';
 *
 *
 *    @param get-or-create        : the name of the entity that belongs to its parent
 *    @param parent-entity        : the name of the parent entity that owns entities
 *
 *    @param uniq-field           : (default='label') a unique field identifying the object
 *                                            (mustn't be the id because it's not known til persisted server-side)
 *    @param new-politic          : (default='create') none|modal|create the politic when an unknown entity is added
 *    @param parent-field         : (default=%entity%) the key of the parent entity refering to the entity
 *    @param child-field          : (default=%entity%) the name of the child entity relation to the parent entity
 *    @param single-choice        : (default=false) Does the parent own only one child ?
 *    @param single-choice-child  : (default=false) Does the child own only one parent ?
 */
angular.module('sympozerApp').directive('getOrCreate', ['GLOBAL_CONFIG', 'createDialog', '$injector', function(GLOBAL_CONFIG, createDialogService, $injector) {
    return {
        template: '<div ng-include="templateUrl"></div>',
        scope:true,
        link: function(scope, element, attrs) {
            if(!attrs.getOrCreate || !attrs.parentEntity)
                return console.error('missing mandatory field in "get-or-create" directive (see doc above)');
            if(attrs.newPolitic && ["none","modal","create"].indexOf(attrs.newPolitic)<0)
                return console.error('wrong value for parameter "new-politic" in "getOrCreate" directive (see doc above)');

            var uniqField               = attrs.uniqField || 'label',
                childEntityLbl          = attrs.getOrCreate,
                parentEntityLbl         = attrs.parentEntity,
                singleChoice            = attrs.singlechoice,
                singleChoiceChild       = attrs.singleChoiceChild,
                parentField             = attrs.parentField || (!singleChoice ? getPlural(childEntityLbl) : childEntityLbl),
                childField              = attrs.childField || (!singleChoiceChild ? getPlural(parentEntityLbl) : parentEntityLbl),

                newPolitic              = attrs.newPolitic || "create",

                childEntitiesLbl        = getPlural(childEntityLbl),
                childEntityLblCamelCase = childEntityLbl.charAt(0).toUpperCase() + childEntityLbl.slice(1),
                entityFact              = $injector.get(childEntitiesLbl + 'Fact'),
                formDialogTemplateUrl   = GLOBAL_CONFIG.app.modules[childEntitiesLbl].urls.partials + childEntitiesLbl + '-form.html',

                limit                   = 10,
                resetChoices            = true
                ;

            scope.templateUrl = GLOBAL_CONFIG.app.modules[childEntitiesLbl].urls.partials + childEntitiesLbl + '-select.html';
            //the entity binded with ng-model to the input
            scope.addedEntity = {};
            scope.addedEntity[uniqField] = "";
            //available entities
            scope.entities = [];
            scope.singleChoice = singleChoice;
            scope.parentField = parentField;

            //resolve the parent resource given by attrs.entity. The second test is for an embedded modal
            scope.resource = scope.$parent[parentEntityLbl] || scope.$parent.$parent.$parent.$entity;
            if(!scope.resource)
                return console.error('Could not have resolved scope of entity' + parentEntityLbl);


            if(!scope.resource[parentField])
            {
                if(!singleChoice)
                {
                    scope.resource[parentField] = [];
                }
                else
                {
                    scope.resource[parentField] = {};
                }
            }

            /**
             * fired when the keyboard is hit
             * @param $event
             */
            scope.keyup = function($event)
            {
                if($event.target.value == scope.addedEntity[uniqField])
                {
                    return;
                }

                var query = scope.addedEntity[uniqField] = $event.target.value;

                if($event.target.value === "")
                {
                    return;
                }

                scope.busy = true;
                resetChoices = true;
                //closure to copy by value
                (function(query) {
                  entityFact.all({limit: limit, query: query}, function(data){
                    addChoices(data,query);
                  });
                })(query);

                (function(query) {
                  console.log("get by conference");
                  if(entityFact.allByConference){
                    entityFact.allByConference({limit: limit, query: query}, function(data){
                      addChoices(data,query);
                    });
                  }
                })(query);

            };

          /**
           * fired when a choice is selected
           * -  auto fill the child's field referring to its parent
           * @param $model
           */
            scope.change = function($model)
            {
                if(!$model[uniqField])
                {
                    return;
                }

                var newEntity = new entityFact($model);
                if ($model.id)
                {
                    addChildEntity(newEntity);
                } else
                {
                    switch (newPolitic)
                    {
                        case "create":
                            //Creation of the new entity
                            scope.busy = true;
                            createChildEntity(newEntity);

                        break;

                        case "modal":

                            if(singleChoiceChild){
                                $model[childField] = scope.resource;
                            }else{
                                $model[childField] = [];
                                $model[childField].push(scope.resource);
                            }
                            var successFn = function()
                            {
                                createChildEntity(newEntity);
                            };

                            var dialogCtrlArgs = {
                                scope : {
                                  $entityLbl: childEntityLbl,
                                  formId: scope.$entityLbl + "-form",
                                  $entity: newEntity,
                                },
                                formDialogTemplateUrl: formDialogTemplateUrl
                            };
                            dialogCtrlArgs.scope[childEntityLbl] = newEntity;
                            var dialogOptions = {
                                id: 'complexDialog',
                                title: childEntityLblCamelCase + ' creation',
                                backdrop: true,
                                controller: 'genericDialogCtrl',
                                success: {label: 'Ok', fn: successFn},
                                cancel: {label: 'Cancel', fn: function ()
                                {
                                    console.log("cancelled", newEntity);
                                }}
                            };
                            createDialogService(GLOBAL_CONFIG.app.urls.partials+'layout/generic-dialog.html', dialogOptions, dialogCtrlArgs);
                        break;

                    }
                }
                $model[uniqField] = "";
                scope.entities = [];
            };

            scope.deleteEntity = function(index, entity)
            {
              if(!singleChoice)
              {
                scope.resource[parentField].splice(index, 1);
              }
              else
              {
                scope.resource[parentField] = {};
              }
            };

          /**
           * make the request to post createdEntity and add a link to it from the parent
           * @param createdEntity
           */
            function createChildEntity(createdEntity)
            {

              var success = function (createdEntity)
              {
                scope.busy = false;
                scope.$root.$broadcast('AlertCtrl:addAlert', {code: childEntityLbl + ' created', type: 'success'});
                addChildEntity(createdEntity)
              };

              var error = function (response, args)
              {
                scope.busy = false;
                scope.$root.$broadcast('AlertCtrl:addAlert', {code: 'the ' + childEntityLbl + ' has not been created', type: 'danger'});
              };

              createdEntity.$create({}, success, error);
            }

            function addChildEntity(childEntity)
            {
              console.log("validated", childEntity);
              if(singleChoice) {
                scope.resource[parentField]= childEntity;
              }else{
                scope.resource[parentField].push(childEntity);
              }
            }

          /**
           * add fetch results to the select menu
           * -  prevent duplicates thanks to uniqField
           * -  reset select list if resetChoices = true
           *
           * @param data  results
           * @param q     the original query
           */
            function addChoices(data,q)
            {
                // prevent old request
                if(q != scope.addedEntity[uniqField])
                {
                    return;
                }

                if(resetChoices)
                {
                    scope.entities = [];
                }

                for (var i = 0; i < data.length; i++)
                {

                    if(singleChoice && containsEntity([scope.resource[parentField]],data[i])) {
                        continue;
                    }else if(containsEntity(scope.resource[parentField],data[i])) {
                        continue;
                    }

                    scope.entities.push(data[i]);
                }

                if(newPolitic !== "none"
                  && !containsEntity(scope.entities,scope.addedEntity)
                  && !containsEntity(scope.resource[parentField],scope.addedEntity)
                  && resetChoices)
                {
                  scope.entities.push(scope.addedEntity);
                }

                resetChoices=false;
                scope.busy = false;
            }

            function containsEntity(entities,entity)
            {
                if(entities instanceof Array)
                {
                    for(var i in entities)
                    {
                      if(entities[i][uniqField] === entity[uniqField])
                      {
                        return true;
                      }
                    }
                }else if(entities[uniqField] === entity[uniqField])
                {
                    return true;
                }

                return false;
            }

            function getPlural(childEntityLbl)
            {

                if(childEntityLbl.slice(-1) === 'y')
                {
                    return childEntityLbl.substring(0,childEntityLbl.length - 1) + "ies";
                }
                else
                {
                    return childEntityLbl + "s";
                }

            }
        }
    };
}]);





/**
 * angular directive used to handle infinite scroll, filter and specific query on list of entities
 * use it like :
 *  <div entity-list-handler="person" offset="-20" limit="20" query="""></div>
 *
 *    @param entityListHandler                  : the name of the entity the list has to handle
 *    @param (default : -20) offset             : the starting index of the entity
 *    @param (default : 20) limit               : The number of instance to fetch
 *    @param (default : null) query             : Query filter to add
 *    @param (default : "label") orderBy        : The side of the sort (ascendent : ASC | descendent : DESC
 *    @param (optional) query                   : A string filter
 */
angular.module('sympozerApp').directive('entityListHandler', ['GLOBAL_CONFIG', '$injector', function(GLOBAL_CONFIG, $injector) {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            if(!attrs.entityListHandler)
                return console.error('missing mandatory field in "entity-list-handler" directive (see doc above)');

            var childEntityLbl               = attrs.entityListHandler,
                entityFact              = $injector.get(childEntityLbl + 'Fact'),
                offsetConfig            = parseInt(attrs.offset) || -20, 
                limitConfig             = parseInt(attrs.limit) || 20
                ;

            //Initialize the options
            scope.query = attrs.query || null,
            scope.orderBy = attrs.orderBy || "label";
            scope.orderSide = attrs.orderSide || "ASC";

            var initialize = function ()
            {
                scope.offset = offsetConfig;
                scope.limit = limitConfig;
                scope.busy = false;
                scope.entities = [];
            }

            initialize();

            //Called when a query is type
            scope.search = function ()
            {
                initialize();
                scope.load(scope.query);
            }

            //Called when an order parameters is changed
            scope.order = function (orderBy, orderSide)
            {
                initialize();
                scope.orderBy = orderBy;
                scope.orderSide = orderSide;
                scope.load();
            }

            //Loading the date according to the parameters (orderBy, orderSide, query, etc...)
            scope.load = function ()
            {
                scope.offset = scope.offset + scope.limit;

                var filters = {offset: scope.offset, limit: scope.limit};
                if (this.busy)
                {
                    return;
                }
                if (scope.query)
                {
                    filters.query = scope.query;
                }
                if (scope.orderBy)
                {
                    filters["order[" + scope.orderBy + "]"] = scope.orderSide;
                }

                scope.busy = true;
                scope.fetch(filters,  function (data)
                {
                    var items = data;

                    for (var i = 0; i < items.length; i++)
                    {
                        scope.entities.push(items[i]);
                    }

                    if (items.length > 1)
                    {
                        scope.busy = false;
                    }
                })
            };

            function getPlural(childEntityLbl)
            {

                if(childEntityLbl.slice(-1) === 'y')
                {
                    return childEntityLbl.substring(0,childEntityLbl.length - 1) + "ies";
                }
                else
                {
                    return childEntityLbl + "s";
                }

            }
        }
    };
}]);