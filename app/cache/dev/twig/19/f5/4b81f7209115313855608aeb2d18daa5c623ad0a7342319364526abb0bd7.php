<?php

/* FrontendBundle:Front:index.html.twig */
class __TwigTemplate_19f54b81f7209115313855608aeb2d18daa5c623ad0a7342319364526abb0bd7 extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/frontend/app/css/app.css"), "html", null, true);
        echo "\">
  <link rel=\"stylesheet\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/frontend/app/css/animations.css"), "html", null, true);
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
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/frontend/app/js/app.js"), "html", null, true);
        echo "\"></script>
  <!-- <script src=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/frontend/app/js/animations.js"), "html", null, true);
        echo "\"></script> -->
  <script src=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/frontend/app/js/filters.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/frontend/app/js/controllers.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/frontend/app/js/services.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/frontend/app/js/loadingBarModule.js"), "html", null, true);
        echo "\"></script>

  <script>
    angular.module('liveconApp').value('CONFERENCE_CONFIG', {
      baseUrl: '";
        // line 32
        echo twig_escape_filter($this->env, (isset($context["api_uri"]) ? $context["api_uri"] : null), "html", null, true);
        echo "',
      liveconLogoPath : \"../../web/img/livecon.png\",
      lang: 'EN'
    });
  </script>

  
</head>
<body ng-controller=\"mainCtrl\">

      <div class=\"navTop\" ng-include=\"'../../web/bundles/frontend/app/partials/layout/nav-top.html'\"  ng-controller=\"navTopCtrl\"></div>
      <div id=\"wrapper\">
       
        <div class=\"navLeft\" ng-include=\"'../../web/bundles/frontend/app/partials/layout/nav-left.html'\" ng-controller=\"navLeftCtrl\"></div>
        <!-- Page content -->
        <div id=\"page-content-wrapper\">
 
            <div class=\"page-content inset view-container\" >
                <div class=\"row view-frame\" ng-class=\"view-frame\" data-ng-view=\"\">
                   
                </div>
            </div>
        </div>
       

    </div>

     


</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "FrontendBundle:Front:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  76 => 32,  69 => 28,  65 => 27,  61 => 26,  57 => 25,  53 => 24,  49 => 23,  32 => 9,  28 => 8,  19 => 1,);
    }
}
