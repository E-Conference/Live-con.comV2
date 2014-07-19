<?php

/* fibeWWWConfBundle:Schedule:schedule.html.twig */
class __TwigTemplate_901a0f5e0f36839ec1b9bfd0ffa689968e22eb35b0b1becb32d4b56a1dbeb698 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("fibeWWWConfBundle::base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
            'sideBarPanel' => array($this, 'block_sideBarPanel'),
            'stylesheets_page' => array($this, 'block_stylesheets_page'),
            'javascripts_page' => array($this, 'block_javascripts_page'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "fibeWWWConfBundle::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo "Schedule";
    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        // line 7
        echo "

  ";
        // line 9
        $this->displayBlock('sideBarPanel', $context, $blocks);
        // line 13
        echo "

  <div class=\"content\" id=\"schedule-view\">
    <div id=\"filters\" class=\"row\">

      <div class=\"filter col-sm-4\">
        <select multiple class=\"form-control\" data-res=\"category\" placeholder=\"Filter by categories\"
                data-filter=\"category_ids\">
          ";
        // line 21
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 22
            echo "            <option data-color=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "color"), "html", null, true);
            echo ";\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "name"), "html", null, true);
            echo "</option>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "        </select>
      </div>

      <div class=\"filter col-sm-4\">
        <select multiple class=\"form-control\" data-res=\"location\" placeholder=\"Filter by locations\"
                data-filter=\"location_ids\">
          ";
        // line 30
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["locations"]) ? $context["locations"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["location"]) {
            // line 31
            echo "            <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["location"]) ? $context["location"] : null), "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["location"]) ? $context["location"] : null), "name"), "html", null, true);
            echo "</option>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['location'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "        </select>
      </div>

      <div class=\"filter col-sm-4\">
        <select multiple class=\"form-control\" data-res=\"topic\" placeholder=\"Filter by topics\" data-filter=\"topic_ids\">
          ";
        // line 38
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["topics"]) ? $context["topics"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["topic"]) {
            // line 39
            echo "            <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["topic"]) ? $context["topic"] : null), "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["topic"]) ? $context["topic"] : null), "name"), "html", null, true);
            echo "</option>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['topic'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        echo "        </select>
      </div>

    </div>

    <div class=\"row\">
     <input type=\"text\" id=\"tree-structure-search\">
      <div id=\"tree-structure\" class=\"col-sm-12 col-md-2 col-lg-2\">

      </div>

      <div id=\"calendar-container\" class=\"col-xs-12 col-sm-12 col-md-8 col-lg-8\">
        <div id='calendar' class=\"bordered\"></div>
      </div>

      <div id=\"sidebar-container\" class=\"col-xs-12 col-sm-12 col-md-2 col-lg-2\">
        <div id=\"sidebar-div\" class=\"bordered\">
          <h4>Time scale</h4>
          <input type=\"text\" class=\"slider\" data-slider-id='sliderTimeScale' type=\"number\" data-slider-min=\"5\"
                 data-slider-max=\"120\" data-slider-step=\"5\" data-slider-value=\"30\"/>
          <span id=\"sliderTimeScaleValLabel\">
            <span id=\"sliderTimeScaleVal\">30</span>
            mn
          </span>
          <br/><br/>
          <span class=\"fc-header-space\"></span><button id=\"refetchBtn\" class=\"btn btn-block btn-default\"><span class=\"fa fa-refresh\"></span></button>
          <br/>
        </div>
      </div>
    </div>


    <div id=\"modal-edit-event\" class=\"modal\">
      <div class=\"modal-dialog\">
        <div class=\"modal-content\">
          <div class=\"modal-header\">
            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
            <h3 class=\"modal-title\">Edit event</h3>
          </div>
          <div class=\"modal-body\">
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div id=\"modal-new-event\" class=\"modal\">
      <div class=\"modal-dialog\">
        <div class=\"modal-content\">
          <div class=\"modal-header\">
            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
            <h3 class=\"modal-title\">Event creation</h3>
          </div>
          <form>
            <div class=\"modal-body\">
              <div class=\"input-group input-group-lg\">
                <input name=\"name\" id=\"name\" type=\"text\" class=\"form-control input-lg\" placeholder=\"Give me a name!\">
              </div>
            </div>
            <div class=\"modal-footer\">
              <a class=\"btn btn-default\" data-dismiss=\"modal\">Close</a>
              <button type=\"submit\" class=\"btn btn-primary\">Save changes</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div id=\"modal-set-parent\" class=\"modal\">
      <div class=\"modal-dialog\">
        <div class=\"modal-content\">
          <div class=\"modal-header\">
            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
            <h3 class=\"modal-title\">
            <span class=\"fa-stack fa-lg\">
              <i class=\"fa fa-square-o fa-stack-2x\"></i>
              <i class=\"fa fa-sitemap fa-stack-1x\"></i>
            </span>
              Affect parent
            </h3>
          </div>
          <div class=\"modal-body\">
            Set
            <p class=\"sub-event event-name well\"></p>
            as sub event of
            <p class=\"super-event event-name well\"></p>
            ?
          </div>

          <div class=\"modal-footer row-fluid\">
            <div class=\"col-xs-6\">
              <button class=\"col-sm-6 btn btn-default btn-block no\" data-dismiss=\"modal\"><i class='fa-remove'></i> no
              </button>
            </div>
            <div class=\"col-xs-6\">
              <button class=\"col-sm-6 btn btn-success btn-block yes\" data-dismiss=\"modal\"><i class='fa-ok'></i> ok
              </button>
            </div>
          </div>

        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
  </div>


";
    }

    // line 9
    public function block_sideBarPanel($context, array $blocks = array())
    {
        // line 10
        echo "    ";
        $this->displayParentBlock("sideBarPanel", $context, $blocks);
        echo "

  ";
    }

    // line 159
    public function block_stylesheets_page($context, array $blocks = array())
    {
        // line 160
        echo "  <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibewwwconf/js/fullcalendar/fullcalendar.css"), "html", null, true);
        echo "\" rel='stylesheet'/>
  <link href=\"";
        // line 161
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibewwwconf/js/fullcalendar/fullcalendar.print.css"), "html", null, true);
        echo "\" rel='stylesheet'
        media='print'/>
  <link href=\"";
        // line 163
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibewwwconf/css/fullcalendarAddedUI.css"), "html", null, true);
        echo "\" rel='stylesheet'/>
  <link href=\"";
        // line 164
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibewwwconf/css/jquery.mCustomScrollbar.css"), "html", null, true);
        echo "\" rel='stylesheet'/>
  <link href=\"";
        // line 165
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/slider.css"), "html", null, true);
        echo "\" rel='stylesheet'/>
   <link rel='stylesheet' type='text/css' href=\"";
        // line 166
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibewwwconf/js/treestructure/style.css"), "html", null, true);
        echo "\">
";
    }

    // line 172
    public function block_javascripts_page($context, array $blocks = array())
    {
        // line 173
        echo "  <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibewwwconf/js/treestructure/jstree.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
    <script src=\"";
        // line 174
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibewwwconf/js/treestructure/TreeRenderer.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
  <script src=\"";
        // line 175
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibewwwconf/js/treestructure/jstree.checkbox.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
  <script src=\"";
        // line 176
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibewwwconf/js/treestructure/jstree.search.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
  <script src=\"";
        // line 177
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibewwwconf/js/treestructure/jstree.types.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
  <script src=\"";
        // line 178
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibewwwconf/js/treestructure/jstree.contextmenu.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
  <script src=\"";
        // line 179
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibewwwconf/js/treestructure/jstree.dnd.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
  <script src=\"";
        // line 180
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibewwwconf/js/treestructure/jstree.checkbox.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
  <script type=\"text/javascript\" src=\"";
        // line 181
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery-ui.custom.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 182
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibewwwconf/js/fullcalendar/fullcalendar_res.js"), "html", null, true);
        echo "\"></script>

  <script src=\"";
        // line 184
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibewwwconf/js/fullcalendar/added/filter.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 185
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibewwwconf/js/fullcalendar/added/sidebar.js"), "html", null, true);
        echo "\"></script>

  <script src=\"";
        // line 187
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibewwwconf/js/fullcalendar/added/CalEvent.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 188
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibewwwconf/js/fullcalendar/added/EventManager.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 189
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibewwwconf/js/fullcalendar/added/FullCalendarView.js"), "html", null, true);
        echo "\"></script>

  <script src=\"";
        // line 191
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibewwwconf/js/jquery.mCustomScrollbar.concat.min.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 192
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap-slider.js"), "html", null, true);
        echo "\"></script>

  <script type=\"text/javascript\">
  var Events = {}, // every events hashmap (calendar and sidebar)
//      calendar_events = [], //calendar evnt array
//      calendar_events_indexes = {},  // calendar event indexes
//      mainConfEvent, // the main conf event
//      dragged = null, //the last dragged object
//      \$sidebar, //\$div containing the sidebar
      \$calendar, //\$div containing the calendar
      stopRender = false,
//      fetched = false, // are the event fresh in memory ? if not we need a fetch request
//      firstWeekDay = 1, // avoid first day to be sunday
      firstDay = moment('";
        // line 205
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["currentConf"]) ? $context["currentConf"] : null), "mainConfEvent"), "startAt"), "Y-m-d"), "html", null, true);
        echo "'), //first mainconfevent day
      authorized = ";
        // line 206
        if (((isset($context["authorized"]) ? $context["authorized"] : null) == 1)) {
            echo "true";
        } else {
            echo "false";
        }
        echo ",
      filter, // filter.js
      sidebar, //sidebar.js
      logtime, // global benchmark var
//      startView = \"agendaWeek\",
  //bootstrap modals
      \$modal,
      \$modalNewEvent,
//      \$modalSetParent,
      \$modalBody ,
  //url
      DATA_FEED_URL = \"";
        // line 217
        echo $this->env->getExtension('routing')->getPath("schedule_view_event_get");
        echo "\",
      op = {
        getOrderedUrl: \"";
        // line 219
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("exporter_api", array("entityReference" => "schedule_event", "_format" => "json")), "html", null, true);
        echo "?conference_id=";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentConf"]) ? $context["currentConf"] : null), "id"), "html", null, true);
        echo "\",
        getDatalessUrl: \"";
        // line 220
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("exporter_api", array("entityReference" => "schedule_event", "_format" => "json")), "html", null, true);
        echo "?only_instant=whatever&conference_id=";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentConf"]) ? $context["currentConf"] : null), "id"), "html", null, true);
        echo "\",
        updateUrl: \"";
        // line 221
        echo $this->env->getExtension('routing')->getPath("schedule_view_event_edit");
        echo "\", //event modal form
        quickAddUrl: DATA_FEED_URL + \"?method=add\",
        quickUpdateUrl: DATA_FEED_URL + \"?method=update\",
        quickDeleteUrl: DATA_FEED_URL + \"?method=remove\",
        resFeedURL: \"\",
        data: {} // request parameters
      };

  \$(document).ready(function ()
  {

    //init \$ vars
    \$modal = \$('#modal-edit-event').hide();
    \$modalNewEvent = \$('#modal-new-event').hide().draggable({ handle: \".modal-header\" });
//    \$modalSetParent = \$('#modal-set-parent').hide().draggable({ handle: \".modal-header\" });
    \$modalBody = \$modal.find(\".modal-body\");
    \$calendar = \$('#calendar');
    \$refetchBtn = \$('#refetchBtn');

//    \$sidebar = \$('#external-events');

    var eventManager = new EventManager(),
        fullCalendarView = new FullCalendarView(),
        treeStructure = new TreeRendererView()
    ;
    eventManager.addView(fullCalendarView);
    eventManager.addView(treeStructure);


    eventManager.fetch();

    \$refetchBtn.on(\"click\",function(){
      eventManager.fetch();
    });

    //slider
    \$('.slider').slider().css(\"width\", \"100%\")
      .on('slide', function (slideEvt)
      {
        \$(\"#\" + \$(this).data(\"sliderId\") + \"Val\").text(slideEvt.value);
      })
      .on('slideStop', function (slideEvt)
      {
        \$('#calendar').fullCalendar('setOptions', {'slotMinutes': slideEvt.value});
      });
    //requires changes made by christian on https://code.google.com/p/fullcalendar/issues/detail?id=293&can=4
    // TO REPRODUCE WHEN FULLCALENDAR.JS IS UPDATED
    //    original post is :
    /*
     #19 cristian...@gmail.com
     I made some changes on the plugin and now I can change minTime and maxTime dynamically. I think that it works for the other options too.

     I simply changed the \"changeView\" function to support a \"force_reload\" parameter that, when set to true, recreates the current View with the existent options. Then, I made a function called setOptions that simply has this code:

     function setOptions(new_options) {
     \$.extend(options, new_options);
     var viewName=currentView.name;
     changeView(viewName,true);
     }

     I hope this can help someone in need =)
     Jan 25, 2012 #20 cristian...@gmail.com
     I forgot to specify the changes made on \"changeView\"...
     Here are the important lines:

     function changeView(newViewName,force_reload) {
     [+]if (force_reload || !currentView || newViewName != currentView.name) {
     ....
     content.css('overflow', 'hidden');

     currentView = viewInstances[newViewName];
     [+]if (force_reload)
     [+]currentView.element.remove();
     [+]if (currentView && !force_reload) {
     currentView.element.show();
     }else{
     currentView = viewInstances[newViewName] = new fcViews[newViewName](
     ....

     The \"[+]\" signals indicate changes or additions.

     */


    /*-----------------------------------------------------------------------------------------------------*/
    /*------------------------------------- fullcalendar options ------------------------------------------*/
    /*-----------------------------------------------------------------------------------------------------*/
    /*calendarOption = {
      header: {
        left: 'prev,next',
        center: 'title',
        right: 'month,agendaWeek,agendaDay' // computed in resource view
      },
      aspectRatio: 1.6,
      firstDay: firstWeekDay,
      year: firstDay.year(),
      month: firstDay.month(),
      date: firstDay.date(),
      events: EventCollection.events, //fetch event
      eventAfterAllRender: EventCollection.eventAfterAllRender,
      eventCalculateWidth: EventCollection.eventCalculateWidth,
      eventAfterRender: EventCollection.eventAfterRender,

      ";
        // line 324
        if (((isset($context["authorized"]) ? $context["authorized"] : null) == 1)) {
            echo " //editing function that require schedule flag
      editable: true,
      eventClick: EventCollection.eventClick,
      selectable: true,
      selectHelper: true,
      select: EventCollection.eventCreate,
      //resizing events in calendar (only the end date is changed)
      eventResize: EventCollection.eventResize,

      droppable: true, // allows things to be dropped into the calendar
      drop: EventCollection.eventSidebarDrop,

      eventDragStart: EventCollection.eventDragStart,
      eventDragStop: EventCollection.eventDragStop,
      eventDrop: EventCollection.eventDrop,
      ";
        }
        // line 340
        echo "    };*/

    /*----------------------------------------------------------------------------------------*/
    /*------------------------------------- resources ----------------------------------------*/
    /*----------------------------------------------------------------------------------------*/
    /*var resConfig = {
      location: {
        url: \"";
        // line 347
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("exporter_api", array("entityReference" => "schedule_location", "_format" => "json")), "html", null, true);
        echo "?conference_id=";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentConf"]) ? $context["currentConf"] : null), "id"), "html", null, true);
        echo "\",
        parse: function (e)
        {
          if (e.location && e.location.id != \"\")
          {
            return e.location.id;
          }
          else
          {
            return \"other\";
          }
        }
      }, category: {
        url: \"";
        // line 360
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("exporter_api", array("entityReference" => "schedule_category", "_format" => "json")), "html", null, true);
        echo "?conference_id=";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentConf"]) ? $context["currentConf"] : null), "id"), "html", null, true);
        echo "\",
        parse: function (e)
        {
          console.log(e)
          if (e.categories && e.categories.length < 1)
          {
            return \"other\";
          }
          for (var i in e.categories)
          {
            var c = e.categories[i];
            rtn.push(c.id);
          }
          return rtn;
        }
      }
    };
    currentRes = \"location\";
    var res,
      allRes,
      unknownRes = {
        name: \"Not defined\",
        id: \"0\"
      };


    function fetchAllResources(callback)
    {
      \$.ajax({
        url: resConfig[currentRes].url,
        data: op.data,
        success: function (events)
        {
          events.push(unknownRes);

          allRes = events.slice(0);
          res = events;
          if (callback)
          {
            callback(res);
          }
        }
      });
    }

    function filterResourcesByIds(ids)
    {
      if (!ids || ids.length == 0)
      {
        return \$calendar.fullCalendar('setResources', allRes);
      }
      var filteredRes = [];
      for (var i = 0; i < res.length; i++)
      {
        if (\$.inArray(res[i].id, ids) !== -1)
        {
          filteredRes.push(res[i])
        }
      }
      filteredRes.push(unknownRes)
      \$calendar.fullCalendar('setResources', filteredRes);
    }

    calendarOption.header.right = \"month agendaWeek agendaDay,resourceDay\";
    calendarOption[\"buttonText\"] = {resourceDay: currentRes};

    fetchAllResources(function ()
    {
      calendarOption[\"eventResources\"] = res;
      //launch calendar
      \$calendar.fullCalendar(calendarOption);
      \$calendar.fullCalendar('changeView', startView);

      //additional schedule controls : first day and refresh
      \$('.fc-header-left')
          .append(
          \$('<span class=\"fc-header-space\"></span><button class=\"fc-button fc-state-default fc-corner-left fc-corner-right\"> First day</button>')
              .click(function (e)
              {
                \$calendar.fullCalendar('gotoDate', firstDay.year(), firstDay.month(), firstDay.date())
                EventCollection.refetchEvents();
              })
      ).append(
          \$('<span class=\"fc-header-space\"></span><button class=\"fc-button fc-state-default fc-corner-left fc-corner-right\"><span class=\"fa fa-refresh\"></span></button>')
              .click(function (e)
              {
                EventCollection.resetEvents();
              })
      );
    });*/


    /*----------------------------------------------------------------------------------------*/
    /*------------------------------------- end resources ------------------------------------*/
    /*----------------------------------------------------------------------------------------*/



    /*-------------------------------------------------------------------------------------------------*/
    /*------------------------------------- initialize sidebar ----------------------------------------*/
    /*-------------------------------------------------------------------------------------------------*/

    /*sidebar = new Sidebar(!authorized);
    sidebar.populate(op.getDatalessUrl);

    ";
        // line 465
        if (((isset($context["authorized"]) ? $context["authorized"] : null) == 1)) {
            // line 466
            echo "    //dropped from calendar to sidebar;
    \$(sidebar).on(\"dropped\", function (ev, calEvent)
    {
      console.log(\"dropped\", calEvent)
      Events[calEvent.id].dropFromSidebar();
    }).on(\"drag\", function (ev, event)
    {
//      event.dragChildren();
    });*/
    ";
        }
        // line 476
        echo "
    /*-----------------------------------------------------------------------------------------------------*/
    /*------------------------------------- initialize filters --------------------------------------------*/
    /*-----------------------------------------------------------------------------------------------------*/


    //init filters
    /*filter = new initFilter(op.getOrderedUrl);
    \$(filter).on(\"change\", function (ev, key, val, res)
    {
      bootstrapAlert(\"info\", \"event request sent\", \"\", \"<i class='fa-2x fa fa-spinner fa-spin'></i>\");
      if (res == currentRes)
      {push
        filterResourcesByIds(val);
      }
    }).on(\"changed\", function (ev, data, ids)
    {
      bootstrapAlert(\"success\", ids.length + \" events have been well fetched\");
      EventCollection.filterIds(ids);
    });*/

  });//end \$document.ready()
  </script>

<!-- *************************************************   TREE STRUCTURE ***************************************************-->

";
    }

    public function getTemplateName()
    {
        return "fibeWWWConfBundle:Schedule:schedule.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  681 => 476,  669 => 466,  667 => 465,  557 => 360,  539 => 347,  530 => 340,  511 => 324,  405 => 221,  399 => 220,  393 => 219,  388 => 217,  370 => 206,  366 => 205,  350 => 192,  346 => 191,  341 => 189,  337 => 188,  333 => 187,  328 => 185,  324 => 184,  319 => 182,  315 => 181,  311 => 180,  307 => 179,  303 => 178,  299 => 177,  295 => 176,  291 => 175,  287 => 174,  282 => 173,  279 => 172,  273 => 166,  269 => 165,  265 => 164,  261 => 163,  256 => 161,  251 => 160,  248 => 159,  240 => 10,  237 => 9,  119 => 41,  108 => 39,  104 => 38,  97 => 33,  86 => 31,  82 => 30,  74 => 24,  61 => 22,  57 => 21,  47 => 13,  45 => 9,  41 => 7,  38 => 6,  32 => 4,);
    }
}
