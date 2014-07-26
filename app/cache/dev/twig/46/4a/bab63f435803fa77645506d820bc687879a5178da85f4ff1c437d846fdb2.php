<?php

/* fibeDashboardBundle::base.html.twig */
class __TwigTemplate_464abab63f435803fa77645506d820bc687879a5178da85f4ff1c437d846fdb2 extends Twig_Template
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
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_meta($context, array $blocks = array())
    {
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
    }

    // line 5
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 6
        echo "      ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
      <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibedashboard/css/dashboard.css"), "html", null, true);
        echo "\"/>
      ";
        // line 8
        $this->displayBlock('stylesheets_page', $context, $blocks);
        // line 10
        echo "    ";
    }

    // line 8
    public function block_stylesheets_page($context, array $blocks = array())
    {
        // line 9
        echo "      ";
    }

    // line 13
    public function block_javascripts($context, array $blocks = array())
    {
        // line 14
        echo "      ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
      <script type=\"text/javascript\">

        \$(document).ready(function ()
        {
          deployed = false;
          \$(\"#sideBarBtn\").click(function ()
          {
            deployResultBox();
          });
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
        // line 41
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session"), "flashbag"), "get", array(0 => "info"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 42
            echo "        <script type=\"text/javascript\">
          bootstrapAlert(\"info\", \"";
            // line 43
            echo twig_escape_filter($this->env, (isset($context["flashMessage"]) ? $context["flashMessage"] : null), "html", null, true);
            echo "\", \"Info : \");
        </script>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 46
        echo "
      ";
        // line 47
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session"), "flashbag"), "get", array(0 => "success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 48
            echo "        <script type=\"text/javascript\">
          bootstrapAlert(\"success\", \"";
            // line 49
            echo twig_escape_filter($this->env, (isset($context["flashMessage"]) ? $context["flashMessage"] : null), "html", null, true);
            echo "\", \"Success : \");
        </script>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 52
        echo "
      ";
        // line 53
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session"), "flashbag"), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 54
            echo "        <script type=\"text/javascript\">
          bootstrapAlert(\"warning\", \"";
            // line 55
            echo twig_escape_filter($this->env, (isset($context["flashMessage"]) ? $context["flashMessage"] : null), "html", null, true);
            echo "\", \"Error : \");
        </script>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 58
        echo "
      ";
        // line 59
        $this->displayBlock('javascripts_page', $context, $blocks);
        // line 61
        echo "    ";
    }

    // line 59
    public function block_javascripts_page($context, array $blocks = array())
    {
        // line 60
        echo "      ";
    }

    // line 63
    public function block_body($context, array $blocks = array())
    {
        // line 64
        echo "  ";
        $this->displayParentBlock("body", $context, $blocks);
        echo "

  ";
        // line 66
        $this->displayBlock('navBar', $context, $blocks);
        // line 69
        echo "
  ";
        // line 70
        $this->displayBlock('content', $context, $blocks);
        // line 94
        echo "
";
    }

    // line 66
    public function block_navBar($context, array $blocks = array())
    {
        // line 67
        echo "    ";
        $this->env->loadTemplate("::mainNavBar.html.twig")->display($context);
        // line 68
        echo "  ";
    }

    // line 70
    public function block_content($context, array $blocks = array())
    {
        // line 71
        echo "    <div class=\"content\">
      <div class=\"row\">
        <div class=\"col-xs-1 col-sm-1  col-md-1 col-lg-1\"></div>
        <div class=\"col-xs-10 col-sm-10  col-md-10 col-lg-10\">
          <div class=\"row \">
            <ul class=\"nav breadcrum nav-tabs\">
              <li class=\"active\"><a href=\"#\">My conferences</a></li>

              ";
        // line 79
        $this->displayBlock('menu_page', $context, $blocks);
        // line 81
        echo "
            </ul>
          </div>
          <div class=\"row center\">
            ";
        // line 85
        $this->displayBlock('centerPanel', $context, $blocks);
        // line 87
        echo "          </div>
        </div>
        <div class=\"col-xs-1 col-sm-1  col-md-1 col-lg-1\"></div>
      </div>

    </div>
  ";
    }

    // line 79
    public function block_menu_page($context, array $blocks = array())
    {
        // line 80
        echo "              ";
    }

    // line 85
    public function block_centerPanel($context, array $blocks = array())
    {
        // line 86
        echo "            ";
    }

    public function getTemplateName()
    {
        return "fibeDashboardBundle::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  251 => 86,  248 => 85,  244 => 80,  231 => 87,  229 => 85,  223 => 81,  221 => 79,  211 => 71,  208 => 70,  198 => 66,  193 => 94,  191 => 70,  188 => 69,  186 => 66,  180 => 64,  177 => 63,  173 => 60,  170 => 59,  166 => 61,  164 => 59,  161 => 58,  152 => 55,  149 => 54,  145 => 53,  142 => 52,  133 => 49,  130 => 48,  126 => 47,  114 => 43,  76 => 14,  73 => 13,  69 => 9,  66 => 8,  62 => 10,  60 => 8,  283 => 149,  280 => 148,  252 => 122,  241 => 79,  232 => 110,  226 => 108,  224 => 107,  217 => 103,  212 => 101,  209 => 100,  204 => 68,  201 => 67,  199 => 96,  194 => 94,  189 => 92,  183 => 90,  176 => 87,  174 => 86,  169 => 84,  163 => 80,  159 => 78,  155 => 76,  153 => 75,  147 => 71,  143 => 69,  139 => 67,  137 => 66,  131 => 62,  127 => 60,  123 => 46,  121 => 57,  115 => 53,  111 => 42,  107 => 41,  105 => 48,  92 => 39,  88 => 38,  82 => 34,  78 => 33,  67 => 25,  56 => 7,  51 => 6,  48 => 5,  43 => 4,  38 => 3,  32 => 3,);
    }
}
