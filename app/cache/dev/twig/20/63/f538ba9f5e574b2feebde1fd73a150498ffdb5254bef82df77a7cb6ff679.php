<?php

/* fibeConferenceBundle:Export:index.html.twig */
class __TwigTemplate_2063f538ba9f5e574b2feebde1fd73a150498ffdb5254bef82df77a7cb6ff679 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("fibeConferenceBundle::base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'centerPanel' => array($this, 'block_centerPanel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "fibeConferenceBundle::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Exporter ";
    }

    // line 5
    public function block_centerPanel($context, array $blocks = array())
    {
        // line 6
        echo "  ";
        $this->displayParentBlock("centerPanel", $context, $blocks);
        echo "
  <div class=\"row page-top-header \">
    <div class=\"page-title  col-xs-5  col-sm-4 col-md-3 col-lg-2\">
      <span>Exporter</span>
    </div>
  </div>
  <div class=\"row page-content\">

    <form action=\"";
        // line 14
        echo $this->env->getExtension('routing')->getPath("externalization_export_process");
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["export_form"]) ? $context["export_form"] : null), 'enctype');
        echo ">
      ";
        // line 15
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["export_form"]) ? $context["export_form"] : null), 'widget');
        echo "
      ";
        // line 16
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["export_form"]) ? $context["export_form"] : null), 'errors');
        echo "
      <button type=\"submit\" class=\"btn btn-block btn-success\">
        <i class=\"fa fa-check\"></i>
      </button>
    </form>
  </div>

";
    }

    public function getTemplateName()
    {
        return "fibeConferenceBundle:Export:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 16,  56 => 15,  50 => 14,  38 => 6,  35 => 5,  29 => 3,);
    }
}
