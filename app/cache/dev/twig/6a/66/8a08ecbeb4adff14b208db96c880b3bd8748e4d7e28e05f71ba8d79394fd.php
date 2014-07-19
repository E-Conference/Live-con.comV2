<?php

/* fibeWWWConfBundle:Category:index.html.twig */
class __TwigTemplate_6a668a08ecbeb4adff14b208db96c880b3bd8748e4d7e28e05f71ba8d79394fd extends Twig_Template
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
        echo "Categories";
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
      <span>Category list</span>
      <a class=\"btn btn-info\" href=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath("documentation", array("anchor" => "Category"));
        echo "\" target=\"_blank\" title=\"Help\">
        <i class=\"fa fa-question\"></i>
      </a>
    </div>

    <div class=\" col-xs-2 col-sm-4 col-md-6 col-lg-8\">
    </div>
    ";
        // line 18
        if ($this->env->getExtension('security')->isGranted("CREATE", $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "getCurrentConf", array(), "method"))) {
            // line 19
            echo "      <div class=\"page-btn-list  col-xs-5  col-sm-4 col-md-3 col-lg-2\">
        <a class=\"btn btn-info btn-create create\" href=\"";
            // line 20
            echo $this->env->getExtension('routing')->getPath("schedule_category_new");
            echo "\" title=\"Add a category\">
          <i class=\"fa fa-plus\"></i> New Category
        </a>
      </div>
    ";
        }
        // line 25
        echo "
  </div>
  <div class=\"row page-content\">
    <div id=\"category_list\" class=\"table-responsive\">
      ";
        // line 29
        $this->env->loadTemplate("fibeWWWConfBundle:Category:list.html.twig")->display($context);
        // line 30
        echo "    </div>
  </div>

";
    }

    public function getTemplateName()
    {
        return "fibeWWWConfBundle:Category:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 30,  76 => 29,  70 => 25,  62 => 20,  59 => 19,  57 => 18,  47 => 11,  38 => 6,  35 => 5,  29 => 3,);
    }
}
