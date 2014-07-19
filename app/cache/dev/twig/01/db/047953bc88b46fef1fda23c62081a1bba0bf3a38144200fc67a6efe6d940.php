<?php

/* fibeWWWConfBundle::base.html.twig */
class __TwigTemplate_01db047953bc88b46fef1fda23c62081a1bba0bf3a38144200fc67a6efe6d940 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'meta' => array($this, 'block_meta'),
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'stylesheets_page' => array($this, 'block_stylesheets_page'),
            'javascripts' => array($this, 'block_javascripts'),
            'javascripts_page' => array($this, 'block_javascripts_page'),
            'body' => array($this, 'block_body'),
            'navBar' => array($this, 'block_navBar'),
            'menuNavBar' => array($this, 'block_menuNavBar'),
            'content' => array($this, 'block_content'),
            'menu_page' => array($this, 'block_menu_page'),
            'centerPanel' => array($this, 'block_centerPanel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 3
        $context["currentPath"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request"), "attributes"), "get", array(0 => "_route"), "method");
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_meta($context, array $blocks = array())
    {
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
    }

    // line 9
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 10
        echo "  ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
  ";
        // line 11
        $this->displayBlock('stylesheets_page', $context, $blocks);
    }

    public function block_stylesheets_page($context, array $blocks = array())
    {
        // line 12
        echo "  ";
    }

    // line 15
    public function block_javascripts($context, array $blocks = array())
    {
        // line 16
        echo "  ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

  <script type=\"text/javascript\">
    \$(document).ready(function ()
    {

      \$(\".";
        // line 22
        echo twig_escape_filter($this->env, (isset($context["currentPath"]) ? $context["currentPath"] : null), "html", null, true);
        echo "\").addClass(\"active\");

      \$('label[class=\"required\"]').append(\"<i style='color:#C00000  '>*</i>\");

      deployed = false;
      \$(\"#sideBarBtn\").click(function ()
      {
        deployResultBox();
      });
      \$(\"select\").select2({
        placeholder: \" \",
        allowClear: true
      });
      //  \$('.datetimepicker')
      // .wrap('<div class=\"input-group\">')
      // .after('<span class=\"input-group-addon\"><span class=\"icon-calendar\"></span></span>')
      // .datetimepicker({
      //     format: 'dd/mm/yyyy hh:ii',
      //     autoclose: true,
      // });

    });
    function deployResultBox()
    {
      if (!deployed)
      {
        \$('#sidebar').animate({left: '0px'});
        deployed = true;
      }
      else
      {
        \$('#sidebar').animate({left: '-180px'});
        deployed = false;
      }
    }
  </script>



  ";
        // line 61
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session"), "flashbag"), "get", array(0 => "info"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 62
            echo "    <script type=\"text/javascript\">
      bootstrapAlert(\"info\", \"";
            // line 63
            echo twig_escape_filter($this->env, (isset($context["flashMessage"]) ? $context["flashMessage"] : null), "html", null, true);
            echo "\", \"Info : \");
    </script>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 66
        echo "
  ";
        // line 67
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session"), "flashbag"), "get", array(0 => "success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 68
            echo "    <script type=\"text/javascript\">
      bootstrapAlert(\"success\", \"";
            // line 69
            echo twig_escape_filter($this->env, (isset($context["flashMessage"]) ? $context["flashMessage"] : null), "html", null, true);
            echo "\", \"Success : \");
    </script>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 72
        echo "
  ";
        // line 73
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session"), "flashbag"), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 74
            echo "    <script type=\"text/javascript\">
      bootstrapAlert(\"warning\", \"";
            // line 75
            echo twig_escape_filter($this->env, (isset($context["flashMessage"]) ? $context["flashMessage"] : null), "html", null, true);
            echo "\", \"Error : \");
    </script>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 78
        echo "
  <!-- Hide module not used in the conference -->
  ";
        // line 80
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "getCurrentConf", array(), "method"), "getModule", array(), "method"), "getPaperModule", array(), "method") == 0)) {
            // line 81
            echo "    <script type=\"text/javascript\">
      \$(document).ready(function ()
      {
        \$(\".module_paper\").hide();
      });
    </script>
  ";
        }
        // line 88
        echo "
  ";
        // line 89
        $this->displayBlock('javascripts_page', $context, $blocks);
    }

    public function block_javascripts_page($context, array $blocks = array())
    {
        // line 90
        echo "  ";
    }

    // line 93
    public function block_body($context, array $blocks = array())
    {
        // line 94
        echo "  ";
        $this->displayParentBlock("body", $context, $blocks);
        echo "
  ";
        // line 95
        $this->displayBlock('navBar', $context, $blocks);
        // line 98
        echo "

  ";
        // line 100
        if ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "getCurrentConf", array(), "method")) {
            // line 101
            echo "    ";
            $this->displayBlock('menuNavBar', $context, $blocks);
            // line 104
            echo "  ";
        }
        // line 105
        echo "
  ";
        // line 106
        $this->displayBlock('content', $context, $blocks);
    }

    // line 95
    public function block_navBar($context, array $blocks = array())
    {
        // line 96
        echo "    ";
        $this->env->loadTemplate("::mainNavBar.html.twig")->display($context);
        // line 97
        echo "  ";
    }

    // line 101
    public function block_menuNavBar($context, array $blocks = array())
    {
        // line 102
        echo "      ";
        $this->env->loadTemplate("::menuNavBar.html.twig")->display($context);
        // line 103
        echo "    ";
    }

    // line 106
    public function block_content($context, array $blocks = array())
    {
        // line 107
        echo "    <div class=\"content\">

      <div class=\"row\">
        <div class=\"col-xs-1 col-sm-1  col-md-1 col-lg-1\"></div>

        <div class=\"col-xs-10 col-sm-10  col-md-10 col-lg-10 \">
          <div class=\"row \">
            <ul class=\"nav breadcrum nav-tabs\">

              <li
                  class=\"schedule_event schedule_event_new schedule_event_edit schedule_event_show schedule_confevent_show schedule_confevent schedule_confevent_new schedule_confevent_edit col-xs-1 col-sm-1  col-mg-1 col-lg-1\">
                <a href=\"";
        // line 118
        echo $this->env->getExtension('routing')->getPath("schedule_confevent");
        echo "\" class='ellipsis'> <i class=\"fa fa-calendar-o fa-1x\"></i>
                  <span> Events </span> </a></li>
              <li
                  class=\"schedule_person_index schedule_person_edit schedule_person_new schedule_person_show  col-xs-1 col-sm-1  col-mg-1 col-lg-1\">
                <a href=\"";
        // line 122
        echo $this->env->getExtension('routing')->getPath("schedule_person_index");
        echo "\" class='ellipsis'> <i class=\"fa fa-user fa-1x\"></i>
                  <span> Persons </span> </a></li>

              ";
        // line 125
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "getCurrentConf", array(), "method"), "getModule", array(), "method"), "getPaperModule", array(), "method") == true)) {
            // line 126
            echo "                <li
                    class=\"schedule_paper schedule_paper_edit schedule_paper_new schedule_paper_show  col-xs-1 col-sm-1  col-mg-1 col-lg-2\">
                  <a href=\"";
            // line 128
            echo $this->env->getExtension('routing')->getPath("schedule_paper");
            echo "\" class='ellipsis'><i class=\"fa fa-book fa-1x\"></i>
                    <span> Publications  </span></a></li>
              ";
        }
        // line 131
        echo "
              ";
        // line 132
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "getCurrentConf", array(), "method"), "getModule", array(), "method"), "getOrganizationModule", array(), "method") == true)) {
            // line 133
            echo "                <li
                    class=\"schedule_organization_index  schedule_organization_new schedule_organization_edit schedule_organization_show col-xs-1 col-sm-1  ccol-mg-2 col-lg-2\">
                  <a href=\"";
            // line 135
            echo $this->env->getExtension('routing')->getPath("schedule_organization_index");
            echo "\" class='ellipsis'><i class=\"fa fa-users fa-1x\"></i><span> Organizations</span>
                  </a></li>
              ";
        }
        // line 138
        echo "
              <li
                  class=\"schedule_location schedule_location_edit schedule_location_new schedule_location_show  col-xs-1 col-sm-1  col-mg-1 col-lg-1\">
                <a href=\"";
        // line 141
        echo $this->env->getExtension('routing')->getPath("schedule_location");
        echo "\" class='ellipsis'> <i
                      class=\"fa fa-map-marker fa-1x\"></i><span>  Locations</span></a></li>
              <li
                  class=\"schedule_category schedule_category_new schedule_category_edit schedule_category_show  col-xs-1 col-sm-1  col-mg-1 col-lg-2\">
                <a href=\"";
        // line 145
        echo $this->env->getExtension('routing')->getPath("schedule_category");
        echo "\" class='ellipsis'><i class=\"fa fa-sort-amount-asc fa-1x\"></i>
                  <span> Categories</span> </a></li>
              <li
                  class=\"schedule_topic schedule_topic_new  schedule_topic_edit schedule_topic_show  col-xs-1 col-sm-1  col-mg-1 col-lg-1\">
                <a href=\"";
        // line 149
        echo $this->env->getExtension('routing')->getPath("schedule_topic");
        echo "\" class='ellipsis'> <i class=\"fa fa-crosshairs fa-1x\"></i>
                  <span>  Topics</span></a></li>
              ";
        // line 151
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "getCurrentConf", array(), "method"), "getModule", array(), "method"), "getSponsorModule", array(), "method") == true)) {
            // line 152
            echo "                <li class=\"col-xs-1 col-sm-1  col-mg-1 col-lg-1\">
                  <a href=\"";
            // line 153
            echo $this->env->getExtension('routing')->getPath("schedule_sponsor");
            echo "\" class='ellipsis'> <i class=\"fa fa-dollar fa-1x\"></i>
                    <span>  Sponsors</span></a></li>
              ";
        }
        // line 156
        echo "              ";
        $this->displayBlock('menu_page', $context, $blocks);
        // line 158
        echo "
            </ul>

          </div>
          <div class=\"row center\">
            ";
        // line 163
        $this->displayBlock('centerPanel', $context, $blocks);
        // line 165
        echo "          </div>
        </div>
        <div class=\"col-xs-1 col-sm-1  col-md-1 col-lg-1\"></div>
      </div>

    </div>
  ";
    }

    // line 156
    public function block_menu_page($context, array $blocks = array())
    {
        // line 157
        echo "              ";
    }

    // line 163
    public function block_centerPanel($context, array $blocks = array())
    {
        // line 164
        echo "            ";
    }

    public function getTemplateName()
    {
        return "fibeWWWConfBundle::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  378 => 164,  375 => 163,  371 => 157,  368 => 156,  358 => 165,  356 => 163,  349 => 158,  340 => 153,  335 => 151,  330 => 149,  323 => 145,  316 => 141,  305 => 135,  301 => 133,  296 => 131,  290 => 128,  286 => 126,  284 => 125,  278 => 122,  271 => 118,  258 => 107,  255 => 106,  245 => 101,  241 => 97,  238 => 96,  235 => 95,  231 => 106,  228 => 105,  225 => 104,  222 => 101,  220 => 100,  216 => 98,  214 => 95,  209 => 94,  206 => 93,  202 => 90,  196 => 89,  193 => 88,  184 => 81,  182 => 80,  178 => 78,  169 => 75,  166 => 74,  162 => 73,  159 => 72,  150 => 69,  147 => 68,  143 => 67,  140 => 66,  131 => 63,  128 => 62,  124 => 61,  72 => 16,  69 => 15,  65 => 12,  59 => 11,  54 => 10,  51 => 9,  46 => 6,  36 => 3,  675 => 473,  663 => 463,  661 => 462,  551 => 357,  533 => 344,  524 => 337,  505 => 321,  401 => 220,  395 => 219,  389 => 218,  384 => 216,  366 => 205,  362 => 204,  346 => 156,  342 => 190,  337 => 152,  333 => 187,  329 => 186,  324 => 184,  320 => 183,  315 => 181,  311 => 138,  307 => 179,  303 => 178,  299 => 132,  295 => 176,  291 => 175,  287 => 174,  282 => 173,  279 => 172,  273 => 166,  269 => 165,  265 => 164,  261 => 163,  256 => 161,  251 => 103,  248 => 102,  240 => 10,  237 => 9,  119 => 41,  108 => 39,  104 => 38,  97 => 33,  86 => 31,  82 => 22,  74 => 24,  61 => 22,  57 => 21,  47 => 13,  45 => 9,  41 => 5,  38 => 6,  32 => 4,);
    }
}
