<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/a')) {
            if (0 === strpos($pathinfo, '/api/user/log')) {
                // api_user_login
                if (0 === strpos($pathinfo, '/api/user/login') && preg_match('#^/api/user/login\\.(?P<_format>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_user_login')), array (  '_controller' => 'fibe\\RestBundle\\Controller\\ApiController::loginAction',));
                }

                // api_user_logout
                if (0 === strpos($pathinfo, '/api/user/logout') && preg_match('#^/api/user/logout\\.(?P<_format>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_user_logout')), array (  '_controller' => 'fibe\\RestBundle\\Controller\\ApiController::logoutAction',));
                }

            }

            // fibe_frontend_front_index
            if ($pathinfo === '/angular') {
                return array (  '_controller' => 'fibe\\FrontendBundle\\Controller\\FrontController::indexAction',  '_route' => 'fibe_frontend_front_index',);
            }

        }

        // documentation
        if (0 === strpos($pathinfo, '/documentation') && preg_match('#^/documentation/(?P<anchor>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'documentation')), array (  '_controller' => 'fibe\\DocumentationBundle\\Controller\\DocumentationController::documentationAction',));
        }

        if (0 === strpos($pathinfo, '/admin/conference')) {
            // schedule_conference_show
            if ($pathinfo === '/admin/conference') {
                return array (  '_controller' => 'fibe\\ConferenceBundle\\Controller\\ConferenceController::showAction',  '_route' => 'schedule_conference_show',);
            }

            // schedule_conference_empty
            if (preg_match('#^/admin/conference/(?P<id>[^/]++)/empty$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_conference_empty')), array (  '_controller' => 'fibe\\ConferenceBundle\\Controller\\ConferenceController::emptyAction',));
            }

            // schedule_conference_create
            if ($pathinfo === '/admin/conference/create') {
                return array (  '_controller' => 'fibe\\ConferenceBundle\\Controller\\ConferenceController::createAction',  '_route' => 'schedule_conference_create',);
            }

            // schedule_conference_module
            if ($pathinfo === '/admin/conference/module') {
                return array (  '_controller' => 'fibe\\ConferenceBundle\\Controller\\ConferenceController::moduleAction',  '_route' => 'schedule_conference_module',);
            }

            // schedule_module_update
            if (preg_match('#^/admin/conference(?P<id>[^/]++)/module$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_module_update')), array (  '_controller' => 'fibe\\ConferenceBundle\\Controller\\ConferenceController::updateModuleAction',));
            }

            // schedule_conference_delete
            if (preg_match('#^/admin/conference/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_conference_delete')), array (  '_controller' => 'fibe\\ConferenceBundle\\Controller\\ConferenceController::deleteAction',));
            }

        }

        if (0 === strpos($pathinfo, '/exporter')) {
            // externalization_export_index
            if (rtrim($pathinfo, '/') === '/exporter') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'externalization_export_index');
                }

                return array (  '_controller' => 'fibe\\ConferenceBundle\\Controller\\ExportController::indexAction',  '_route' => 'externalization_export_index',);
            }

            // externalization_export_process
            if ($pathinfo === '/exporter/process') {
                return array (  '_controller' => 'fibe\\ConferenceBundle\\Controller\\ExportController::processAction',  '_route' => 'externalization_export_process',);
            }

        }

        // externalization_import_index
        if (rtrim($pathinfo, '/') === '/importer') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'externalization_import_index');
            }

            return array (  '_controller' => 'fibe\\ConferenceBundle\\Controller\\ImportController::indexAction',  '_route' => 'externalization_import_index',);
        }

        // homePage_index
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'homePage_index');
            }

            return array (  '_controller' => 'fibe\\HomePageBundle\\Controller\\HomePageController::indexAction',  '_route' => 'homePage_index',);
        }

        if (0 === strpos($pathinfo, '/app')) {
            if (0 === strpos($pathinfo, '/apps')) {
                // mobileAppPublic_index
                if (0 === strpos($pathinfo, '/apps/rest') && preg_match('#^/apps/rest/(?P<slug>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'mobileAppPublic_index')), array (  '_controller' => 'fibe\\MobileAppBundle\\Controller\\MobileAppPublicController::indexAction',));
                }

                // mobileAppPublic_sparql_index
                if (preg_match('#^/apps/(?P<slug>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'mobileAppPublic_sparql_index')), array (  '_controller' => 'fibe\\MobileAppBundle\\Controller\\MobileAppPublicController::indexSparqlAction',));
                }

            }

            if (0 === strpos($pathinfo, '/app/settings')) {
                // mobileAppSettings_index
                if (rtrim($pathinfo, '/') === '/app/settings') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'mobileAppSettings_index');
                    }

                    return array (  '_controller' => 'fibe\\MobileAppBundle\\Controller\\MobileAppSettingsController::indexAction',  '_route' => 'mobileAppSettings_index',);
                }

                // mobileAppTheme_update_settings
                if (preg_match('#^/app/settings/(?P<id>[^/]++)/update/setting$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'mobileAppTheme_update_settings')), array (  '_controller' => 'fibe\\MobileAppBundle\\Controller\\MobileAppSettingsController::updateAction',));
                }

            }

            if (0 === strpos($pathinfo, '/app/theme')) {
                // mobileAppTheme_index
                if (rtrim($pathinfo, '/') === '/app/theme') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'mobileAppTheme_index');
                    }

                    return array (  '_controller' => 'fibe\\MobileAppBundle\\Controller\\MobileAppThemeController::indexAction',  '_route' => 'mobileAppTheme_index',);
                }

                // mobileAppTheme_update_style
                if (preg_match('#^/app/theme/(?P<id>[^/]++)/update/style$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'mobileAppTheme_update_style')), array (  '_controller' => 'fibe\\MobileAppBundle\\Controller\\MobileAppThemeController::updateMobileAppAction',));
                }

            }

        }

        if (0 === strpos($pathinfo, '/Dashboard')) {
            // dashboard_index
            if (rtrim($pathinfo, '/') === '/Dashboard') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'dashboard_index');
                }

                return array (  '_controller' => 'fibe\\DashboardBundle\\Controller\\DashboardController::indexAction',  '_route' => 'dashboard_index',);
            }

            // dashboard_enter_conference
            if (preg_match('#^/Dashboard(?P<id>[^/]++)/enter$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'dashboard_enter_conference')), array (  '_controller' => 'fibe\\DashboardBundle\\Controller\\DashboardController::enterConferenceAction',));
            }

        }

        if (0 === strpos($pathinfo, '/schedule')) {
            // idci_exporter_api_homeapi
            if (rtrim($pathinfo, '/') === '/schedule/api/schedule') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'idci_exporter_api_homeapi');
                }

                return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\ApiController::apiAction',  '_route' => 'idci_exporter_api_homeapi',);
            }

            if (0 === strpos($pathinfo, '/schedule/c')) {
                if (0 === strpos($pathinfo, '/schedule/category')) {
                    // schedule_category
                    if (rtrim($pathinfo, '/') === '/schedule/category') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'schedule_category');
                        }

                        return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\CategoryController::indexAction',  '_route' => 'schedule_category',);
                    }

                    // schedule_category_show
                    if (preg_match('#^/schedule/category/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_category_show')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\CategoryController::showAction',));
                    }

                    // schedule_category_new
                    if ($pathinfo === '/schedule/category/new') {
                        return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\CategoryController::newAction',  '_route' => 'schedule_category_new',);
                    }

                    // schedule_category_create
                    if ($pathinfo === '/schedule/category/create') {
                        return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\CategoryController::createAction',  '_route' => 'schedule_category_create',);
                    }

                    // schedule_category_edit
                    if (preg_match('#^/schedule/category/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_category_edit')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\CategoryController::editAction',));
                    }

                    // schedule_category_update
                    if (preg_match('#^/schedule/category/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_schedule_category_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_category_update')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\CategoryController::updateAction',));
                    }
                    not_schedule_category_update:

                    // schedule_category_delete
                    if (preg_match('#^/schedule/category/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                            $allow = array_merge($allow, array('POST', 'DELETE'));
                            goto not_schedule_category_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_category_delete')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\CategoryController::deleteAction',));
                    }
                    not_schedule_category_delete:

                }

                if (0 === strpos($pathinfo, '/schedule/confevent')) {
                    // schedule_confevent
                    if (rtrim($pathinfo, '/') === '/schedule/confevent') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'schedule_confevent');
                        }

                        return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\ConfEventController::indexAction',  '_route' => 'schedule_confevent',);
                    }

                    // schedule_confevent_filter
                    if ($pathinfo === '/schedule/confevent/filter') {
                        return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\ConfEventController::filterAction',  '_route' => 'schedule_confevent_filter',);
                    }

                    // schedule_confevent_create
                    if ($pathinfo === '/schedule/confevent/create') {
                        return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\ConfEventController::createAction',  '_route' => 'schedule_confevent_create',);
                    }

                    // schedule_confevent_new
                    if ($pathinfo === '/schedule/confevent/new') {
                        return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\ConfEventController::newAction',  '_route' => 'schedule_confevent_new',);
                    }

                    // schedule_confevent_show
                    if (preg_match('#^/schedule/confevent/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_confevent_show')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\ConfEventController::showAction',));
                    }

                    // schedule_confevent_edit
                    if (preg_match('#^/schedule/confevent/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_confevent_edit')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\ConfEventController::editAction',));
                    }

                    // schedule_confevent_update
                    if (preg_match('#^/schedule/confevent/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_confevent_update')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\ConfEventController::updateAction',));
                    }

                    // schedule_confevent_delete
                    if (preg_match('#^/schedule/confevent/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('DELETE', 'POST'))) {
                            $allow = array_merge($allow, array('DELETE', 'POST'));
                            goto not_schedule_confevent_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_confevent_delete')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\ConfEventController::deleteAction',));
                    }
                    not_schedule_confevent_delete:

                    // schedule_confevent_addTopic
                    if ($pathinfo === '/schedule/confevent/addTopic') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_schedule_confevent_addTopic;
                        }

                        return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\ConfEventController::addTopicAction',  '_route' => 'schedule_confevent_addTopic',);
                    }
                    not_schedule_confevent_addTopic:

                    // schedule_confevent_deleteTopic
                    if ($pathinfo === '/schedule/confevent/deleteTopic') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_schedule_confevent_deleteTopic;
                        }

                        return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\ConfEventController::deleteTopicAction',  '_route' => 'schedule_confevent_deleteTopic',);
                    }
                    not_schedule_confevent_deleteTopic:

                    // schedule_confevent_addPaper
                    if ($pathinfo === '/schedule/confevent/addPaper') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_schedule_confevent_addPaper;
                        }

                        return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\ConfEventController::addPaperAction',  '_route' => 'schedule_confevent_addPaper',);
                    }
                    not_schedule_confevent_addPaper:

                    // schedule_confevent_deletePaper
                    if ($pathinfo === '/schedule/confevent/deletePaper') {
                        if (!in_array($this->context->getMethod(), array('DELETE', 'POST'))) {
                            $allow = array_merge($allow, array('DELETE', 'POST'));
                            goto not_schedule_confevent_deletePaper;
                        }

                        return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\ConfEventController::deletePaperAction',  '_route' => 'schedule_confevent_deletePaper',);
                    }
                    not_schedule_confevent_deletePaper:

                    // schedule_confevent_addPerson
                    if ($pathinfo === '/schedule/confevent/addPerson') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_schedule_confevent_addPerson;
                        }

                        return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\ConfEventController::addPersonAction',  '_route' => 'schedule_confevent_addPerson',);
                    }
                    not_schedule_confevent_addPerson:

                    // schedule_confevent_deletePerson
                    if ($pathinfo === '/schedule/confevent/deletePerson') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_schedule_confevent_deletePerson;
                        }

                        return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\ConfEventController::deletePersonAction',  '_route' => 'schedule_confevent_deletePerson',);
                    }
                    not_schedule_confevent_deletePerson:

                }

            }

            // schedule_admin_DBimport
            if (rtrim($pathinfo, '/') === '/schedule/admin/link/DBimport') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'schedule_admin_DBimport');
                }

                return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\DBImportController::importAction',  '_route' => 'schedule_admin_DBimport',);
            }

            if (0 === strpos($pathinfo, '/schedule/equipment')) {
                // schedule_equipment_index
                if (rtrim($pathinfo, '/') === '/schedule/equipment') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'schedule_equipment_index');
                    }

                    return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\EquipmentController::indexAction',  '_route' => 'schedule_equipment_index',);
                }

                // schedule_equipment_create
                if ($pathinfo === '/schedule/equipment/create') {
                    return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\EquipmentController::createAction',  '_route' => 'schedule_equipment_create',);
                }

                // schedule_equipment_new
                if ($pathinfo === '/schedule/equipment/new') {
                    return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\EquipmentController::newAction',  '_route' => 'schedule_equipment_new',);
                }

                // schedule_equipment_show
                if (preg_match('#^/schedule/equipment/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_equipment_show')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\EquipmentController::showAction',));
                }

                // schedule_equipment_edit
                if (preg_match('#^/schedule/equipment/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_equipment_edit')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\EquipmentController::editAction',));
                }

                // schedule_equipment_update
                if (preg_match('#^/schedule/equipment/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_equipment_update')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\EquipmentController::updateAction',));
                }

                // schedule_equipment_delete
                if (preg_match('#^/schedule/equipment/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_schedule_equipment_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_equipment_delete')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\EquipmentController::deleteAction',));
                }
                not_schedule_equipment_delete:

            }

            if (0 === strpos($pathinfo, '/schedule/location')) {
                // schedule_location
                if (rtrim($pathinfo, '/') === '/schedule/location') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'schedule_location');
                    }

                    return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\LocationController::indexAction',  '_route' => 'schedule_location',);
                }

                // schedule_location_filter
                if ($pathinfo === '/schedule/location/filter') {
                    return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\LocationController::filterAction',  '_route' => 'schedule_location_filter',);
                }

                // schedule_location_show
                if (preg_match('#^/schedule/location/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_location_show')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\LocationController::showAction',));
                }

                // schedule_location_new
                if ($pathinfo === '/schedule/location/new') {
                    return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\LocationController::newAction',  '_route' => 'schedule_location_new',);
                }

                // schedule_location_create
                if ($pathinfo === '/schedule/location/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_schedule_location_create;
                    }

                    return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\LocationController::createAction',  '_route' => 'schedule_location_create',);
                }
                not_schedule_location_create:

                // schedule_location_edit
                if (preg_match('#^/schedule/location/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_location_edit')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\LocationController::editAction',));
                }

                // schedule_location_update
                if (preg_match('#^/schedule/location/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_schedule_location_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_location_update')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\LocationController::updateAction',));
                }
                not_schedule_location_update:

                // schedule_location_delete
                if (preg_match('#^/schedule/location/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_schedule_location_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_location_delete')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\LocationController::deleteAction',));
                }
                not_schedule_location_delete:

            }

            if (0 === strpos($pathinfo, '/schedule/organization')) {
                // schedule_organization_index
                if (rtrim($pathinfo, '/') === '/schedule/organization') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_schedule_organization_index;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'schedule_organization_index');
                    }

                    return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\OrganizationController::indexAction',  '_route' => 'schedule_organization_index',);
                }
                not_schedule_organization_index:

                // schedule_organization_filter
                if ($pathinfo === '/schedule/organization/filter') {
                    return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\OrganizationController::filterAction',  '_route' => 'schedule_organization_filter',);
                }

                // schedule_organization_create
                if ($pathinfo === '/schedule/organization/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_schedule_organization_create;
                    }

                    return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\OrganizationController::createAction',  '_route' => 'schedule_organization_create',);
                }
                not_schedule_organization_create:

                // schedule_organization_new
                if ($pathinfo === '/schedule/organization/new') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_schedule_organization_new;
                    }

                    return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\OrganizationController::newAction',  '_route' => 'schedule_organization_new',);
                }
                not_schedule_organization_new:

                // schedule_organization_show
                if (preg_match('#^/schedule/organization/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_schedule_organization_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_organization_show')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\OrganizationController::showAction',));
                }
                not_schedule_organization_show:

                // schedule_organization_edit
                if (preg_match('#^/schedule/organization/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_schedule_organization_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_organization_edit')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\OrganizationController::editAction',));
                }
                not_schedule_organization_edit:

                // schedule_organization_update
                if (preg_match('#^/schedule/organization/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_schedule_organization_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_organization_update')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\OrganizationController::updateAction',));
                }
                not_schedule_organization_update:

                // schedule_organization_delete
                if (preg_match('#^/schedule/organization/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_schedule_organization_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_organization_delete')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\OrganizationController::deleteAction',));
                }
                not_schedule_organization_delete:

            }

            if (0 === strpos($pathinfo, '/schedule/p')) {
                if (0 === strpos($pathinfo, '/schedule/paper')) {
                    // schedule_paper
                    if (rtrim($pathinfo, '/') === '/schedule/paper') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'schedule_paper');
                        }

                        return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\PaperController::indexAction',  '_route' => 'schedule_paper',);
                    }

                    // schedule_paper_filter
                    if ($pathinfo === '/schedule/paper/filter') {
                        return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\PaperController::filterAction',  '_route' => 'schedule_paper_filter',);
                    }

                    // schedule_paper_create
                    if ($pathinfo === '/schedule/paper/create') {
                        return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\PaperController::createAction',  '_route' => 'schedule_paper_create',);
                    }

                    // schedule_paper_new
                    if ($pathinfo === '/schedule/paper/new') {
                        return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\PaperController::newAction',  '_route' => 'schedule_paper_new',);
                    }

                    // schedule_paper_show
                    if (preg_match('#^/schedule/paper/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_paper_show')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\PaperController::showAction',));
                    }

                    // schedule_paper_edit
                    if (preg_match('#^/schedule/paper/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_paper_edit')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\PaperController::editAction',));
                    }

                    // schedule_paper_update
                    if (preg_match('#^/schedule/paper/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_paper_update')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\PaperController::updateAction',));
                    }

                    // schedule_paper_delete
                    if (preg_match('#^/schedule/paper/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                            $allow = array_merge($allow, array('POST', 'DELETE'));
                            goto not_schedule_paper_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_paper_delete')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\PaperController::deleteAction',));
                    }
                    not_schedule_paper_delete:

                }

                if (0 === strpos($pathinfo, '/schedule/person')) {
                    // schedule_person_index
                    if (rtrim($pathinfo, '/') === '/schedule/person') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'schedule_person_index');
                        }

                        return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\PersonController::indexAction',  '_route' => 'schedule_person_index',);
                    }

                    // schedule_person_filter
                    if ($pathinfo === '/schedule/person/filter') {
                        return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\PersonController::filterAction',  '_route' => 'schedule_person_filter',);
                    }

                    // schedule_person_create
                    if ($pathinfo === '/schedule/person/create') {
                        return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\PersonController::createAction',  '_route' => 'schedule_person_create',);
                    }

                    // schedule_person_new
                    if ($pathinfo === '/schedule/person/new') {
                        return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\PersonController::newAction',  '_route' => 'schedule_person_new',);
                    }

                    // schedule_person_show
                    if (preg_match('#^/schedule/person/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_person_show')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\PersonController::showAction',));
                    }

                    // schedule_person_edit
                    if (preg_match('#^/schedule/person/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_person_edit')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\PersonController::editAction',));
                    }

                    // schedule_person_update
                    if (preg_match('#^/schedule/person/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_person_update')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\PersonController::updateAction',));
                    }

                    // schedule_person_delete
                    if (preg_match('#^/schedule/person/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                            $allow = array_merge($allow, array('POST', 'DELETE'));
                            goto not_schedule_person_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_person_delete')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\PersonController::deleteAction',));
                    }
                    not_schedule_person_delete:

                }

            }

            if (0 === strpos($pathinfo, '/schedule/schedule/roletype')) {
                // schedule_roletype
                if (rtrim($pathinfo, '/') === '/schedule/schedule/roletype') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_schedule_roletype;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'schedule_roletype');
                    }

                    return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\RoleTypeController::indexAction',  '_route' => 'schedule_roletype',);
                }
                not_schedule_roletype:

                // schedule_roletype_create
                if ($pathinfo === '/schedule/schedule/roletype/') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_schedule_roletype_create;
                    }

                    return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\RoleTypeController::createAction',  '_route' => 'schedule_roletype_create',);
                }
                not_schedule_roletype_create:

                // schedule_roletype_new
                if ($pathinfo === '/schedule/schedule/roletype/new') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_schedule_roletype_new;
                    }

                    return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\RoleTypeController::newAction',  '_route' => 'schedule_roletype_new',);
                }
                not_schedule_roletype_new:

                // schedule_roletype_show
                if (preg_match('#^/schedule/schedule/roletype/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_schedule_roletype_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_roletype_show')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\RoleTypeController::showAction',));
                }
                not_schedule_roletype_show:

                // schedule_roletype_edit
                if (preg_match('#^/schedule/schedule/roletype/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_schedule_roletype_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_roletype_edit')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\RoleTypeController::editAction',));
                }
                not_schedule_roletype_edit:

                // schedule_roletype_update
                if (preg_match('#^/schedule/schedule/roletype/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_schedule_roletype_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_roletype_update')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\RoleTypeController::updateAction',));
                }
                not_schedule_roletype_update:

                // schedule_roletype_delete
                if (preg_match('#^/schedule/schedule/roletype/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_schedule_roletype_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_roletype_delete')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\RoleTypeController::deleteAction',));
                }
                not_schedule_roletype_delete:

            }

            // schedule_view
            if (rtrim($pathinfo, '/') === '/schedule') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'schedule_view');
                }

                return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\ScheduleController::scheduleAction',  '_route' => 'schedule_view',);
            }

            // schedule_view_event_get
            if ($pathinfo === '/schedule/getEvents') {
                return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\ScheduleController::getEventsAction',  '_route' => 'schedule_view_event_get',);
            }

            // schedule_view_event_edit
            if ($pathinfo === '/schedule/editEvents') {
                return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\ScheduleController::scheduleEditAction',  '_route' => 'schedule_view_event_edit',);
            }

            if (0 === strpos($pathinfo, '/schedule/s')) {
                if (0 === strpos($pathinfo, '/schedule/sponsor')) {
                    // schedule_sponsor
                    if (rtrim($pathinfo, '/') === '/schedule/sponsor') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_schedule_sponsor;
                        }

                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'schedule_sponsor');
                        }

                        return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\SponsorController::indexAction',  '_route' => 'schedule_sponsor',);
                    }
                    not_schedule_sponsor:

                    // schedule_sponsor_filter
                    if ($pathinfo === '/schedule/sponsor/filter') {
                        return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\SponsorController::filterAction',  '_route' => 'schedule_sponsor_filter',);
                    }

                    // schedule_sponsor_create
                    if ($pathinfo === '/schedule/sponsor/') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_schedule_sponsor_create;
                        }

                        return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\SponsorController::createAction',  '_route' => 'schedule_sponsor_create',);
                    }
                    not_schedule_sponsor_create:

                    // schedule_sponsor_new
                    if ($pathinfo === '/schedule/sponsor/new') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_schedule_sponsor_new;
                        }

                        return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\SponsorController::newAction',  '_route' => 'schedule_sponsor_new',);
                    }
                    not_schedule_sponsor_new:

                    // schedule_sponsor_show
                    if (preg_match('#^/schedule/sponsor/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_schedule_sponsor_show;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_sponsor_show')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\SponsorController::showAction',));
                    }
                    not_schedule_sponsor_show:

                    // schedule_sponsor_edit
                    if (preg_match('#^/schedule/sponsor/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_schedule_sponsor_edit;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_sponsor_edit')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\SponsorController::editAction',));
                    }
                    not_schedule_sponsor_edit:

                    // schedule_sponsor_update
                    if (preg_match('#^/schedule/sponsor/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'PUT') {
                            $allow[] = 'PUT';
                            goto not_schedule_sponsor_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_sponsor_update')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\SponsorController::updateAction',));
                    }
                    not_schedule_sponsor_update:

                    // schedule_sponsor_delete
                    if (preg_match('#^/schedule/sponsor/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                            $allow = array_merge($allow, array('POST', 'DELETE'));
                            goto not_schedule_sponsor_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_sponsor_delete')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\SponsorController::deleteAction',));
                    }
                    not_schedule_sponsor_delete:

                }

                if (0 === strpos($pathinfo, '/schedule/status')) {
                    // schedule_status
                    if (rtrim($pathinfo, '/') === '/schedule/status') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'schedule_status');
                        }

                        return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\StatusController::indexAction',  '_route' => 'schedule_status',);
                    }

                    // schedule_status_show
                    if (preg_match('#^/schedule/status/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_status_show')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\StatusController::showAction',));
                    }

                    // schedule_status_new
                    if ($pathinfo === '/schedule/status/new') {
                        return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\StatusController::newAction',  '_route' => 'schedule_status_new',);
                    }

                    // schedule_status_create
                    if ($pathinfo === '/schedule/status/create') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_schedule_status_create;
                        }

                        return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\StatusController::createAction',  '_route' => 'schedule_status_create',);
                    }
                    not_schedule_status_create:

                    // schedule_status_edit
                    if (preg_match('#^/schedule/status/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_status_edit')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\StatusController::editAction',));
                    }

                    // schedule_status_update
                    if (preg_match('#^/schedule/status/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_schedule_status_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_status_update')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\StatusController::updateAction',));
                    }
                    not_schedule_status_update:

                    // schedule_status_delete
                    if (preg_match('#^/schedule/status/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_schedule_status_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_status_delete')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\StatusController::deleteAction',));
                    }
                    not_schedule_status_delete:

                }

            }

            if (0 === strpos($pathinfo, '/schedule/topic')) {
                // schedule_topic
                if (rtrim($pathinfo, '/') === '/schedule/topic') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_schedule_topic;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'schedule_topic');
                    }

                    return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\TopicController::indexAction',  '_route' => 'schedule_topic',);
                }
                not_schedule_topic:

                // schedule_topic_filter
                if ($pathinfo === '/schedule/topic/filter') {
                    return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\TopicController::filterAction',  '_route' => 'schedule_topic_filter',);
                }

                // schedule_topic_create
                if ($pathinfo === '/schedule/topic/') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_schedule_topic_create;
                    }

                    return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\TopicController::createAction',  '_route' => 'schedule_topic_create',);
                }
                not_schedule_topic_create:

                // schedule_topic_new
                if ($pathinfo === '/schedule/topic/new') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_schedule_topic_new;
                    }

                    return array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\TopicController::newAction',  '_route' => 'schedule_topic_new',);
                }
                not_schedule_topic_new:

                // schedule_topic_show
                if (preg_match('#^/schedule/topic/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_schedule_topic_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_topic_show')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\TopicController::showAction',));
                }
                not_schedule_topic_show:

                // schedule_topic_edit
                if (preg_match('#^/schedule/topic/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_schedule_topic_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_topic_edit')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\TopicController::editAction',));
                }
                not_schedule_topic_edit:

                // schedule_topic_update
                if (preg_match('#^/schedule/topic/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_schedule_topic_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_topic_update')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\TopicController::updateAction',));
                }
                not_schedule_topic_update:

                // schedule_topic_delete
                if (preg_match('#^/schedule/topic/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_schedule_topic_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_topic_delete')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\TopicController::deleteAction',));
                }
                not_schedule_topic_delete:

            }

            // schedule_xproperty_add
            if (0 === strpos($pathinfo, '/schedule/xproperty') && preg_match('#^/schedule/xproperty/(?P<id>[^/]++)/add$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_xproperty_add')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\XPropertyController::addXPropertyAction',));
            }

        }

        if (0 === strpos($pathinfo, '/data')) {
            // datas_conferences_list
            if ($pathinfo === '/data/conferences') {
                return array (  '_controller' => 'fibe\\DataBundle\\Controller\\DataController::conferencesAction',  '_route' => 'datas_conferences_list',);
            }

            // datas_conferences_filter
            if ($pathinfo === '/data/filter') {
                return array (  '_controller' => 'fibe\\DataBundle\\Controller\\DataController::conferencesFilterAction',  '_route' => 'datas_conferences_filter',);
            }

        }

        // enrich_account
        if (0 === strpos($pathinfo, '/enrich') && preg_match('#^/enrich/(?P<socialService>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'enrich_account')), array (  '_controller' => 'fibe\\SecurityBundle\\Controller\\EnrichAccountController::enrichAccountAction',));
        }

        if (0 === strpos($pathinfo, '/t')) {
            if (0 === strpos($pathinfo, '/team')) {
                // conference_team_index
                if (rtrim($pathinfo, '/') === '/team') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_conference_team_index;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'conference_team_index');
                    }

                    return array (  '_controller' => 'fibe\\SecurityBundle\\Controller\\TeamController::indexAction',  '_route' => 'conference_team_index',);
                }
                not_conference_team_index:

                // conference_team_add
                if ($pathinfo === '/team/add') {
                    return array (  '_controller' => 'fibe\\SecurityBundle\\Controller\\TeamController::addTeamateAction',  '_route' => 'conference_team_add',);
                }

                // conference_team_edit
                if (preg_match('#^/team/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'conference_team_edit')), array (  '_controller' => 'fibe\\SecurityBundle\\Controller\\TeamController::editAction',));
                }

                // conference_teamate_update
                if (preg_match('#^/team/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'conference_teamate_update')), array (  '_controller' => 'fibe\\SecurityBundle\\Controller\\TeamController::updateAction',));
                }

                // conference_team_delete
                if (preg_match('#^/team/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_conference_team_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'conference_team_delete')), array (  '_controller' => 'fibe\\SecurityBundle\\Controller\\TeamController::deleteAction',));
                }
                not_conference_team_delete:

            }

            // fibe_security_twitterapi_api
            if (0 === strpos($pathinfo, '/twitter-api') && preg_match('#^/twitter\\-api/(?P<name>.+)\\.(?P<format>(json|xml))$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'fibe_security_twitterapi_api')), array (  '_controller' => 'fibe\\SecurityBundle\\Controller\\TwitterApiController::apiAction',));
            }

        }

        if (0 === strpos($pathinfo, '/api')) {
            // exporter_api_norewrite
            if ($pathinfo === '/api/query') {
                return array (  'entityReference' => 'null',  '_format' => 'xml',  '_controller' => 'IDCI\\Bundle\\ExporterBundle\\Controller\\ApiController::indexAction',  '_route' => 'exporter_api_norewrite',);
            }

            // exporter_api
            if (preg_match('#^/api/(?P<entityReference>[^/\\.]++)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'exporter_api')), array (  '_format' => 'xml',  '_controller' => 'IDCI\\Bundle\\ExporterBundle\\Controller\\ApiController::indexAction',));
            }

        }

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // login
                if ($pathinfo === '/login') {
                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'login',);
                }

                // login_check
                if ($pathinfo === '/login/login_check') {
                    return array('_route' => 'login_check');
                }

            }

            // logout
            if ($pathinfo === '/logout') {
                return array('_route' => 'logout');
            }

        }

        if (0 === strpos($pathinfo, '/user')) {
            if (0 === strpos($pathinfo, '/user/register')) {
                // fos_user_registration_register
                if (rtrim($pathinfo, '/') === '/user/register') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'fos_user_registration_register');
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'fos_user_registration_register',);
                }

                if (0 === strpos($pathinfo, '/user/register/c')) {
                    // fos_user_registration_check_email
                    if ($pathinfo === '/user/register/check-email') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_fos_user_registration_check_email;
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  '_route' => 'fos_user_registration_check_email',);
                    }
                    not_fos_user_registration_check_email:

                    if (0 === strpos($pathinfo, '/user/register/confirm')) {
                        // fos_user_registration_confirm
                        if (preg_match('#^/user/register/confirm/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirm;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_registration_confirm')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmAction',));
                        }
                        not_fos_user_registration_confirm:

                        // fos_user_registration_confirmed
                        if ($pathinfo === '/user/register/confirmed') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirmed;
                            }

                            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmedAction',  '_route' => 'fos_user_registration_confirmed',);
                        }
                        not_fos_user_registration_confirmed:

                    }

                }

            }

            // fos_user_profile_show
            if (rtrim($pathinfo, '/') === '/user') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_profile_show;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'fos_user_profile_show');
                }

                return array (  '_controller' => 'fibe\\SecurityBundle\\Controller\\ProfileController::showAction',  '_route' => 'fos_user_profile_show',);
            }
            not_fos_user_profile_show:

            // fos_user_profile_edit
            if ($pathinfo === '/user/edit') {
                return array (  '_controller' => 'fibe\\SecurityBundle\\Controller\\ProfileController::editAction',  '_route' => 'fos_user_profile_edit',);
            }

        }

        if (0 === strpos($pathinfo, '/resetting')) {
            // fos_user_resetting_request
            if ($pathinfo === '/resetting/request') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_resetting_request;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  '_route' => 'fos_user_resetting_request',);
            }
            not_fos_user_resetting_request:

            // fos_user_resetting_send_email
            if ($pathinfo === '/resetting/send-email') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_fos_user_resetting_send_email;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  '_route' => 'fos_user_resetting_send_email',);
            }
            not_fos_user_resetting_send_email:

            // fos_user_resetting_check_email
            if ($pathinfo === '/resetting/check-email') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_resetting_check_email;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  '_route' => 'fos_user_resetting_check_email',);
            }
            not_fos_user_resetting_check_email:

            // fos_user_resetting_reset
            if (0 === strpos($pathinfo, '/resetting/reset') && preg_match('#^/resetting/reset/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_fos_user_resetting_reset;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_resetting_reset')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',));
            }
            not_fos_user_resetting_reset:

        }

        // fos_user_change_password
        if ($pathinfo === '/user/profile/change-password') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_fos_user_change_password;
            }

            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_route' => 'fos_user_change_password',);
        }
        not_fos_user_change_password:

        if (0 === strpos($pathinfo, '/login')) {
            // hwi_oauth_connect
            if (rtrim($pathinfo, '/') === '/login') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'hwi_oauth_connect');
                }

                return array (  '_controller' => 'HWI\\Bundle\\OAuthBundle\\Controller\\ConnectController::connectAction',  '_route' => 'hwi_oauth_connect',);
            }

            // hwi_oauth_connect_service
            if (0 === strpos($pathinfo, '/login/service') && preg_match('#^/login/service/(?P<service>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'hwi_oauth_connect_service')), array (  '_controller' => 'HWI\\Bundle\\OAuthBundle\\Controller\\ConnectController::connectServiceAction',));
            }

            // hwi_oauth_connect_registration
            if (0 === strpos($pathinfo, '/login/registration') && preg_match('#^/login/registration/(?P<key>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'hwi_oauth_connect_registration')), array (  '_controller' => 'HWI\\Bundle\\OAuthBundle\\Controller\\ConnectController::registrationAction',));
            }

        }

        // hwi_oauth_service_redirect
        if (0 === strpos($pathinfo, '/connect') && preg_match('#^/connect/(?P<service>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'hwi_oauth_service_redirect')), array (  '_controller' => 'HWI\\Bundle\\OAuthBundle\\Controller\\ConnectController::redirectToServiceAction',));
        }

        if (0 === strpos($pathinfo, '/login/check-')) {
            // google_login
            if ($pathinfo === '/login/check-google') {
                return array('_route' => 'google_login');
            }

            // twitter_login
            if ($pathinfo === '/login/check-twitter') {
                return array('_route' => 'twitter_login');
            }

            // facebook_login
            if ($pathinfo === '/login/check-facebook') {
                return array('_route' => 'facebook_login');
            }

            // linkedin_login
            if ($pathinfo === '/login/check-linkedin') {
                return array('_route' => 'linkedin_login');
            }

        }

        if (0 === strpos($pathinfo, '/apiREST')) {
            if (0 === strpos($pathinfo, '/apiREST/organizations')) {
                // apiREST_get_organization
                if (preg_match('#^/apiREST/organizations/(?P<id>[^/\\.]++)(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_apiREST_get_organization;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'apiREST_get_organization')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\REST\\OrganizationRESTController::getOrganizationAction',  '_format' => NULL,));
                }
                not_apiREST_get_organization:

                // apiREST_get_organizations
                if (preg_match('#^/apiREST/organizations(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_apiREST_get_organizations;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'apiREST_get_organizations')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\REST\\OrganizationRESTController::getOrganizationsAction',  '_format' => NULL,));
                }
                not_apiREST_get_organizations:

                // apiREST_post_organization
                if (preg_match('#^/apiREST/organizations(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_apiREST_post_organization;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'apiREST_post_organization')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\REST\\OrganizationRESTController::postOrganizationAction',  '_format' => NULL,));
                }
                not_apiREST_post_organization:

                // apiREST_put_organization
                if (preg_match('#^/apiREST/organizations/(?P<id>[^/\\.]++)(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_apiREST_put_organization;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'apiREST_put_organization')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\REST\\OrganizationRESTController::putOrganizationAction',  '_format' => NULL,));
                }
                not_apiREST_put_organization:

                // apiREST_delete_organization
                if (preg_match('#^/apiREST/organizations/(?P<id>[^/\\.]++)(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_apiREST_delete_organization;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'apiREST_delete_organization')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\REST\\OrganizationRESTController::deleteOrganizationAction',  '_format' => NULL,));
                }
                not_apiREST_delete_organization:

            }

            // apiREST_get_person
            if (0 === strpos($pathinfo, '/apiREST/people') && preg_match('#^/apiREST/people/(?P<id>[^/\\.]++)(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_apiREST_get_person;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'apiREST_get_person')), array (  '_controller' => 'fibe\\Bundle\\WWWConfBundle\\Controller\\REST\\PersonRESTController::getPersonAction',  '_format' => NULL,));
            }
            not_apiREST_get_person:

        }

        if (0 === strpos($pathinfo, '/_')) {
            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                if (0 === strpos($pathinfo, '/_profiler/i')) {
                    // _profiler_info
                    if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                    }

                    // _profiler_import
                    if ($pathinfo === '/_profiler/import') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:importAction',  '_route' => '_profiler_import',);
                    }

                }

                // _profiler_export
                if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]++)\\.txt$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_export')), array (  '_controller' => 'web_profiler.controller.profiler:exportAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
