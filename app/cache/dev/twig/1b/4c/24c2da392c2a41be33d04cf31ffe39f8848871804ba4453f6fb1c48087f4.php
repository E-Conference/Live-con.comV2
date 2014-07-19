<?php

/* fibeMobileAppBundle::base.html.twig */
class __TwigTemplate_1b4c24c2da392c2a41be33d04cf31ffe39f8848871804ba4453f6fb1c48087f4 extends Twig_Template
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
        // line 13
        echo "  <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibemobileapp/css/mobileApp.css"), "html", null, true);
        echo "\"/>
";
    }

    // line 11
    public function block_stylesheets_page($context, array $blocks = array())
    {
        // line 12
        echo "  ";
    }

    // line 16
    public function block_javascripts($context, array $blocks = array())
    {
        // line 17
        echo "  ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

  <script type=\"text/javascript\">
    \$(document).ready(function ()
    {

      \$(\".";
        // line 23
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
      } else
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
            echo "\", \"Info : \" );
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
            echo "\", \"Success : \" );
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
        // line 74
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

              <li class=\"mobileAppTheme_index  col-xs-3 col-sm-3 col-mg-3 col-lg-3\"><a
                    href=\"";
        // line 113
        echo $this->env->getExtension('routing')->getPath("mobileAppTheme_index");
        echo "\" class='ellipsis'><i
                      class=\"fa fa-pencil  fa-1x\"></i><span> Theme builder </span> </a></li>
             ";
        // line 115
        if ($this->env->getExtension('security')->isGranted("EDIT", $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "currentConf"), "appConfig"))) {
            // line 116
            echo "              <li class=\"mobileAppSettings_index   col-xs-3 col-sm-3 col-mg-3 col-lg-3\"><a
                    href=\"";
            // line 117
            echo $this->env->getExtension('routing')->getPath("mobileAppSettings_index");
            echo "\" class='ellipsis'> <i
                      class=\"fa fa-wrench fa-1x\"></i><span> Settings </span></a></li>
              ";
        }
        // line 120
        echo "
              ";
        // line 121
        $this->displayBlock('menu_page', $context, $blocks);
        // line 123
        echo "
            </ul>
          </div>
          <div class=\"row center\">
            ";
        // line 127
        $this->displayBlock('centerPanel', $context, $blocks);
        // line 129
        echo "          </div>
        </div>
        <div class=\"col-xs-1 col-sm-1  col-md-1 col-lg-1\"></div>
      </div>

    </div>
  ";
    }

    // line 121
    public function block_menu_page($context, array $blocks = array())
    {
        // line 122
        echo "              ";
    }

    // line 127
    public function block_centerPanel($context, array $blocks = array())
    {
        // line 128
        echo "            ";
    }

    public function getTemplateName()
    {
        return "fibeMobileAppBundle::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  321 => 128,  318 => 127,  314 => 122,  311 => 121,  301 => 129,  299 => 127,  293 => 123,  291 => 121,  288 => 120,  282 => 117,  279 => 116,  277 => 115,  272 => 113,  261 => 104,  258 => 103,  254 => 100,  251 => 99,  248 => 98,  244 => 94,  241 => 93,  238 => 92,  234 => 103,  231 => 102,  228 => 101,  225 => 98,  223 => 97,  219 => 95,  217 => 92,  212 => 91,  209 => 90,  205 => 87,  199 => 86,  196 => 85,  187 => 78,  185 => 77,  180 => 74,  171 => 72,  168 => 71,  164 => 70,  161 => 69,  152 => 66,  149 => 65,  145 => 64,  142 => 63,  133 => 60,  88 => 23,  78 => 17,  75 => 16,  71 => 12,  68 => 11,  61 => 13,  59 => 11,  54 => 10,  51 => 9,  46 => 6,  41 => 5,  36 => 3,  216 => 124,  143 => 68,  130 => 59,  126 => 58,  121 => 55,  117 => 54,  114 => 53,  111 => 52,  103 => 47,  100 => 46,  97 => 45,  95 => 44,  80 => 32,  67 => 22,  56 => 14,  50 => 10,  47 => 9,  40 => 6,  37 => 5,  31 => 3,);
    }
}
