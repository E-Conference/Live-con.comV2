<?php

/* fibeMobileAppBundle:MobileAppSettings:index.html.twig */
class __TwigTemplate_4f8ed92ebb5c5145e6a3e1c6fb24473fbad44720e3ae1821bf6e8106f9e30c7c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("fibeMobileAppBundle::base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets_page' => array($this, 'block_stylesheets_page'),
            'centerPanel' => array($this, 'block_centerPanel'),
            'javascripts_page' => array($this, 'block_javascripts_page'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "fibeMobileAppBundle::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Mobile App' settings";
    }

    // line 5
    public function block_stylesheets_page($context, array $blocks = array())
    {
        // line 6
        echo "
";
    }

    // line 9
    public function block_centerPanel($context, array $blocks = array())
    {
        // line 10
        echo "
   <div class=\"row page-top-header \">
     <div class=\"page-title   col-xs-5  col-sm-4 col-md-3 col-lg-2\">
       <span>Settings</span>
       <a class=\"btn btn-info\" href=\"";
        // line 14
        echo $this->env->getExtension('routing')->getPath("documentation", array("anchor" => "Mobile_App"));
        echo "\" target=\"_blank\"
          title=\"Help\">
         <i class=\"fa fa-question\"></i>
       </a>
     </div>

     <div class=\" col-xs-2 col-sm-4 col-md-6 col-lg-8\">
     </div>
   </div>
   <div class=\"row page-content\">
     <div class=\"row\">
       <div class=\"row-fluid\">
         ";
        // line 26
        $this->env->loadTemplate("fibeMobileAppBundle:MobileAppSettings:edit.html.twig")->display($context);
        // line 27
        echo "       </div>
     </div>
   </div>
 ";
    }

    // line 31
    public function block_javascripts_page($context, array $blocks = array())
    {
        // line 32
        echo "
";
    }

    public function getTemplateName()
    {
        return "fibeMobileAppBundle:MobileAppSettings:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 32,  78 => 31,  71 => 27,  69 => 26,  54 => 14,  48 => 10,  45 => 9,  40 => 6,  37 => 5,  31 => 3,);
    }
}
