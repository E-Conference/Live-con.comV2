<?php

/* ::mainNavBar.html.twig */
class __TwigTemplate_6fe2675ba4e03f5903ac94b33fd824cd157dad86a5b9a1ce2402c6e308051d63 extends Twig_Template
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
        echo "<div id=\"main-navbar\" class=\"navbar navbar-static-top navbar-inverse\" role=\"navigation\">

  <div class=\"navbar-header\">
    <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\".navbar-ex1-collapse\">
      <span class=\"sr-only\">Toggle navigation</span>
      <span class=\"icon-bar\"></span>
      <span class=\"icon-bar\"></span>
      <span class=\"icon-bar\"></span>
    </button>
    <a class=\"navbar-brand\" href=\"";
        // line 10
        echo $this->env->getExtension('routing')->getPath("dashboard_index");
        echo "\" title=\"Go back to Index\"> <img
          src=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/livecon.png"), "html", null, true);
        echo "\"/></a>
  </div>

  <div class=\"navbar-collapse collapse navbar-ex1-collapse\">

    <ul class=\"nav navbar-nav\">

      <!-- Home dropdown -->
      <li>
        <a href=\"";
        // line 20
        echo $this->env->getExtension('routing')->getPath("dashboard_index");
        echo "\" title=\"Go to homepage\">
          <i class=\"fa fa-home fa-3x\"></i> <span> Home</span></a>
      </li>
      <li>
        <a href=\"";
        // line 24
        echo $this->env->getExtension('routing')->getPath("documentation", array("anchor" => "Generalities"));
        echo "\" target=\"_blank\" title=\"Help\">
          <i class=\"fa fa-question fa-3x\"></i> <span> Help</span>
        </a>
      </li>

    </ul>

    <ul class=\"nav navbar-nav navbar-right\">
      <!-- Profile -->
      <li>
        <a href=\"";
        // line 34
        echo $this->env->getExtension('routing')->getPath("fos_user_profile_show");
        echo "\">
          <i class=\"fa fa fa-user fa-3x\"></i><span> ";
        // line 35
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "username"), "html", null, true);
        echo "</span>
        </a>
      </li>

      <li>
        <a href=\"";
        // line 40
        echo $this->env->getExtension('routing')->getPath("logout");
        echo "\" title=\"logout\">
          <i class=\"fa fa-sign-out fa-3x\"></i> <span> Logout</span>
        </a>
      </li>
    </ul>
  </div>
</div>



";
    }

    public function getTemplateName()
    {
        return "::mainNavBar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  70 => 35,  53 => 24,  46 => 20,  34 => 11,  30 => 10,  19 => 1,  251 => 86,  248 => 85,  244 => 80,  231 => 87,  229 => 85,  223 => 81,  221 => 79,  211 => 71,  208 => 70,  198 => 66,  193 => 94,  191 => 70,  188 => 69,  186 => 66,  180 => 64,  177 => 63,  173 => 60,  170 => 59,  166 => 61,  164 => 59,  161 => 58,  152 => 55,  149 => 54,  145 => 53,  142 => 52,  133 => 49,  130 => 48,  126 => 47,  114 => 43,  76 => 14,  73 => 13,  69 => 9,  66 => 34,  62 => 10,  60 => 8,  283 => 149,  280 => 148,  252 => 122,  241 => 79,  232 => 110,  226 => 108,  224 => 107,  217 => 103,  212 => 101,  209 => 100,  204 => 68,  201 => 67,  199 => 96,  194 => 94,  189 => 92,  183 => 90,  176 => 87,  174 => 86,  169 => 84,  163 => 80,  159 => 78,  155 => 76,  153 => 75,  147 => 71,  143 => 69,  139 => 67,  137 => 66,  131 => 62,  127 => 60,  123 => 46,  121 => 57,  115 => 53,  111 => 42,  107 => 41,  105 => 48,  92 => 39,  88 => 38,  82 => 34,  78 => 40,  67 => 25,  56 => 7,  51 => 6,  48 => 5,  43 => 4,  38 => 3,  32 => 3,);
    }
}
