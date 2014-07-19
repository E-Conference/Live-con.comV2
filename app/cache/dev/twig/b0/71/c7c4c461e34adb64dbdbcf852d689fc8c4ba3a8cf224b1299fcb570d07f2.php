<?php

/* fibeMobileAppBundle:MobileAppTheme:edit.html.twig */
class __TwigTemplate_b071c7c4c461e34adb64dbdbcf852d689fc8c4ba3a8cf224b1299fcb570d07f2 extends Twig_Template
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
        echo "<div class=\"well\">
  <form class=\"edit-app-theme\" action=\"";
        // line 2
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("mobileAppTheme_update_style", array("id" => $this->getAttribute((isset($context["mobile_app_config"]) ? $context["mobile_app_config"] : null), "id"))), "html", null, true);
        echo "\"
        method=\"post\" ";
        // line 3
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["mobile_app_form"]) ? $context["mobile_app_form"] : null), 'enctype');
        echo ">
    <input type=\"hidden\" name=\"_method\" value=\"PUT\"/>

    <div id='headerStyle'>
      <h4>Header</h4>

      <div style=\"min-height:30px\">
        ";
        // line 10
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["mobile_app_form"]) ? $context["mobile_app_form"] : null), "BGColorHeader"), 'label');
        echo "
        <div style=\"float:right\">
          ";
        // line 12
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["mobile_app_form"]) ? $context["mobile_app_form"] : null), "BGColorHeader"), 'widget');
        echo "
        </div>
      </div>
      <div style=\"min-height:30px\">
        ";
        // line 16
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["mobile_app_form"]) ? $context["mobile_app_form"] : null), "TitleColorHeader"), 'label');
        echo "
        <div style=\"float:right\">
          ";
        // line 18
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["mobile_app_form"]) ? $context["mobile_app_form"] : null), "TitleColorHeader"), 'widget');
        echo "
        </div>
      </div>
    </div>

    <div id='navBarStyle'>
      <h4>NavBar</h4>

      <div style=\"min-height:30px\">
        ";
        // line 27
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["mobile_app_form"]) ? $context["mobile_app_form"] : null), "BGColorNavBar"), 'label');
        echo "
        <div style=\"float:right\">
          ";
        // line 29
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["mobile_app_form"]) ? $context["mobile_app_form"] : null), "BGColorNavBar"), 'widget');
        echo "
        </div>
      </div>
      <div style=\"min-height:30px\">
        ";
        // line 33
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["mobile_app_form"]) ? $context["mobile_app_form"] : null), "TitleColorNavBar"), 'label');
        echo "
        <div style=\"float:right\">
          ";
        // line 35
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["mobile_app_form"]) ? $context["mobile_app_form"] : null), "TitleColorNavBar"), 'widget');
        echo "
        </div>
      </div>
    </div>

    <div id='contentStyle'>
      <h4>Content</h4>

      <div style=\"min-height:30px\">
        ";
        // line 44
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["mobile_app_form"]) ? $context["mobile_app_form"] : null), "BGColorContent"), 'label');
        echo "
        <div style=\"float:right\">
          ";
        // line 46
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["mobile_app_form"]) ? $context["mobile_app_form"] : null), "BGColorContent"), 'widget');
        echo "
        </div>
      </div>
      <div style=\"min-height:30px\">
        ";
        // line 50
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["mobile_app_form"]) ? $context["mobile_app_form"] : null), "TitleColorContent"), 'label');
        echo "
        <div style=\"float:right\">
          ";
        // line 52
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["mobile_app_form"]) ? $context["mobile_app_form"] : null), "TitleColorContent"), 'widget');
        echo "
        </div>
      </div>
    </div>

    <div id='buttonStyle'>
      <h4>Buttons</h4>

      <div style=\"min-height:30px\">
        ";
        // line 61
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["mobile_app_form"]) ? $context["mobile_app_form"] : null), "BGColorButton"), 'label');
        echo "
        <div style=\"float:right\">
          ";
        // line 63
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["mobile_app_form"]) ? $context["mobile_app_form"] : null), "BGColorButton"), 'widget');
        echo "
        </div>
      </div>
      <div style=\"min-height:30px\">
        ";
        // line 67
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["mobile_app_form"]) ? $context["mobile_app_form"] : null), "TitleColorButton"), 'label');
        echo "

        <div style=\"float:right; \">
          ";
        // line 70
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["mobile_app_form"]) ? $context["mobile_app_form"] : null), "TitleColorButton"), 'widget');
        echo "
        </div>
      </div>
    </div>

    <div id='footerrStyle'>
      <h4>Footer</h4>

      <div style=\"min-height:30px\">
        ";
        // line 79
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["mobile_app_form"]) ? $context["mobile_app_form"] : null), "BGColorFooter"), 'label');
        echo "
        <div style=\"float:right\">
          ";
        // line 81
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["mobile_app_form"]) ? $context["mobile_app_form"] : null), "BGColorFooter"), 'widget');
        echo "
        </div>
      </div>
      <div style=\"min-height:30px\">
        ";
        // line 85
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["mobile_app_form"]) ? $context["mobile_app_form"] : null), "TitleColorFooter"), 'label');
        echo "
        <div style=\"float:right\">
          ";
        // line 87
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["mobile_app_form"]) ? $context["mobile_app_form"] : null), "TitleColorFooter"), 'widget');
        echo "
        </div>
      </div>
    </div>
    <button type=\"submit\" class=\"btn btn-success edit-app\" style=\"width:100%\"><i class=\"fa fa-pencil-square-o\"></i>
    </button>

    <div style=\"visibility:hidden;display:none;height:0px;\" id=\"hiddenInputs\">
      ";
        // line 95
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["mobile_app_form"]) ? $context["mobile_app_form"] : null), 'rest');
        echo "
    </div>
  </form>

</div>


";
    }

    public function getTemplateName()
    {
        return "fibeMobileAppBundle:MobileAppTheme:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  181 => 95,  170 => 87,  165 => 85,  158 => 81,  153 => 79,  141 => 70,  135 => 67,  128 => 63,  123 => 61,  106 => 50,  99 => 46,  94 => 44,  82 => 35,  77 => 33,  70 => 29,  65 => 27,  53 => 18,  48 => 16,  26 => 3,  22 => 2,  19 => 1,  321 => 128,  318 => 127,  314 => 122,  311 => 121,  301 => 129,  299 => 127,  293 => 123,  291 => 121,  288 => 120,  282 => 117,  279 => 116,  277 => 115,  272 => 113,  261 => 104,  258 => 103,  254 => 100,  251 => 99,  248 => 98,  244 => 94,  241 => 93,  238 => 92,  234 => 103,  231 => 102,  228 => 101,  225 => 98,  223 => 97,  219 => 95,  217 => 92,  212 => 91,  209 => 90,  205 => 87,  199 => 86,  196 => 85,  187 => 78,  185 => 77,  180 => 74,  171 => 72,  168 => 71,  164 => 70,  161 => 69,  152 => 66,  149 => 65,  145 => 64,  142 => 63,  133 => 60,  88 => 23,  78 => 17,  75 => 16,  71 => 12,  68 => 11,  61 => 13,  59 => 11,  54 => 10,  51 => 9,  46 => 6,  41 => 12,  36 => 10,  216 => 124,  143 => 68,  130 => 59,  126 => 58,  121 => 55,  117 => 54,  114 => 53,  111 => 52,  103 => 47,  100 => 46,  97 => 45,  95 => 44,  80 => 32,  67 => 22,  56 => 14,  50 => 10,  47 => 9,  40 => 6,  37 => 5,  31 => 3,);
    }
}
