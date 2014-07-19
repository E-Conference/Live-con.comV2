<?php

/* fibeConferenceBundle:Conference:show.html.twig */
class __TwigTemplate_7b9af3cad14cade1acc5339b11edec26f1c6d2ad44352d9ec5325638d6d1c84b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("fibeConferenceBundle::base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'centerPanel' => array($this, 'block_centerPanel'),
            'stylesheets_page' => array($this, 'block_stylesheets_page'),
            'javascripts_page' => array($this, 'block_javascripts_page'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "fibeConferenceBundle::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Edit conference";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 5
    public function block_centerPanel($context, array $blocks = array())
    {
        // line 6
        echo "  ";
        $this->displayParentBlock("centerPanel", $context, $blocks);
        echo "
  <div class=\"page-header col-sm-12 col-md-12 col-lg-12\">
    <div class=\"page-header well\">

      <div class=\"row\">
        <div class=\"col-lg-4\">
          <img src=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("uploads/"), "html", null, true);
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["conference"]) ? $context["conference"] : null), "logoPath"), "html", null, true);
        echo "\" style=\"max-height:100px;max-width:100%;\"/>

          <h1>";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["conference"]) ? $context["conference"] : null), "mainConfEvent"), "summary"), "html", null, true);
        echo "</h1>
          <ul>
            <li> ";
        // line 16
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["conference"]) ? $context["conference"] : null), "events")), "html", null, true);
        echo " events</li>
            <li> ";
        // line 17
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["conference"]) ? $context["conference"] : null), "papers")), "html", null, true);
        echo " papers</li>
            <li> ";
        // line 18
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["conference"]) ? $context["conference"] : null), "locations")), "html", null, true);
        echo " locations</li>
            <li> ";
        // line 19
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["conference"]) ? $context["conference"] : null), "persons")), "html", null, true);
        echo " persons</li>
            <li> ";
        // line 20
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["conference"]) ? $context["conference"] : null), "topics")), "html", null, true);
        echo " topics</li>
            <li> ";
        // line 21
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["conference"]) ? $context["conference"] : null), "organizations")), "html", null, true);
        echo " organizations</li>
            <li> ";
        // line 22
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["conference"]) ? $context["conference"] : null), "confManagers")), "html", null, true);
        echo " confManagers</li>
          </ul>
        </div>
        <div class=\"col-lg-8\">

          <div id=\"map\" style=\"height:300px\"></div>
        </div>
      </div>
      <br/>
      ";
        // line 31
        if ($this->env->getExtension('security')->isGranted("EDIT", $this->getAttribute((isset($context["conference"]) ? $context["conference"] : null), "mainConfEvent"))) {
            // line 32
            echo "        <a id=\"showConfForm\" class=\"btn btn-warning\">
          <i class=\"fa fa-pencil-square-o\"></i> Edit conference
        </a>

        <div id=\"conference-edit\">
          <h3 class=\"text-info\">Conference info </h3>

          <form class=\"input-append\" method=\"POST\" action=\"\" ";
            // line 39
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'enctype');
            echo " >
            ";
            // line 40
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
            echo "
            ";
            // line 41
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
            echo "
            <button type=\"submit\" class=\"btn btn-block btn-success\">
              <i class=\"fa fa-check\"></i>
            </button>

            <div style=\"visibility:hidden;display:none;height:0;\" id=\"hiddenInputs\">";
            // line 46
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
            echo "</div>
          </form>
        </div>
        <!-- #conference-edit -->
      ";
        }
        // line 51
        echo "    </div>
  </div>

  ";
    }

    // line 85
    public function block_stylesheets_page($context, array $blocks = array())
    {
        // line 86
        echo "  <style type=\"text/css\">
    #conference-edit > *
    {
      margin-top: 1.5em;
      margin-bottom: 0.35em;
    }

    #toggleConfNameForm
    {
      margin: 2em 1em 0em 0em;
      float: left;
    }

    #confName
    {
      padding: 1px;
    }
  </style>
  <link rel=\"stylesheet\" href=\"http://cdn.leafletjs.com/leaflet-0.6.4/leaflet.css\"/>
";
    }

    // line 107
    public function block_javascripts_page($context, array $blocks = array())
    {
        // line 108
        echo "  <script src=\"http://cdn.leafletjs.com/leaflet-0.6.4/leaflet.js\"></script>
  <script type=\"text/javascript\">

    /*

     function FormPost(uri,form,callback){
     \$.ajax({
     type: \"POST\",
     url:uri,
     async: false,
     data: form.serialize(),
     success:function(a,b,c) {
     if(callback)callback();
     }
     });
     }
     */
    function initializeMap()
    {
      // set up the map
      map = new L.Map('map');

      // create the tile layer with correct attribution
      var osmUrl = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
      var osmAttrib = 'Map data © OpenStreetMap contributors';
      var osm = new L.TileLayer(osmUrl, {minZoom: 1, maxZoom: 15, attribution: osmAttrib});
      map.addLayer(osm);

      ";
        // line 136
        if (((!twig_test_empty($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["conference"]) ? $context["conference"] : null), "mainConfEvent"), "location"), "latitude"))) && (!twig_test_empty($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["conference"]) ? $context["conference"] : null), "mainConfEvent"), "location"), "longitude"))))) {
            // line 137
            echo "      map.setView(new L.LatLng(";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["conference"]) ? $context["conference"] : null), "mainConfEvent"), "location"), "latitude"), "html", null, true);
            echo ", ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["conference"]) ? $context["conference"] : null), "mainConfEvent"), "location"), "longitude"), "html", null, true);
            echo "), 13);
      marker = L.marker([";
            // line 138
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["conference"]) ? $context["conference"] : null), "mainConfEvent"), "location"), "latitude"), "html", null, true);
            echo ", ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["conference"]) ? $context["conference"] : null), "mainConfEvent"), "location"), "longitude"), "html", null, true);
            echo "]).addTo(map);
      ";
        } else {
            // line 140
            echo "      map.setView(new L.LatLng(40, 10), 1);
      \$.get(\"http://ipinfo.io\", function (response)
      {

        var lat = response.loc.split(\",\")[0];
        var lng = response.loc.split(\",\")[1];
        var latlng = L.latLng(lat, lng);
        map.setView(latlng, 4, {animate: true});
      }, \"jsonp\");
      ";
        }
        // line 150
        echo "    }
    var marker;
    var map;
    \$(document).ready(function ()
    {

      try
      {
        initializeMap();
      } catch (err)
      {
        \$(\"#map\").hide('fast');
        bootstrapAlert(\"warning\", \"Failed to load the map plugin.\");
        console.warn(\"Cannot load Map\")
      }

      /*********       show / hide edit mode          **********/
      \$('#conference-edit').hide();
      // toggle edit form
      function showForm()
      {
        \$('#conference-edit').toggle({duration: 400});
        \$(this).html('<i class=\"icon-arrow-left\" ></i> Hide edit mode');
        \$(this).one(\"click\", hideForm);

        try
        {
          //activate  map
          map.on('click', function (e)
          {
            if (marker)
            {
              map.removeLayer(marker);
            }
            //                      @TODO : TO REMOVE
            console.log(e.latlng);
            marker = new L.marker(e.latlng).addTo(map);
            //UPDATE FIELDS
            \$('#fibe_bundle_wwwconfbundle_wwwconftype_mainConfEvent_location_latitude').val(e.latlng.lat);
            \$('#fibe_bundle_wwwconfbundle_wwwconftype_mainConfEvent_location_longitude').val(e.latlng.lng);
          });
        } catch (err)
        {
          console.warn(\"Map not loaded\")
        }
      }

      function hideForm()
      {
        \$('#conference-edit').toggle({duration: 400});
        \$(this).html('<i class=\"fa fa-pencil-square-o\"></i> Edit conference');
        \$(this).one(\"click\", showForm);

        try
        {
          //deactivate  map
          map.off('click');
        } catch (err)
        {
          console.warn(\"Map not loaded\")
        }
      }

      \$(\"#showConfForm\").one(\"click\", showForm);

      //send file
      function sendSerializedConf(dataArray)
      {
        var data = {dataArray: JSON.stringify(dataArray)};
        //DBimport
        \$.ajax({
          type: \"POST\",
          cache: false,
          url: \"";
        // line 223
        echo $this->env->getExtension('routing')->getPath("schedule_admin_DBimport");
        echo "\",
          data: data,
          success: function (a, b, c)
          {
            bootstrapAlert(\"success\", ' ' + getMsgUl(dataArray, \"added\") + 'Please refresh this page to find out imported items.');
          },
          error: function (a, b, c)
          {
            bootstrapAlert(\"warning\", 'import failed because : ' + c);
            //                      @TODO : TO REMOVE
            console.log(a);
            console.log(b);
            console.log(c);
            \$(confOwlUriInput).parent().addClass('has-warning');
          }
        });
      }
    });

    function getMsgUl(dataArray, endString)
    {
      var msg = \"\";
      if (dataArray.conference.setAcronym)
      {
        msg += dataArray.conference.setAcronym;
      }
      else if (dataArray.conference.setSummary)
      {
        msg += dataArray.conference.setSummary;
      }
      msg += \"<ul>\";
      for (var i in dataArray)
      {
        if (dataArray[i] && dataArray[i].length > 0)
        {
          msg += \"<li>\" + dataArray[i].length + \" \" + i + \" \" + endString + \" !</li>\";
        }
      }

      return msg + \"</ul>\";
    }
  </script>
";
    }

    public function getTemplateName()
    {
        return "fibeConferenceBundle:Conference:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  302 => 223,  227 => 150,  215 => 140,  208 => 138,  201 => 137,  199 => 136,  169 => 108,  166 => 107,  143 => 86,  140 => 85,  133 => 51,  125 => 46,  117 => 41,  113 => 40,  109 => 39,  100 => 32,  98 => 31,  86 => 22,  82 => 21,  78 => 20,  74 => 19,  70 => 18,  66 => 17,  62 => 16,  57 => 14,  51 => 12,  41 => 6,  38 => 5,  31 => 3,);
    }
}
