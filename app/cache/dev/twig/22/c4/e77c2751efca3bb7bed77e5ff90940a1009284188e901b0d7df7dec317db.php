<?php

/* fibeMobileAppBundle:MobileAppPublic:angularIndex.html.twig */
class __TwigTemplate_22c4e77c2751efca3bb7bed77e5ff90940a1009284188e901b0d7df7dec317db extends Twig_Template
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
        echo "
<!doctype html>
<html lang=\"en\" ng-app=\"liveconApp\">
<head>
  <meta charset=\"utf-8\">
      <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1\">
  <title>livecon app'</title>
  <link rel=\"stylesheet\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibemobileapp/angularApp/app/css/app.css"), "html", null, true);
        echo "\">
  <link rel=\"stylesheet\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibemobileapp/angularApp/app/css/animations.css"), "html", null, true);
        echo "\">
  <link href=\"//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css\" rel=\"stylesheet\">
  <link rel=\"stylesheet\" type=\"text/css\" href=\"http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css\"/> 

  <script type='text/javascript' src=\"//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js\"></script>
  <script type='text/javascript' src=\"//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js\"></script>

  <script src=\"https://code.angularjs.org/1.2.9/angular.js\"></script>
  <script src=\"https://code.angularjs.org/1.2.9/angular-animate.js\"></script>
  <script src=\"https://code.angularjs.org/1.2.9/angular-route.js\"></script>
  <script src=\"https://code.angularjs.org/1.2.9/angular-resource.js \"></script>

 

  <script src=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibemobileapp/angularApp/app/js/app.js"), "html", null, true);
        echo "\"></script>
  <!-- <script src=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibemobileapp/angularApp/app/js/animations.js"), "html", null, true);
        echo "\"></script> -->
  <script src=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibemobileapp/angularApp/app/js/filters.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibemobileapp/angularApp/app/js/controllers.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibemobileapp/angularApp/app/js/services.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fibemobileapp/angularApp/app/js/loadingBarModule.js"), "html", null, true);
        echo "\"></script>

  <script>
    angular.module('liveconApp').value('CONFERENCE_CONFIG', {
      liveconLogoPath : \"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/livecon.png"), "html", null, true);
        echo "\",
      baseUrl: '";
        // line 33
        echo twig_escape_filter($this->env, (isset($context["api_uri"]) ? $context["api_uri"] : null), "html", null, true);
        echo "',
      conferenceId: '";
        // line 34
        echo twig_jsonencode_filter($this->getAttribute((isset($context["conference"]) ? $context["conference"] : null), "id"));
        echo "',
      conferenceEventId: '";
        // line 35
        echo twig_jsonencode_filter($this->getAttribute($this->getAttribute((isset($context["conference"]) ? $context["conference"] : null), "mainConfEvent"), "id"));
        echo "',
      conferenceLogoPath : \"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("uploads/"), "html", null, true);
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["conference"]) ? $context["conference"] : null), "logoPath"), "html", null, true);
        echo "\",
      lang: 'EN'

    });
  </script>

  <style type=\"text/css\">
    .sidebar-nav-wrapper {
      background: ";
        // line 44
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mobile_app_config"]) ? $context["mobile_app_config"] : null), "BGColorNavBar"), "html", null, true);
        echo " !important;
     
    }
    .sidebar-nav li a{
       color: ";
        // line 48
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mobile_app_config"]) ? $context["mobile_app_config"] : null), "TitleColorNavBar"), "html", null, true);
        echo " !important;
    }

    .navbar {   
      background: ";
        // line 52
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mobile_app_config"]) ? $context["mobile_app_config"] : null), "BGColorHeader"), "html", null, true);
        echo " !important;
     
    }

    .badge{
      margin-top: 10px;
    }

    #title{
       color: ";
        // line 61
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mobile_app_config"]) ? $context["mobile_app_config"] : null), "TitleColorHeader"), "html", null, true);
        echo " !important;
    }

    .list-group-item{
      background-color:  ";
        // line 65
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mobile_app_config"]) ? $context["mobile_app_config"] : null), "BGColorNavBar"), "html", null, true);
        echo "  !important;
    }

    .page-content-wrapper {   
      background: ";
        // line 69
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mobile_app_config"]) ? $context["mobile_app_config"] : null), "BGColorContent"), "html", null, true);
        echo " !important;
      color: ";
        // line 70
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mobile_app_config"]) ? $context["mobile_app_config"] : null), "TitleColorContent"), "html", null, true);
        echo " !important;
    }

    .btn {   
      background: ";
        // line 74
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mobile_app_config"]) ? $context["mobile_app_config"] : null), "BGColorButton"), "html", null, true);
        echo " !important;
      color: ";
        // line 75
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mobile_app_config"]) ? $context["mobile_app_config"] : null), "TitleColorButton"), "html", null, true);
        echo " !important;
      border: 1px solid ";
        // line 76
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mobile_app_config"]) ? $context["mobile_app_config"] : null), "TitleColorContent"), "html", null, true);
        echo " !important;
    }



  </style>
</head>
<body ng-controller=\"mainCtrl\">

      <div class=\"navTop\" ng-include=\"'../../../../web/bundles/fibemobileapp/angularApp/app/partials/nav-top.html'\"  ng-controller=\"navTopCtrl\"></div>
      <div id=\"wrapper\">
       
        <div class=\"navLeft\" ng-include=\"'../../../../web/bundles/fibemobileapp/angularApp/app/partials/nav-left.html'\" ng-controller=\"navLeftCtrl\"></div>
        <!-- Page content -->
        <div id=\"page-content-wrapper\">
 
            <div class=\"page-content inset view-container\" >
                <div class=\"row view-frame\" ng-class=\"view-frame\" data-ng-view=\"\">
                   
                </div>
            </div>
        </div>
        <div class=\"navRight\" ng-include=\"'../../../../web/bundles/fibemobileapp/angularApp/app/partials/nav-right.html'\" ng-controller=\"navRightCtrl\"></div>

    </div>

     


</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "fibeMobileAppBundle:MobileAppPublic:angularIndex.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  163 => 76,  159 => 75,  155 => 74,  148 => 70,  144 => 69,  137 => 65,  130 => 61,  118 => 52,  111 => 48,  104 => 44,  92 => 36,  88 => 35,  84 => 34,  80 => 33,  76 => 32,  69 => 28,  65 => 27,  61 => 26,  57 => 25,  53 => 24,  49 => 23,  32 => 9,  28 => 8,  19 => 1,);
    }
}
