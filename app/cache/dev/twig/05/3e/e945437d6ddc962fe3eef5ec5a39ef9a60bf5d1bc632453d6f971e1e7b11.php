<?php

/* ::menuNavBar.html.twig */
class __TwigTemplate_053ee945437d6ddc962fe3eef5ec5a39ef9a60bf5d1bc632453d6f971e1e7b11 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div id=\"menu-navbar\" class=\"navbar navbar-static-top navbar-inverse\" role=\"navigation\">

  <div class=\"navbar-header\">
    <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\".navbar-ex2-collapse\">
      <span class=\"sr-only\">Toggle navigation</span>
      <span class=\"icon-bar\"></span>
      <span class=\"icon-bar\"></span>
      <span class=\"icon-bar\"></span>
    </button>

    <button class=\"btn btn-default btn-lg btn-conf\" type=\"button\">
      <a href=\"";
        // line 12
        echo $this->env->getExtension('routing')->getPath("schedule_conference_show");
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "currentConf"), "confName"), "html", null, true);
        echo " </a>
    </button>

  </div>

  <div class=\"navbar-collapse collapse navbar-ex2-collapse\">

    <ul class=\"nav navbar-nav navbar-right\">

      <ul class=\"item-menu-navbar nav navbar-nav\">

        <li class=\"dropdown\">
          <a style=\"padding-left:5px;\" href=\"";
        // line 24
        echo $this->env->getExtension('routing')->getPath("dashboard_index");
        echo "\" class=\"dropdown-toggle\"
             data-toggle=\"dropdown\">
            <i class=\"fa fa-cogs fa-3x\"></i> Conference
            <b class=\"caret\"></b>
          </a>
          <ul class=\"dropdown-menu\">

            <li>
              <a style=\"padding-right:5px;\" href=\"";
        // line 32
        echo $this->env->getExtension('routing')->getPath("schedule_conference_show");
        echo "\">
                <i class=\"fa  fa-search-plus fa-3x\"></i> Overview
              </a>

              ";
        // line 36
        if ($this->env->getExtension('security')->isGranted("VIEW", $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "currentConf"), "module"))) {
            // line 37
            echo "                <a style=\"padding-right:5px;\" href=\"";
            echo $this->env->getExtension('routing')->getPath("schedule_conference_module");
            echo "\">
                  <i class=\"fa fa-inbox fa-3x\"></i> Modules manager
                </a>
              ";
        }
        // line 41
        echo "              ";
        if ($this->env->getExtension('security')->isGranted("VIEW", $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "currentConf"), "team"))) {
            // line 42
            echo "                <a style=\"padding-right:5px;\" href=\"";
            echo $this->env->getExtension('routing')->getPath("conference_team_index");
            echo "\">
                  <i class=\"fa fa-users fa-3x\"></i> Team
                </a>
              ";
        }
        // line 46
        echo "              ";
        if ($this->env->getExtension('security')->isGranted("OPERATOR", $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "currentConf"))) {
            // line 47
            echo "                <a href=\"";
            echo $this->env->getExtension('routing')->getPath("externalization_import_index");
            echo "\">
                  <i class=\"fa fa-exchange fa-3x\"></i> Import
                </a>
              ";
        }
        // line 51
        echo "              ";
        if ($this->env->getExtension('security')->isGranted("VIEW", $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "currentConf"), "team"))) {
            // line 52
            echo "                <a href=\"";
            echo $this->env->getExtension('routing')->getPath("externalization_export_index");
            echo "\">
                  <i class=\"fa fa-download fa-3x\"></i> Export
                </a>
              ";
        }
        // line 56
        echo "
            </li>
          </ul>
        </li>

        <li class=\"dropdown\">
          <a style=\"padding-left:5px;\" href=\"";
        // line 62
        echo $this->env->getExtension('routing')->getPath("dashboard_index");
        echo "\" class=\"dropdown-toggle\"
             data-toggle=\"dropdown\">
            <i class=\"fa  fa-archive fa-3x\"></i> Modules
            <b class=\"caret\"></b>
          </a>
          <ul class=\"dropdown-menu\">

            <li>
              <a style=\"padding-right:5px;\" href=\"";
        // line 70
        echo $this->env->getExtension('routing')->getPath("schedule_confevent");
        echo "\">
                <i class=\"fa fa-calendar-o fa-3x\"></i> Events
              </a>

              <a style=\"padding-right:5px;\" href=\"";
        // line 74
        echo $this->env->getExtension('routing')->getPath("schedule_person_index");
        echo "\">
                <i class=\"fa fa-user fa-3x\"></i> Persons
              </a>

              ";
        // line 78
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "getCurrentConf", array(), "method"), "getModule", array(), "method"), "getPaperModule", array(), "method") == true)) {
            // line 79
            echo "                <a style=\"padding-right:5px;\" href=\"";
            echo $this->env->getExtension('routing')->getPath("schedule_paper");
            echo "\">
                  <i class=\"fa fa-book fa-3x\"></i> Publications
                </a>
              ";
        }
        // line 83
        echo "
              ";
        // line 84
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "getCurrentConf", array(), "method"), "getModule", array(), "method"), "getOrganizationModule", array(), "method") == true)) {
            // line 85
            echo "                <a style=\"padding-right:5px;\" href=\"";
            echo $this->env->getExtension('routing')->getPath("schedule_organization_index");
            echo "\">
                  <i class=\"fa fa-users fa-3x\"></i> Organizations
                </a>
              ";
        }
        // line 89
        echo "
              <a style=\"padding-right:5px;\" href=\"";
        // line 90
        echo $this->env->getExtension('routing')->getPath("schedule_location");
        echo "\">
                <i class=\"fa fa-map-marker fa-3x\"></i> Locations
              </a>

              <a style=\"padding-right:5px;\" href=\"";
        // line 94
        echo $this->env->getExtension('routing')->getPath("schedule_category");
        echo "\">
                <i class=\"fa fa-sort-amount-asc fa-3x\"></i> Categories
              </a>
              <a style=\"padding-right:5px;\" href=\"";
        // line 97
        echo $this->env->getExtension('routing')->getPath("schedule_topic");
        echo "\">
                <i class=\"fa fa-crosshairs fa-3x\"></i> Topics
              </a>
              ";
        // line 100
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "getCurrentConf", array(), "method"), "getModule", array(), "method"), "getSponsorModule", array(), "method") == true)) {
            // line 101
            echo "                <a style=\"padding-right:5px;\" href=\"";
            echo $this->env->getExtension('routing')->getPath("schedule_sponsor");
            echo "\">
                  <i class=\"fa fa-dollar fa-3x\"></i> Sponsors
                </a>
              ";
        }
        // line 105
        echo "
            </li>
          </ul>
        </li>

        <li>
          <a style=\"padding-right:5px;\" href=\"";
        // line 111
        echo $this->env->getExtension('routing')->getPath("schedule_view");
        echo "\">
            <i class=\"fa fa-calendar fa-3x\"></i> Schedule
          </a>
        </li>

        <li class=\"dropdown\">
          <a href=\"";
        // line 117
        echo $this->env->getExtension('routing')->getPath("mobileAppTheme_index");
        echo "\" style=\"padding-right:5px;\" class=\"dropdown-toggle\"
             data-toggle=\"dropdown\">
            <i class=\"fa fa-mobile fa-3x\"></i> Mobile app'
            <b class=\"caret\"></b>
          </a>
          <ul class=\"dropdown-menu\">

            <li>

              <a style=\"padding-right:5px;\" href=\"";
        // line 126
        echo $this->env->getExtension('routing')->getPath("mobileAppTheme_index");
        echo "\">
                <i class=\"fa fa-pencil  fa-3x\"></i> Theme builder
              </a>
              ";
        // line 129
        if ($this->env->getExtension('security')->isGranted("EDIT", $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "currentConf"), "appConfig"))) {
            // line 130
            echo "                <a style=\"padding-right:5px;\" href=\"";
            echo $this->env->getExtension('routing')->getPath("mobileAppSettings_index");
            echo "\">
                  <i class=\"fa fa-wrench fa-3x\"></i> Settings
                </a>
              ";
        }
        // line 134
        echo "            </li>
          </ul>
        </li>

      </ul>
      <!-- end class nav-->

    </ul>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "::menuNavBar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  243 => 134,  233 => 129,  198 => 105,  188 => 100,  182 => 97,  176 => 94,  158 => 85,  153 => 83,  145 => 79,  136 => 74,  129 => 70,  118 => 62,  110 => 56,  102 => 52,  99 => 51,  91 => 47,  88 => 46,  80 => 42,  77 => 41,  67 => 36,  60 => 32,  49 => 24,  32 => 12,  19 => 1,  352 => 144,  349 => 143,  345 => 138,  342 => 137,  332 => 145,  330 => 143,  324 => 139,  322 => 137,  319 => 136,  313 => 133,  310 => 132,  307 => 131,  301 => 128,  298 => 127,  295 => 126,  289 => 123,  286 => 122,  283 => 121,  277 => 118,  274 => 117,  272 => 116,  267 => 114,  255 => 104,  252 => 103,  248 => 100,  245 => 99,  242 => 98,  238 => 94,  235 => 130,  232 => 92,  228 => 103,  225 => 102,  222 => 101,  219 => 98,  217 => 97,  213 => 95,  211 => 92,  206 => 111,  203 => 90,  193 => 86,  190 => 101,  181 => 78,  179 => 77,  175 => 75,  163 => 71,  159 => 70,  156 => 84,  147 => 66,  144 => 65,  137 => 63,  128 => 60,  121 => 58,  72 => 16,  69 => 37,  65 => 12,  59 => 11,  54 => 10,  46 => 6,  36 => 3,  302 => 223,  227 => 126,  215 => 117,  208 => 138,  201 => 137,  199 => 87,  169 => 90,  166 => 89,  143 => 78,  140 => 64,  133 => 51,  125 => 59,  117 => 41,  113 => 40,  109 => 39,  100 => 32,  98 => 31,  86 => 22,  82 => 22,  78 => 20,  74 => 19,  70 => 18,  66 => 17,  62 => 16,  57 => 14,  51 => 9,  41 => 5,  38 => 5,  31 => 3,);
    }
}
