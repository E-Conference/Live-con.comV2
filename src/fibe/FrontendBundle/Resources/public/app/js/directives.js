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
 *    @param uniq-field           : (default='label') a unique field identifying the object
 *                                            (mustn't be the id because it's not known til persisted server-side)
 *    @param parent-field         : (default=%entity%) the key of the parent entity refering to the entity
 *    @param child-field         : (default=%entity%) the key of the child entity refering to the parent entity
 *    @param new-politic          : (default='create') none|modal|create the politic when an unknown entity is added
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

            var entityLbl               = attrs.getOrCreate,
                parentEntityLbl         = attrs.parentEntity,
                uniqField               = attrs.uniqField || 'label',
                singleChoice            = attrs.singlechoice || null,
                parentField             = attrs.parentField || entityLbl,
                childField              = attrs.childField || null,

                newPolitic              = attrs.newPolitic || "create",

                entitiesLbl             = getPlural(entityLbl),
                entityCamelCaseLbl      = entityLbl.charAt(0).toUpperCase() + entityLbl.slice(1),
                entityFact              = $injector.get(entitiesLbl + 'Fact'),
                dialogTemplateUrl       = GLOBAL_CONFIG.app.urls.partials+'layout/dialog-new-entity-form.html',
                formDialogTemplateUrl   = GLOBAL_CONFIG.app.modules[entitiesLbl].urls.partials + entitiesLbl + '-form.html',

                limit                   = 10
                ;

            scope.templateUrl = GLOBAL_CONFIG.app.modules[entitiesLbl].urls.partials + entitiesLbl + '-select.html';
            //the entity binded with ng-model to the input
            scope.addedEntity = {};
            scope.addedEntity[uniqField] = "";
            //available entities
            scope.entities = [];
            scope.singleChoice = singleChoice;
            //the parent resource given by attrs.entity
            scope.resource = scope.$parent[parentEntityLbl];

            scope.parentField = parentField = !singleChoice ? getPlural(parentField) : parentField;

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

            scope.keyup = function($event)
            {
                if($event.target.value == scope.addedEntity[uniqField])
                {
                    return;
                }

                scope.addedEntity[uniqField] = $event.target.value;

                if($event.target.value === "")
                {
                    return;
                }

                scope.busy = true;
                entityFact.all({limit: limit, query: scope.addedEntity[uniqField]}, function (data)
                {
                    scope.entities = [];

                    for (var i = 0; i < data.length; i++)
                    {

                        if(singleChoice && containsEntity([scope.resource[parentField]],data[i])) {
                            continue;
                        }else if(containsEntity(scope.resource[parentField],data[i])) {
                            continue;
                        }

                        scope.entities.push(data[i]);
                    }

                    if(newPolitic !== "none" && !containsEntity(scope.entities,scope.addedEntity) && !containsEntity(scope.resource[parentField],scope.addedEntity))
                    {
                        scope.entities.push(scope.addedEntity);
                    }

                    scope.busy = false;
                });
            };

            scope.change = function($model)
            {
                if(!$model[uniqField])
                {
                    return;
                }

                if(childField) {
                    $model[childField] = scope.$parent[parentEntityLbl] || null;
                }

                var newEntity = new entityFact($model);
                if ($model.id)
                {

                    //Check if an array or object is to be added according to the singleChoice parameter
                    if(!singleChoice) {
                        scope.resource[parentField].push(newEntity);
                    }else{
                        scope.resource[parentField]= newEntity;
                    }

                } else
                {
                    switch (newPolitic)
                    {
                        case "create":
                            //Creation of the new entity
                            scope.busy = true;

                            newEntity.$create({}, function(newEntity){
                                if(singleChoice) {
                                    scope.resource[parentField]= newEntity;
                                }else{
                                    scope.resource[parentField].push(newEntity);
                                }
                            }, function(error){
                                scope.busy = false;
                                console.log(error);
                            });

                            break;

                        case "modal":
                            var dialogCtrlArgs = {
                                $entityLbl: entityLbl,
                                $entity: newEntity,
                                $formDialogTemplateUrl: formDialogTemplateUrl
                            };
                            var dialogOptions = {
                                id: 'complexDialog',
                                title: entityCamelCaseLbl + ' creation',
                                backdrop: true,
                                controller: 'dialogNewEntityCtrl',
                                success: {label: 'Ok', fn: function ()
                                {
                                    console.log("validated", newEntity);
                                    if(singleChoice) {
                                        scope.resource[parentField]= newEntity;
                                    }else{
                                        scope.resource[parentField].push(newEntity);
                                    }
                                }},
                                cancel: {label: 'Cancel', fn: function ()
                                {
                                    console.log("cancelled", newEntity);
                                }}
                            };
                            createDialogService(dialogTemplateUrl, dialogOptions, dialogCtrlArgs);
                            break;

                    }
                }
                $model[uniqField] = "";
                scope.entities = [];
            };

            scope.deleteEntity = function(index, entity)
            {
                scope.resource[parentField].splice(index, 1);
            };

            function containsEntity(entities,entity)
            {

                for(var i in entities)
                {

                    if(entities[i][uniqField] === entity[uniqField])
                    {
                        return true;
                    }

                }

                return false;
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

            var entityLbl               = attrs.entityListHandler,
                entityFact              = $injector.get(entityLbl + 'Fact'),
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
                entityFact.all(filters,  function (data)
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