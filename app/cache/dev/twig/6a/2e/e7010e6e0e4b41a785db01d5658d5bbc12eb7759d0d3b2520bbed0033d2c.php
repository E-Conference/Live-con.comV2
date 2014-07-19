<?php

/* fibeMobileAppBundle:MobileAppSettings:edit.html.twig */
class __TwigTemplate_6a2ee7010e6e0e4b41a785db01d5658d5bbc12eb7759d0d3b2520bbed0033d2c extends Twig_Template
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
        echo "<form class=\"edit-app\" action=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("mobileAppTheme_update_settings", array("id" => $this->getAttribute((isset($context["mobile_app_config"]) ? $context["mobile_app_config"] : null), "id"))), "html", null, true);
        echo "\"
      method=\"post\" ";
        // line 2
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["mobile_app_form"]) ? $context["mobile_app_form"] : null), 'enctype');
        echo ">
  <input type=\"hidden\" name=\"_method\" value=\"PUT\"/>

  <div class='row'>
    <div class=\"well col-xs-12 col-sm-12 col-md-3 col-lg-3\">
      <img src=\"https://cdn1.iconfinder.com/data/icons/yooicons_set01_socialbookmarks/512/social_google_box.png\"
           style=\"height:100px; width:auto;\"/>

      <p>As you may be short on the informations you have concerning your presenters, the application is looking on the google search engine for you in order to catch their website and other data that may be missing. Please note that it's based on a \"most probable\" politic which mean that you may have wrong results.</p>
      ";
        // line 11
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["mobile_app_form"]) ? $context["mobile_app_form"] : null), "googleDatasource"), 'row');
        echo "
    </div>

    <div class=\"well col-xs-12  col-sm-12 col-md-3 col-lg-3\">
      <img src=\"http://www.informatik.uni-trier.de/~ley/img/logo.png\" style=\"height:100px; width:auto;\"/>

      <p>As your attendees have a probable scientific background in computer science, we use dblp sparql endpoint in order to grab all the publications previously written by each one of them. This way, everyone can view not only what people are presenting at your conference, but also what they may have written before.</p>
      ";
        // line 18
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["mobile_app_form"]) ? $context["mobile_app_form"] : null), "dblpDatasource"), 'row');
        echo "
    </div>

    <div class=\"well col-xs-12  col-sm-12 col-md-3 col-lg-3\">

      <img src=\"https://scottlinux.com/wp-content/uploads/2012/04/duck-duck-go.png\" style=\"height:100px; width:auto;\"/>

      <p>In order to improve your attendees experience on your app we dig informations on duckduckgo search engine concerning your organizations (website, description, country). Note that the results are based on a \"most probable\" politic which mean that you may have wrong results.</p>
      ";
        // line 26
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["mobile_app_form"]) ? $context["mobile_app_form"] : null), "duckduckgoDatasource"), 'row');
        echo "
    </div>

    <div class=\"well col-xs-12  col-sm-12 col-md-3 col-lg-3\">

      <img
          src=\"http://whstherebellion.com/wp-content/uploads/2012/03/supporting-foreign-language-instruction-at-home.jpg\"
          style=\"height:100px; width:auto;\"/>

      <p>Your application can use different language, the default is EN but we encourage you to choose the language according to your content.</p>
      ";
        // line 36
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["mobile_app_form"]) ? $context["mobile_app_form"] : null), "lang"), 'row');
        echo "
    </div>

  </div>

  <div class='row'>

    <button type=\"submit\" class=\"btn btn-success col-xs-12 col-sm-12 col-md-12 col-lg-12\"><i class=\"fa fa-check\"></i>
    </button>

  </div>

  <div style=\"visibility:hidden;display:none;height:0px;\" id=\"hiddenInputs\">
    ";
        // line 49
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["mobile_app_form"]) ? $context["mobile_app_form"] : null), 'rest');
        echo "
  </div>
</form>




 ";
    }

    public function getTemplateName()
    {
        return "fibeMobileAppBundle:MobileAppSettings:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 49,  70 => 36,  57 => 26,  46 => 18,  36 => 11,  24 => 2,  19 => 1,  81 => 32,  78 => 31,  71 => 27,  69 => 26,  54 => 14,  48 => 10,  45 => 9,  40 => 6,  37 => 5,  31 => 3,);
    }
}
