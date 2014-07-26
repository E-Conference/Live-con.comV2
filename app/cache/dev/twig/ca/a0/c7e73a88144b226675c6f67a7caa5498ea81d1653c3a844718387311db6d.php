<?php

/* fibeConferenceBundle::base.html.twig */
class __TwigTemplate_caa0c7e73a88144b226675c6f67a7caa5498ea81d1653c3a844718387311db6d extends Twig_Template
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
      \$(\"select\").select2();
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
        \$('#sideBar').animate({left: '0px'});
        deployed = true;
      }
      else
      {
        \$('#sideBar').animate({left: '-180px'});
        deployed = false;
      }
    }
  </script>



  ";
        // line 58
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session"), "flashbag"), "get", array(0 => "info"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 59
            echo "    <script type=\"text/javascript\">
      bootstrapAlert(\"info\", \"";
            // line 60
            echo twig_escape_filter($this->env, (isset($context["flashMessage"]) ? $context["flashMessage"] : null), "html", null, true);
            echo "\", \"Info : \");
    </script>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 63
        echo "
  ";
        // line 64
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session"), "flashbag"), "get", array(0 => "success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 65
            echo "    <script type=\"text/javascript\">
      bootstrapAlert(\"success\", \"";
            // line 66
            echo twig_escape_filter($this->env, (isset($context["flashMessage"]) ? $context["flashMessage"] : null), "html", null, true);
            echo "\", \"Success : \");
    </script>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 69
        echo "
  ";
        // line 70
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session"), "flashbag"), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 71
            echo "    <script type=\"text/javascript\">
      bootstrapAlert(\"warning\", \"";
            // line 72
            echo twig_escape_filter($this->env, (isset($context["flashMessage"]) ? $context["flashMessage"] : null), "html", null, true);
            echo "\", \"Error : \");
    </script>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 75
        echo "
  <!-- Hide module not used in the conference -->
  ";
        // line 77
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "getCurrentConf", array(), "method"), "getModule", array(), "method"), "getPaperModule", array(), "method") == 0)) {
            // line 78
            echo "    <script type=\"text/javascript\">
      \$(document).ready(function ()
      {
        \$(\".module_paper\").hide();
      });
    </script>
  ";
        }
        // line 85
        echo "
  ";
        // line 86
        $this->displayBlock('javascripts_page', $context, $blocks);
    }

    public function block_javascripts_page($context, array $blocks = array())
    {
        // line 87
        echo "  ";
    }

    // line 90
    public function block_body($context, array $blocks = array())
    {
        // line 91
        echo "  ";
        $this->displayParentBlock("body", $context, $blocks);
        echo "
  ";
        // line 92
        $this->displayBlock('navBar', $context, $blocks);
        // line 95
        echo "

  ";
        // line 97
        if ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "getCurrentConf", array(), "method")) {
            // line 98
            echo "    ";
            $this->displayBlock('menuNavBar', $context, $blocks);
            // line 101
            echo "  ";
        }
        // line 102
        echo "
  ";
        // line 103
        $this->displayBlock('content', $context, $blocks);
    }

    // line 92
    public function block_navBar($context, array $blocks = array())
    {
        // line 93
        echo "    ";
        $this->env->loadTemplate("::mainNavBar.html.twig")->display($context);
        // line 94
        echo "  ";
    }

    // line 98
    public function block_menuNavBar($context, array $blocks = array())
    {
        // line 99
        echo "      ";
        $this->env->loadTemplate("::menuNavBar.html.twig")->display($context);
        // line 100
        echo "    ";
    }

    // line 103
    public function block_content($context, array $blocks = array())
    {
        // line 104
        echo "    <div class=\"content\">

      <div class=\"row\">
        <div class=\"col-xs-1 col-sm-1  col-md-1 col-lg-1\"></div>

        <div class=\"col-xs-10 col-sm-10  col-md-10 col-lg-10 \">
          <div class=\"row \">
            <ul class=\"nav breadcrum nav-tabs\">

              <li class=\"schedule_conference_show col-xs-2 col-sm-2  col-mg-2 col-lg-2\"><a
                    href=\"";
        // line 114
        echo $this->env->getExtension('routing')->getPath("schedule_conference_show");
        echo "\" class='ellipsis'><i
                      class=\"fa  fa-search-plus fa-1x\"></i><span> Overview </span></a></li>
              ";
        // line 116
        if ($this->env->getExtension('security')->isGranted("EDIT", $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "currentConf"), "module"))) {
            // line 117
            echo "                <li class=\"schedule_conference_module col-xs-2 col-sm-2  col-mg-2 col-lg-2\"><a
                      href=\"";
            // line 118
            echo $this->env->getExtension('routing')->getPath("schedule_conference_module");
            echo "\" class='ellipsis'> <i
                        class=\"fa fa-inbox fa-1x\"></i><span> Modules  </span></a></li>
              ";
        }
        // line 121
        echo "              ";
        if ($this->env->getExtension('security')->isGranted("VIEW", $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "currentConf"), "team"))) {
            // line 122
            echo "                <li class=\"conference_team_index col-xs-2 col-sm-2  col-mg-2 col-lg-2\"><a
                      href=\"";
            // line 123
            echo $this->env->getExtension('routing')->getPath("conference_team_index");
            echo "\" class='ellipsis'><i
                        class=\"fa fa-users fa-1x\"></i><span> Team   </span></a></li>
              ";
        }
        // line 126
        echo "              ";
        if ($this->env->getExtension('security')->isGranted("OPERATOR", $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "currentConf"))) {
            // line 127
            echo "                <li class=\"externalization_import_index col-xs-2 col-sm-2 col-mg-2 col-lg-2\"><a
                      href=\"";
            // line 128
            echo $this->env->getExtension('routing')->getPath("externalization_import_index");
            echo "\" class='ellipsis'><i
                        class=\"fa fa-exchange fa-1x\"></i><span> Import </span></a></li>
              ";
        }
        // line 131
        echo "              ";
        if ($this->env->getExtension('security')->isGranted("VIEW", $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "currentConf"))) {
            // line 132
            echo "                <li class=\"externalization_export_index col-xs-2 col-sm-2 col-mg-2 col-lg-2\"><a
                      href=\"";
            // line 133
            echo $this->env->getExtension('routing')->getPath("externalization_export_index");
            echo "\" class='ellipsis'><i
                        class=\"fa fa-download fa-1x\"></i><span> Export </span></a></li>
              ";
        }
        // line 136
        echo "
              ";
        // line 137
        $this->displayBlock('menu_page', $context, $blocks);
        // line 139
        echo "
            </ul>
          </div>
          <div class=\"row center\">
            ";
        // line 143
        $this->displayBlock('centerPanel', $context, $blocks);
        // line 145
        echo "          </div>
        </div>
        <div class=\"col-xs-1 col-sm-1  col-md-1 col-lg-1\"></div>
      </div>

    </div>
  ";
    }

    // line 137
    public function block_menu_page($context, array $blocks = array())
    {
        // line 138
        echo "              ";
    }

    // line 143
    public function block_centerPanel($context, array $blocks = array())
    {
        // line 144
        echo "            ";
    }

    public function getTemplateName()
    {
        return "fibeConferenceBundle::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  352 => 144,  349 => 143,  345 => 138,  342 => 137,  332 => 145,  330 => 143,  324 => 139,  322 => 137,  319 => 136,  313 => 133,  310 => 132,  307 => 131,  301 => 128,  298 => 127,  295 => 126,  289 => 123,  286 => 122,  283 => 121,  277 => 118,  274 => 117,  272 => 116,  267 => 114,  255 => 104,  252 => 103,  248 => 100,  245 => 99,  242 => 98,  238 => 94,  235 => 93,  232 => 92,  228 => 103,  225 => 102,  222 => 101,  219 => 98,  217 => 97,  213 => 95,  211 => 92,  206 => 91,  203 => 90,  193 => 86,  190 => 85,  181 => 78,  179 => 77,  175 => 75,  163 => 71,  159 => 70,  156 => 69,  147 => 66,  144 => 65,  137 => 63,  128 => 60,  121 => 58,  72 => 16,  69 => 15,  65 => 12,  59 => 11,  54 => 10,  46 => 6,  36 => 3,  302 => 223,  227 => 150,  215 => 140,  208 => 138,  201 => 137,  199 => 87,  169 => 108,  166 => 72,  143 => 86,  140 => 64,  133 => 51,  125 => 59,  117 => 41,  113 => 40,  109 => 39,  100 => 32,  98 => 31,  86 => 22,  82 => 22,  78 => 20,  74 => 19,  70 => 18,  66 => 17,  62 => 16,  57 => 14,  51 => 9,  41 => 5,  38 => 5,  31 => 3,);
    }
}
