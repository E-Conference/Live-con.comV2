<?php

/* fibeWWWConfBundle:Category:new.html.twig */
class __TwigTemplate_cf3ec5a0490629c823a69c66bac76ffc703174fe2f1cd1cb62bbf4ed3ff95868 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("fibeWWWConfBundle::base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'centerPanel' => array($this, 'block_centerPanel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "fibeWWWConfBundle::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "New category";
    }

    // line 5
    public function block_centerPanel($context, array $blocks = array())
    {
        // line 6
        echo "  ";
        $this->displayParentBlock("centerPanel", $context, $blocks);
        echo "

  <div class=\"row page-top-header \">
    <div class=\"page-title col-xs-5  col-sm-4 col-md-3 col-lg-2\">
      <span>New category</span>
    </div>

    <div class=\"col-xs-2 col-sm-4 col-md-6 col-lg-8\">
    </div>
    <div class=\"page-btn-list col-xs-5  col-sm-4 col-md-3 col-lg-2\">
      <a type=\"button\" href=\"";
        // line 16
        echo $this->env->getExtension('routing')->getPath("schedule_category");
        echo "\" class=\"btn btn-warning\" title=\"Go back to the list\">
        <i class=\"fa fa-list\"></i>
      </a>
    </div>
  </div>
  <div class=\"row page-content\">

    <form action=\"";
        // line 23
        echo $this->env->getExtension('routing')->getPath("schedule_category_create");
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'enctype');
        echo ">
      <div class=\"row\">

        <div class=\"col-lg-12\">
          ";
        // line 27
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "
          <br/>
          <button type=\"submit\" class=\"btn btn-block btn-success\">
            <i class=\"fa fa-check\"></i>
          </button>
        </div>
      </div>
      
    </form>
  </div>

";
    }

    public function getTemplateName()
    {
        return "fibeWWWConfBundle:Category:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 27,  62 => 23,  52 => 16,  38 => 6,  35 => 5,  29 => 3,);
    }
}
