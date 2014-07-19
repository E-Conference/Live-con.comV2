<?php

/* fibeHomePageBundle::topBar.html.twig */
class __TwigTemplate_f8a2672161520795632f8273536cd01e4b1bdfae9a4167082cd43dc55d0285ef extends Twig_Template
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
        return array (  37 => 8,  27 => 4,  23 => 3,  19 => 1,  237 => 101,  234 => 100,  231 => 99,  226 => 97,  223 => 96,  206 => 78,  197 => 72,  193 => 71,  189 => 70,  185 => 69,  181 => 68,  176 => 66,  173 => 65,  170 => 64,  118 => 15,  114 => 14,  110 => 13,  102 => 11,  98 => 10,  93 => 9,  90 => 8,  85 => 6,  80 => 5,  55 => 99,  53 => 96,  46 => 11,  41 => 9,  33 => 7,  31 => 5,  25 => 1,  106 => 12,  99 => 25,  96 => 24,  92 => 20,  86 => 19,  73 => 13,  67 => 12,  62 => 11,  59 => 10,  54 => 13,  50 => 12,  44 => 64,  39 => 8,  36 => 3,  502 => 335,  498 => 334,  494 => 333,  489 => 331,  485 => 329,  482 => 328,  463 => 312,  454 => 306,  445 => 300,  405 => 263,  401 => 262,  394 => 258,  390 => 257,  382 => 252,  378 => 251,  371 => 247,  367 => 246,  361 => 243,  357 => 242,  349 => 237,  335 => 226,  326 => 220,  291 => 188,  275 => 175,  268 => 171,  257 => 163,  243 => 152,  229 => 141,  212 => 127,  190 => 108,  171 => 92,  163 => 87,  146 => 73,  138 => 68,  121 => 54,  113 => 49,  81 => 18,  78 => 17,  75 => 17,  69 => 13,  64 => 11,  58 => 14,  52 => 6,  49 => 5,  43 => 4,  38 => 5,  35 => 4,  32 => 3,);
    }
}
