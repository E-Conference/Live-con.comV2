<?php

/* fibeHomePageBundle::topBar.html.twig */
class __TwigTemplate_01a781c88c7c63b49e7a35947df0067429a4195abc2872b593ac22112c4b136e extends Twig_Template
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
        echo "<div id=\"header\">
  <div class=\"container_12\">
    <div class=\"grid_3\"><a href=\"";
        // line 3
        echo $this->env->getExtension('routing')->getPath("homePage_index");
        echo "#entete\" title=\"Livecon UPGRATE YOUR CONFERENCE\"><img
            src=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibehomepage/img/logo.png"), "html", null, true);
        echo "\" alt=\"Livecon\"/></a></div>
    <div class=\"grid_9\" id=\"menu\">
      <ul>
        <li><a href=\"";
        // line 7
        echo $this->env->getExtension('routing')->getPath("homePage_index");
        echo "#overview\" title=\"Overview The Livecon Solution\">Overview</a></li>
        <li><a href=\"";
        // line 8
        echo $this->env->getExtension('routing')->getPath("homePage_index");
        echo "#app\" title=\"The LiveCon App\">Demo</a></li>
        <li><a href=\"";
        // line 9
        echo $this->env->getExtension('routing')->getPath("homePage_index");
        echo "#getstarted\" title=\"Get Started the Livecon Solution\">Get Started</a>
        </li>
        <li><a href=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath("homePage_index");
        echo "#contact\" title=\"Contact Livecon Team\">Contact us</a></li>
        <li><a href=\"";
        // line 12
        echo $this->env->getExtension('routing')->getPath("datas_conferences_list");
        echo "\" title=\"The Livecon Conferences\">Conferences</a></li>
        <li><a href=\"";
        // line 13
        echo $this->env->getExtension('routing')->getPath("login");
        echo "\" title=\"Login\">Login</a></li>
        <li><a href=\"";
        // line 14
        echo $this->env->getExtension('routing')->getPath("fos_user_registration_register");
        echo "\" title=\"Signup\">Sign up</a></li>
      </ul>
    </div>

  </div>
</div>";
    }

    public function getTemplateName()
    {
        return "fibeHomePageBundle::topBar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  27 => 4,  23 => 3,  19 => 1,  237 => 101,  234 => 100,  231 => 99,  226 => 97,  223 => 96,  206 => 78,  197 => 72,  193 => 71,  189 => 70,  185 => 69,  181 => 68,  176 => 66,  173 => 65,  170 => 64,  118 => 15,  114 => 14,  102 => 11,  98 => 10,  93 => 9,  90 => 8,  80 => 5,  58 => 14,  55 => 99,  46 => 11,  41 => 9,  33 => 7,  25 => 1,  106 => 12,  99 => 25,  92 => 20,  86 => 19,  81 => 18,  78 => 17,  67 => 12,  59 => 10,  54 => 13,  50 => 12,  44 => 64,  36 => 3,  154 => 56,  148 => 55,  142 => 52,  136 => 51,  131 => 50,  129 => 49,  125 => 48,  110 => 13,  105 => 34,  101 => 33,  96 => 24,  85 => 6,  82 => 21,  79 => 20,  73 => 13,  68 => 14,  62 => 11,  56 => 9,  53 => 96,  47 => 5,  43 => 8,  39 => 8,  37 => 8,  34 => 4,  31 => 5,);
    }
}
